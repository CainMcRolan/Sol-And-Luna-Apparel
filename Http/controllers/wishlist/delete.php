<?php

$user_id = $_SESSION['user']['user_id'];
$product_id = $_POST['product_id'];

$db = \Core\App::resolve(\Core\Database::class);
$db->query("delete from wishlist where user_id = :user_id and product_id = :product_id", [':user_id' => $user_id, ':product_id' => $product_id]);

redirect($_SERVER['HTTP_REFERER']);