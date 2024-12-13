<?php

use Core\App;
use Core\Database;

if (!$_SESSION['order']) {
    redirect('/cart');
}

$db = App::resolve(Database::class);

$order_details = $_SESSION['order'];

$cart = $db->query("
    select c.*, p.*, i.cloud_url, IF(w.product_id IS NOT NULL, 1, 0) as wishlist
    from cart c
    join products p on c.product_id = p.product_id
    join product_images i on c.product_id = i.product_id
    left join wishlist w on c.product_id = w.product_id and w.user_id = :user_id
    where i.is_primary = 1 and c.user_id = :user_id
", [':user_id' => $_SESSION['user']['user_id']])->get();

$order_id = $db->query('select order_id from orders where user_id = :user_id order by order_id desc', [':user_id' => $_SESSION['user']['user_id']])->find();

$db->query("delete from cart where user_id = :user_id", [':user_id' => $_SESSION['user']['user_id']]);

$_SESSION['order'] = false;

require base_path('Http/views/summary/index.php');