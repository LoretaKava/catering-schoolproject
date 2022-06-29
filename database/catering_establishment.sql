-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 05:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering_establishment`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `product_name`, `product_price`, `user_id`) VALUES
(2, 4, 'OPPO Reno5', 15000, NULL),
(3, 3, 'Oppo A37', 20000, NULL),
(4, 7, 'I Phone 6S', 25000, NULL),
(9, 3, 'Oppo A37', 20000, 0),
(10, 2, 'Oppo A20', 13000, 0),
(18, 1, 'Egg Pratha', 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `food_establishment_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `food_establishment_id`) VALUES
(7, 'BreakFast', 'Breakfast is the most important part of the meal and body absorbs nutrients faster and better since the body will be craving for energy. Breakfast can be between 7 am to 9 am or within two hours of getting up', 10),
(8, 'Dinner', 'Dinner foods', NULL),
(9, 'Lunch', 'description', NULL),
(10, 'Fast foods', 'Hygienic food', NULL),
(12, 'BreakFast', 'Breakfast is the most important part of the meal and body absorbs nutrients faster and better since the body will be craving for energy. Breakfast can be between 7 am to 9 am or within two hours of getting up', 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `query_type` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `query_type`, `message`, `user_id`) VALUES
(8, 'Umar', '1234567890', 'Book a table', 'i want to book a table at my sunday breakfast', 1),
(10, 'Umar', '03088684021', 'Complaint', 'The food quality was not so good', 1),
(11, 'Afazl', '123456789', 'Send a query', 'what is your opening hours', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(255) NOT NULL,
  `dish_id` int(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `dish_id`, `user_id`) VALUES
(11, 2, 1),
(15, 1, 1),
(16, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `image`, `price`, `rate`, `category_id`) VALUES
(1, 'Egg Pratha', 'Its eggs. No word on how people like them to be prepared, but fully 65 percent of the Americans surveyed ranked eggs as their top breakfast pick, while coffee and cereal followed with 58 percent and 56 percent, respectively.', 'download (4).jpg', 120, NULL, '7'),
(2, 'Sweet & Savory Pancake Puffs', 'The best breakfasts have carbohydrates, protein, healthy fats, and fiber. In this combo, the oatmeal gives you complex carbs and fiber, keeps your blood sugar under control, and helps maintain ', 'download (3).jpg', 150, NULL, '7'),
(3, 'Paratha', 'Juicy pratha', 'download (3).jpg', 300, NULL, '9'),
(5, 'Samosa', 'crispy,  spicy', 'download (3).jpg', 90, NULL, '10'),
(7, 'Chicken Qourma', 'Chicken Qourma description', 'download (4).jpg', 120, NULL, '7');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone_number` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address`, `city`, `phone_number`, `total`, `user_id`, `status`) VALUES
(5, 'Umar', 'Habib', 'lahore', 'lahore', 2147483647, 53120, 1, 'Pending'),
(6, 'Ali', 'Fraz', 'lahore', 'JUmber', 2147483647, 360, 2, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`id`, `name`, `address`, `code`) VALUES
(10, 'Pc Hotel', 'Islamabad', 'IS90'),
(12, 'The Avary', 'Lahore', 'AV879'),
(13, 'Al-Barkat', 'Jumber', 'ALB765');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` longtext DEFAULT NULL,
  `role` varchar(255) DEFAULT 'User',
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `role`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345', '12345678', 'Admin', 'Active'),
(2, 'User', 'user@gmail.com', '12345', '2147483647', 'User', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
