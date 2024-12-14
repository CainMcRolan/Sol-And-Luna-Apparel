<?php

use Core\Response;
use Core\Session;
use JetBrains\PhpStorm\NoReturn;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

#[NoReturn] function abort($code = 404): void
{
    http_response_code($code);

    require base_path("Http/views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function url_is($url, $extra_url = null, $extra_extra_url = null): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $url || parse_url($_SERVER['REQUEST_URI'],
            PHP_URL_PATH) === $extra_url || parse_url($_SERVER['REQUEST_URI'],
            PHP_URL_PATH) === $extra_extra_url;
}

function get_url(): array
{
    return ['name' => ucfirst(substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1)), 'url' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)];
}

function get_page_title(): string
{
    return str_replace('-', ' ', ucfirst(substr($_SERVER['REQUEST_URI'], 1)));
}

function url($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function get_path() : string
{
    return str_replace('/', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path("Http/views/" . $path);
}

#[NoReturn] function redirect($path): void
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}

function calculateTotalPrice($price, $quantity): float|string
{
    if ($price < 0 || $quantity < 0) {
        return "Invalid input";
    }
    return round($price * $quantity, 2);
}

function order_status(array $order, string $status): bool
{
    return strtolower($order['status']) === $status;
}

function previous_url(): string
{
    $prev = parse_url($_SERVER['HTTP_REFERER']);
    return $prev['path'] . '?' . $prev['query'];
}

function generateUniqueId() {
    return random_int(1000000000, 9999999999);
}

function image_path(): string
{
    return dirname(BASE_PATH, 3) . "/Luna-Dashboard/public/uploads/";
}

function get_images($product) : array
{
    return explode(',', $product['images']);
}

function return_url(string $path) : string
{
    return 'http://' . $_SERVER['HTTP_HOST'] . $path;
}