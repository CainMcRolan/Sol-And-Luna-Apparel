<?php

use Core\App;
use Core\Database;
use Stripe\StripeClient;

if (!$_SESSION['user'] || !$_SESSION['order']) {
    redirect('/checkout');
}

$db = App::resolve(Database::class);
$order = $_SESSION['order'];
$user = $_SESSION['user'];

$line_items = [
    [
        'price_data' => [
            'currency' => 'php',
            'product_data' => [
                'name' => 'VAT',
            ],
            'unit_amount' => round($order['tax'], 2) * 100
        ],
        'quantity' => 1
    ],
    [
        'price_data' => [
            'currency' => 'php',
            'product_data' => [
                'name' => 'Delivery Fee',
            ],
            'unit_amount' => 150 * 100
        ],
        'quantity' => 1
    ]
];

$order_items = $db->query("
    select c.*, p.*
    from cart c
    join products p on c.product_id = p.product_id
    where c.user_id = :user_id
", [':user_id' => $user['user_id']])->get();

foreach ($order_items as $item) {
    $line_items[] = [
        'price_data' => [
            'currency' => 'php',
            'product_data' => [
                'name' => $item['name'],
            ],
            'unit_amount' => intval($item['price']) * 100
        ],
        'quantity' => $item['quantity']
    ];
}

$stripe = new StripeClient($_ENV['STRIPE_SECRET_KEY']);
$customer = $stripe->checkout->sessions->create([
    'payment_method_types' => ['card'],
    'line_items' => $line_items,
    'customer_email' => $user['email'],
    'mode' => 'payment',
    'success_url' => return_url('/process-card-order'),
    'cancel_url' => return_url('/checkout')
]);

redirect($customer->url);