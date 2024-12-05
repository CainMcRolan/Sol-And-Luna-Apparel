<?php

use Core\App;
use Core\Database;
use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = App::resolve(Database::class);

$db->query("insert into cart (user_id, product_id, quantity, size) values (:user_id, :product_id, :quantity, :size)",
    [
        ':user_id' => $_SESSION['user']['user_id'],
        ':product_id' => intval($_POST['product_id']),
        ':quantity' => intval($_POST['quantity']),
        ':size' => $_POST['size'],
    ]
);

redirect("/cart");