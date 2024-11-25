<?php

use Core\App;
use Core\Database;
use League\OAuth2\Client\Provider\Facebook;

$provider = new Facebook([
    'clientId' => "{$_ENV['FACEBOOK_CLIENT_ID']}",
    'clientSecret' => "{$_ENV['FACEBOOK_CLIENT_SECRET']}",
    'redirectUri' => "{$_ENV['FACEBOOK_REDIRECT_URL']}",
    'graphApiVersion' => 'v2.10',
]);

// If we don't have an authorization code, get one
if (!isset($_GET['code'])) {
    // Generate the authorization URL
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => ['email', 'public_profile'], // Request permissions
    ]);
    $_SESSION['oauth2state'] = $provider->getState(); // Store state to avoid CSRF attacks

    redirect($authUrl);

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    // State validation to prevent CSRF attacks
    unset($_SESSION['oauth2state']);
    echo 'Invalid state.';
    exit;
}

// Try to get an access token (using the authorization code grant)
$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
]);

// Now you have an access token, let's use it to get the user's details
try {
    // Get the user's profile
    $user = $provider->getResourceOwner($token);

    //Check if registered
    $db = App::resolve(Database::class);
    $fetched_user = $db->query("select * from users where email = :email", [':email' => $user->getEmail()])->find();

    //If user don't exist, create account and add session
    if (!$fetched_user) {
        $db->query("insert into users (email, first_name, last_name, user_type) values (:email, :first_name, :last_name, :user_type)", [':email' => $user->getEmail(), ':first_name' => $user->getFirstName(), ':last_name' => $user->getLastName(), ':user_type' => 'customer']);
        $fetched_user = $db->query("select * from users where email = :email", [':email' => $user->getEmail()])->find();
        $_SESSION['user'] = $fetched_user;
    } else {
        //If user exists, just add session and redirect to home.
        $_SESSION['user'] = $fetched_user;
    }
    redirect("/home");
} catch (\Exception $e) {
    // Handle errors getting user details
    redirect("/login");
}