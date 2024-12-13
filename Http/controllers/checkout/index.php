<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = \Core\App::resolve(\Core\Database::class);

$cart = $db->query("
    SELECT 
        SUM(c.quantity * p.price) AS subtotal,
        SUM(c.quantity * p.price) * 0.12 AS tax,
        SUM(c.quantity * p.price) + ((SUM(c.quantity * p.price) * 0.12) + 150) AS total
    FROM cart c
    JOIN products p ON c.product_id = p.product_id
    WHERE c.user_id = :user_id
", [':user_id' => $_SESSION['user']['user_id']])->find();

if (!$cart['total']) {
    redirect('/cart');
}

$selected_address = $_GET['address'] ?? false;

if ($selected_address) {
    #Verify if address exists and if it belongs to user
    $selected_address = $db->query("select * from addresses where address_id = :address_id and user_id = :user_id", [':address_id' => $selected_address, ':user_id' => $_SESSION['user']['user_id']])->find_or_fail();
}

$addresses = $db->query("select * from addresses where user_id = :user_id", ['user_id' => $_SESSION['user']['user_id']])->get() ?? [];

$default_address = array_filter($addresses, fn($address) => $address['is_default'] == 1) ?? [];

require base_path('Http/views/checkout/index.php');