<?php

use Core\Session;
use Core\Database;
use Core\App;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);
$path = get_path();
$page = intval($_GET['page'] ?? 0);

$product = new Products($page);
$products = 0;
$product_count = 0;
if ($path == 'new') {
    $products = $product->new_products();
    $product_count = $product->new_product_count();
} else {
    $products = $product->get_products($path);
    $product_count = $product->get_product_count($path);
}

function checkPage($count): bool
{
    return ($_GET['page'] ?? 0) + 1 <= $count / 8;
}

require base_path('Http/views/products/index.php');