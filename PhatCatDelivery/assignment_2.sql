-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 06:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `card_info` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `card_info`, `age`, `mobile_number`, `address`, `account_balance`) VALUES
(1, 'leigh', 'beeton', 'leigh', '1234', '123456', 22, 412444575, '1 dally st mowbray', 55);

-- --------------------------------------------------------

--
-- Table structure for table `items_db`
--

CREATE TABLE `items_db` (
  `item_code` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_no` int(11) NOT NULL,
  `item_code` int(11) DEFAULT NULL,
  `column_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `collection_time` time DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `items_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `order_no`, `price_total`, `collection_time`, `discount`, `items_list`) VALUES
(1, 1, 12, '12:00:00', NULL, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `business_code` int(11) DEFAULT NULL,
  `open_hours` time DEFAULT NULL,
  `menu_no` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_manager`
--

CREATE TABLE `restaurant_manager` (
  `restraunt_managers_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_managers`
--

CREATE TABLE `system_managers` (
  `manager_id` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items_db`
--
ALTER TABLE `items_db`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD KEY `menu_items_db_item_code_fk` (`item_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `orders_customers_customer_id_fk` (`customer_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `restaurant_orders_order_no_fk` (`order_no`);

--
-- Indexes for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  ADD PRIMARY KEY (`restraunt_managers_id`),
  ADD KEY `restaurant_manager_restaurant_restaurant_id_fk` (`restaurant_id`);

--
-- Indexes for table `system_managers`
--
ALTER TABLE `system_managers`
  ADD PRIMARY KEY (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  MODIFY `restraunt_managers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_items_db_item_code_fk` FOREIGN KEY (`item_code`) REFERENCES `items_db` (`item_code`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_orders_order_no_fk` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`);

--
-- Constraints for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  ADD CONSTRAINT `restaurant_manager_restaurant_restaurant_id_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
