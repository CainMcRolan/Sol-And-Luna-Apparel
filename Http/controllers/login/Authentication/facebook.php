<?php

use Core\Authentication\FacebookAuth;

$facebook_auth = new FacebookAuth();
$facebook_auth->setup_authorization($_GET['code'], $_GET['state'], $_SESSION['oauth2state']);
$facebook_auth->authenticate($_GET['code']);

redirect("/home");