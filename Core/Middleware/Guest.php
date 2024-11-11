<?php

namespace Core\Middleware;
use Core\Router;

class Guest
{
    public function handle(): void
    {
        if ($_SESSION['user'] ?? false) {
            redirect((new Router())->previous_url());
        }
    }
}