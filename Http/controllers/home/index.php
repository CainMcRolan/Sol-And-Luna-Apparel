<?php

use \Core\Database;
use \Core\App;

$db = App::resolve(Database::class);

$hot_items = $db->query("
    SELECT p.*, pi.cloud_url
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    ORDER BY p.quantity_sold DESC
    LIMIT 7
")->get();

$top_gifts = $db->query("
    SELECT p.*, pi.cloud_url
    FROM products p 
    JOIN product_images pi ON p.product_id = pi.product_id AND pi.is_primary = 1
    ORDER BY RAND()
    LIMIT 7
")->get();

require base_path("Http/views/home/index.php");
