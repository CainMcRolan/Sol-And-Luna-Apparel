-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table luna.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`address_id`),
  UNIQUE KEY `address_id` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.addresses: ~2 rows (approximately)
INSERT INTO `addresses` (`address_id`, `user_id`, `street_address`, `city`, `province`, `zip_code`, `country`, `is_default`) VALUES
	(1, 7, '163 Rizal Street', 'Mataasnakahoy', 'Batangas', '4223', 'Philippines', 1),
	(2, 10, 'Calingatan', 'Mataasnakahoy', 'Batangas', '4223', 'Philippines', 1);

-- Dumping structure for table luna.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `size` enum('S','M','L','XL','XXL') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_item_id`),
  UNIQUE KEY `cart_item_id` (`cart_item_id`),
  KEY `idx_cart_items_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.cart: ~1 rows (approximately)
INSERT INTO `cart` (`cart_item_id`, `user_id`, `product_id`, `quantity`, `size`, `added_at`) VALUES
	(3, 27, 236, 1, 'M', '2024-12-05 04:00:36'),
	(7, 26, 245, 1, 'L', '2024-12-08 15:04:27');

-- Dumping structure for table luna.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `visibility` tinyint DEFAULT NULL,
  `parent_category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.categories: ~35 rows (approximately)
INSERT INTO `categories` (`category_id`, `name`, `description`, `visibility`, `parent_category_id`, `created_at`) VALUES
	(1, 'unisex', 'Clothing for all kind of people.', 1, 0, '2024-11-27 06:51:41'),
	(2, 'men', 'Discover stylish and versatile clothing for every occasion, from casual essentials to sharp, sophisticated looks. Our men’s collection has everything you need to stay comfortable and confident.', 1, 0, '2024-11-01 02:20:38'),
	(3, 'women', 'Explore chic and trendy styles for every mood and occasion. From everyday essentials to special event outfits, our women’s collection offers something for every woman’s unique style.', 1, 0, '2024-11-01 02:20:34'),
	(4, 'kids', 'Keep your little ones stylish and comfy with our fun and durable clothing. From playful tees to cozy jackets, our kids\' collection is perfect for their every adventure.', 1, 0, '2024-11-01 02:20:40'),
	(5, 'gifts', 'Find the perfect gift for any occasion, from stylish accessories to unique home decor. Our gift collection has something special for everyone.', 1, 0, '2024-11-01 02:20:37'),
	(6, 'jewelry', 'Add a touch of elegance to any look with our stunning jewelry collection. From everyday pieces to statement styles, our jewelry is designed to make you shine.', 1, 0, '2024-11-02 02:20:38'),
	(7, 'new', 'New and Featured Products', 1, 0, '2024-11-01 04:54:03'),
	(29, 'suits', 'A timeless wardrobe essential, perfect for formal events or professional settings. Tailored to fit, suits offer a polished and sophisticated look for any occasion.', 1, 2, '2024-11-27 09:12:46'),
	(30, 'jackets', 'From sleek blazers to casual outerwear, jackets add style and warmth to any outfit. Ideal for layering, they range from lightweight designs to heavy-duty coats for colder weather.', 1, 2, '2024-11-27 09:13:41'),
	(31, 'pants', 'Versatile and comfortable, men\'s pants come in various styles such as chinos, dress pants, and casual trousers. A staple for both professional and casual outfits.', 1, 2, '2024-11-27 09:14:02'),
	(32, 'shorts', 'Perfect for warmer weather, shorts are designed for comfort and style. Available in casual styles, athletic cuts, or even tailored options for a laid-back yet fashionable look.', 1, 2, '2024-11-27 09:14:40'),
	(33, 'activewear', 'Engineered for performance, activewear includes moisture-wicking fabrics and flexible designs. Ideal for workouts, sports, or casual comfort, it includes gym shorts, sweatpants, and running tops.', 1, 2, '2024-11-27 09:14:54'),
	(34, 'dresses', 'Dresses are a versatile wardrobe staple, offering styles for any occasion, from casual day dresses to elegant evening gowns.', 1, 3, '2024-11-27 09:17:44'),
	(35, 'skirts', 'Skirts come in a range of styles and lengths, perfect for pairing with tops or blouses for both casual and formal looks.', 1, 3, '2024-11-27 09:17:51'),
	(36, 'blouses', 'Elegant and chic, blouses are an essential part of a woman’s wardrobe, offering a wide variety of styles, from casual to professional.', 1, 3, '2024-11-27 09:18:01'),
	(37, 'leggings', 'Leggings are the perfect mix of comfort and style, ideal for casual wear or layering under dresses and skirts for added warmth.', 1, 3, '2024-11-27 09:18:10'),
	(38, 'heels', 'Leggings are the perfect mix of comfort and style, ideal for casual wear or layering under dresses and skirts for added warmth.', 1, 3, '2024-11-27 09:18:19'),
	(39, 'hoodies', 'Comfortable and cozy, hoodies are a unisex favorite for casual days or outdoor activities, available in a variety of colors and materials.', 1, 1, '2024-11-27 09:18:59'),
	(40, 'sweatshirt', 'Sweatshirts provide warmth and style, perfect for casual wear or layering on chilly days.', 1, 1, '2024-11-27 09:19:07'),
	(41, 'joggers', 'Flexible and comfortable, joggers offer the perfect mix of casual style and athletic performance, ideal for lounging or running errands.', 1, 1, '2024-11-27 09:19:18'),
	(42, 'tanktop', 'Tank tops are lightweight and breathable, perfect for hot weather or layering under jackets and hoodies during cooler months.', 1, 1, '2024-11-27 09:19:27'),
	(43, 'sneakers', 'Perfect for casual days or athletic activities, sneakers provide comfort and style, with many designs offering support for running, walking, or everyday wear.', 1, 1, '2024-11-27 09:20:05'),
	(44, 'overalls', 'Cute and functional, overalls offer a practical yet stylish choice for both toddlers and older kids, available in denim or cotton.', 1, 4, '2024-11-27 09:20:23'),
	(45, 'onesies', 'A one-piece garment designed for infants and toddlers, featuring snap closures at the bottom for easy diaper changes. Comfortable, soft, and ideal for layering under other clothing.', 1, 4, '2024-11-27 09:21:54'),
	(46, 'sleepers', 'A cozy, full-body sleepwear option that covers the feet, ideal for keeping infants and toddlers warm during naps or overnight. Usually featuring zippers or snaps for easy changing.', 1, 4, '2024-11-27 09:22:04'),
	(47, 'Rompers ', 'A casual, one-piece outfit combining a shirt and shorts or pants, designed for easy movement and play. Often made from lightweight materials, perfect for toddlers\' active days.', 1, 4, '2024-11-27 09:22:38'),
	(48, 'booties', 'Soft, lightweight footwear designed for infants and toddlers, often featuring non-slip soles. Ideal for keeping little feet warm and protected while they’re crawling or starting to walk.', 1, 4, '2024-11-27 09:23:05'),
	(49, 'novelty sock', 'Fun and colorful socks featuring quirky patterns, animals, or favorite characters. A playful and practical gift that adds personality to any outfit.', 1, 5, '2024-11-27 09:24:01'),
	(50, 'luxury robe', 'A plush, high-quality robe made from cotton or bamboo, perfect for lounging around at home. A thoughtful and indulgent gift for comfort and relaxation.', 1, 5, '2024-11-27 09:24:11'),
	(51, 'sports apparel', 'A jersey, hoodie, or cap featuring the recipient\'s favorite sports team. A fantastic gift for fans who love supporting their team in style.', 1, 5, '2024-11-27 09:24:27'),
	(52, 'graphic tees', 'T-shirts featuring popular characters, movie quotes, or iconic moments from pop culture. A fun gift for anyone who loves showing off their interests.', 1, 5, '2024-11-27 09:25:06'),
	(53, 'necklaces', 'A versatile category that includes various types of jewelry worn around the neck. Necklaces come in different lengths, from chokers to long chains, and may feature pendants, gemstones, or intricate designs.', 1, 6, '2024-11-27 09:26:39'),
	(54, 'bracelets', 'Jewelry worn around the wrist, including bangles, cuffs, and charm bracelets. Bracelets can be simple or adorned with gemstones, metals, or personalized charms.', 1, 6, '2024-11-27 09:26:48'),
	(55, 'rings', 'Circular pieces of jewelry worn on the fingers. This category includes engagement rings, wedding bands, fashion rings, and statement rings, often featuring diamonds or other precious stones.', 1, 6, '2024-11-27 09:27:14'),
	(56, 'earrings', 'Jewelry worn on the ears, available in many styles like studs, hoops, drop earrings, and ear cuffs. They can be made from a variety of materials such as gold, silver, or gemstones.', 1, 6, '2024-11-27 09:27:29'),
	(57, 'tshirt', 'Clothing for all sexes. Tshirts are nice t-shaped shirts that look nice on everyone.', 1, 1, '2024-12-01 13:05:35');

-- Dumping structure for table luna.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `recipient_id` bigint unsigned NOT NULL,
  `message_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`),
  KEY `sender_id` (`sender_id`),
  KEY `recipient_id` (`recipient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.messages: ~10 rows (approximately)
INSERT INTO `messages` (`message_id`, `sender_id`, `recipient_id`, `message_text`, `sent_at`, `is_read`) VALUES
	(93, 14, 1, 'bro', '2024-11-02 20:08:17', 0),
	(94, 1, 14, 'why bro', '2024-11-02 20:08:42', 0),
	(95, 1, 14, 'bro', '2024-11-03 11:28:32', 0),
	(96, 1, 14, 'bro', '2024-11-03 11:31:55', 0),
	(97, 1, 14, 'demo', '2024-11-03 11:32:19', 0),
	(98, 1, 14, 'demo', '2024-11-03 11:32:34', 0),
	(99, 1, 14, 'deasdasdasdas', '2024-11-03 11:32:43', 0),
	(100, 1, 14, 'hi', '2024-11-03 11:40:07', 0),
	(101, 1, 14, 'bro', '2024-11-03 21:00:49', 0),
	(102, 1, 14, 'hi', '2024-11-03 21:00:59', 0),
	(103, 1, 3, 'sa lahaaattttt', '2024-11-27 18:22:12', 0);

-- Dumping structure for table luna.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `notes` text COLLATE utf8mb4_general_ci,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_address_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `idx_orders_user` (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.orders: ~3 rows (approximately)
INSERT INTO `orders` (`order_id`, `user_id`, `email`, `status`, `notes`, `total_amount`, `shipping_address_id`, `created_at`) VALUES
	(1, 7, 'shimijallores@gmail.com', 'cancelled', 'I love cats', 32423.00, 1, '2024-10-12 12:35:36'),
	(2, 10, 'shimijallores@gmail.com', 'shipped', 'I love cats but im allergic', 4321.00, 2, '2024-10-11 13:23:31'),
	(3, 3, 'youanybluesky30@gmail.com', 'new', 'tyler at the top!', 4321.00, 3, '2024-10-11 13:23:31');

-- Dumping structure for table luna.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price_at_time` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  UNIQUE KEY `order_item_id` (`order_item_id`),
  KEY `idx_order_items_order` (`order_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.order_items: ~11 rows (approximately)
INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_time`) VALUES
	(1, 1, 236, 3, 4992.73),
	(2, 1, 236, 25, 4992.73),
	(3, 2, 236, 7, 4992.73),
	(4, 2, 236, 18, 4992.73),
	(5, 1, 236, 6, 4992.73),
	(6, 2, 236, 2, 4992.73),
	(7, 2, 236, 4, 4992.73),
	(34, 3, 236, 6, 4992.73),
	(35, 3, 236, 10, 4992.73),
	(36, 3, 236, 9, 4992.73),
	(37, 3, 236, 2, 4992.73),
	(38, 1, 236, 1, 4992.73);

-- Dumping structure for table luna.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `visibility` tinyint NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `quantity_sold` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.products: ~10 rows (approximately)
INSERT INTO `products` (`product_id`, `name`, `description`, `visibility`, `price`, `stock_quantity`, `quantity_sold`, `created_at`) VALUES
	(236, 'Women\'s Rival Fleece Crop Full-Zip', '<p>The Women\'s Rival Fleece Crop Full-Zip is the perfect blend of comfort, warmth, and style. Made from soft, cozy fleece, this jacket provides lightweight warmth while the cropped design offers a modern, trendy look. The full-zip front allows for easy on-and-off, while the adjustable hood adds extra coverage when you need it. With ribbed cuffs and a relaxed fit, this versatile jacket is ideal for layering over your favorite workout gear or pairing with casual outfits.</p><p>Key Features:</p><p>Soft Fleece Fabric: Provides warmth and comfort for all-day wear.</p><p>Cropped Design: Modern, flattering fit that pairs well with high-waisted pants.</p><p>Full-Zip Closure: Easy to wear and adjust for comfort.</p><p>Adjustable Hood: Extra coverage for cooler days.</p><p>Ribbed Cuffs: Secure fit that keeps sleeves in place.</p><p>Elevate your casual style and stay cozy with the Women\'s Rival Fleece Crop Full-Zip, the perfect addition to your wardrobe for effortless comfort.</p>', 1, 3524.28, 100, 5, '2024-11-30 05:54:53'),
	(237, 'Men\'s Unstoppable Insulated Bomber Jacket', '<p>Stay warm and stylish in any weather with the Men\'s Unstoppable Insulated Bomber Jacket. Designed for both comfort and durability, this jacket features advanced insulation technology to keep you cozy in cold temperatures, while its sleek bomber style adds a touch of modern flair to your winter wardrobe.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Premium insulation for superior warmth</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Durable water-resistant fabric</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Classic bomber silhouette with ribbed cuffs and hem</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Full-zip front closure for easy layering</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Multiple pockets for storage and convenience</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Windproof design for protection in harsh conditions</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Lightweight yet incredibly warm</li></ol>', 1, 9376.24, 100, 48, '2024-12-01 13:03:13'),
	(238, 'Men\'s Fast Left Chest T-Shirt', '<p>The Men\'s Fast Left Chest T-Shirt combines casual comfort with a sleek, athletic look. Featuring a subtle logo on the left chest, this tee is perfect for both everyday wear and active moments. Made from soft, breathable fabric, it ensures all-day comfort whether you\'re working out or hanging out.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, breathable cotton blend for comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Classic crewneck design</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Left chest logo for a minimalist, athletic touch</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Lightweight and versatile for layering or wearing alone</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Machine washable for easy care</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Available in multiple color options</li></ol><p><br></p>', 1, 1054.83, 100, 25, '2024-12-01 13:06:46'),
	(239, 'Men\'s Command Warm-Up Full-Zip', '<p>The Men\'s Command Warm-Up Full-Zip is the ultimate blend of comfort and performance. Perfect for pre-game warm-ups or casual wear, this jacket features a full-zip front and adjustable design, ensuring flexibility and ease of movement. Its soft, warm fabric keeps you cozy while you stay active.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Full-zip front for easy on and off</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, warm fabric for enhanced comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Athletic fit for freedom of movement</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ribbed cuffs and hem for a secure fit</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Side pockets for storage</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ideal for layering or wearing alone during warm-ups or workouts</li></ol><p><br></p>', 1, 2344.06, 100, 353, '2024-12-01 13:10:49'),
	(240, 'Women\'s Icon Heavyweight Fleece Oversized Crew', '<p>The Women\'s Icon Heavyweight Fleece Oversized Crew is your go-to for cozy, laid-back style. Made with thick, plush fleece, this oversized crewneck sweater offers warmth and comfort in a relaxed fit. Perfect for layering or lounging, it’s a versatile wardrobe staple with a stylish, casual look.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, heavyweight fleece for warmth and comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Relaxed, oversized fit for ultimate coziness</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Classic crewneck design</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ribbed cuffs and hem for a secure fit</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Iconic branding for a bold, stylish touch</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ideal for layering or wearing solo on chilly days</li></ol><p><br></p>', 1, 6446.16, 100, 234, '2024-12-01 13:13:26'),
	(241, 'Women\'s Premier Pleated Dress', '<p>The Women\'s Premier Pleated Dress is an elegant and timeless piece, designed to elevate your wardrobe. With its flowing pleats and flattering silhouette, this dress offers both sophistication and comfort. Perfect for special occasions or a stylish day out, it adds a touch of class to any event.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, flowing fabric for a graceful drape</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Pleated design for a flattering, feminine look</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Classic round neckline</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Flattering fit-and-flare silhouette</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Versatile style suitable for both casual and formal occasions</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Available in multiple colors for varied styling options</li></ol><p><br></p>', 1, 8790.23, 100, 34, '2024-12-01 13:15:29'),
	(242, 'Girls Rival Fleece Oversized Crew', '<p>The Girls Rival Fleece Oversized Crew combines comfort and style in one cozy package. Made from soft fleece, this relaxed-fit crewneck sweater is perfect for everyday wear. Whether she\'s lounging at home or out with friends, it offers warmth and a trendy look that’s both comfortable and fashionable.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, cozy fleece fabric for warmth</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Oversized, relaxed fit for all-day comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Classic crewneck design</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ribbed cuffs and hem for a snug fit</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ideal for layering or wearing solo</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Stylish and versatile for casual outfits</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Available in a variety of colors and sizes</li></ol><p><br></p>', 1, 2051.05, 100, 75, '2024-12-01 13:17:53'),
	(243, 'Boys\' Armour Fleece® Pro Joggers', '<p>The Boys\' Armour Fleece® Pro Joggers are built for active kids who need comfort and performance. Made from lightweight, breathable Armour Fleece® fabric, these joggers offer warmth and flexibility, perfect for sports, outdoor activities, or everyday wear. The stretchy waistband ensures a secure fit, while the tapered leg design adds a modern touch.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Armour Fleece® fabric for lightweight warmth and flexibility</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Stretchy waistband with internal drawcord for an adjustable fit</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Tapered leg design for a modern, athletic look</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Side pockets for convenience</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Soft, breathable material for all-day comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ideal for active use or casual wear</li></ol><p><br></p>', 1, 2637.07, 100, 122, '2024-12-01 13:20:27'),
	(244, 'Men\'s Surge 4 Running Shoes', '<p>The Men\'s Surge 4 Running Shoes are designed for optimal performance and comfort on every run. Featuring a lightweight, breathable mesh upper and responsive cushioning, these shoes provide support and flexibility for all types of runners. Whether you\'re hitting the pavement or the trails, the Surge 4 offers a sleek, high-performance design.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Lightweight, breathable mesh upper for enhanced ventilation</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Responsive cushioning for added comfort and support</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Durable rubber outsole for traction and stability</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Flexible design for natural movement</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Sleek, modern look with a secure fit</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Ideal for running, training, and everyday wear</li></ol><p><br></p>', 1, 3809.10, 100, 321, '2024-12-01 13:23:00'),
	(245, 'Unisex Apparition Shoes', '<p>The Unisex Apparition Shoes offer a stylish and versatile design for any occasion. Featuring a sleek, minimalist silhouette, these shoes are crafted with premium materials for comfort and durability. Whether you\'re dressing up or down, the Apparition shoes provide both a modern aesthetic and reliable performance.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Sleek, minimalist design for a stylish look</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Premium materials for enhanced comfort and durability</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Versatile style suitable for casual or semi-formal wear</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Cushioned insole for all-day comfort</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Durable rubber outsole for traction and grip</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Available in a variety of colors for easy styling</li></ol><p><br></p>', 1, 6446.16, 100, 83, '2024-12-01 13:26:01');

-- Dumping structure for table luna.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `product_id` bigint unsigned NOT NULL DEFAULT '0',
  `category_id` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category` (`category_id`),
  CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.product_categories: ~12 rows (approximately)
INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
	(236, 30),
	(237, 30),
	(239, 30),
	(240, 30),
	(242, 30),
	(239, 33),
	(241, 34),
	(240, 41),
	(243, 41),
	(244, 43),
	(245, 43),
	(243, 45),
	(242, 46),
	(238, 57);

-- Dumping structure for table luna.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cloud_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.product_images: ~40 rows (approximately)
INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `cloud_url`, `is_primary`, `name`) VALUES
	(132, 236, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1801454837674aa8ad0d0207.02608459V5-1385890-001_FC.jpg', 'https://i.ibb.co/mScbCQZ/450025f52536.jpg', 1, '1801454837674aa8ad0d0207.02608459V5-1385890-001_FC.jpg'),
	(133, 236, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/601319000674aa8af3bb9c7.41122866V5-1385890-001_BC.jpg', 'https://i.ibb.co/7QH12Y0/a8abe0a162d8.jpg', 0, '601319000674aa8af3bb9c7.41122866V5-1385890-001_BC.jpg'),
	(134, 236, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1982537954674aa8b1ebb225.12883033V5-1385890-001_SIDEDET.jpg', 'https://i.ibb.co/7V1K9bg/dbdb14d4b701.jpg', 0, '1982537954674aa8b1ebb225.12883033V5-1385890-001_SIDEDET.jpg'),
	(135, 236, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/319045308674aa8b56cf487.31400659PS1385890-001_HF.jpg', 'https://i.ibb.co/KmttzNp/a48b271599af.jpg', 0, '319045308674aa8b56cf487.31400659PS1385890-001_HF.jpg'),
	(136, 237, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1530903564674c5e912aa6b9.83726768V5-1388903-001_BC.jpg', 'https://i.ibb.co/fx08Fg5/9776d1f01ab7.jpg', 0, '1530903564674c5e912aa6b9.83726768V5-1388903-001_BC.jpg'),
	(137, 237, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1284256712674c5e96d903c4.52701624V5-1388903-001_FC.jpg', 'https://i.ibb.co/2cqjfb4/070f9b0ee2e8.jpg', 1, '1284256712674c5e96d903c4.52701624V5-1388903-001_FC.jpg'),
	(138, 237, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1495897892674c5e99ba5703.74695063V5-1388903-001_FSF.jpg', 'https://i.ibb.co/6bmV627/ac6ea04a055f.jpg', 0, '1495897892674c5e99ba5703.74695063V5-1388903-001_FSF.jpg'),
	(139, 237, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/395251320674c5e9c125928.79936571V5-1388903-001_COLLAR.jpg', 'https://i.ibb.co/sgKctQF/c998bf94ad93.jpg', 0, '395251320674c5e9c125928.79936571V5-1388903-001_COLLAR.jpg'),
	(140, 238, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1276607149674c5f66bea140.51613535V5-1370954-012_BC.jpg', 'https://i.ibb.co/rxXP7vk/c4acafde21c8.jpg', 0, '1276607149674c5f66bea140.51613535V5-1370954-012_BC.jpg'),
	(141, 238, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1128957388674c5f6998b4a5.58000021V5-1370954-012_FC.jpg', 'https://i.ibb.co/5WRV48R/f5b32bdabe73.jpg', 1, '1128957388674c5f6998b4a5.58000021V5-1370954-012_FC.jpg'),
	(142, 238, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/94661805674c5f6ce9fa11.65717605PS1370954-012_HF.jpg', 'https://i.ibb.co/Fw3hmt6/abacdfa18710.jpg', 0, '94661805674c5f6ce9fa11.65717605PS1370954-012_HF.jpg'),
	(143, 238, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1079138348674c5f7030fc65.70393102PS1370954-012_HB.jpg', 'https://i.ibb.co/K0m3N5v/e1e74f968b74.jpg', 0, '1079138348674c5f7030fc65.70393102PS1370954-012_HB.jpg'),
	(144, 239, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1350133444674c6059b34087.03434301V5-1360713-001_FC.jpg', 'https://i.ibb.co/LJLrCRK/0d0be437352d.jpg', 1, '1350133444674c6059b34087.03434301V5-1360713-001_FC.jpg'),
	(145, 239, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1616040084674c605c5887d5.22032743V5-1360713-001_BC.jpg', 'https://i.ibb.co/xKndBLX/dc30fea92a75.jpg', 0, '1616040084674c605c5887d5.22032743V5-1360713-001_BC.jpg'),
	(146, 239, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/166496884674c605ef29a00.79873219V5-1360713-001_COLLAR.jpg', 'https://i.ibb.co/BB9Ps4q/4054340593df.jpg', 0, '166496884674c605ef29a00.79873219V5-1360713-001_COLLAR.jpg'),
	(147, 239, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/343586295674c6062ac7359.58895530V5-1360713-001_FSF.jpg', 'https://i.ibb.co/M2vyrLK/fc9bc44235b0.jpg', 0, '343586295674c6062ac7359.58895530V5-1360713-001_FSF.jpg'),
	(148, 240, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/154078041674c60f6198163.20662809V5-1386486-263_FC.jpg', 'https://i.ibb.co/30pMcfH/ec04cab48db3.jpg', 1, '154078041674c60f6198163.20662809V5-1386486-263_FC.jpg'),
	(149, 240, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1844478648674c60f9960856.27819759V5-1386486-263_BC.jpg', 'https://i.ibb.co/PmrwHJx/5fc425357cc2.jpg', 0, '1844478648674c60f9960856.27819759V5-1386486-263_BC.jpg'),
	(150, 240, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1838637428674c60fd807fe3.21152869V5-1386486-263_FSF.jpg', 'https://i.ibb.co/5npWH8H/598a4c602020.jpg', 0, '1838637428674c60fd807fe3.21152869V5-1386486-263_FSF.jpg'),
	(151, 240, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/88431361674c61005608b1.21515916V5-1386486-263_SIDEDET.jpg', 'https://i.ibb.co/hZcxTvc/4a30e76d3004.jpg', 0, '88431361674c61005608b1.21515916V5-1386486-263_SIDEDET.jpg'),
	(152, 241, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/24385627674c61723822b8.79092113V5-1388702-100_FC.jpg', 'https://i.ibb.co/g4tvKbh/00f10a5829c6.jpg', 1, '24385627674c61723822b8.79092113V5-1388702-100_FC.jpg'),
	(153, 241, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1765022038674c6176262d67.43703163V5-1388702-100_BC.jpg', 'https://i.ibb.co/xgfFRty/c9ba5200ca49.jpg', 0, '1765022038674c6176262d67.43703163V5-1388702-100_BC.jpg'),
	(154, 241, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/759614738674c617a568ad3.94727813V5-1388702-100_FSF.jpg', 'https://i.ibb.co/ThPStts/2a9279586018.jpg', 0, '759614738674c617a568ad3.94727813V5-1388702-100_FSF.jpg'),
	(155, 241, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/154048008674c617d562a62.05959625V5-1388702-100_SIDEDET.jpg', 'https://i.ibb.co/4MWNSCW/337bf566c485.jpg', 0, '154048008674c617d562a62.05959625V5-1388702-100_SIDEDET.jpg'),
	(156, 242, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/899434140674c620125c893.90562067PS1389281-464_HF.jpg', 'https://i.ibb.co/HHRZ8tB/d78b40b923d1.jpg', 1, '899434140674c620125c893.90562067PS1389281-464_HF.jpg'),
	(157, 242, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/711977058674c6203d873f1.35245205PS1389281-464_HB.jpg', 'https://i.ibb.co/1dZZNQ7/38691855be5d.jpg', 0, '711977058674c6203d873f1.35245205PS1389281-464_HB.jpg'),
	(158, 242, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/511805039674c6206a3f369.68028970PS1389281-001_HF.jpg', 'https://i.ibb.co/VmTCrTj/591e87e389c5.jpg', 0, '511805039674c6206a3f369.68028970PS1389281-001_HF.jpg'),
	(159, 242, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/868906530674c62094c2de5.04203088PS1389281-001_HB.jpg', 'https://i.ibb.co/yS2jWhw/1d568a03e81f.jpg', 0, '868906530674c62094c2de5.04203088PS1389281-001_HB.jpg'),
	(160, 243, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/534581522674c629b9e6462.56247336PS1386706-001_HF.jpg', 'https://i.ibb.co/sKtCGd8/1613ca111c86.jpg', 1, '534581522674c629b9e6462.56247336PS1386706-001_HF.jpg'),
	(161, 243, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1755135461674c629e019ec5.57293536PS1386706-001_HB.jpg', 'https://i.ibb.co/z7CqgH7/668b5ddbda21.jpg', 0, '1755135461674c629e019ec5.57293536PS1386706-001_HB.jpg'),
	(162, 243, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/887432967674c62a0277281.80387242PS1386706-001_HS.jpg', 'https://i.ibb.co/Tg1dwgF/4a68a6ae604c.jpg', 0, '887432967674c62a0277281.80387242PS1386706-001_HS.jpg'),
	(163, 243, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1629428476674c62a2900df4.32423863PS1386706-432_HF.jpg', 'https://i.ibb.co/6YkHgbs/90314e742d65.jpg', 0, '1629428476674c62a2900df4.32423863PS1386706-432_HF.jpg'),
	(164, 244, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/442346730674c6334611813.667755163027000-001_PAIR.jpg', 'https://i.ibb.co/bJjHJmn/3c1d98a014b6.jpg', 0, '442346730674c6334611813.667755163027000-001_PAIR.jpg'),
	(165, 244, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1437066298674c63374a1256.217439883027000-001_TOE.jpg', 'https://i.ibb.co/FDDvV39/2979b094bbab.jpg', 0, '1437066298674c63374a1256.217439883027000-001_TOE.jpg'),
	(166, 244, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/255569404674c633ad0dad7.080307333027000-001_DEFAULT.jpg', 'https://i.ibb.co/PFJ75sT/9f2e119cc94b.jpg', 0, '255569404674c633ad0dad7.080307333027000-001_DEFAULT.jpg'),
	(167, 244, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/438715253674c633d8dbe73.633619413027000-001_A.jpg', 'https://i.ibb.co/6F7493Y/46d5be94b9a9.jpg', 1, '438715253674c633d8dbe73.633619413027000-001_A.jpg'),
	(168, 245, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1304836199674c63e9b2e898.177315493027595-111_A.jpg', 'https://i.ibb.co/HpfZPDm/92bfad3dc158.jpg', 1, '1304836199674c63e9b2e898.177315493027595-111_A.jpg'),
	(169, 245, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1425606572674c63ec897252.624629933027595-111_TOE.jpg', 'https://i.ibb.co/mcZv8h0/59f05d02419f.jpg', 0, '1425606572674c63ec897252.624629933027595-111_TOE.jpg'),
	(170, 245, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/365974521674c63efc7f234.197670093027595-111_PAIR.jpg', 'https://i.ibb.co/rHh3XDt/eb2be81ebef8.jpg', 0, '365974521674c63efc7f234.197670093027595-111_PAIR.jpg'),
	(171, 245, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/930003434674c63f292e1c5.645187453027000-001_PAIR.jpg', 'https://i.ibb.co/4V4h6xm/0de2fd3e9587.jpg', 0, '930003434674c63f292e1c5.645187453027000-001_PAIR.jpg');

-- Dumping structure for table luna.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `review_id` (`review_id`),
  CONSTRAINT `reviews_chk_1` CHECK (((`rating` >= 1) and (`rating` <= 5)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.reviews: ~0 rows (approximately)

-- Dumping structure for table luna.tables
CREATE TABLE IF NOT EXISTS `tables` (
  `table_number` int NOT NULL,
  `is_occupied` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.tables: ~6 rows (approximately)
INSERT INTO `tables` (`table_number`, `is_occupied`) VALUES
	(1, 0),
	(2, 0),
	(3, 0),
	(4, 0),
	(5, 0),
	(6, 0);

-- Dumping structure for table luna.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'john',
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'doe',
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Philippines',
  `user_type` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.users: ~9 rows (approximately)
INSERT INTO `users` (`user_id`, `email`, `password_hash`, `first_name`, `last_name`, `phone`, `country`, `user_type`, `created_at`) VALUES
	(1, 'shimijallores35@gmail.com', 'shimi', 'Shimi', 'Jallores', '09561434976', 'Philippines', 'admin', '2024-10-11 09:31:59'),
	(3, 'youanybluesky30@gmail.com', 'shimi', 'Patriarch', 'Cain', '09289287057', 'Philippines', 'customer', '2024-10-18 10:14:58'),
	(7, 'shimijallores@gmail.com', '$2y$10$Aj8rpfhjRl4CyUm4GYNV9Oj9VHhhjb2AcuiKFarXvXh57j0j9RWsC', 'Shimi Uzziel', 'Jallores', '091234567891', 'Philippines', 'customer', '2024-10-18 11:54:36'),
	(14, 'romandmitry99@gmail.com', 'roman', 'Roman', 'Dmitry', NULL, 'Philippines', 'admin', '2024-11-01 16:16:41'),
	(26, '34shimijallores@gmail.com', NULL, 'Shimi Uzziel', 'Jallores', '09397160615', 'Philippines', 'customer', '2024-11-30 06:17:01'),
	(27, 'solapparel99@gmail.com', NULL, 'Sol and', 'Luna', '09457160613', 'Philippines', 'customer', '2024-11-30 06:17:27'),
	(29, 'youanybluesky10@gmail.com', NULL, 'cain', 'bro', '09561434987', 'Philippines', 'customer', '2024-12-08 15:34:59'),
	(30, 'demodemo2@gmail.com', '$2y$10$9TjHDfq3R/7XD7G9zYba4ui3bmwMG2xwj30OyD7clc6VbJz1pN8/a', 'john', 'doe', '09111111111', 'Philippines', 'customer', '2024-12-08 16:17:25'),
	(31, 'demodemo@gmail.com', '$2y$10$vDInGDR8sA0pI7T8kjN3xesjBv.C7y8JvVqQUVjXMF.ay2wHtRxlC', 'john', 'doe', '09561434333', 'Philippines', 'customer', '2024-12-08 16:39:59');

-- Dumping structure for table luna.user_images
CREATE TABLE IF NOT EXISTS `user_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cloud_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`) USING BTREE,
  UNIQUE KEY `image_id` (`image_id`) USING BTREE,
  KEY `product_id` (`user_id`) USING BTREE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table luna.user_images: ~4 rows (approximately)
INSERT INTO `user_images` (`image_id`, `user_id`, `image_url`, `cloud_url`, `name`) VALUES
	(74, 1, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/gues.png', NULL, 'gues.png'),
	(75, 14, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Roman.jpg', NULL, 'Roman.jpg'),
	(78, 7, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/43840321067261300756395.08170808Profile-Picture-min.jpg', NULL, '43840321067261300756395.08170808Profile-Picture-min.jpg'),
	(83, 3, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1618797854674aa98b100273.12251574lowkey.jpg', 'https://i.ibb.co/4Rvt5LM/d07f18aee936.jpg', '1618797854674aa98b100273.12251574lowkey.jpg');

-- Dumping structure for table luna.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`wishlist_id`) USING BTREE,
  UNIQUE KEY `cart_item_id` (`wishlist_id`) USING BTREE,
  KEY `idx_cart_items_user` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table luna.wishlist: ~5 rows (approximately)
INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`, `added_at`) VALUES
	(5, 28, 242, '2024-12-03 16:53:32'),
	(14, 26, 0, '2024-12-05 07:47:50'),
	(20, 26, 244, '2024-12-09 01:16:50'),
	(21, 26, 243, '2024-12-09 01:17:02');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
