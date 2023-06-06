-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 10:53 PM
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
(1, 150, 'Afjal', '1234', 'Watch', 'hm@gmail.com', '151.150.23.10', 'Hello Bangladesh', 'Dhaka', '01991083994', 'hekeffsjfjhgjfd', '2023-06-06', 2312414),
(2, 150, 'Rahat', '1234', 'Watch', 'hm@gmail.com', '151.150.23.10', 'Hello Bangladesh', 'Dhaka', '01991083994', 'hekeffsjfjhgjfd', '2023-06-06', 2312414),
(3, 150, 'Sajeeb', '1234', 'Poshu', 'hm@gmail.com', '151.150.23.10', 'POSHU \r\nBangladesh', 'Dhaka', '01991083994', 'hekeffsjfjhgjfd', '2023-06-06', 2312414),
(4, 31212, 'This', 'ami', '<p>1.Clip</p><p>2. Beni</p>', 'abc@gmail.com', '::1', 'Kalo Ruper Jalare sokhi', 'dhaka', '8801991083994', '5f8d0cefc9a0d0ee2622b00e6f52eb4c9dfa62086be3eb9fcd8c665c508dae99d73c04bcf618e22ca6c4f2d3d4db17d6d9f66f6c80d26d675ff13e2a69132cdc', '2023-06-06', 329206),
(5, 31212, 'This', 'ami', '<p>1.Clip</p><p>2. Beni</p>', 'abc@gmail.com', '::1', 'Kalo Ruper Jalare sokhi', 'dhaka', '8801991083994', '5f8d0cefc9a0d0ee2622b00e6f52eb4c9dfa62086be3eb9fcd8c665c508dae99d73c04bcf618e22ca6c4f2d3d4db17d6d9f66f6c80d26d675ff13e2a69132cdc', '2023-06-06', 329206),
(6, 1233124, 'the', 'dsasda', '<p><ul><li>asdasdadf</li><li>asdasdf</li><li>asdasdf</li></ul></p>', 'abc@gmail.com', '::1', 'asfsdf', 'thid', '8801991083994', 'e5a2b5f3f480d59e135b499e48fa5dd934a39513159e9442258d1ca6c4321f0e2fc2a6c44984b08731e4b80cd132eb67b89c93dcedb261743528468818f19fbd', '2023-06-06', 123456),
(7, 13413, 'tthh', 'sdfsdf', '<p>csfsfweereeer</p>', 'abc@gmail.com', '::1', 'fdfsdf', 'cvdffg', '8801991083994', '7cf794ee319ce835aa27682773a3f86dbbd9ffbab864998e3ce5415001fdcb9aee0d13dd20fc5c3cd9b0829e66099b625577e55a3438bb90c69ba36e08081e7b', '2023-06-06', 123123),
(8, 13413, 'tthh', 'sdfsdf', '<p>csfsfweereeer</p>', 'abc@gmail.com', '::1', 'fdfsdf', 'cvdffg', '8801991083994', '7cf794ee319ce835aa27682773a3f86dbbd9ffbab864998e3ce5415001fdcb9aee0d13dd20fc5c3cd9b0829e66099b625577e55a3438bb90c69ba36e08081e7b', '2023-06-06', 123123),
(9, 1214, 'dqr', 'qweq', '<p>adsasfad</p>', 'abc@gmail.com', '::1', 'dasdasdf', 'adassad', '8801623067577', 'aa47b24920d99d3217af8823b15aedbab9ccdce1bf8818d47c6a2b6a26e764efbe6a1987295f1d6bd8c102e73d6af266793b9332fb085c99c63912e8dd9744aa', '2023-06-06', 123123),
(10, 123124, 'asdaf', 'asfsdf', '<p>dsdfsdfg</p>', 'abc@gmail.com', '::1', 'fsdfdg', 'sdfsgf', '8801623067577', '735ed166378ddec184c31428a366e77df475b5e5af7240eb615d453ac75207951d33f37267c5990878f0ca343299ed69ef3742bb8a0a74a4d101175f2eeeb240', '2023-06-06', 2312),
(11, 123124, 'asdaf', 'asfsdf', '<p>dsdfsdfg</p>', 'abc@gmail.com', '::1', 'fsdfdg', 'sdfsgf', '8801623067577', '735ed166378ddec184c31428a366e77df475b5e5af7240eb615d453ac75207951d33f37267c5990878f0ca343299ed69ef3742bb8a0a74a4d101175f2eeeb240', '2023-06-06', 2312),
(12, 12423423, 'awrwer', 'dsadasda', '<p>ewrewtrw</p>', 'abc@gmail.com', '::1', 'rewr', 'dsfsdf', '8801623067577', '5e1fb5bb245a6f9934815fe5fa3e57ab3a6c2ab1bfe7c73b587a03f3a74dc55fff1bf307fe5d66f92f9577241d6a47e233723b984d5b5e4180ffa1bfbbd9182b', '2023-06-06', 23225),
(13, 2232, 'eqq', 'dasd', '<p>dasdff</p>', 'abc@gmail.com', '::1', 'dsa', 'dsfsdf', '8801623067577', 'ea6737626ea2285312e3366e16bb3ab440051e9446a3200671ad6eef208e400c8e16a097ec0f3c6b5f1283c4cac4fc9a98f42bc7700190945f825d80fd0babf8', '2023-06-06', 2312),
(14, 2123, 'wewq', 'sdasd', '<p>fdfsdfsdf</p>', 'abc@gmail.com', '::1', 'asdasfad', 'assadfdf', '8801623067577', '1e1b96a75a2abb1a16f88cdc0304c79027a5d810b2dcdfba96cda3d7d7f1ad9f13c07fdb929b6f4c09b5d71d4dcc5678cbcfed9aa7656ef93b36dae4677a237c', '2023-06-06', 21213),
(15, 21312, 'weqr', 'sdfsdfsdf', '<p>erwwerwe</p>', 'abc@gmail.com', '::1', 'fdsdf', 'sfdsdfsd', '8801623067577', 'c8fdf1c31d3f379851887c28e3dfe0502e09d1f6982c0bbebd9c0d5d062a4cc5ba53f9ebe608cbe93c7cf89adb9e902f9a0df14508e84d41b0ac7206341c7980', '2023-06-06', 32414),
(16, 1000, 'sdsdf', 'sdfds', '<p>fsdf</p>', 'abc@gmail.com', '::1', 'sdfsdf', 'sadsaf', '8801623067577', '296d997961dccfd33b17745509bae626562225858a33f0391f8e4515ca5bf9e08c7970360256ac15b2c50e9a54fe94c70d4efe7cc8c09bd782bbe3eb5fd22f87', '2023-06-06', 41343);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
