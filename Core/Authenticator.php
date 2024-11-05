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
        $user = $this->db->query("select * from users where email = :email", [':email' => $email])->find();

        if ($user) {
            if ($password == $user['password_hash']) {
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

    public function register_attempt($username, $password): bool
    {
        $user = $this->db->query("select * from users where username = :username", [':username' => $username])
            ->find();

        if (!$user) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("insert into users (username, password) values (:username, :password)", [':username' => $username, ':password' => $password]);
            return true;
        }

        return false;
    }
}