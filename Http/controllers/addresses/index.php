<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = \Core\App::resolve(\Core\Database::class);

$addresses = $db->query("
    select a.*, COUNT(o.order_id) as order_count
    from addresses a
    left join orders o on o.shipping_address_id = a.address_id
    where a.user_id = :user_id
    GROUP BY a.address_id
", ['user_id' => $_SESSION['user']['user_id']])->get() ?? [];

$default_address = array_filter($addresses, fn($address) => $address['is_default'] == 1) ?? [];

require base_path('Http/views/addresses/index.php');