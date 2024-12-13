<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

# Check card first if product already exists
$product = $db->query("select * from cart where user_id = :user_id and product_id = :product_id and size = :size",
    [
        ':user_id' => $_SESSION['user']['user_id'],
        ':product_id' => intval($_POST['product_id']),
        ':size' => $_POST['size'],
    ]
)->find();

if ($product) {
    $db->query("update cart set quantity = :quantity where user_id = :user_id and product_id = :product_id and size = :size",
        [
            ':quantity' => intval($_POST['quantity'] + $product['quantity']),
            ':user_id' => $_SESSION['user']['user_id'],
            ':product_id' => intval($_POST['product_id']),
            ':size' => $_POST['size'],
        ]
    );
} else {
    $db->query("insert into cart (user_id, product_id, quantity, size) values (:user_id, :product_id, :quantity, :size)",
        [
            ':user_id' => $_SESSION['user']['user_id'],
            ':product_id' => intval($_POST['product_id']),
            ':quantity' => intval($_POST['quantity']),
            ':size' => $_POST['size'],
        ]
    );
}


redirect('/cart');