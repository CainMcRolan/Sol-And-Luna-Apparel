<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$data = json_decode(file_get_contents('php://input'), true);

$quantity = $data['selected_value'];
$product_id = $data['product_id'];
$size = $data['size'];

$db->query("UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id AND size = :size",
    [
        ':quantity' => intval($quantity),
        ':user_id' => $_SESSION['user']['user_id'],
        ':product_id' => intval($product_id),
        ':size' => $size,
    ]
);
