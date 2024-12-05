<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

$db = \Core\App::resolve(\Core\Database::class);

require base_path('Http/views/cart/index.php');