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
        $this->offset = $this->page * 8;
    }

    public function new_products(): array
    {
        return $this->db->query("
            SELECT p.*, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
            FROM products p
            JOIN product_images pi ON p.product_id = pi.product_id
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

    public function get_products($path): array
    {
        return $this->db->query("
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
            LIMIT 8 OFFSET $this->offset
        ", [':name' => $path])->get();
    }

    public function get_product_count($path): int
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
}