<?php

use Core\Authenticator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate($attributes = [
    'email' => strtolower($_POST['email']),
    'password' => $_POST['password'],
]);

$registered = (new Authenticator())->register_attempt($attributes['email'], $attributes['password']);

if (!$registered) {
    $form->error('body', 'Account Already Exists.')->throw();
}

redirect('/login');

