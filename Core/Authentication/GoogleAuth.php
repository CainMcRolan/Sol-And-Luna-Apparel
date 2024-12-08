<?php

namespace Core\Authentication;

use Core\App;
use Core\Database;
use Core\Session;
use JetBrains\PhpStorm\NoReturn;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\Google;

class GoogleAuth
{
    protected $db;
    protected $provider;
    protected $user;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        $this->provider = new Google([
            'clientId' => "{$_ENV['GOOGLE_CLIENT_ID']}",
            'clientSecret' => "{$_ENV['GOOGLE_CLIENT_SECRET']}",
            'redirectUri' => "{$_ENV['GOOGLE_REDIRECT_URL']}",
        ]);
    }

    #[NoReturn] public function getCode(): void
    {
        // If we don't have an authorization code then get one
        $authUrl = $this->provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $this->provider->getState();
        redirect($authUrl);
    }

    #[NoReturn] public function state_validation(): void
    {
        // State validation to prevent CSRF attacks
        unset($_SESSION['oauth2state']);
        echo 'Invalid state.';
        exit;
    }

    public function setup_authorization($error, $code, $state, $oauth2state): void
    {
        if (!empty($error)) {
            exit('Got error: ' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8'));
        } elseif (!isset($code)) {
            $this->getCode();
        } elseif (empty($state) || ($state !== $oauth2state)) {
            $this->state_validation();
        }
    }

    /**
     * @throws IdentityProviderException
     */
    public function get_access_token($code): \League\OAuth2\Client\Token\AccessTokenInterface
    {
        // Try to get an access token (using the authorization code grant)
        return $this->provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
    }

    public function get_user_info($token): void
    {
        $this->user = $this->provider->getResourceOwner($token)->toArray();
    }

    /**
     * @throws IdentityProviderException
     */
    #[NoReturn] public function authenticate($token): void
    {
        $token = $this->get_access_token($token);
        $this->get_user_info($token);

        $fetched_user = $this->db->query("select * from users where email = :email", [':email' => $this->user['email']])->find();

        //If user don't exist, create account
        if (!$fetched_user) {
            $this->db->query("insert into users (email, first_name, last_name, user_type) values (:email, :first_name, :last_name, :user_type)", [':email' => $this->user['email'], ':first_name' => $this->user['given_name'], ':last_name' => $this->user['family_name'], ':user_type' => 'customer']);
            $fetched_user = $this->db->query("select * from users where email = :email", [':email' => $this->user['email']])->find();
            $_SESSION['user'] = $fetched_user;
        }
        //If user exists, just add session and redirect to home.
        $_SESSION['user'] = $fetched_user;
        $_SESSION['user']['socials'] = true;
        Session::flash('success', 'Welcome Back');
    }
}