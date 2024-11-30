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

-- Dumping structure for table luna.cart_items
CREATE TABLE IF NOT EXISTS `cart_items` (
  `cart_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_item_id`),
  UNIQUE KEY `cart_item_id` (`cart_item_id`),
  KEY `idx_cart_items_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.cart_items: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
	(56, 'earrings', 'Jewelry worn on the ears, available in many styles like studs, hoops, drop earrings, and ear cuffs. They can be made from a variety of materials such as gold, silver, or gemstones.', 1, 6, '2024-11-27 09:27:29');

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

-- Dumping data for table luna.messages: ~11 rows (approximately)
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

-- Dumping data for table luna.order_items: ~12 rows (approximately)
INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_time`) VALUES
	(1, 1, 47, 3, 4992.73),
	(2, 1, 47, 25, 4992.73),
	(3, 2, 47, 7, 4992.73),
	(4, 2, 47, 18, 4992.73),
	(5, 1, 47, 6, 4992.73),
	(6, 2, 47, 2, 4992.73),
	(7, 2, 47, 4, 4992.73),
	(34, 3, 47, 6, 4992.73),
	(35, 3, 47, 10, 4992.73),
	(36, 3, 47, 9, 4992.73),
	(37, 3, 47, 2, 4992.73),
	(38, 1, 47, 1, 4992.73);

-- Dumping structure for table luna.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `visibility` tinyint NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.products: ~10 rows (approximately)
INSERT INTO `products` (`product_id`, `name`, `description`, `visibility`, `price`, `stock_quantity`, `created_at`) VALUES
	(47, 'Launch Elite Cold Weather Balaclava Hoodie', '                                                                                                                                                                                                                                <p>Stay warm and protected with the Launch Elite Cold Weather Balaclava Hoodie. Designed for extreme conditions, this all-in-one hoodie features a built-in balaclava for full face coverage, shielding you from cold winds and rain. Made with thermal-regulating, moisture-wicking fabric, it keeps you dry and comfortable during intense activities. </p><p><br></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Integrated balaclava and hoodie</strong> for full coverage</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Thermal-regulating fabric</strong> for warmth and breathability</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Windproof & water-resistant</strong> protection</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Adjustable hood & face mask</strong> for a custom fit</li></ol><p><br></p>                                                                                                                                ', 1, 4992.73, 100, '2024-11-27 09:35:17'),
	(48, 'Women\'s Rival Fleece Crop Full-Zip', '<p>The Women\'s Rival Fleece Crop Full-Zip is the perfect blend of comfort, warmth, and style. Made from soft, cozy fleece, this jacket provides lightweight warmth while the cropped design offers a modern, trendy look. The full-zip front allows for easy on-and-off, while the adjustable hood adds extra coverage when you need it. With ribbed cuffs and a relaxed fit, this versatile jacket is ideal for layering over your favorite workout gear or pairing with casual outfits.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Soft Fleece Fabric:</strong> Provides warmth and comfort for all-day wear.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Cropped Design:</strong> Modern, flattering fit that pairs well with high-waisted pants.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Full-Zip Closure:</strong> Easy to wear and adjust for comfort.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Adjustable Hood:</strong> Extra coverage for cooler days.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Ribbed Cuffs:</strong> Secure fit that keeps sleeves in place.</li></ol><p>Elevate your casual style and stay cozy with the Women\'s Rival Fleece Crop Full-Zip, the perfect addition to your wardrobe for effortless comfort.</p>', 1, 3524.28, 100, '2024-11-27 10:06:45'),
	(49, 'HeatGear® Sleeveless', '<p>The HeatGear® Sleeveless top is designed to keep you cool and comfortable during intense workouts. Made with lightweight, moisture-wicking fabric, it pulls sweat away from your skin to help you stay dry. The sleeveless design allows for maximum freedom of movement, making it ideal for training, running, or layering. Whether you\'re hitting the gym or going for a run, the HeatGear® Sleeveless offers breathable, lightweight performance to help you push your limits.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Moisture-Wicking Fabric:</strong> Draws sweat away from the body to keep you dry.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Breathable &amp; Lightweight:</strong> Ensures comfort and ventilation during intense activities.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Full Range of Motion:</strong> Sleeveless design for unrestricted movement.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Durable Construction:</strong> Built to withstand tough workouts.</li></ol><p>Stay cool and perform at your best with the HeatGear® Sleeveless.</p><p><br></p>', 1, 1762.14, 100, '2024-11-27 09:56:37'),
	(50, 'Men\'s Base 2.0 Crew', '<p>The Men\'s Base 2.0 Crew is a versatile, performance-driven base layer designed to keep you warm and dry in cold conditions. Made with moisture-wicking, heat-retaining fabric, it traps warmth while pulling sweat away from the skin. The crew neck and fitted design provide a comfortable, snug fit, making it perfect for layering under outerwear or wearing alone during active outdoor activities. Whether you\'re hiking, skiing, or just need extra warmth, the Men\'s Base 2.0 Crew ensures all-day comfort and performance.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Moisture-Wicking Fabric:</strong> Keeps you dry by pulling sweat away from the skin.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Heat-Retaining Technology:</strong> Traps body heat to keep you warm in cold weather.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Comfortable Fit:</strong> Fitted design for a snug, supportive feel.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Breathable &amp; Lightweight:</strong> Ideal for layering or wearing on its own.</li></ol><p>Stay warm and comfortable with the Men\'s Base 2.0 Crew—your essential layer for cold-weather adventures.</p>', 1, 3524.28, 100, '2024-11-27 10:00:20'),
	(51, 'Men\'s Unstoppable Tapered Pants', '<p>The Men\'s Unstoppable Tapered Pants are built for active comfort and everyday versatility. Featuring a sleek, tapered fit that provides a modern silhouette, these pants offer maximum mobility without sacrificing style. Crafted from a durable, stretchy fabric, they move with you through workouts, runs, or casual outings. The elastic waistband ensures a secure, adjustable fit, while side pockets add convenience for carrying essentials. Whether you\'re hitting the gym or relaxing at home, the Unstoppable Tapered Pants deliver on both comfort and performance.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Tapered Fit:</strong> Modern design with a slim, streamlined silhouette.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Stretchy &amp; Durable Fabric:</strong> Offers flexibility and long-lasting wear.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Elastic Waistband:</strong> Provides a comfortable, adjustable fit.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Convenient Side Pockets:</strong> Ideal for carrying small essentials.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Versatile:</strong> Perfect for training, lounging, or casual wear.</li></ol><p>Stay comfortable and stylish, no matter the activity, with the Men\'s Unstoppable Tapered Pants.</p>', 1, 5286.42, 100, '2024-11-27 10:03:29'),
	(52, 'Infinite Pro Running Shoes', '<p>The Infinite Pro Running Shoes offer unparalleled performance and comfort for every runner. With cutting-edge technology and a sleek design, these shoes are built to enhance your running experience.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Lightweight &amp; Breathable Upper:</strong> Keeps your feet cool and dry with a breathable mesh material.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Responsive Cushioning:</strong> Provides a soft, cushioned feel with every step while maintaining energy return.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Durable Outsole:</strong> Features a high-traction, rubber outsole for exceptional grip on various surfaces.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Enhanced Stability:</strong> Offers a secure fit and support to reduce foot fatigue during long runs.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Versatile Design:</strong> Perfect for road running, trail running, and everyday training.</li></ol><p>Elevate your performance with the Infinite Pro Running Shoes, designed to help you go the distance with comfort and style.</p>', 1, 7635.94, 100, '2024-11-27 09:53:35'),
	(223, 'Women\'s Limitless Down Puffer Jacket', '<p>The Women\'s Limitless Down Puffer Jacket is designed to keep you warm, stylish, and protected against the cold. Filled with premium down insulation, this jacket offers exceptional warmth without the bulk, making it perfect for both outdoor adventures and everyday wear. The sleek, fitted design enhances mobility while maintaining a flattering silhouette. With a durable, water-resistant outer shell and cozy, insulated hood, the Limitless Down Puffer ensures you\'re ready for whatever winter throws your way.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Premium Down Insulation:</strong> Provides lightweight warmth and superior heat retention.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Water-Resistant Outer Shell:</strong> Keeps you dry and protected in light rain or snow.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Fitted Design:</strong> Sleek, flattering fit that allows for full range of movement.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Insulated Hood:</strong> Added warmth and coverage for colder days.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Zip Pockets:</strong> Convenient storage for essentials.</li></ol><p>Stay warm and stylish in any weather with the Women\'s Limitless Down Puffer Jacket.</p>', 1, 17915.08, 100, '2024-11-27 10:09:51'),
	(224, 'Women\'s ColdGear® Leggings', '<p>The Women\'s ColdGear® Leggings are designed to provide superior warmth and comfort during cold-weather activities. Made with advanced ColdGear® fabric, these leggings trap body heat while remaining breathable, ensuring you stay dry and warm throughout your workout or outdoor adventure. </p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>ColdGear® Fabric:</strong> Traps heat while allowing for breathability to keep you warm without overheating.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Moisture-Wicking:</strong> Draws sweat away from the skin to keep you dry.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Stretchy, Snug Fit:</strong> Offers full range of motion and a comfortable, supportive feel.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Versatile:</strong> Ideal for outdoor activities, workouts, or layering for added warmth.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Soft &amp; Comfortable:</strong> Perfect for all-day wear in colder weather.</li></ol><p>Stay warm, dry, and comfortable with the Women\'s ColdGear® Leggings, your go-to layer for cold-weather performance.</p>', 1, 3230.59, 100, '2024-11-27 10:11:40'),
	(225, 'Men\'s Curry 1 Golf Shoes', '                                                        <p>The Men\'s Curry 1 Golf Shoes combine cutting-edge performance with sleek style to elevate your game on the course. Featuring a lightweight, durable design, these shoes offer superior traction and stability for every swing. The advanced cushioning provides all-day comfort, while the water-resistant upper keeps your feet dry in various weather conditions.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Advanced Cushioning:</strong> Delivers comfort and support for long hours on the course.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Durable & Water-Resistant Upper:</strong> Protects against the elements while maintaining breathability.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Superior Traction:</strong> Equipped with a high-performance outsole for maximum grip and stability.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Sleek Design:</strong> Modern, stylish look inspired by Stephen Curry’s personal brand.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Lightweight Construction:</strong> Keeps your feet light and agile throughout your game.</li></ol><p>Take your performance to the next level with the Men\'s Curry 1 Golf Shoes, where style meets functionality.</p>                                ', 1, 8810.70, 100, '2024-11-27 10:13:46'),
	(226, 'Kids Cozy Fur Hoodie', '<p>The Girls\' Cozy Fur Hoodie is the perfect combination of warmth and style. Made with ultra-soft faux fur, this hoodie provides a plush feel that keeps her cozy on chilly days. The relaxed fit and hooded design offer added comfort, while the front pockets provide a convenient place to keep hands warm or store small essentials. Whether for lounging at home or layering up for outdoor adventures, this hoodie is a must-have for any wardrobe.</p><p><strong>Key Features:</strong></p><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Ultra-Soft Faux Fur:</strong> Provides a luxurious, cozy feel against the skin.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Hooded Design:</strong> Adds extra warmth and coverage.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Front Pockets:</strong> Perfect for keeping hands warm or carrying small items.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Relaxed Fit:</strong> Offers comfort and room for movement.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong>Versatile:</strong> Great for casual wear, lounging, or layering in cooler weather.</li></ol><p>Keep her warm and stylish with the Girls\' Cozy Fur Hoodie, a comfy essential for cooler days.</p>', 1, 4405.35, 100, '2024-11-27 10:15:30');

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
	(223, 30),
	(226, 30),
	(51, 31),
	(50, 33),
	(224, 37),
	(47, 39),
	(223, 39),
	(226, 39),
	(48, 41),
	(49, 42),
	(52, 43),
	(225, 43);

-- Dumping structure for table luna.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_primary` tinyint(1) DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.product_images: ~40 rows (approximately)
INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `is_primary`, `name`) VALUES
	(92, 47, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/14112465816746eb7d643837.21192764V5-1386675-625_BC.avif', 0, '14112465816746eb7d643837.21192764V5-1386675-625_BC.avif'),
	(93, 47, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/650669156746eb7d648699.61950868V5-1386675-625_FC.avif', 0, '650669156746eb7d648699.61950868V5-1386675-625_FC.avif'),
	(94, 47, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/13558806496746eb7d64f600.25189376V5-1386675-001_FC.avif', 1, '13558806496746eb7d64f600.25189376V5-1386675-001_FC.avif'),
	(95, 47, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/21285661896746eb7d654699.36406942V5-1386675-025_FC.avif', 0, '21285661896746eb7d654699.36406942V5-1386675-025_FC.avif'),
	(96, 52, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/8005809316746ec1f58b412.692640103027200-100_PAIR.avif', 0, '8005809316746ec1f58b412.692640103027200-100_PAIR.avif'),
	(97, 52, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/12394425686746ec1f58f953.362815573027200-100_TOE.avif', 0, '12394425686746ec1f58f953.362815573027200-100_TOE.avif'),
	(98, 52, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/12878628196746ec1f593ec4.931501863027200-100_A.avif', 0, '12878628196746ec1f593ec4.931501863027200-100_A.avif'),
	(99, 52, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/3780842486746ec1f599036.663796903027200-100_DEFAULT.avif', 1, '3780842486746ec1f599036.663796903027200-100_DEFAULT.avif'),
	(100, 49, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/11327685066746ecd56ebe18.15442555V5-1361522-410_BCKDET.avif', 0, '11327685066746ecd56ebe18.15442555V5-1361522-410_BCKDET.avif'),
	(101, 49, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/18799890366746ecd56f1898.21638731V5-1361522-410_FSF.avif', 0, '18799890366746ecd56f1898.21638731V5-1361522-410_FSF.avif'),
	(102, 49, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/17544335016746ecd56f70a4.57087811V5-1361522-410_BC.avif', 0, '17544335016746ecd56f70a4.57087811V5-1361522-410_BC.avif'),
	(103, 49, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/2047213456746ecd56fc7d5.57424018V5-1361522-410_FC.avif', 1, '2047213456746ecd56fc7d5.57424018V5-1361522-410_FC.avif'),
	(104, 50, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/11389832296746edb798dd83.28914742V5-1343244-001_SIDEDET.avif', 0, '11389832296746edb798dd83.28914742V5-1343244-001_SIDEDET.avif'),
	(105, 50, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/4414109606746edba085af4.53432815V5-1343244-001_FSF.avif', 0, '4414109606746edba085af4.53432815V5-1343244-001_FSF.avif'),
	(106, 50, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/19738878086746edbb7e5f17.42750366V5-1343244-001_BC.avif', 0, '19738878086746edbb7e5f17.42750366V5-1343244-001_BC.avif'),
	(107, 50, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/946159266746edbd308914.41084300V5-1343244-001_FC.avif', 1, '946159266746edbd308914.41084300V5-1343244-001_FC.avif'),
	(108, 51, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/11541993236746ee71ace8e7.97003712V5-1352028-025_SIDEDET.avif', 0, '11541993236746ee71ace8e7.97003712V5-1352028-025_SIDEDET.avif'),
	(109, 51, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/5586298966746ee71ad2f39.76607102V5-1352028-025_FSF.avif', 0, '5586298966746ee71ad2f39.76607102V5-1352028-025_FSF.avif'),
	(110, 51, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/3497266846746ee71ad82e2.00157858V5-1352028-025_BC.avif', 0, '3497266846746ee71ad82e2.00157858V5-1352028-025_BC.avif'),
	(111, 51, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/12919752046746ee71add674.00592659V5-1352028-025_FC.avif', 1, '12919752046746ee71add674.00592659V5-1352028-025_FC.avif'),
	(112, 48, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/12713486476746ef35504d70.98440542PS1385890-001_HF.avif', 0, '12713486476746ef35504d70.98440542PS1385890-001_HF.avif'),
	(113, 48, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/3995221866746ef35512c93.47984074V5-1385890-001_SIDEDET.avif', 0, '3995221866746ef35512c93.47984074V5-1385890-001_SIDEDET.avif'),
	(114, 48, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/6255190296746ef3551aa43.28182311V5-1385890-001_BC.avif', 0, '6255190296746ef3551aa43.28182311V5-1385890-001_BC.avif'),
	(115, 48, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/11024918726746ef35522579.20272638V5-1385890-001_FC.avif', 1, '11024918726746ef35522579.20272638V5-1385890-001_FC.avif'),
	(116, 223, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/12763901756746efefaa7bf0.27555213V5-1384648-625_SIDEDET.avif', 0, '12763901756746efefaa7bf0.27555213V5-1384648-625_SIDEDET.avif'),
	(117, 223, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/7071189076746efefaac593.56920044V5-1384648-625_FSF.avif', 0, '7071189076746efefaac593.56920044V5-1384648-625_FSF.avif'),
	(118, 223, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/3228199666746efefab1014.83588274V5-1384648-625_BC.avif', 0, '3228199666746efefab1014.83588274V5-1384648-625_BC.avif'),
	(119, 223, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/20287631256746efefabc104.42681939V5-1384648-625_FC.avif', 1, '20287631256746efefabc104.42681939V5-1384648-625_FC.avif'),
	(120, 224, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/4292599356746f05c7473f4.04413921V5-1368700-001_FSFADD.avif', 0, '4292599356746f05c7473f4.04413921V5-1368700-001_FSFADD.avif'),
	(121, 224, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/9899028726746f05c74bcf0.91262254V5-1368700-001_FSF.avif', 0, '9899028726746f05c74bcf0.91262254V5-1368700-001_FSF.avif'),
	(122, 224, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/6265665726746f05c750343.02096771V5-1368700-001_BC.avif', 0, '6265665726746f05c750343.02096771V5-1368700-001_BC.avif'),
	(123, 224, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/11445303406746f05c754600.45471110V5-1368700-001_FC.avif', 1, '11445303406746f05c754600.45471110V5-1368700-001_FC.avif'),
	(124, 225, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/15904803656746f0dabfba53.838938373027378-001_PAIR.avif', 1, '15904803656746f0dabfba53.838938373027378-001_PAIR.avif'),
	(125, 225, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/4228471196746f0dac00155.461112533027378-001_TOE.avif', 0, '4228471196746f0dac00155.461112533027378-001_TOE.avif'),
	(126, 225, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/1155555296746f0dac08782.581749343027378-001_A.avif', 0, '1155555296746f0dac08782.581749343027378-001_A.avif'),
	(127, 225, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/9228918086746f0dac0dbc8.066732213027378-001_DEFAULT.avif', 0, '9228918086746f0dac0dbc8.066732213027378-001_DEFAULT.avif'),
	(128, 226, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/9430382746746f142694633.15152112PS6004355-650_F.avif', 1, '9430382746746f142694633.15152112PS6004355-650_F.avif'),
	(129, 226, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/21063453356746f142698a18.51825057PS6004355-001_F.avif', 0, '21063453356746f142698a18.51825057PS6004355-001_F.avif'),
	(130, 226, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/3860509526746f14269ca03.86456295PS6004355-535_F1.avif', 0, '3860509526746f14269ca03.86456295PS6004355-535_F1.avif'),
	(131, 226, 'C:\\laragon\\projects\\Luna-Dashboard\\public/../public/uploads/2835771826746f1426a0c30.81707700PS6004355-535_F.avif', 0, '2835771826746f1426a0c30.81707700PS6004355-535_F.avif');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.users: ~4 rows (approximately)
INSERT INTO `users` (`user_id`, `email`, `password_hash`, `first_name`, `last_name`, `phone`, `country`, `user_type`, `created_at`) VALUES
	(1, 'shimijallores35@gmail.com', 'shimi', 'Shimi', 'Jallores', '09561434976', 'Philippines', 'admin', '2024-10-11 09:31:59'),
	(3, 'youanybluesky30@gmail.com', 'shimi', 'Patriarch', 'Cain', '09289287057', 'Philippines', 'customer', '2024-10-18 10:14:58'),
	(7, 'shimijallores@gmail.com', '$2y$10$Aj8rpfhjRl4CyUm4GYNV9Oj9VHhhjb2AcuiKFarXvXh57j0j9RWsC', 'Shimi Uzziel', 'Jallores', '09561434976', 'Philippines', 'customer', '2024-10-18 11:54:36'),
	(14, 'romandmitry99@gmail.com', 'roman', 'Roman', 'Dmitry', NULL, 'Philippines', 'admin', '2024-11-01 16:16:41');

-- Dumping structure for table luna.user_images
CREATE TABLE IF NOT EXISTS `user_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`) USING BTREE,
  UNIQUE KEY `image_id` (`image_id`) USING BTREE,
  KEY `product_id` (`user_id`) USING BTREE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table luna.user_images: ~4 rows (approximately)
INSERT INTO `user_images` (`image_id`, `user_id`, `image_url`, `name`) VALUES
	(72, 3, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Kuromi.jpg', 'Kuromi.jpg'),
	(74, 1, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/gues.png', 'gues.png'),
	(75, 14, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Roman.jpg', 'Roman.jpg'),
	(78, 7, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/43840321067261300756395.08170808Profile-Picture-min.jpg', '43840321067261300756395.08170808Profile-Picture-min.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
