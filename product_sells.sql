-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2022 at 03:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apexdeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_sells`
--

CREATE TABLE `product_sells` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  `customer_name` text NOT NULL,
  `transaction_id` text NOT NULL,
  `currency` text NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `transaction_status` text NOT NULL,
  `tx_ref` text NOT NULL,
  `date_sold` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sells`
--

INSERT INTO `product_sells` (`id`, `product_id`, `consumer_id`, `customer_email`, `customer_name`, `transaction_id`, `currency`, `totalAmount`, `transaction_status`, `tx_ref`, `date_sold`) VALUES
(1, 3, 6, 'golinkjobs@gmail.com', 'GolinkJobs', '3594675', 'USD', '48.99', 'successful', 'apexsoftwaredeals-golinkjobs@gmail.com6', '2022-07-25 13:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_sells`
--
ALTER TABLE `product_sells`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_sells`
--
ALTER TABLE `product_sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
