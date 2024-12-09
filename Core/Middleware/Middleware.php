<?php

namespace Core\Middleware;

use Http\models\Products;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'user' => User::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key];

        if (!$middleware) {
            throw new \Exception("No assigned middleware for {$key}.");
        }

        (new $middleware)->handle();
    }

    public static function handle(string | null $key): void
    {
        if (!$key) {
            return;
        }

        if (!$_GET['id'] || !self::product_exists($_GET['id'])) {
            redirect("/$key");
        }
    }

    public static function product_exists($product_id) : bool
    {
        return (new Products(0))->find(intval($product_id));
    }
}