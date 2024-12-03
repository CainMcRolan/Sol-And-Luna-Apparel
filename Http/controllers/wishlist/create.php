<?php

$user_id = $_SESSION['user']['user_id'];
$product_id = $_POST['product_id'];

$db = \Core\App::resolve(\Core\Database::class);
$db->query("insert into wishlist (user_id, product_id) values (:user_id, :product_id)", [':user_id' => $user_id, ':product_id' => $product_id]);

redirect($_SERVER['HTTP_REFERER']);