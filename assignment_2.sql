-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 09:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `paid` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `card_info` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account_balance` int(11) DEFAULT NULL,
  `access` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `card_info`, `age`, `mobile_number`, `address`, `account_balance`, `access`) VALUES
(1, 'leigh', 'beeton', 'leigh@gmail.com', 'Beeton1', '123456', 22, 412444575, '1 dally st mowbray', 55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `item_code` int(11) NOT NULL,
  `item_price` float(11,2) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`item_code`, `item_price`, `ingredients`, `item_name`, `restaurant_id`) VALUES
(1, 12.45, 'egg, bacon, bread', 'egg and bacon muffin', 1),
(2, 69.69, 'cheese,tomato paste,flour,ham', 'pizza', 2),
(3, 13.00, 'garlic,bread', 'garlic bread', 1),
(5, 15.00, 'milk,flavouring', 'milkshake', 2),
(6, 2.50, NULL, 'regular drink', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menus`
--

CREATE TABLE `tb_menus` (
  `menu_no` int(11) NOT NULL,
  `item_code` int(11) DEFAULT NULL,
  `column_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `customer_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `collection_time` time DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `items_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`customer_id`, `order_no`, `price_total`, `collection_time`, `discount`, `items_list`) VALUES
(1, 1, 12, '12:00:00', NULL, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restaurant`
--

CREATE TABLE `tb_restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `business_code` int(11) DEFAULT NULL,
  `open_hours` time DEFAULT NULL,
  `menu_no` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_restaurant`
--

INSERT INTO `tb_restaurant` (`restaurant_id`, `restaurant_name`, `address`, `business_code`, `open_hours`, `menu_no`, `order_no`) VALUES
(1, 'temp_1', '12 sally st', 2432, NULL, 1, NULL),
(2, 'temp_2', '34 fred st', 3421, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_restaurant_managers`
--

CREATE TABLE `tb_restaurant_managers` (
  `restraunt_managers_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_system_managers`
--

CREATE TABLE `tb_system_managers` (
  `manager_id` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD KEY `menu_items_db_item_code_fk` (`item_code`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `orders_customers_customer_id_fk` (`customer_id`);

--
-- Indexes for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `restaurant_orders_order_no_fk` (`order_no`);

--
-- Indexes for table `tb_restaurant_managers`
--
ALTER TABLE `tb_restaurant_managers`
  ADD PRIMARY KEY (`restraunt_managers_id`),
  ADD KEY `restaurant_manager_restaurant_restaurant_id_fk` (`restaurant_id`);

--
-- Indexes for table `tb_system_managers`
--
ALTER TABLE `tb_system_managers`
  ADD PRIMARY KEY (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_customers`
--
ALTER TABLE `tb_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `item_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_restaurant_managers`
--
ALTER TABLE `tb_restaurant_managers`
  MODIFY `restraunt_managers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD CONSTRAINT `tb_menus_tb_items_item_code_fk` FOREIGN KEY (`item_code`) REFERENCES `tb_items` (`item_code`);

--
-- Constraints for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `orders_customers_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`);

--
-- Constraints for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD CONSTRAINT `restaurant_orders_order_no_fk` FOREIGN KEY (`order_no`) REFERENCES `tb_orders` (`order_no`);

--
-- Constraints for table `tb_restaurant_managers`
--
ALTER TABLE `tb_restaurant_managers`
  ADD CONSTRAINT `restaurant_manager_restaurant_restaurant_id_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `tb_restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
