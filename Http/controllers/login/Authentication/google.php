<?php

use Core\Authentication\GoogleAuth;

$facebook_auth = new GoogleAuth();
$facebook_auth->setup_authorization($_GET['error'], $_GET['code'], $_GET['state'], $_SESSION['oauth2state']);
$facebook_auth->authenticate($_GET['code']);

redirect("/home");