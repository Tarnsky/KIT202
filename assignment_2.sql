-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 08:33 AM
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
-- Table structure for table `customers`
--
--
CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `First_name` varchar(255) DEFAULT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Card_info` varchar(255) DEFAULT NULL,
  `Age` int(11) NOT NULL,
  `Mobile_number` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Account_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `First_name`, `Last_name`, `Email`, `Password`, `Card_info`, `Age`, `Mobile_number`, `Address`, `Account_balance`) VALUES
(1, 'leigh', 'beeton', 'leigh@gmail.com', '1234', '123456', 22, 412444575, '1 dally st mowbray', 55);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_No` int(11) DEFAULT NULL,
  `item_Code` int(11) DEFAULT NULL,
  `column_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Customer_ID` int(11) NOT NULL,
  `Order_No` int(11) NOT NULL,
  `Price_total` int(11) NOT NULL,
  `Collection_time` time DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `items_List` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Customer_ID`, `Order_No`, `Price_total`, `Collection_time`, `Discount`, `items_List`) VALUES
(1, 1, 12, '12:00:00', NULL, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `Restaurant_Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Business_Code` int(11) DEFAULT NULL,
  `Open_Hours` time DEFAULT NULL,
  `Menu_NO` int(11) NOT NULL,
  `Order_No` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_manager`
--

CREATE TABLE `restaurant_manager` (
  `Restraunt_Managers_ID` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Restaurant_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_managers`
--

CREATE TABLE `system_managers` (
  `Manager_ID` int(11) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_No`),
  ADD KEY `Orders_customers_Customer_ID_fk` (`Customer_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`),
  ADD KEY `restaurant_orders_Order_No_fk` (`Order_No`);

--
-- Indexes for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  ADD PRIMARY KEY (`Restraunt_Managers_ID`),
  ADD KEY `Restaurant_Manager_restaurant_Restaurant_ID_fk` (`Restaurant_ID`);

--
-- Indexes for table `system_managers`
--
ALTER TABLE `system_managers`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  MODIFY `Restraunt_Managers_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_customers_Customer_ID_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_orders_Order_No_fk` FOREIGN KEY (`Order_No`) REFERENCES `orders` (`Order_No`);

--
-- Constraints for table `restaurant_manager`
--
ALTER TABLE `restaurant_manager`
  ADD CONSTRAINT `Restaurant_Manager_restaurant_Restaurant_ID_fk` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
