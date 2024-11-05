<?php

namespace Core\Middleware;
class User
{
    public function handle(): void
    {
        if (! $_SESSION['user'] ?? false) {
            redirect('/login');
        }
    }
}