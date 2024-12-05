<?php

use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$email = old('email');

dd($_POST);

redirect("/cart");