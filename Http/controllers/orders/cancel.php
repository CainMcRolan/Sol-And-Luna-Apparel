<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\models\Products;

$db = App::resolve(Database::class);

$order_items = $db->query('select * from order_items where order_id = :order_id', [
    ':order_id' => $_POST['order_id'],
])->get();

$sizes = [
    'S' => 'small_quantity',
    'M' => 'medium_quantity',
    'L' => 'large_quantity',
    'XL' => 'xl_quantity',
    'XXL' => 'xxl_quantity',
];

foreach ($order_items as $order) {
    $db->query("update products set {$sizes[$order['size']]} = {$sizes[$order['size']]} + :new_size, quantity_sold = quantity_sold - :quantity_sold where product_id = :product_id", [
        ':new_size' => intval($order['quantity']),
        ':quantity_sold' => intval($order['quantity']),
        ':product_id' => $order['product_id']
    ]);
}

$db->query("update orders set status = :status where order_id = :order_id and user_id = :user_id", [
    ':status' => 'cancelled',
    ':order_id' => $_POST['order_id'],
    ':user_id' => $_SESSION['user']['user_id'],
]);

redirect('/order-history');
