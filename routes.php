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
//Facebook Authentication
$router->get('/facebook', 'login/Authentication/facebook.php')->only('guest');
$router->post('/facebook', 'login/Authentication/facebook.php')->only('guest');
//Google Authentication
$router->get('/google', 'login/Authentication/google.php')->only('guest');
$router->post('/google', 'login/Authentication/google.php')->only('guest');

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
$router->post('/cart', 'cart/create.php')->only('user');
$router->delete('/cart', 'cart/delete.php')->only('user');
$router->post('/cart-update', 'cart/update.php')->only('user');

//Order Checkout - Subject to Change (Add User Authorization and Params)
$router->get('/checkout', 'checkout/index.php')->only('user');
$router->post('/checkout', 'checkout/confirm.php')->only('user');
$router->get('/payment', 'checkout/payment.php')->only('user');

//Order Summary - Subject to Change (Add User Authorization and Params)
$router->get('/summary', 'summary/index.php')->only('user');

//User Profile
$router->get('/profile', 'profile/index.php')->only('user');
$router->patch('/profile', 'profile/update.php')->only('user');

//Order History
$router->get('/order-history', 'orders/index.php')->only('user');
$router->patch('/order-history', 'orders/cancel.php')->only('user');
$router->get('/order-details', 'orders/show.php')->only('user');

//Payment Methods
$router->get('/payment-methods', 'payment/index.php')->only('user');

//Addresses
$router->get('/addresses', 'addresses/index.php')->only('user');
$router->post('/addresses', 'addresses/create.php')->only('user');
$router->delete('/addresses', 'addresses/destroy.php')->only('user');

//Wishlist
$router->get('/wishlist', 'wishlist/index.php')->only('user');
$router->post('/wishlist', 'wishlist/create.php')->only('user');
$router->delete('/wishlist', 'wishlist/delete.php')->only('user');

//Reviews
$router->get('/reviews', 'reviews/index.php');

#Helpers
//Auth Redirect
$router->get('/auth-redirect', 'auth-redirect.php');
//Order Processing (Removing from cart, adding to orders etc)
$router->get('/process-order', 'checkout/process-order.php');
$router->get('/process-card-order', 'checkout/process-card-order.php');
$router->get('/privacy', 'privacy/privacy.php');
$router->get('/tos', 'privacy/tos.php');


