<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = \Core\App::resolve(\Core\Database::class);

$addresses = $db->query("select * from addresses where user_id = :user_id", ['user_id' => $_SESSION['user']['user_id']])->get() ?? [];

$default_address = array_filter($addresses, fn($address) => $address['is_default'] == 1) ?? [];

require base_path('Http/views/addresses/index.php');