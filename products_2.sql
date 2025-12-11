SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `products_2` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `products_2` (`id`, `image`, `title`, `price`, `description`, `category`, `meta_description`, `meta_keywords`) VALUES
(1, 'ps5.webp', 'Sony Playstation PS5 Console 825GB CFI-1018B 01 Reg.3 Digital Edition', 79.99, 'experience lightning fast loading with an ultra-high speed SSD', 'playstation', 'product description', 'product keywords'),
(2, 'ps5 slim.jpg', 'PlayStation PS5 Slim Console Disc Version', 65.95, 'Slim Design With PS5, players get powerful gaming technology packed inside a sleek and compact console design', 'playstation', 'product description', 'product keywords'),
(3, 'ps4.webp', 'Sony PlayStation 4', 49.95, 'The PS4 console, delivering awesome gaming power, incredible entertainment and vibrant HDR technology', 'playstation', 'product description', 'product keywords'),
(4, 'ps4 slim.jpg', 'Playstation 4 Slim', 45.99, 'The PS4 console, delivering awesome gaming power, incredible entertainment and vibrant HDR technology', 'playstation', 'product description', 'product keywords'),
(5, 'E33.webp', 'Clair Obscur: Expedition 33', 39.99, 'Lead the members of Expedition 33 on their quest to destroy the Paintress so that she can never paint death again.', 'PS Games', 'product description', 'product keywords'),
(6, 'MHW.png', 'Monster Hunter Wilds', 49.95, 'Experience dynamic, ever-changing environments in a world with two faces', 'PS Games', 'product description', 'product keywords'),
(7, 'Nightreign.png', 'Elden Ring: Nightreign Standard Edition', 39.95, 'NIGHTREIGN is a standalone adventure within the ELDEN RING universe, crafted to bring a new gaming experience.', 'PS Games', 'product description', 'product keywords'),
(8, 'Arise.webp', 'Tales of Arise', 39.99, '300 years of tyranny. A mysterious mask. Lost pain and memories.', 'PS Games', 'product description', 'product keywords'),
(9, 'ns2.png', 'Nintendo Switch V2 Neon Blue and Neon Red', 450, 'Play your way with the Nintendo Switch gaming system. Whether you’re at home or on-the-go, solo or with friends', 'Nintendo', 'product description', 'product keywords'),
(10, 'ns oled.png', 'Nintendo Switch OLED Model[Neon Blue/Neon Red]', 299.99, 'The new system features a vibrant 7-inch OLED screen, a wide adjustable stand, a dock with a wired LAN port, 64 GB of internal storage, and enhanced audio.', 'Nintendo', 'product description', 'product keywords'),
(11, 'ns lite.png', 'Nintendo Switch Lite Coral Pink with JYS Handle grip', 160.95, 'Introducing Nintendo Switch Lite, a new version of the Nintendo Switch system that’s optimized for personal, handheld play.', 'Nintendo', 'product description', 'product keywords'),
(12, 'ns white.jpg', 'Nintendo Switch (White)', 299.99, 'The new system features a vibrant 7-inch OLED screen, a wide adjustable stand, a dock with a wired LAN port, 64 GB of internal storage, and enhanced audio.', 'Nintendo', 'product description', 'product keywords'),
(13, 'op.png', 'Octopath Traveler', 40, 'Eight travelers. Eight adventures. Eight roles to play in a new world brought to life by Square Enix.', 'NS Games', 'product description', 'product keywords'),
(14, 'op2.webp', 'Octopath Travaler 2', 50, 'This game is a brand-new entry in the OCTOPATH TRAVELER series', 'NS Games', 'product description', 'product keywords'),
(15, 'fe3h.png', 'Fire Emblem: Three Houses', 149.95, 'Here, order is maintained by the Church of Seiros from its headquarters at Garreg Mach Monastery, home to the Officers Academy', 'NS Games', 'product description', 'product keywords'),
(16, 'botw.png', 'Zelda Breath Of The Wild', 50, 'Step into a world of discovery, exploration, and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series.', 'NS Games', 'product description', 'product keywords'),
(17, 'ps controller.png', 'DualSense Edge Wireless Controller', 69, 'Built with high performance and personalization in mind, this new PS5 controller invites you to craft your own unique gaming experience so you can play your way.', 'Accesories', 'product description', 'product keywords'),
(18, 'ps pulse.png', 'Sony PlayStation Pulse Elite Wireless Headset Midnight Black', 119, 'Studio-inspired drivers reproduce soundscapes with ultra-low distortion to deliver rich details.', 'Accesories', 'product description', 'product keywords'),
(19, 'nsjc.png', 'Nintendo Switch Joycon Controller L/R (Blue/Yellow)', 15.95, 'One controller or two, vertical or sideways, motion controls or buttons? JoyCon and Nintendo Switch give you total gameplay flexibility.', 'Accesories', 'product description', 'product keywords'),
(20, 'nsusb.png', 'Nintendo Switch USB AC Adaptor', 9.99, 'Official Nintendo USB Power Adapter', 'Accesories', 'product description', 'product keywords');


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


CREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

