<?php

use Core\App;
use Core\Database;

if (!$_SESSION['order']) {
    redirect('/cart');
}

$db = App::resolve(Database::class);

$cart = $db->query("
    select c.*, p.*, i.cloud_url, IF(w.product_id IS NOT NULL, 1, 0) as wishlist
    from cart c
    join products p on c.product_id = p.product_id
    join product_images i on c.product_id = i.product_id
    left join wishlist w on c.product_id = w.product_id and w.user_id = :user_id
    where i.is_primary = 1 and c.user_id = :user_id
", [':user_id' => $_SESSION['user']['user_id']])->get();

$db->query('insert into orders (order_id, user_id, email, status, notes, total_amount, shipping_address_id) values (:order_id, :user_id, :email, :status, :notes, :total_amount, :shipping_address_id)', [
    ':order_id' => generateUniqueId(),
    ':user_id' => $_SESSION['user']['user_id'],
    ':email' => $_SESSION['user']['email'],
    ':status' => 'pending',
    ':notes' => $_SESSION['order']['notes'],
    ':total_amount' => $_SESSION['order']['total'],
    ':shipping_address_id' => $_SESSION['order']['shipping_address_id'],
]);

$order_id = $db->query('select order_id from orders where user_id = :user_id order by order_id desc', [':user_id' => $_SESSION['user']['user_id']])->find();

foreach ($cart as $item) {
    $db->query('insert into order_items (order_id, product_id, size, quantity, price_at_time) values (:order_id, :product_id, :size, :quantity, :price_at_time)', [
        ':order_id' => $order_id['order_id'],
        ':product_id' => $item['product_id'],
        ':size' => $item['size'],
        ':quantity' => $item['quantity'],
        ':price_at_time' => $item['price'],
    ]);
}

redirect('/summary');