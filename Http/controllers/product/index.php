<?php

use Core\App;
use Core\Database;
use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

$user = Session::fetch('user');

$current_product = $db->query("
    SELECT p.*, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
    FROM products p
    JOIN product_images pi ON p.product_id = pi.product_id
    WHERE p.product_id = :product_id
    GROUP BY p.product_id
", [':product_id' => $_GET['id']])->find();

if ($user) {
    (bool)$in_wishlist = $db->query("
    select * 
    from wishlist 
    where product_id = ? 
    and user_id = ?
", [$_GET['id'], $_SESSION['user']['user_id']])->find();
}

$hot_items = $db->query("
    SELECT p.*, pi.cloud_url
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    ORDER BY RAND()
    LIMIT 7
")->get();

require base_path('Http/views/product/index.php');