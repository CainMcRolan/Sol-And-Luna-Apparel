<?php

use \Core\Database;
use \Core\App;

$db = App::resolve(Database::class);

$hot_items = $db->query("
    SELECT p.*, pi.cloud_url, avg(r.rating) as average_rating
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    LEFT JOIN reviews r on p.product_id = r.product_id
    GROUP BY p.product_id, pi.cloud_url
    ORDER BY p.quantity_sold DESC
    LIMIT 7
")->get();

$top_gifts = $db->query("
    SELECT p.*, pi.cloud_url, avg(r.rating) as average_rating
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    LEFT JOIN reviews r on p.product_id = r.product_id
    GROUP BY p.product_id, pi.cloud_url
    ORDER BY RAND()
    LIMIT 7
")->get();

require base_path("Http/views/home/index.php");
