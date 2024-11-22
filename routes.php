<?php

// Index Redirect
$router->get('/', 'home/index.php');

// Home Page
$router->get('/home', 'home/index.php');

//Register
$router->get('/register', 'register/index.php')->only('guest');
$router->post('/register', 'register/create.php')->only('guest');

//Login
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login', 'login/verify.php')->only('guest');

//Logout
$router->delete('/logout', 'login/logout.php')->only('user');

//Products Page
$router->get('/new', 'products/index.php');
$router->get('/men', 'products/index.php');
$router->get('/women', 'products/index.php');
$router->get('/kids', 'products/index.php');
$router->get('/shoes', 'products/index.php');
$router->get('/gifts', 'products/index.php');
$router->get('/jewelry', 'products/index.php');

//Individual Product Page
$router->get('/product', 'product/index.php')->params('home');

//Shopping Cart - Subject to Change (Add User Authorization and Params)
$router->get('/cart', 'cart/index.php')->only('user');

//Order Checkout - Subject to Change (Add User Authorization and Params)
$router->get('/checkout', 'checkout/index.php')->only('user');

//Order Summary - Subject to Change (Add User Authorization and Params)
$router->get('/summary', 'summary/index.php')->only('user');

//Profile Page
$router->get('/dashboard', 'dashboard/index.php')->only('user');

//Order History
$router->get('/order-history', 'orders/index.php')->only('user');

//User Profile
$router->get('/profile', 'profile/index.php')->only('user');
