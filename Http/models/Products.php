<?php

namespace Http\models;

use Core\App;
use Core\Database;

class Products
{
    protected $db;
    public int $offset;
    public int $page;

    public function __construct($page)
    {
        $this->db = App::resolve(Database::class);
        $this->page = $page ?? 0;
        $this->offset = max(0, $this->page * 8);
    }

    public function new_products(): array
    {
        return $this->db->query("
            SELECT p.*, AVG(r.rating) as average_rating, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
            FROM products p
            JOIN product_images pi ON p.product_id = pi.product_id
            LEFT JOIN reviews r on p.product_id = r.product_id
            GROUP BY p.product_id
            ORDER BY p.product_id DESC
            LIMIT 8 OFFSET $this->offset
        ")->get();
    }

    public function new_product_count(): int
    {
        return count($this->db->query('
            SELECT p.*
            FROM products p
        ')->get());
    }

    public function search_products(string $search): array
    {
        $search = '%' . $search . '%';

        return $this->db->query("
            SELECT p.*, AVG(r.rating) as average_rating, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
            FROM products p
            JOIN product_images pi ON p.product_id = pi.product_id
            LEFT JOIN reviews r on p.product_id = r.product_id
            WHERE p.name LIKE :search
            GROUP BY p.product_id
            ORDER BY p.product_id DESC
            LIMIT 8 OFFSET $this->offset
    ", ['search' => $search])->get();
    }

    public function search_product_count(string $search): int
    {
        $search = '%' . $search . '%';

        return count($this->db->query('
        SELECT p.*
        FROM products p
        WHERE p.name LIKE :search
    ', ['search' => $search])->get());
    }

    public function get_products(string $path): array
    {
        return $this->db->query("
            SELECT p.*, AVG(r.rating) as average_rating, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
            FROM products p
            JOIN product_categories pc ON p.product_id = pc.product_id
            JOIN product_images pi ON p.product_id = pi.product_id
            LEFT JOIN reviews r on p.product_id = r.product_id
            WHERE pc.category_id IN (
                SELECT c.category_id
                FROM categories c
                WHERE c.parent_category_id = (
                    SELECT category_id
                    FROM categories
                    WHERE name = :name
                )
            ) AND p.visibility != 0
            GROUP BY p.product_id
            LIMIT 8 OFFSET $this->offset
        ", [':name' => $path])->get();
    }

    public function get_product_count(string $path): int
    {
        return count($this->db->query("
            SELECT p.*, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
            FROM products p
            JOIN product_categories pc ON p.product_id = pc.product_id
            JOIN product_images pi ON p.product_id = pi.product_id
            WHERE pc.category_id IN (
                SELECT c.category_id
                FROM categories c
                WHERE c.parent_category_id = (
                    SELECT category_id
                    FROM categories
                    WHERE name = :name
                )
            ) AND p.visibility != 0
            GROUP BY p.product_id
        ", [':name' => $path])->get());
    }

    public function get_categories(): array
    {
        return $this->db->query("select * from categories where visibility != 0 and parent_category_id != 0")->get();
    }

    public function wishlist(int $user_id): array
    {
        return $this->db->query("select product_id from wishlist where user_id = :user_id", ['user_id' => $user_id])->get();
    }

    public function find(int $product_id): bool
    {
        return (bool)$this->db->query("select * from products where product_id = :product_id", ['product_id' => $product_id])->find();
    }
}