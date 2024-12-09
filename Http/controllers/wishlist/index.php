<?php

use Core\Session;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');


$db = \Core\App::resolve(\Core\Database::class);

$cart = $db->query("
    select w.*, p.*, i.cloud_url
    from wishlist w
    join products p on w.product_id = p.product_id
    left join product_images i on w.product_id = i.product_id  
    where w.user_id = :user_id and i.is_primary = 1
", ['user_id' => $_SESSION['user']['user_id']])->get();

$product = new Products(0);
$products = array_slice($product->new_products(),0,3);

$wishlist = [];
if ($_SESSION['user'] ?? false) {
    $wishlist = array_column($product->wishlist($_SESSION['user']['user_id']), 'product_id');
}

require base_path('Http/views/wishlist/index.php');