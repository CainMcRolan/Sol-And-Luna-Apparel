<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

dd($_POST);

require base_path('Http/views/checkout/index.php');