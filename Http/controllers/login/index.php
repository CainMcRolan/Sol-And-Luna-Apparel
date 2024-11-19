<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$login_notice = Session::get('login') ?? '';
$email = old('email');

require base_path('Http/views/login/index.php');