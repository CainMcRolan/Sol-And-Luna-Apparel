<?php

namespace Http\models;

use Core\App;
use Core\Database;
use Core\Session;

class User
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function update(array $attributes): void
    {
        $this->update_customer($attributes);

        Session::flash('success', 'Information updated successfully!');
    }

    private function update_customer(array $attributes): void
    {
        if ($attributes['is_social'] ?? false) {
            $this->db->query("UPDATE users SET first_name = :first_name, last_name = :last_name, phone = :phone WHERE user_id = :user_id", [
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'phone' => $attributes['phone'],
                'user_id' => $attributes['user_id']
            ]);
        } else {
            $new_password = password_hash($attributes['new_password'],PASSWORD_DEFAULT);
            $this->db->query("UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, password_hash = :password,  phone = :phone WHERE user_id = :user_id", [
                'email' => $attributes['email'],
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'password' => $new_password,
                'phone' => $attributes['phone'],
                'user_id' => $attributes['user_id']
            ]);
        }
    }
}