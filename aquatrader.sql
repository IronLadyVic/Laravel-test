-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2013 at 11:44 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aquatrader`
--
CREATE DATABASE IF NOT EXISTS `aquatrader` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aquatrader`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', 1, '2013-08-25 11:13:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pending', 2, '2013-08-25 11:13:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Delivered', 2, '2013-08-25 11:13:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Pending', 3, '2013-08-25 11:13:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Delivered', 4, '2013-08-25 11:13:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Delivered', 1, '2013-08-25 11:14:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Pending', 1, '2013-08-25 11:14:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 1, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 17, 3, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 19, 2, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 8, 1, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 35, 5, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 27, 2, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 22, 10, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 4, 18, 4, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 4, 19, 3, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 5, 27, 6, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 6, 8, 1, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 6, 32, 2, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 7, 29, 8, '2013-08-25 11:18:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `photo`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shubunkins', 'Slender in body like the comets and commons, but should show in color the violet, red, orange, yellow and with spots of black (calico colors). Also these colors should run into the fins too.There is 2 different kinds of this fish London and Bristols. ', 4, 'shubunkin.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Comets', 'Slender in body shape and have long single tail fin. They are very hardy fish and will grow on an average of 12-14" long.', 3.5, 'comet.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Sakura', 'Sakura goldfish is any fancy breed that sports the "matte" characteristic in which the majority of the scales are semitransparent but with a sprinkling of several metallic scales and carrying only red pigmentation on its otherwise pinkish-white body. In other words, a calico goldfish minus the black and the blue.', 4, 'sakura.jpg', 1, '2013-08-25 22:43:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Fantail', 'Egg shape body with long doubled or short tail fins. They are somewhat hardy fish. These are the starting point of all the fancy goldfish.', 4.5, 'fantail.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Pearlscale', 'Egg shaped goldfish but normally their mid region is much larger than most of the other egg shaped goldfish. The scales have a pearl raised appearance. They come in many different colors.', 6, 'pearlscale.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Oranda', 'Egg shaped body with head growth (wen). The wen growth should be well developed. Fin length should be long and flowing.', 12, 'oranda.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ryukin', 'Close looking to the fantail goldfish, but they have a hump back to them that starts just after the head of the goldfish.', 15, 'ryukin.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Moors', 'A velvetly black colored Goldfish with telescope eyes and an egg shaped body. They don''t come in any other colors than black.', 10, 'moor.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Pompom', 'Egg shaped fish either with or without fins. The Pom-Pons you see are the nostrils in excessive development. Some fish have it very lighly and others have very big ones.', 20, 'pompom.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Veiltail', 'Long flowing fins that droops off the body. The fins look like a veil of a bride head dress. Body is an egged shaped and the color of the fish comes in many colors.', 15, 'veiltail.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Lionhead', 'Egg shaped goldfish, but its back is pretty much in a straight line with head growth on it. No dorsal fin on this fish.', 25, 'lionhead.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Ranchu', 'Egg shaped goldfish, but its back is curved then you will see a tail tuck of 90* with head or with out growth on it. No dorsal fin on this fish.', 20, 'ranchu.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Bubble Eye', 'Egg shaped fish like the celestial with large, fluid-filled sacks under the eyes. These fish require special tanks with no sharp objects. No dorsal fin on this fish.', 30, 'bubbleeye.jpg', 1, '2013-08-25 10:43:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Striated Discus', 'Striated discus include some of the earliest tank-bred strains such as turquoise and red turquoise discus. Also included in this category are discus such as snakeskins which have finer striated patterns. Many wild-type discus also fit into this category. ', 50, 'striated.jpg', 2, '2013-08-25 10:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Solid Discus', 'The most popular of the solid fish include Marlboro Reds, Red Melons, and Blue Diamonds. These fish lack the striation in their gills, fins, and body that most other types of discus exhibit. Though not for everyone, the solid discus have become a favourite of many discus hobbyists.', 55, 'solid.jpg', 2, '2013-08-25 10:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Spotted Discus', 'Spotted discus, from the wild red spotted greens to the intensely colorful Asian varieties, are increasingly sought after and in demand. This variety includes the popular Leopard discus. Many new forms of these spotted discus have become available in the past few years.', 50, 'spotted.jpg', 2, '2013-08-25 10:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Pigeon Blood Discus', 'The pigeon blood variety is one of the largest and most diverse. Pigeon discus include fish with spots, striations, and solid color types and may be orange, red, blue, or even white. Pigeons are also easily distinguished by their bright red eyes.', 60, 'pigeonblood.jpg', 2, '2013-08-25 10:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Wild Caught Discus', 'Many hobbyists have a soft spot for the original discus -- wilds. These fish include browns, blues, greens, and heckels. The varieties and color morphs seem endless. Wild discus range from solid to spotted and display a huge array of different colors.', 80, 'wildcaught.jpg', 2, '2013-08-25 10:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Black Lace Angel', 'The Black Lace Angel is a strain of angelfish that is black in color with long flowing fins that are accentuated with a beautiful black lace.It prefers a well-planted tank of at least 30 gallons with soft, slightly acidic water. Rocks and driftwood can be added to the aquarium, but leave plenty of space for swimming. ', 20, 'blacklace.jpg', 3, '2013-08-25 10:54:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Gold Veil Angel', 'The Gold Veil Angel will add drama and brilliance to your community aquarium. A beautiful strain of angelfish with golden/white coloration, the Gold Veil Angel has long, thin fins that typically extend past the length of the body. These graceful features combined with its striking color make the Gold Veil Angel a true standout in planted aquariums.', 20, 'goldveil.jpg', 3, '2013-08-25 10:54:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Koi Angel', 'The Koi Angel is a strain of angelfish that has been bred for it''s mottled black and white coloration. Some may have gold markings on the head. The young specimens may have a red hue beneath the eyes that fades with age. These are beautiful angelfish, and like Koi, the coloration of each fish will be different.', 22, 'koi.jpg', 3, '2013-08-25 10:54:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Marble Veil Angel', 'The Marble Veil Angel is a strain of angelfish that has a black, white, and yellow marbled pattern. The fins are long and thin with delicate-looking webbing, and will typically extend past the length of the body.', 25, 'marbleveil.jpg', 3, '2013-08-25 10:54:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Cardinal Tetra', 'The Cardinal Tetra brings delicate beauty to any home freshwater aquarium. It has a bright blue stripe contrasted by a lower red stripe that runs the entire length of its body. This coloration differs from its cousin, the Neon Tetra, which has a red stripe that runs only halfway down the body. Equally as peaceful as Neon Tetras, Paracheirodon axelrodi will school together for a brilliant display o', 5, 'cardinal.jpg', 4, '2013-08-25 10:58:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Neon Tetra', 'The Neon Tetra is often described as the jewel of the aquarium hobby. It is easy to see why it is one of the most popular freshwater tropical fish. With their iridescent blue bodies and bright red tails, Paracheirodon innesi creates an exciting splash of color in any aquarium, especially when kept in schools of six or more. ', 5, 'neon.jpg', 4, '2013-08-27 03:37:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Rummy-Nose Tetra', 'The Rummy-Nose Tetra gets its name from the red blushing across its nose and face. But its beautiful coloration does not end there. Hemigrammus bleheri has a mirror-like silver body and a jet-black tail striped with white. This color pattern adds a simple, yet striking beauty to any freshwater aquarium. The Rummy-Nose Tetra is a peaceful omnivore that makes an excellent addition to community aquar', 7, 'rummynose.jpg', 4, '2013-08-25 10:59:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Blue Peacock Cichlid', 'Blue Peacock Cichlid: The Blue Peacock Cichlid, Aulonocara nyassae, comes from the rocky, sandy shores of Lake Malawi, Africa. The males are a bright yellow to metallic blue, whereas, the females take on a drab brown to gray color.', 30, 'bluepeacock.jpg', 5, '2013-08-25 11:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Electric Yellow Cichlid', 'The Electric Yellow Cichlid is set apart from other African Cichlids by its striking electric yellow coloration. It injects an irresistible splash of bold color to the cichlid aquarium. Mature specimens flaunt contrasting horizontal black stripes and vertical bars to provide additional visual interest.', 35, 'electricyellow.jpg', 5, '2013-08-25 11:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Bumblebee Cichlid', 'The Bumblebee Cichlid, also known as the Hornet Cichlid, or Chameleon Cichlid comes from deepwater caves in Lake Malawi, Africa. The coloration of the Bumblebee is a golden yellow background with vertical brown to black bars running the length of its body.', 35, 'bumblebee.jpg', 5, '2013-08-25 11:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Electric Blue Cichlid', 'The Electric Blue African Cichlid creates a gorgeous, colorful focal point in the freshwater aquarium. It has the typical sleek, bullet-shaped body common to the Cichlidae family. The active Electric Blue African Cichlid seems equally content guarding its territory or perusing the perimeter of your aquarium.', 33, 'electricblue.jpg', 5, '2013-08-25 11:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Alternanthera ''Rosanervig''', 'Vibrant pink leaves with light nerves characterise this vigorous culture form. The plant has a compact form of growth and the stalk does not grow as strong as other Alternanthera. Suitable for planting in the mid-section of the aquarium – and even in the front when cut well. As for all Alternanthera, good light and fertilizer conditions, as well as CO2 additive is material for growth and colour de', 10, 'alternanthera.jpg', 6, '2013-08-25 11:07:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Bacopa monnieri ''Compact''', 'This culture form of the stalk plant Bacopa Monnieri is more compact and, under good light conditions, almost a creeping plant. By pinching off all vertical growing shoots, the plant can maintain a low and close growth, since it willingly creates a large number of side shoots.', 8, 'bacopa.jpg', 6, '2013-08-25 11:07:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Bolbitis heudelotii', 'Bolbitis comes from West Africa, a fern with very beautiful transparent green leaves, 15-40 cm tall and wide. When planting do not cover the rhizome because it will rot, and it is best to plant Bolbitis heudelotii on a root or stone. Keep the plant in position with fishing line until it has gained a hold. Easy to propagate by splitting the horizontal rhizome. Growth can be increased considerably b', 12, 'bolbitis.jpg', 6, '2013-08-25 11:07:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Goldfish', '2013-08-25 10:29:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Discus', '2013-08-25 10:29:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Angelfish', '2013-08-25 10:29:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tetras', '2013-08-25 10:29:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Cichlids', '2013-08-25 10:29:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Plants', '2013-08-25 10:30:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'peter.smith', 'peter.smith@gmail.com', 'Peter', 'Smith', '1', '2013-08-25 22:56:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'paul.jones', 'paul.jones@gmail.com', 'Paul', 'Jones', '1', '2013-08-25 22:56:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'mary.stevens', 'mary.stevens@gmail,com', 'Mary', 'Stevens', '1', '2013-08-25 22:56:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'luke.baker', 'luke.baker@gmail.com', 'Luke', 'Baker', '1', '2013-08-25 22:56:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
