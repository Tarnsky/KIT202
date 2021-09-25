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
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `cust_id` varchar(255) DEFAULT NULL,
  `paid` varchar(1) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `customer_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `card_info` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account_balance` int(11) DEFAULT NULL,
  `total_orders` int(11) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `card_info`, `age`, `mobile_number`, `address`, `account_balance`) VALUES
(1, 'leigh', 'beeton', 'leigh', '1234', '123456', 22, 412444575, '1 dally st mowbray', 55);

INSERT INTO `tb_customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `card_info`, `age`, `mobile_number`, `address`, `account_balance`) VALUES
(1, 'ted', 'krimmer', 'ted', '1234', '123456', 22, 412444575, '123 fake st', 10000);
-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `item_code` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tb_restaurant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `customer_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `order_no` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `collection_time` time DEFAULT NULL,
  `discount` int(1) DEFAULT NULL,
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
  `tb_restaurant_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `tb_restaurant_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `business_code` int(11) DEFAULT NULL,
  `open_hours` time DEFAULT NULL,
  `menu_no` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_restaurant_manager`
--

CREATE TABLE `tb_restaurant_manager` (
  `restraunt_managers_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tb_restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_system_managers`
--

CREATE TABLE `tb_system_managers` (
  `manager_id` int(11) PRIMARY KEY NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `tb_items`
  ADD KEY `tb_items_tb_items_item_code_fk` (`item_code`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD KEY `tb_orders_tb_customers_customer_id_fk` (`customer_id`);

--
-- Indexes for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD KEY `tb_restaurant_tb_orders_order_no_fk` (`order_no`);

--
-- Indexes for table `tb_restaurant_manager`
--
ALTER TABLE `tb_restaurant_manager`
  ADD KEY `tb_restaurant_manager_tb_restaurant_tb_restaurant_id_fk` (`tb_restaurant_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `tb_items`
  ADD CONSTRAINT `tb_items_tb_items_item_code_fk` FOREIGN KEY (`item_code`) REFERENCES `tb_items` (`item_code`);

--
-- Constraints for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_tb_customers_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`);

--
-- Constraints for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD CONSTRAINT `tb_restaurant_tb_orders_order_no_fk` FOREIGN KEY (`order_no`) REFERENCES `tb_orders` (`order_no`);

--
-- Constraints for table `tb_restaurant_manager`
--
ALTER TABLE `tb_restaurant_manager`
  ADD CONSTRAINT `tb_restaurant_manager_tb_restaurant_tb_restaurant_id_fk` FOREIGN KEY (`tb_restaurant_id`) REFERENCES `tb_restaurant` (`tb_restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
