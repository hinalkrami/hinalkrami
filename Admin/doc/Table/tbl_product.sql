-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenheaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(4) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_photo_path` varchar(100) NOT NULL,
  `pro_photo_path2` varchar(400) NOT NULL,
  `pro_photo_path3` varchar(400) NOT NULL,
  `pro_price` decimal(6,0) NOT NULL,
  `pro_details` varchar(3000) NOT NULL,
  `category_id` int(6) NOT NULL,
  `subcategory_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_photo_path`, `pro_photo_path2`, `pro_photo_path3`, `pro_price`, `pro_details`, `category_id`, `subcategory_id`) VALUES
(35, 'Luck Jade Plant', 'luckjade-1.jpeg', 'luckjade-2.jpeg', 'luckjade-3.jpeg', 430, ' Decorative Good Luck Jade Live Indoor Plant with Blue Metal Pot Vase for Living Room, Bedroom, Balcony, Table Corner, Office/Home Decoration.\r\nJade plant is perfect for those looking to incorporate the principles of Feng Shui into their home decor. According to this ancient practice, the Jade plant brings good luck, prosperity, and harmony to your living space.', 10, '13'),
(36, 'Peace Lily Plant', 'lily1.jpeg', 'lily3.jpeg', 'lily2.jpeg', 300, 'OIHOLO Peace Lily Or Spathiphyllum Plant Indoor Outdoor Plant Air Purifier Oxygen Supplier Good Luck with Round Pot for Living Room/Bedroom/House/Office (Pack Of 2)', 10, '16'),
(37, 'Venice Planter', 'Venice Planter.jpeg', 'venice planter 4.jpeg', 'venice plant2.jpeg', 399, 'The Venice Pot is a timeless planter made of recycled plastics that have been treated to give you the best quality without impacting the environment negatively in any way. Its tapered design is a classic shape for flower pots and plant pots since the turn of time. The planter lends a luxurious and high end feel to any plant. It is highly durable, easy to handle, and fits any decor theme like it was made for it. Its clean lines, premium colour, and ergonomic design make the Venice plant pot a great buy for every gardener. The planter can be used both as an indoor planter as well as an outdoor planter for all weather conditions.\r\n\r\n', 11, '18'),
(38, 'Red Rose Plant', 'redrose1.jpeg', 'redrose3.jpeg', 'redrose2.jpeg', 400, 'Greenery Premium Red Rose Flower Live Plant with Pot \r\nExotic Blooms for Your Garden Delight with Pot ', 10, '14'),
(39, 'Plant Hangers', 'planthangers1.jpeg', 'planthangers3.jpeg', 'planthangers2.jpeg', 300, 'ARTICRAFT Aster Macrame Plant Hangers, Unique Designs, Handmade Cotton Rope Hanging Planters Flower Pots Holder Stand, for Indoor Outdoor Boho Home Décor Without Pot (NEST, Pack of 1) White', 13, '35'),
(40, 'Radermachera Bonsai Plant', 'Radermachera Bonsai Plant.jpeg', 'rbonsai2.jpeg', 'rbonsai3.jpeg', 329, 'India Radermachera Bonsai Plant (China Doll Plant) \r\nIndoor Oxygen And Air Purifier Garden Plant(1 Healthy Live Radermachera, China(1 Plant)', 10, '16'),
(41, 'Turtle Vine', 'turtlevine2.jpeg', 'turtlevine3.jpeg', 'Turtle Vine.jpeg', 999, 'Turtle Vine With Hanging Pot: 52 - 60 cm\r\nThe Turtle Vine Plant is a delicate perennial that grows quickly and profusely with minimum care. If you are a gardening novice and want to add beautiful hanging plants that require minimum care, the turtle vine is your answer. This resilient variety thrives in bright indirect light and grows with abandon and is extremely easy to propagate', 10, '15'),
(43, 'Plant climbing clip', 'plantclip3.jpeg', 'plantclip.jpeg', 'plantclip2.jpeg', 30, 'WALL PLANT CLIMBING CLIP WIDELY USED FOR HOLDING PLANTS AND POULTRY PURPOSES AND ALL ( BOX )\r\n30 pcs plant climbing clips, can be widely used in green house, garden, balcony, etc. Also can be used as cable organizer, wire organizer etc in home and office.\r\nEasy to use and the convenient self adhesive design make the clip easier to stick or remove, and as the good sticking performance, the clip can be reused for 2- 3times. Suitable for all kinds of smooth walls, glass, marble and solid wood walls, not suitable for frosted walls.\r\n', 13, '36'),
(47, 'Money Plant', 'moneypt1.jpeg', 'moneypt2.jpeg', 'moneypt3.jpeg', 200, 'This plant with its beautiful golden heart shaped leaves is believed to bring good luck & prosperity to your home according to Feng Shui.\r\nWatering requirement for the plant is generally twice a week. But it is ideal to water it whenever the top layer of the soil feels dry.', 10, '16'),
(49, 'Cherry Plant Seeds', 'cherryseeds3.jpeg', 'cherryseeds.jpeg', 'cheeryseeds2.jpeg', 250, 'Cherry Fruit Seed\r\nRare Surinam Cherry Fruit Seedling Live Plant\r\n1 Healthy Live Plant\r\nGood Plant for Growing\r\nSuitable for Indian Climate', 12, '12'),
(51, 'Pebbels', 'Polished stone.jpg', 'Polished stone3.jpeg', 'polished stone2.jpeg', 499, 'Foodie Puppies Natural Polished Gravel Stone (5Kg) (1.5cm - 3.5cm) River Rocks Decorative Stones, Filler for Plants, Aquariums/Fish Tanks, Crafting, Landscape - Multipurpose Uses Stones', 13, '29'),
(52, 'Plant Supporter Stick', 'pstick1.jpeg', 'plant supporter2.jpeg', 'plant supporter3.jpeg', 120, '3 feet Premium Natural Teak Wood Plant Support Sticks - Garden Sticks for Straightening Training and Supporting Plants - Strong and Durable Solution for Healthy Growth (12 pcs)	', 13, '36'),
(55, 'Artificial Areca Palm', 'Areca.jpeg', 'Areca1.jpeg', 'Areca2.jpeg', 299, 'Blooming Floret Artificial Areca Palm for Home Decor/Office Decor/Gifting \r\nBlooming Floret Artificial Areca Palm containing the 12 leaves a stem along with a plastic pot. The leaves, stem & the pot will be separated, you just have to fix the leaves to the stem and then fit the stem into the pot with some artificial soil or with some beautiful pebbles & stones in order to hold the plant’s stem steady inside the pot. You can also place it in a planter of your own choice to match it up with the interiors.', 10, '17'),
(56, 'Ceramic Pot', 'ceramicpot.jpeg', 'ceramicpot2.jpeg', 'ceramicpot3.jpeg', 300, 'BRAHMZ Ceramic Planters, Table Top Indoor Planter Pot White Ceramic Planter for Indoor Plants and Succulents Pot (Small)\r\nHandcrafted | High Temperature | Indoor Size Ceramic Planter | Flower Pot for small Plants | Best Suitable for Indoor, Outdoor, Herbs or Succulent Plants', 11, '19'),
(57, 'Arbian Jasmin / White Mogra Flower Plant', 'jasmin3.jpeg', 'jasmin.jpeg', 'jasmin2.jpeg', 350, 'White Mogra/Arabian Jasmine Aromatic Flower Plant For Home Garden.\r\nsuitable for garden/terrace/balcony gardening\r\nThe fragrance of its blossoms is believed to have a calming effect', 10, '16'),
(58, 'Decorative Pot', 'decorative.jpeg', 'decorative.jpeg', 'decorative.jpeg', 555, 'IED RIBBONS Decorative Wall Shelf with Flower Pot and Artificial Flowers for Wall Home Living Room Decoration (37 Cm X 12 Cm)', 11, '22'),
(59, 'Pink Plant', 'pinkplant-1.jpeg', 'pinkplant-3.jpeg', 'pinkplant-2.jpeg', 449, 'Stunning Pink Aglaonema Plant: Add a burst of vibrant color to your indoor space with our gorgeous pink Aglaonema variety. Plant with Pot Height - 25-30 cm\r\nEasy Care and Maintenance: Enjoy the beauty of this low-maintenance plant that thrives in various light conditions. Perfect for beginners.', 10, '14'),
(60, 'Pot', 'Metalic Diamond Planter .jpeg', 'Metalic diomond planter2.jpeg', 'Metalic diomond planter 3.jpeg', 299, 'Diamond Metal Planter, Black, Table Top Designer Metallic  Gold Metal Stand for Flowers & Plants Pots Livingroom, Balcony, Pot for Indoor Outdoor Use, Pot Size: 11 * 11 * 7.5Cm', 11, '20'),
(61, 'Rajnighandha Flower Seeds', 'rajniflowerseeds1.jpeg', 'rajniflowerseeds3.jpeg', 'rajniflowerseeds2.jpeg', 200, 'Seeds Rajnigandha Double Flowering Bulbs (White, 10 Bulbs) ,\r\nFragrant Flowers Grow for Pots \r\n Flower Plants Bulbs for Indoor Home Decor \r\nNight Bloom Flowering Bulbs for Home Garden', 12, '24'),
(62, 'Pot', 'fiberpot.jpeg', 'fiberpot2.jpeg', 'fiberpot3.jpeg', 350, 'Earth-Friendly Deco 7\" Self-Watering pots and Planters | Bamboo Based | UV Protected | for Indoor, HomeDecor, Outdoor, Balcony & Garden | Sand Castle', 11, '34'),
(63, 'Pudina Seeds', 'Pudinaseeds.jpeg', 'pudinaseeds2.jpeg', 'pudina3.jpeg', 99, 'Pudina Herbs Seeds For Terrace & Home Gardening (Pack of 50 Seeds)\r\nThe best seed starting mix is made of perlite, vermiculite, and sphagnum peat moss::Watering: seeds normally need to be watered at least once per day to keep the soil moist, not permitting it to dry out.\r\n', 12, '26'),
(65, 'Wooden pot', 'Wooden pot.jpg', 'wpot.jpeg', 'Wooden pot.jpg', 780, 'Wooden Plant Pot with High Quality and Exachangblity available\r\nSmall Teak Wood Plant Pot - Round Wooden Vase Home Gardening - Wooden Jar - Kitchen Utensil Holder - Indoor Planter - Housewarming Gift', 11, '21'),
(83, 'Muskmelon Seeds', 'mmelon.jpeg', 'Muskmelon2.jpeg', 'MuskmelonSeeds3.jpeg', 199, 'Magaz Kharbuja, Muskmelon Seeds\r\nPlant or Animal Product Type	MuskmelonBrand	pmw\r\nMaterial Feature Vegetarian\r\nColour	NIKHITA\r\nNet Quantity	30.00 count\r\nSoil Type	Loam Soil\r\nNumber of Pieces 30', 12, '12'),
(84, 'Plastic Pot', 'plasticpot3.jpeg', 'plasticpot1.jpeg', 'plasticpot2.jpeg', 399, 'NKULTURE Plastic Round Flower Pots for Home Planters, Terrace, Garden Etc | Pack of 05 | Multicolor | Suitable for Home Indoor & Outdoor Gardening Plants', 11, '18'),
(85, 'Pebbles', 'ocenbluepebble1.jpeg', 'ocenbluepebble2.jpeg', 'ocenbluepebble3.jpeg', 399, 'Leafy Tales Glass Pebbles Ocean Blue Color for Home and Garden Decoration, Art and Craft, Aquarium Vase Filler (500 GMS)', 13, '29'),
(88, 'Metal Plantation Jug ', 'jug.jpeg', 'jug2.jpeg', 'jug1.jpeg', 550, 'Kraft Seeds Water Can (Purple, Piece of 1, 2 Liter) ,\r\nCurvy Handle ,\r\nFloral Printed , Metal Rust Free ,\r\nComfortable Handle ,\r\n Watering Can , Quality Metal , Lightweight ,\r\n Indoor and Outdoor Watering', 13, '33'),
(89, 'Aloevera Plant', 'Aloe Vera Green Mini Plant.jpeg', 'Aloevera3.jpeg', 'Aloevera1.jpeg', 120, 'Garden Art Aloe Vera Easy Care Succulent Live Plant, 6\" Pot, Indoor Air Purifier Healthy Medicinal Plant With Nursery Pot \r\nIndoor or outdoor, they are beautiful and easy to care for; ideal size for shelves, tabletops, and counters in the dorm, home, office, or garden', 10, '13'),
(90, 'Plant Hangers', 'plantstand4.jpeg', 'vashandle2.jpeg', 'vashandle3.jpeg', 120, 'HabereIndia Jute Organic Indoor Plant Basket, Beige, 20*20 CM Without Handle', 13, '35'),
(91, 'Ballon Plant', 'ballon1.jpeg', 'Ballon plant 3.jpeg', 'Ballon plant2.jpeg', 399, 'Set of 2 organic Platycodon Grandiflorus growing season Balloon Planting And CareWhite & Blue) \r\nFlower in 4 Garden perfect Living Live Nursery Plant Nursery Seedless\r\nDeer Resistant, Extended Bloom Time, Fragrant, Air Purification, Rabbit Resistant\r\n', 10, '17'),
(93, 'Ashwagandha Plant Seeds', 'Ashwagandhaseeds2.jpeg', 'Ashwagandhaseeds1.jpeg', 'Ashwagandhaseeds3.jpeg', 156, 'Ashwagandha Seeds For Farming Pack Of 29\r\nAshwagandha is an ancient medicinal herb with multiple possible health benefits. Study findings suggest that it may help reduce anxiety and stress, support restful sleep, and even improve cognitive functioning in certain populations. Ashwagandha is considered relatively safe for most people.\r\nThe seeds are usually sown about 1 to 3 cm deep. Seeds should be covered with light soil in both the methods. Line to line distance of 20 to 25 cm and plant to plant distance of 8 to 10 cm should be maintained. According to soil fertility, in fertile soil, distance can be extended.', 12, '26'),
(95, 'Garden Sprikler', 'spriklering.jpeg', 'sprinkler2.jpeg', 'sprinkler1.jpeg', 70, 'Garden Sprinkler 360 ° Rotating Adjustable Round 3,4,5 Arm Lawn Water Sprinkler for Watering Garden Plants/Pipe Hose Irrigation Yard Water Sprayer\r\nThree arms + ABS plastic rotary lawn sprinkler, 360 degree rotating action, efficient, quick watering providing better coverage saving you time and water.\r\nLong spray distance - Efficiently water your lawn up to 26ft-32.8ft distance with international standard pipes.\r\n', 13, '33'),
(97, 'Grapes Plant', 'grapes.jpeg', 'grapes2.jpeg', 'grapes3.jpeg', 299, 'Green view New Seedless Sweet Green Grape Fruit Air Layered plant.\r\nThis Variety can be Store for longer Time and As a Result Can sold for Better Market Price.\r\nEasy to Grow With Less Maintaince cost. It Can be grown in All Kind Of Indian climate-weather conditions. Must Plant and Wait Peacefully : A Plant Is not a Product. Its Actual Growth Can Be Find After 20 Days after Planting.\r\n   ', 10, '32'),
(98, 'Lotus Seeds', 'lotussd.jpeg', 'lotusseeds3.jpeg', 'lotusseeds.jpeg', 120, 'All Mix Colors…(Pack Of 20 Seeds) Growing Lotus Brings Positive Vibrations According To Vaastu Shastra .Best Suitable for Terrace Gardening ,Grow bag cultivation, Kitchen Gardening ,Terrace Gardening and Roof Top Balcony Gardening.\r\n.Do not use for food, feed, or oil purposes ,Seeds are only for Agriculture and plantaion purpose', 12, '24'),
(99, 'LadyFinger Vegetable seeds', 'ladyfingerseeds1.jpeg', 'ladyfingerseeds2.jpeg', 'ladyfingerseeds1.jpeg', 20, 'Lady Finger Seeds (Okra Seeds) (10 seeds)\r\nTake a Growbag and fill it with Cocopeat,\r\nSprinkle the seeds around the Growbag.\r\nFill the hole with Cocopeat lightly and spray with water,\r\nWater every day,\r\nSeeds will germinate within a week,\r\nFull sunlight is needed,', 12, '25'),
(100, 'Seeds Kit - grrenheaven', 'skit1.jpeg', 'seedskit3.jpeg', 'seedskit2.jpeg', 149, 'Seeds for Tomatoes and Pumpkin | Kitchen Gardening | Fresh Vegetables at Home (10 + 10 seeds)\r\nHigh germination rate of Tomatoes and Pumplin\r\nUse good growth medium like cocopeat or vermicopost. You can also directly sow it on soft soil and sprinkle water\r\nKeep the soil or the growth medium moist. ', 12, '23'),
(101, 'Wooden Pot', 'woodenpot-3.jpeg', 'woodenpot-1.jpeg', 'woodenpot-3.jpeg', 449, 'Decorative Artificial Green Money Plant with Wooden Pot for Home Garden Living Room Kitchen Table Top Decorations (Pack of 1, Green, 25form)\r\nfor those who suffer from allergies, our artificial green money plants offer a hypoallergenic alternative to real plants.', 11, '21'),
(102, 'Hanging Plant', 'hangingplant1.jpeg', 'hangingplant2.jpeg', 'hangingplant3.jpeg', 299, 'Home Artificial Vine Plants with Pot Natura ,\r\n Look & Plastic Material Easy Home Décor with Small Size Pot\r\n Size 27 X 75 X 7 Cm, Pack of 1 (Green)\r\nMATERIAL: Plastic, COLOR: Green', 10, '15'),
(103, 'Low Light Plant ', 'lowlightplant.jpeg', 'lowlightplant1.jpeg', 'lowlightplant.jpeg', 199, 'Low Light Plant Live Gardening Home\r\nIncluded Components: 1 Nagdon Live Plant, Plastic Pot, Corrugated Box\r\nWater the plant daily to the required levels, Provide nutrition compost, fertilizers, manures every week for better growth', 10, '14'),
(104, 'Guava Fruit seeds', 'guava.jpeg', 'guavaseeds1.jpeg', 'guavaseeds2.jpeg', 149, 'Guajava/ Amrud Fruit Tree Seeds (100 Gms Seeds)\r\nHome Garden / Agricultural Superior quality fresh seeds pack\r\nGuava, Psidium guajava, is an evergreen shrub or small tree in the family Myrtaceae grown for its edible fruits.', 12, '12'),
(107, 'Fiber unique Turtle Pot', 't1.jpeg', 'turteplanter-2.jpeg', 'turtleplanter-3.jpeg', 1299, 'Turtle Planter for Garden,Balcony or Home Decor\r\nProduct dimension : L x W x H - 14.7 x 10.6 x 11.4 inches, Pot Dia : 5.1 inches, Pot Depth : 5.7 inches , \r\nPACKAGE - Only 1 pc Turtle planter without plant! Each planter comes with a draining hole that allows water to flow through the soil and into the saucer below\r\n\r\n\r\n', 11, '34'),
(108, 'Cherry Plant', 'cherryplant1.jpeg', 'Cheery Plant.jpeg', 'cheeryseeds2.jpeg', 122, 'Cherry Fruit Plant  (Hybrid, Pack of 1)\r\nThis sis fruit type plant and suitable for outdoor plantation also it contain Brow Bag type with 200mm height', 10, '32'),
(109, 'Vegrtable DIY kit', 'kit4.jpeg', 'kit2.jpeg', 'kit3.jpeg', 510, 'Do it yourself , Grow your own Veggies\r\n1) Organic Seed Packets\r\n2) 4 inch plastic pots- Perfect for Starting your seeds then transferring them into your garden.\r\n3) Pack of Organic Soil\r\n4) 12 x 12 inch grow bag\r\n5) Step-by-step Instructions\r\n6) organic manure\r\n\r\n', 12, '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
