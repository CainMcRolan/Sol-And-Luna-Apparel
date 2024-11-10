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
