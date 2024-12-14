<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

$orders = $db->query("
    select * 
    from orders 
    where user_id = :user_id
    order by created_at
    desc
", [
    ':user_id' => $_SESSION['user']['user_id']
])->get();

$product = new Products(0);
$products = array_slice($product->new_products(),0,3);

$wishlist = [];
if ($_SESSION['user'] ?? false) {
    $wishlist = array_column($product->wishlist($_SESSION['user']['user_id']), 'product_id');
}

require base_path('Http/views/orders/index.php');