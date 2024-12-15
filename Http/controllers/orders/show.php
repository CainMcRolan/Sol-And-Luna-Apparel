<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

$order = $db->query("
    select o.*, a.* 
    from orders o 
    left join addresses a on o.shipping_address_id = a.address_id
    where o.user_id = :user_id
    and o.order_id = :order_id
", [
    ':user_id' => $_SESSION['user']['user_id'],
    ':order_id' => $_GET['id'] ?? '',
])->find_or_fail();

$order_items = $db->query("
    select o.*, p.*, i.cloud_url
    from order_items o  
    join products p on o.product_id = p.product_id
    left join product_images i on p.product_id = i.product_id
    where i.is_primary = 1
    and o.order_id = :order_id
", [
    ':order_id' => $_GET['id'] ?? '',
])->get();

$order_items_total = $db->query("
    SELECT 
        SUM(quantity * price_at_time) AS subtotal,
        SUM(quantity * price_at_time) * 0.12 AS tax,
        SUM(quantity * price_at_time) + ((SUM(quantity * price_at_time) * 0.12) + 150) AS total
    FROM order_items 
    WHERE order_id = :order_id
", [':order_id' => $_GET['id']])->find();

$product = new Products(0);
$products = array_slice($product->new_products(),0,3);

$wishlist = [];
if ($_SESSION['user'] ?? false) {
    $wishlist = array_column($product->wishlist($_SESSION['user']['user_id']), 'product_id');
}

require base_path('Http/views/orders/show.php');