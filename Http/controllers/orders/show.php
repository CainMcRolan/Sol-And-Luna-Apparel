<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

$order = $db->query("
    select * 
    from orders 
    where user_id = :user_id
    and order_id = :order_id
", [
    ':user_id' => $_SESSION['user']['user_id'],
    ':order_id' => $_GET['id'] ?? '',
])->find_or_fail();

$product = new Products(0);
$products = array_slice($product->new_products(),0,3);

$wishlist = [];
if ($_SESSION['user'] ?? false) {
    $wishlist = array_column($product->wishlist($_SESSION['user']['user_id']), 'product_id');
}

require base_path('Http/views/orders/show.php');