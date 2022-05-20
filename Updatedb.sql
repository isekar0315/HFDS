-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 04:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `hfds`
--
CREATE DATABASE IF NOT EXISTS `hfds` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hfds`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'Indu Sekar', '123@gmail.com', '9500170406', 'Chennai', '202cb962ac59075b964b07152d234b70'),
(6, 'Kumaran Satheesh', 'kumaran@gmail.com', '9500170406', 'Chennai', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(2) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `calories` int(4) NOT NULL,
  `fat` int(3) NOT NULL,
  `images` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`id`, `name`, `price`, `description`, `category`, `calories`, `fat`, `images`, `status`) VALUES
(1, '6 oz Sirloin + Broccoli and Garlic Mashed Potato', 12, 'It\'s your day off from cooking, so why not indulge in a nice, juicy steak? The way to go at Applebee\'s to keep your calories in check is to pick an item that allows you to choose your sides. Your main should be this low-fat, iron-rich cut of meat, which is perfect for a toned body. Go light with a 100-calorie side of steamed broccoli, and you can still indulge in some garlic mashed potatoes for all under 600 calories and 1,900 milligrams of sodium', 'Salads', 540, 26, '6-oz-sirloin-garlic-mashed-potatoes-steamed-broccoli.jpg', 'Available'),
(2, 'Grilled Salmon with Green Beans and Yellow Rice', 12, 'Grilled fresh fish is always a much smarter meal choice than anything that is fried, and paired with green beans and yellow rice, you have a meal that is truly satisfying.', 'Seafood', 650, 31, 'breeze-salmon.jpg', 'Available'),
(3, 'Burrata Bruschetta Pizza (Per Slice)', 11, 'This is a vegetarian pizza that features a blend of Pecorino Romano, mozzarella, and basil pesto that is topped with diced tomatoes, burrata cheese, and a drizzle of balsamic glaze. It\'s the pizza that is lowest in sodium per slice you can get at this Italian restaurant', 'Pizza', 180, 6, 'bruschetta-pizza.jpg', 'Available'),
(4, 'Enlightened Cherry Chipotle Glazed Salmon\n\n', 11, ' Your best bet us the oven-roasted salmon that is served in a sweet, savory cherry chipotle glaze alongside roasted asparagus and fire-roasted red pepper, tomato and spinach couscous', 'Seafood', 580, 26, 'brewhouse-salmon.jpg', 'Available'),
(5, 'Rise & Shine Breakfast', 10, 'Although we\'d prefer getting in a serving of veggies in an omelet, these three-egg monsters aren\'t necessarily waistline-friendly. The Goat Cheese Veggie Omelet, for example, adds up to a whopping 1,050 calories and over 3 grams of trans fat. Instead, keep it simple with the classic Rise & Shine breakfast. It\'s one of the few ways you can grab breakfast for under 1,000 calories', 'Breakfast', 640, 49, 'rise-and-shine-breakfast-healthiest.jpg', 'Available'),
(7, 'Bianca Pizza', 9, 'This is a typical white pizza that features garlic-infused olive oil and no tomato sauce in sight, which knocks out the chance of having any extra sugars.\n\n', 'Pizza', 180, 8, 'bianca-pizza.jpg', 'Available'),
(8, 'Shrimp Scampi Zucchini', 9, 'If you\'re not sharing dishes, you can save a significant amount of calories at CPK by going with the Shrimp Scampi Zucchini with multigrain penne', 'Noodles', 480, 26, 'zucchini-shrimp-scampi.jpg', 'Available'),
(9, 'Johnny Rocco Salad', 8, ' Your best bet is going with this delicious menu item, the Johnny Rocco Salad. Although it is high in sodium, it\'s one of the lower-calorie options and offers up a nice serving of protein.', 'Salads', 540, 42, 'johnny-roccos-salad.jpg', 'Available'),
(10, 'Skinnylicious Grilled Turkey Burger', 8, 'if you\'re looking to reduce your saturated fat intake, which is good for your gut, turkey is a leaner option', 'Burger', 560, 30, 'factory-turkey-burger.jpg', 'Available'),
(11, 'Country Morning Breakfast', 7, 'This breakfast is simple?just two eggs and grits?so it\'s easy to see why it\'s the best option on the menu! It does come with all the fixings though?two biscuits, gravy, butter, and jam, which will elevate this dish?and not in the best way. Skip all the extras and have just one biscuit, as it will only add on another 160 calories.', 'Breakfast', 240, 12, 'country-morning-breakfast.jpg', 'Available'),
(12, 'Wise Choice Snow Crab Legs', 7, 'We offers an entire section of their menu called \"Wise Choice\" that is made up of better-for-you versions of their staples. The Snow Crab Legs, for example, are served with a cocktail sauce instead of butter. Pair this with a salad, and you\'re in for a fresh, low-cal dinner.', 'Seafood', 160, 2, 'snow-crab-legs.jpg', 'Available'),
(13, 'Small Salmon with Mango Salsa  & Jasmine Rice', 10, 'We\'ve chosen salmon as our fish of choice, a fish that\'s full of omega-3s: a fatty acid whose anti-inflammatory properties have been shown to protect your brain and heart. We\'ve topped it off with the low-calorie mango salsa instead of the higher-calorie, seemingly innocuous lemon butter', 'Seafood', 590, 24, 'salmon-mango-salsa.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(10) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `food_id` int(3) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` int(3) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `order_id`, `food_id`, `name`, `price`, `quantity`) VALUES
(83, '1652375134', 2, 'Grilled Salmon with Green Beans and Yellow Rice', 12, 10),
(84, '1652375134', 3, 'Burrata Bruschetta Pizza (Per Slice)', 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `delivery_status` tinyint(1) DEFAULT 0,
  `order_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `mobile`, `email`, `delivery_status`, `order_date`) VALUES
('1652375134', 1, 'Indu Sekar', 'Chennai', '9500170406', '123@gmail.com', 0, '2022-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodlist_id` (`food_id`),
  ADD KEY `orderlist_ibfk_2` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foodlist`
--
ALTER TABLE `foodlist`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;
