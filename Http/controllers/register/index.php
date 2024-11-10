<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$email = old('email');

require base_path('Http/views/register/index.php');