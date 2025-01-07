-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 04:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'farzana', 'farzana', '495e32a105a1bd8f9971b2b0ecc1a2e2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(5, 'Set Menu', 'Food_Category_870.jpg', 'Yes', 'Yes'),
(6, 'Drinks', 'Food_Category_307.jpg', 'Yes', 'Yes'),
(7, 'Appetizer', 'Food_Category_11.jpg', 'No', 'No'),
(8, 'Fast Food', 'Food_Category_752.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `password`, `contact`, `address`, `created_at`) VALUES
(3, 'Farzana Haider', 'farzana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01752608888', 'RUET', '2025-01-05 12:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(2, 'Best Burger', 'Burger with Ham and lots of cheese.', 5.00, 'Food-Name-1768.jpg', 8, 'Yes', 'Yes'),
(4, 'Pizza', 'Delicious Pizza', 8.00, 'Food-Name-8041.jpg', 8, 'Yes', 'Yes'),
(6, 'Fried rice with chicken and salad', '', 8.00, 'Food-Name-4605.jpg', 5, 'Yes', 'Yes'),
(7, 'Summer_drinks', '', 5.00, 'Food-Name-2677.jpg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(4, 'Best Burger', 5.00, 1, 5.00, '2024-07-12 09:03:23', 'Ordered', 'Farzana', '01752608888', 'farzana@gmail.com', 'Bogura'),
(5, 'Momo', 6.00, 1, 6.00, '2024-07-12 09:03:51', 'Delivered', 'fahim', '01752608888', 'fahim@gmail.com', 'Dhaka'),
(8, 'Pizza', 8.00, 2, 16.00, '2025-01-01 07:42:59', 'Ordered', 'Mysha', '01894548659', 'mysha@gmail', 'RUET'),
(18, 'Fried rice with chicken and salad', 8.00, 1, 8.00, '2025-01-01 08:31:24', 'Ordered', 'Farzana', '01752608888', 'farzana@gmail', 'Rajshahi'),
(19, 'Best Burger', 5.00, 1, 5.00, '2025-01-01 08:34:56', 'Ordered', 'Farzana', '01752608888', 'farzana@gmail', 'Rajshahi'),
(20, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 01:43:19', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET'),
(21, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 02:05:03', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET'),
(22, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 02:05:14', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET'),
(23, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 02:05:16', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET'),
(24, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 02:26:34', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET'),
(25, 'Best Burger', 5.00, 1, 5.00, '2025-01-05 02:35:48', 'Ordered', 'Farzana Haider', '01752608888', 'farzana@gmail.com', 'RUET');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
