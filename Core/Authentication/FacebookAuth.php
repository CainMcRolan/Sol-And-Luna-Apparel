<?php

namespace Core\Authentication;

use Core\App;
use Core\Database;
use JetBrains\PhpStorm\NoReturn;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\Facebook;

class FacebookAuth
{
    protected $db;
    protected $provider;
    protected $user;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        $this->provider = new Facebook([
            'clientId' => "{$_ENV['FACEBOOK_CLIENT_ID']}",
            'clientSecret' => "{$_ENV['FACEBOOK_CLIENT_SECRET']}",
            'redirectUri' => "{$_ENV['FACEBOOK_REDIRECT_URL']}",
            'graphApiVersion' => 'v2.10',
        ]);
    }

    #[NoReturn] public function getCode(): void
    {
        // Generate the authorization URL
        $authUrl = $this->provider->getAuthorizationUrl([
            'scope' => ['email', 'public_profile'], // Request permissions
        ]);
        $_SESSION['oauth2state'] = $this->provider->getState(); // Store state to avoid CSRF attacks

        redirect($authUrl);
    }

    #[NoReturn] public function state_validation(): void
    {
        // State validation to prevent CSRF attacks
        unset($_SESSION['oauth2state']);
        echo 'Invalid state.';
        exit;
    }

    public function setup_authorization($code, $state, $oauth2state): void
    {
        if (!isset($code)) {
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
        $this->user = $this->provider->getResourceOwner($token);
    }

    /**
     * @throws IdentityProviderException
     */
    #[NoReturn] public function authenticate($token): void
    {
        $token = $this->get_access_token($token);
        $this->get_user_info($token);

        $fetched_user = $this->db->query("select * from users where email = :email", [':email' => $this->user->getEmail()])->find();

        //If user don't exist, create account
        if (!$fetched_user) {
            $this->db->query("insert into users (email, first_name, last_name, user_type) values (:email, :first_name, :last_name, :user_type)", [':email' => $this->user->getEmail(), ':first_name' => $this->user->getFirstName(), ':last_name' => $this->user->getLastName(), ':user_type' => 'customer']);
            $fetched_user = $this->db->query("select * from users where email = :email", [':email' => $this->user->getEmail()])->find();
        }
        //If user exists, just add session and redirect to home.
        $_SESSION['user'] = $fetched_user;
    }
}