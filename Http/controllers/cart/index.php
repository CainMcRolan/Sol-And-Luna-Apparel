<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\models\Products;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = App::resolve(Database::class);

$user = $_SESSION['user'] ?? false;

$cart = $db->query("
    select c.*, p.*, i.cloud_url, IF(w.product_id IS NOT NULL, 1, 0) as wishlist
    from cart c
    join products p on c.product_id = p.product_id
    join product_images i on c.product_id = i.product_id
    left join wishlist w on c.product_id = w.product_id and w.user_id = :user_id
    where i.is_primary = 1 and c.user_id = :user_id
", [':user_id' => $_SESSION['user']['user_id']])->get();

$product = new Products(0);
$products = array_slice($product->new_products(), 0, 3);

$wishlist = [];
if ($_SESSION['user'] ?? false) {
    $wishlist = array_column($product->wishlist($_SESSION['user']['user_id']), 'product_id');
}

$sizes = [
    'S' => 'small_quantity',
    'M' => 'medium_quantity',
    'L' => 'large_quantity',
    'XL' => 'xl_quantity',
    'XXL' => 'xxl_quantity'
];

require base_path('Http/views/cart/index.php');