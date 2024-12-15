<?php

use Core\App;
use Core\Database;
use Core\Session;

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';

$db = App::resolve(Database::class);

$user = Session::fetch('user');

$current_product = $db->query("
    SELECT p.*, GROUP_CONCAT(pi.cloud_url ORDER BY pi.is_primary DESC) AS images
    FROM products p
    JOIN product_images pi ON p.product_id = pi.product_id
    WHERE p.product_id = :product_id
    GROUP BY p.product_id
", [':product_id' => $_GET['id']])->find();

if ($user) {
    (bool)$in_wishlist = $db->query("
    select * 
    from wishlist 
    where product_id = ? 
    and user_id = ?
", [$_GET['id'], $_SESSION['user']['user_id']])->find();
}

$hot_items = $db->query("
    SELECT p.*, pi.cloud_url
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    ORDER BY RAND()
    LIMIT 7
")->get();

// Reviews
$reviews = $db->query("select r.*, u.first_name, u.last_name from reviews r join users u on u.user_id = r.user_id where product_id = :id LIMIT 3", [':id' => $_GET['id']])->get();

$reviews_reference = $db->query("select r.*, u.first_name, u.last_name from reviews r join users u on u.user_id = r.user_id where product_id = :id", [':id' => $_GET['id']])->get();

$average_rating = $db->query("select avg(rating) as average_rating from reviews where product_id = :id;", [':id' => $_GET['id']])->find();

$rating_percentage = $db->query("
    select (count(case when rating = 5 then 1 end) * 100.0) / count(*) as five,
    (count(case when rating = 4 then 1 end) * 100.0) / count(*) as four,
    (count(case when rating = 3 then 1 end) * 100.0) / count(*) as three,
    (count(case when rating = 2 then 1 end) * 100.0) / count(*) as two,
    (count(case when rating = 1 then 1 end) * 100.0) / count(*) as one
    from reviews 
    where product_id = :id;
", [':id' => $_GET['id']])->find();

require base_path('Http/views/product/index.php');