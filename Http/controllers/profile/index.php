<?php

use Core\App;
use Core\Database;
use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

#This is so fucking weird, I don't know why it's not working if I don't assign the values to a fucking variable
$user = $db->query("select u.*, ui.cloud_url from users u left join user_images ui on u.user_id = ui.user_id where u.user_id = :user_id", [':user_id' => $_SESSION['user']['user_id']])->find();
$user_image = $user['cloud_url'];
$user_phone = $user['phone'];
$user_email = $user['email'];
$user_last_name = $user['last_name'];
$user_first_name = $user['first_name'];

require base_path('Http/views/profile/index.php');