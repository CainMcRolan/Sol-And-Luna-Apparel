<?php

namespace Core;

class Authenticator
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function login_attempt($email, $password): bool
    {
        $user = $this->db->query("select * from users where email = :email and user_type = :user_type", [':email' => $email, ':user_type' => 'customer'])->find();

        if ($user) {
            if (password_verify($password, $user['password_hash'])) {
                $this->login($user);

                Session::flash('success', $user['first_name']);
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {

        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function register_attempt($email, $password): bool
    {
        $user = $this->db->query("select * from users where email = :email", [':email' => $email])
            ->find();

        if (!$user) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("insert into users (email, password_hash, user_type) values (:email, :password, :user_type)", [':email' => $email, ':password' => $password, ':user_type' => 'customer']);

            Session::flash('success', 'Account Created Successfully');
            return true;
        }

        return false;
    }
}