<?php

use Core\App;
use Core\Database;
use Http\Forms\ReviewForm;

$form = ReviewForm::validate($attributes = [
    'user_id' => intval($_POST['user_id']),
    'order_item_id' => intval($_POST['order_item_id']),
    'product_id' => intval($_POST['product_id']),
    'rating' => intval($_POST['rating']),
    'comment' => $_POST['comment'],
]);

$db = App::resolve(Database::class);

$db->query("insert into reviews (product_id, user_id, rating, comment) values (:product_id, :user_id, :rating, :comment)", [
    ':product_id' => $attributes['product_id'],
    ':user_id' => $attributes['user_id'],
    ':rating' => $attributes['rating'],
    ':comment' => $attributes['comment'],
]);

$db->query("update order_items set reviewed = :reviewed where order_item_id = :id", ['reviewed' => 1,'id' => $attributes['order_item_id']]);

redirect($_SERVER['HTTP_REFERER']);