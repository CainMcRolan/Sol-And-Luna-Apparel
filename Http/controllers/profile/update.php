<?php

use Core\Authentication\UserAuth;
use Http\models\User;
use Http\Forms\UserForm;

$form = UserForm::validate($attributes = [
    'user_id' => intval($_POST['user_id']),
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => strtolower($_POST['email'] ?? ''),
    'phone' => $_POST['phone'],
    'current_password' => $_POST['current_password'] ?? '',
    'new_password' => $_POST['new_password'] ?? '',
    'confirm_password' => $_POST['confirm_password'] ?? '',
    'is_social' => boolval($_POST['is_social']) ?? false,
]);

if ($attributes['is_social'] ?? false) {
    if ((new UserAuth())->edit_attempt($attributes['email'], $attributes['phone'], $attributes['user_id'], true)) {
        $form->error('phone', 'phone')->throw();
    }
} else {
    if ((new UserAuth())->edit_normal($attributes['email'], $attributes['phone'], $attributes['user_id'], $attributes['current_password'])) {
        $form->error('body', 'email, phone, password')->throw();
    }
}

(new User())->update($attributes);

redirect('/profile');