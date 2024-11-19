<?php

namespace Core\Middleware;
use Core\Session;

class User
{
    public function handle(): void
    {
        if (! $_SESSION['user'] ?? false) {
            Session::flash('login', 'Authentication is required. Please Log in First.');
            redirect('/login');
        }
    }
}