<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = \Core\App::resolve(\Core\Database::class);

$cart = $db->query("
    select c.*, p.*, i.cloud_url, IF(w.product_id IS NOT NULL, 1, 0) as wishlist
    from cart c
    join products p on c.product_id = p.product_id
    join product_images i on c.product_id = i.product_id
    left join wishlist w on c.product_id = w.product_id and w.user_id = :user_id
    where i.is_primary = 1 and c.user_id = :user_id
", [':user_id' => $_SESSION['user']['user_id']])->get();


require base_path('Http/views/cart/index.php');