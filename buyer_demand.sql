-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:15 PM
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
-- Database: `buyer_demand`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer_demand`
--

CREATE TABLE `tbl_buyer_demand` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buyer_demand`
--

INSERT INTO `tbl_buyer_demand` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(17, 12313, 'rewer', 'ewrew', '&lt;p&gt;sfsdfsd&lt;/p&gt;', 'abc@gmail.com', '::1', 'fsdf', 'sdfsd', '8801991083994', 'ddb10903586e239c3d82a2a4741333c7f1534e0c922efba965ac3b6e4eaf9191be6b2fb4e6fc3f353afebcf4497fde503117e2987b83febdd1316e7653f30831', '2023-06-07', 14),
(18, 1234134, 'Hussain', 'hm', '&lt;p&gt;&lt;ul&gt;&lt;li&gt;Hello&lt;/li&gt;&lt;li&gt;Hi&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;', 'hm@gmail.com', '::1', 'This is test', 'Dhaka', '8808013344063', 'c9f45faa623da49c6a368313b63ce7f41570c7a5ab3e8fcea15c6c714dc0ec9d2ca7f3418d47e01174d7de4d151e7b3f0f9701e0de624382c8265b374129301a', '2023-06-08', 329206);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buyer_demand`
--
ALTER TABLE `tbl_buyer_demand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buyer_demand`
--
ALTER TABLE `tbl_buyer_demand`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
