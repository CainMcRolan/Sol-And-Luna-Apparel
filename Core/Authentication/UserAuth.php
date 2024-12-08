<?php

namespace Core\Authentication;

use Core\App;
use Core\Database;

class UserAuth
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function attempt(string $email, string|int $phone, string|int $user_id, string $password, bool $is_social = false): bool
    {
        // Check for phone number uniqueness across other users
        $similar_phone = $this->db->query(
            'SELECT * FROM users WHERE phone = :phone AND user_id != :user_id',
            ['phone' => $phone, 'user_id' => $user_id]
        )->get();

        if ($similar_phone) {
            return true; // Phone number is already in use by another user
        }

        // Password verification for non-social login
        if (!$is_social && $password) {
            $user = $this->db->query('SELECT * FROM users WHERE user_id = :user_id', ['user_id' => $user_id])
                ->find();

            // If password is incorrect, return true (error)
            if (!password_verify($password, $user['password_hash'])) {
                return true;
            }
        }

        // Check for email uniqueness across other users
        $similar_email = $this->db->query(
            "SELECT * FROM users WHERE email = :email AND user_id != :user_id",
            ['email' => strtolower($email), 'user_id' => $user_id]
        )->find();

        return (bool)$similar_email;
    }

    public function edit_attempt(string $email, string|int $phone, string|int $user_id, bool $is_social = false, string $password = ''): bool
    {
        // Check if the email is the same as the current user's email
        $similar_email = $this->db->query(
            'SELECT * FROM users WHERE email = :email AND user_id = :user_id',
            ['email' => $email, 'user_id' => $user_id]
        )->find();

        // If email is the same for this user, no conflict
        if ($similar_email) {
            return false;
        }

        // Proceed with general uniqueness check
        return $this->attempt($email, $phone, $user_id, $password, $is_social);
    }

    public function edit_normal(string $email, string|int $phone, string|int $user_id, string $password = ''): bool
    {
        return $this->attempt($email, $phone, $user_id, $password);
    }
}