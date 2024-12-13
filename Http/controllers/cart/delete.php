<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query("delete from cart where user_id = :user_id and product_id = :product_id and size = :product_size",
    [
        ':user_id' => $_SESSION['user']['user_id'],
        ':product_id' => intval($_POST['product_id']),
        ':product_size' => $_POST['product_size'],
    ]
);

redirect("/cart");