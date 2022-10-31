-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 01:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'BLACKPINK'),
(2, 'BTS'),
(3, 'TWICE'),
(4, 'FRIENDS'),
(5, 'OLIVIA RODRIGO'),
(6, 'TAYLOR SWIFT'),
(7, 'CUSTOMIZED PHOTOCARDS'),
(8, 'STICKERS'),
(9, 'CUSTOMIZED SINTRA BOARD'),
(10, 'GIFTBOX');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 26, '::1', 4, 1),
(9, 10, '::1', 7, 1),
(10, 11, '::1', 7, 1),
(11, 45, '::1', 7, 1),
(44, 5, '::1', 3, 0),
(46, 2, '::1', 3, 0),
(48, 72, '::1', 3, 0),
(49, 60, '::1', 8, 1),
(50, 61, '::1', 8, 1),
(51, 1, '::1', 8, 1),
(52, 5, '::1', 9, 1),
(53, 2, '::1', 14, 1),
(54, 3, '::1', 14, 1),
(55, 5, '::1', 14, 1),
(56, 1, '::1', 9, 1),
(57, 2, '::1', 9, 1),
(71, 61, '127.0.0.1', -1, 1),
(147, 1, '::1', 36, 1),
(160, 3, '::1', 27, 1),
(161, 1, '::1', 27, 1),
(168, 72, '::1', 26, 1),
(169, 70, '::1', 26, 1),
(170, 108, '::1', 26, 1),
(171, 72, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'T-shirts'),
(2, 'Stickers & Photocards'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(4, 'puneethreddy951@gmail.com'),
(5, 'puneethreddy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 12, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 14, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 12, 'Puneeth', 'puneethreddy951@gmail.com', 'Bangalore, Kumbalagodu, Karnataka', 'Bangalore', 'Karnataka', 560074, 'pokjhgfcxc', '4321 2345 6788 7654', '12/90', 3, 77000, 1234),
(2, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(3, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(4, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(5, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(6, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(7, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(8, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(9, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(10, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(11, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qwe', '123', '12/45', 1, 340, 123),
(12, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(13, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(14, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(15, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(16, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(17, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(18, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(19, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(20, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(21, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201611, 'qew', '123', '12/34', 1, 340, 123),
(22, 33, 'Torres', '', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201622, 'asd', '123', '12/34', 1, 370, 123),
(23, 33, 'Torres', 'rickygalpo7777@gmail.com', '896 Cansinala Apalit Pampanga', 'Apalit', 'Northern Luzon', 201633, 'ghj', '123', '12/34', 1, 320, 123),
(24, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'Bulacan', 222222, 'one', '123', '12/23', 1, 320, 123),
(25, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'Sample', 123456, 'sad', '123', '12/23', 1, 390, 123),
(26, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'Sample', 123222, 'asd', '123', '12/34', 1, 370, 123),
(27, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'Sample', 123222, 'asd', '123', '12/34', 1, 370, 123),
(28, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'Sample', 123222, 'asd', '123', '12/34', 1, 370, 123),
(29, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'ssam', 222333, 'qwe', '1223', '12/45', 1, 340, 123),
(30, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'ssd', 111111, 'qwe', '123', '12/34', 1, 320, 123),
(31, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'ssd', 111111, 'qwe', '123', '12/34', 1, 320, 123),
(32, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'asd', 555555, 'wwqe', '123', '12/23', 1, 55, 2323),
(33, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'asd', 123123, 'qwe', '123', '12/23', 1, 370, 123),
(34, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'sad', 123111, 'wqe', '123', '12/23', 1, 340, 123),
(35, 27, 'One on', 'one@gmail.com', 'Pampanga', 'Apalit', 'qwe', 1234, 'qwe', '23', '12/23', 1, 370, 123),
(36, 26, 'user users', 'user@gmail.com', 'Malolos, Bulacan', 'Apalit', 'Sample', 1234, 'qwe', '122', '12/23', 1, 370, 123),
(37, 26, 'user users', 'user@gmail.com', 'Malolos, Bulacan', 'Apalit', 'jhg', 1233, 'yt', '123', '12/23', 1, 370, 123),
(38, 26, 'user users', 'user@gmail.com', 'Malolos, Bulacan', 'Apalit', 'sample', 4444, 'kjh', '123', '12/44', 1, 80, 1234),
(39, 28, 'Two Tw', 'two@gmail.com', 'Sample ', 'Address', 'sample', 2016, 'two', '222', '12/23', 2, 470, 123),
(40, 29, 'Three th', 'three@gmail.com', 'Sample ', 'Sample', 'aas', 1231, 'three', '123', '12/23', 1, 50, 123);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `brand_title`, `qty`, `amt`) VALUES
(73, 1, 1, 'BLACKPINK', 1, 5000),
(74, 1, 4, 'BTS', 2, 64000),
(75, 1, 8, 'TWICE', 1, 40000),
(91, 2, 1, 'FRIENDS', 1, 370),
(92, 3, 1, 'OLIVIA RODRIGO', 1, 370),
(93, 4, 1, 'PERSONALIZED', 1, 370),
(94, 21, 3, '', 1, 340),
(95, 22, 2, '', 1, 370),
(96, 23, 6, '', 1, 320),
(97, 24, 9, '', 1, 320),
(98, 25, 8, '', 1, 390),
(99, 26, 2, '', 1, 370),
(100, 27, 2, '', 1, 370),
(101, 28, 2, '', 1, 370),
(102, 29, 5, '', 1, 340),
(103, 31, 7, '', 1, 320),
(104, 32, 73, '', 1, 55),
(105, 33, 1, '', 1, 370),
(106, 34, 3, '', 1, 340),
(107, 35, 1, '', 1, 370),
(108, 36, 2, '', 1, 370),
(109, 37, 1, '', 1, 370),
(110, 38, 71, '', 1, 80),
(111, 39, 107, '', 1, 80),
(112, 39, 8, '', 1, 390),
(113, 40, 108, '', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `id` int(11) NOT NULL,
  `tracking_id` bigint(20) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `est_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'In Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`id`, `tracking_id`, `order_id`, `product_id`, `user_id`, `cus_name`, `email`, `address`, `city`, `state`, `zip`, `date_ordered`, `est_time`, `product_title`, `quantity`, `product_price`, `product_image`, `status`) VALUES
(13, 9223372036854775807, 34, 3, 27, 'One', 'one@gmail.com', '', '', '', 0, '2022-10-24 07:46:46', '2022-10-23 06:15:50', 'Rosé Black/White Cotton Shirt', '1', '340', 'parkc1.jpg', 'Cancelled'),
(14, 814400, 35, 1, 27, 'One', 'one@gmail.com', '', '', '', 0, '2022-10-23 06:21:08', '2022-10-23 06:21:08', 'Lalisa Manobal MANOBAL Black/White Cotton Shirt', '1', '370', 'lalisam1.jpg', 'In Process'),
(15, 7496, 36, 2, 26, 'user', 'user@gmail.com', 'Malolos, Bulacan', 'Apalit', 'Sample', 1234, '2022-10-23 11:38:08', '2022-10-23 11:38:08', 'LALISA Manoban LaLisa White/ Black Cotton Shirt', '1', '370', 'lalisa1.jpg', 'In Process'),
(16, 404776811, 37, 1, 26, 'user', 'user@gmail.com', 'Malolos, Bulacan', 'Apalit', 'jhg', 1233, '2022-10-23 12:03:00', '2022-10-23 12:03:00', 'Lalisa Manobal MANOBAL Black/White Cotton Shirt', '1', '370', 'lalisam1.jpg', 'In Process'),
(18, 2912685313608228, 39, 107, 28, 'Two', 'two@gmail.com', 'Sample ', 'Address', 'sample', 2016, '2022-10-24 05:44:25', '2022-10-24 05:43:41', 'BTS Hotter/Sweeter/Cooler Butter Photocards', '1', '80', 'hsc1.jpg', 'To Ship'),
(19, 68865892884584, 39, 8, 28, 'Two', 'two@gmail.com', 'Sample ', 'Address', 'sample', 2016, '2022-10-24 05:44:29', '2022-10-24 05:43:42', 'BLACKPINK Jennie Black/White Cotton Shirt', '1', '390', 'jennie1.jpg', 'To Ship'),
(20, 67269358528, 40, 108, 29, 'Three', 'three@gmail.com', 'Sample ', 'Sample', 'aas', 1231, '2022-10-24 05:46:09', '2022-10-24 05:46:09', 'Blackpink The Album Japanese Ver.', '1', '50', 'bta1.jpg', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`) VALUES
(1, 1, 1, 'Lalisa Manobal MANOBAL Black/White Cotton Shirt', 370, 'T-shirts', 'lalisam1.jpg', 'lalisam2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(2, 1, 1, 'LALISA Manoban LaLisa White/ Black Cotton Shirt', 370, 'tshirts', 'lalisa1.jpg', 'lalisa2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(3, 1, 1, 'Rosé Black/White Cotton Shirt', 340, 'tshirt', 'parkc1.jpg', 'parkc2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirt'),
(4, 1, 1, 'Rosé Black/White Cotton Shirt', 340, 'T-shirts', 'rose1.jpg', 'rose2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(5, 1, 1, 'BLACKPINK Rosé On The Ground Black/ White Cotton Shirt', 340, 'tshirt', 'rotg1.jpg', 'rotg2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirt'),
(6, 1, 1, 'BLACKPINK T-shirt Black/ White Cotton Shirt', 320, 'T-shirts', 'esbr1.jpg', 'esbr2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(7, 1, 1, 'BLACKPINK Boombayah Black/ White Cotton Shirt', 320, 'T-shirts', 'boom1.jpg', 'boom2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(8, 1, 1, 'BLACKPINK Jennie Black/White Cotton Shirt', 390, 'T-shirts', 'jennie1.jpg', 'jennie2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(9, 1, 1, 'BLACKPINK Jisoo Black/White Cotton Shirt', 320, 'T-shirts', 'jisoo1.jpg', 'jisoo2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(10, 1, 1, 'SOLO Black/ White Cotton Shirt', 320, 'T-shirts', 'jsolo1.jpg', 'jsolo2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(11, 1, 1, 'LALISA Manoban Dollar Black / White Cotton Shirt', 390, 'T-shirts', 'lmdollar1.jpg', 'lmdollar2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(12, 1, 1, 'BLACKPiNK Barcode Black/White Cotton Shirt', 390, 'T-shirts', 'bpbar1.jpg', 'bpdar2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(13, 1, 2, 'JK Black / White Cotton Shirt', 340, 'T-shirts', 'jk1.jpg', 'jk2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(14, 1, 2, 'BTS Jimin Black / White Cotton Shirt', 340, 'T-shirts', 'jimin1.jpg', 'jimin2.jpg', 'reminders.jpg', 'sizechart.jpg', 'thirts'),
(15, 1, 2, 'BTS Taehyung Black / White Cotton Shirt', 340, 'T-shirts', 'taehyung1.jpg', 'taehyung2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(16, 1, 2, 'BTS Suga Black / White Cotton Shirt', 340, 'T-shirts', 'suga1.jpg', 'suga2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(17, 1, 2, 'BTS Seokjin Black / White Cotton Shirt', 340, 'T-shirts', 'seokjin1.jpg', 'seokjin2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(19, 1, 2, 'BTS RM Black / White Cotton Shirt', 340, 'T-shirts', 'rm1.jpg', 'rm2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(20, 1, 2, 'BTS J-hope Black / White Cotton Shirt', 340, 'T-shirts', 'jhope1.jpg', 'jhope2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(21, 1, 2, 'BANGTAN SONYEONDAN 90s Vintage Infires', 390, 'T-shirts', 'bts90s.jpg', 'bts90s.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(22, 1, 2, 'BTS \'Butter\' New Cotton Shirt Black/ White', 340, 'T-shirts', 'butter1.jpg', 'butter2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(23, 1, 2, 'Butter Black/ White Cotton Shirt', 340, 'T-shirts', 'butter3.jpg', 'butter4.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(24, 1, 2, 'BTS \'Butter\' New Cotton Shirt Black/ White', 340, 'T-shirts', 'butter5.jpg', 'butter6.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(25, 1, 2, 'Dis-ease Black / White Cotton', 320, 'T-shirts', 'dis1.jpg', 'dis2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(27, 1, 2, 'BTS BE Blue & Grey Black / White Cotton Shirt', 320, 'T-shirts', 'btsbe1.jpg', 'btsbe2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(32, 1, 2, 'Dynamite Black / White Cotton Shirt', 340, 'T-shirts', 'dyn1.jpg', 'dyn2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(33, 1, 2, 'BE Track List Black / White Cotton Shirt', 320, 'T-shirts', 'btl1.jpg', 'btl2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(34, 1, 2, 'BTS BE Life Goes On Black / White Cotton Shirt', 320, 'T-shirts', 'life1.jpg', 'life2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(35, 1, 2, 'BTS BE Telepathy Black / White Cotton Shirt', 320, 'T-shirts', 'tele1.jpg', 'tele2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(36, 1, 2, 'BTS Dynamite Spotify Black / White Cotton Shirt', 340, 'T-shirts', 'spot1.jpg', 'spot2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(37, 1, 2, 'BTS BE Stay Black / White Cotton Shirt', 340, 'T-shirts', 'stay1.jpg', 'stay2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(38, 1, 2, 'BTS BE Fly To My Room Black / White Cotton Shirt', 340, 'T-shirts', 'fly1.jpg', 'fly2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(39, 1, 3, 'XS-XL TWICE Formula of Love Members Name', 270, 'T-shirts', 'fol1.jpg', 'fol2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(40, 1, 3, 'TWICE Chaeyoung The Feels Black/ White Cotton Shirt', 270, 'T-shirts', 'chae1.jpg', 'chae2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(45, 1, 3, 'TWICE Mina The Feels Black/ White Cotton Shirt', 270, 'T-shirts', 'mina1.jpg', 'mina2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(46, 1, 3, 'TWICE Dahyun The Feels White/ Black Cotton Shirt', 270, 'T-shirts', 'dy1.jpg', 'dy2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(47, 1, 3, 'TWICE Momo The Feels White/ Black Cotton Shirt', 270, 'T-shirts', 'momo1.jpg', 'momo2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(48, 1, 3, 'TWICE Sana The Feels Black/ White Cotton Shirt', 270, 'T-shirts', 'sana1.jpg', 'sana2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(49, 1, 3, 'TWICE Naeyon The Feels White/ Black Cotton Shirt', 270, 'T-shirts', 'ny1.jpg', 'ny2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(50, 1, 3, 'TWICE Jihyo The Feels White/ Black Cotton Shirt', 270, 'T-shirts', 'jih1.jpg', 'jih2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(51, 1, 3, 'TWICE Tzuyu The Feels White/ Black Cotton Shirt', 270, 'T-shirts', 'tz1.jpg', 'tz2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(52, 1, 3, 'TWICE Jeongyeon The Feels Black / White Cotton Shirt', 270, 'T-shirts', 'jy1.jpg', 'jy2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(53, 1, 3, 'TWICE Formula of LOVE Black/ White Cotton Shirt', 290, 'T-shirts', 'flo1.jpg', 'flo2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(54, 1, 3, 'XXL TWICE Formula of Love : O+T=< 3 Members Name ', 290, 'T-shirts', 'xxlf1.jpg', 'xxlf2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(55, 1, 3, 'TWICE The Feels Cotton Black/ White Shirt', 270, 'T-shirts', 'tf1.jpg', 'tf2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(56, 1, 3, 'TWICE Formula of Love Custom Black/ White Cotton Shirt', 290, 'T-shirts', 'tfc1.jpg', 'tfc2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(57, 1, 4, 'FRIENDS Monica Seven Black/White Cotton Shirt', 320, 'T-shirts', 'ms1.jpg', 'ms2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(58, 1, 4, 'FRIENDS Ross Frankie Say Relax White Cotton Shirt', 300, 'T-shirts', 'rf1.jpg', 'rf2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(59, 1, 1, 'BLACKPINK Square Black/ White Cotton Shirt', 320, 'T-shirts', 'square1.jpg', 'square2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(60, 1, 1, 'LALISA Manoban Bootleg Style Black/ White Cotton Shirt', 390, 'T-shirts', 'bootleg1.jpg', 'bootleg2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(61, 1, 1, 'BLACKPINK The Album Black/ White Cotton Shirt', 390, 'T-shirts', 'album1.jpg', 'album2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(62, 1, 1, 'BLACKPINK In Your Area Black/ White Cotton Shirt', 340, 'T-shirts', 'inyour1.jpg', 'inyour2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(63, 1, 1, 'BLACKPINK OT4 Shadow Black/ White Cotton Shirt', 320, 'T-shirt', 'ot41.jpg', 'ot42.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(64, 1, 1, 'LALISA Manoban L White/Black Cotton Shirt', 390, 'T-shirts', 'lbl3.jpg', 'lbl2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(65, 1, 1, 'Lalisa Box Set ', 390, 'T-shirts', '36ac41e3be928bccca93e7a5194b2cf8.jpg', 'lb2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(66, 1, 4, 'FRIENDS Ross Frankie Say Relax White Cotton Shirt', 300, 'T-shirts', 'rf1.jpg', 'rf2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(67, 1, 4, 'FRIENDS Rachel Save The Drama For Your Mama', 300, 'T-shirts', 'rac1.jpg', 'rac2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(68, 1, 4, 'FRIENDS No Uterus, No Opinion Black/White Cotton Shirt', 320, 'T-shirts', 'nu1.jpg', 'nu2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(69, 1, 4, 'FRIENDS TV Iconic Orange Couch', 340, 'T-shirts', 'ioc1.jpg', 'ioc2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(70, 2, 8, 'BTS Butter Sticker Pack (Laptop, Tumbler, etc.)', 399, 'Sticker', 'bbsp1.jpg', 'bbsp2.jpg', 'bbsp3.jpg', 'reminders1.jpg', 'bts sticker'),
(71, 2, 8, 'McDo x BTS Photocards (Unofficial)', 80, 'Photocards', 'mcdo1.JPG', 'mcdo2.jpg', 'mcdo3.jpg', 'reminders1.jpg', 'Photocards'),
(72, 1, 1, 'Lalisa Box Set ', 370, 'T-shirt', '36ac41e3be928bccca93e7a5194b2cf8.jpg', 'lb2.jpg', 'reminders.jpg', 'sizechart.jpg', 'T-shirts'),
(73, 2, 8, 'BTS Borahae Decorative Sticker Sheet', 55, 'Sticker', 'borah1.jpg', 'borah1.jpg', 'borah1.jpg', 'reminders1.jpg', 'stickers'),
(74, 2, 8, 'Blackpink Decorative Sticker Sheet / Set', 55, 'Sticker', 'bpd1.jpg', 'bpd2.jpg', 'bpd3.jpg', 'reminders1.jpg', 'sticker'),
(75, 2, 9, 'Customized Sintra Board Decor', 150, 'Sintra board', 'sintra1.jpg', 'sintra2.jpg', 'sintra3.jpg', 'reminders1.jpg', 'sintra board'),
(76, 1, 4, 'FRIENDS Regina Phalange Black/White Cotton Shirt', 320, 'T-shirts', 'rp1.jpg', 'rp2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(77, 1, 4, 'FRIENDS TV Moo Point Black/ White Cotton Shirt', 320, 'T-shirts', 'moo1.jpg', 'moo2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(78, 1, 4, 'FRIENDS Chandler Bing Black/White Cotton Shirt', 320, 'T-shirts', 'cb1.jpg', 'cb2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(79, 1, 4, 'FRIENDS Frame Black/White Cotton Shirt', 320, 'T-shirts', 'fra1.jpg', 'fra2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(80, 1, 4, 'FRIENDS Turkey Black/White Cotton Shirt', 340, 'T-shirts', 'tur1.jpg', 'tur2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(81, 1, 4, 'FRIENDS TV Central Perk Black/ White Cotton Shirt', 340, 'T-shirts', 'cp1.jpg', 'cp2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(82, 1, 4, 'FRIENDS Pivot Black/White Cotton Shirt', 340, 'T-shirts', 'pb1.jpg', 'pb2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(83, 1, 4, 'FRIENDS Unagi Salmon Skin Roll Black/White Cotton Shirt', 340, 'T-shirts', 'us1.jpg', 'us2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(84, 1, 4, 'FRIENDS The Reunion Black/White Cotton Shirt', 320, 'T-shirts', 'reu1.jpg', 'reu2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(85, 1, 4, 'FRIENDS Phoebe I Wish I Could But I Don’t Want To', 320, 'T-shirts', 'pho1.jpg', 'pho2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(86, 1, 4, 'FRIENDS TV Smelly Cat Black/ White Cotton Shirt', 320, 'T-shirts', 'sm1.jpg', 'sm2.jpg', 'reminders.jpg', 'sizerchart.jpg', 'tshirts'),
(87, 1, 4, 'FRIENDS The One Where They Get Back Together ', 320, 'T-shirts', 'the1.jpg', 'the2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(88, 1, 4, 'FRIENDS Princess Consuela Banana Hammock', 320, 'T-shirts', 'pcb1.jpg', 'pcb2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(89, 1, 4, 'FRIENDS Ross I’m Fine Black/White Cotton Shirt', 320, 'T-shirts', 'ross1.jpg', 'ross2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(90, 1, 4, 'FRIENDS Joey Doesn’t Share Food ', 340, 'T-shirts', 'joey1.jpg', 'joey2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(91, 1, 4, 'FRIENDS I Don’t Even Have A Pla Black/White Cotton Shirt', 340, 'T-shirts', 'pla1.jpg', 'pla2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(92, 1, 4, 'FRIENDS Chandler Bathtub I Had A Very Long Hard Day', 340, 'T-shirts', 'chan1.jpg', 'chan2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(93, 1, 4, 'FRIENDS Rachel Monica Girls Black/White Cotton Shirt', 320, 'T-shirts', 'racm1.jpg', 'racm2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(94, 1, 5, 'OLIVIA RODRIGO Traitor White / Black Cotton Shirt', 370, 'T-shirts', 'tra1.jpg', 'tra2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(95, 1, 5, 'OLIVIA RODRIGO Brutal White / Black Cotton Shirt', 370, 'T-shirts', 'bru1.jpg', 'bru2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(96, 1, 5, 'OLIVIA RODRIGO Sour Pin White / Black Cotton Shirt', 370, 'T-shirts', 'sourp1.jpg', 'sourp2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(97, 1, 5, 'OLIVIA RODRIGO Good 4 U White / Black Cotton Shirt', 370, 'T-shirts', 'gu1.jpg', 'gu2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(98, 1, 5, 'OLIVIA RODRIGO Happier White / Black Cotton Shirt', 370, 'T-shirts', 'hap1.jpg', 'hap2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(99, 1, 5, 'OLIVIA RODRIGO Rolling Sour Stone ', 370, 'T-shirts', 'rss1.jpg', 'rss2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(100, 1, 5, 'OLIVIA RODRIGO Parental Advisory ', 390, 'T-shirts', 'par1.jpg', 'par2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(101, 1, 5, 'Olivia Rodrigo White / Black Cotton Shirt', 390, 'T-shirts', 'rod1.jpg', 'rod2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(102, 1, 5, 'OLIVIA RODRIGO Sociopath White / Black Cotton Shirt', 370, 'T-shirts', 'soc1.jpg', 'soc2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(103, 1, 5, 'OLIVIA RODRIGO Sour Text White / Black Cotton Shir', 370, 'T-shirts', 'sou1.jpg', 'sou2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(104, 1, 5, 'OLIVIA RODRIGO Butterfly White / Black Cotton Shirt', 370, 'T-shirts', 'but1.jpg', 'but2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(105, 1, 5, 'OLIVIA RODRIGO Happy face White / Black Cotton Shirt', 370, 'T-shirts', 'happ1.jpg', 'happ2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(106, 1, 6, 'Taylor Swift Bootleg Black/ White Cotton Shirt', 420, 'T-shirts', 'ts1.jpg', 'ts2.jpg', 'reminders.jpg', 'sizechart.jpg', 'tshirts'),
(107, 2, 7, 'BTS Hotter/Sweeter/Cooler Butter Photocards', 80, 'Photocards', 'hsc1.jpg', 'hsc2.jpg', 'hsc3.jpg', 'reminders1.jpg', 'photocards'),
(108, 2, 7, 'Blackpink The Album Japanese Ver.', 50, 'Photocards', 'bta1.jpg', 'bta3.jpg', 'bta4.jpg', 'reminders1.jpg', 'photocards'),
(109, 2, 7, 'BTS Butter Concept Photo Photocards', 80, 'Photocards', 'bcpp1.jpg', 'bcpp2.jpg', 'bcpp3.jpg', 'reminders1.jpg', 'photocards'),
(110, 2, 7, 'BTS Butter Concept Photo Polaroid Style Print', 45, 'Photocards', 'pola1.jpg', 'pola2.jpg', 'pola3.jpg', 'reminders1.jpg', 'photocards'),
(111, 2, 10, 'XS - XL TWICE Formula Of Love GIFT BOX', 370, 'Giftbox', 'gift1.jpg', 'gift2.jpg', 'gift3.jpg', 'reminders1.jpg', 'giftbox'),
(112, 2, 10, 'BTS Permission to Dance Gift Box', 519, 'Giftbox', 'ptd1.jpg', 'ptd2.jpg', 'ptd3.jpg', 'reminders1.jpg', 'giftbox'),
(113, 7, 1, 'sample', 123, 'sample', '1666596238_436-4369040_physician-nurse-doctor-transprent-doctor-giving-injection-cartoon.png', '', '', '', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `products_archive`
--

CREATE TABLE `products_archive` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_archive`
--

CREATE TABLE `user_archive` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `gender`, `birthday`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'puneeth', 'Reddy', '', NULL, 'puneethreddy951@gmail.com', 'puneeth', '9448121558', '123456789', 'sdcjns,djc'),
(15, 'hemu', 'ajhgdg', '', NULL, 'puneethreddy951@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', '', NULL, 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', '', NULL, 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(21, 'prajval', 'mcta', '', NULL, 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', '', NULL, 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', '', NULL, 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', '', NULL, 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(25, 'otheruser', 'user', '', NULL, 'otheruser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(26, 'user', 'users', 'Male', '2001-06-25', 'user@gmail.com', 'passwords', '09761330498', 'Malolos, Bulacan', 'Apalit'),
(27, 'One', 'on', 'Female', '2022-10-06', 'one@gmail.com', '123456789', '0972836475', 'Pampanga', 'Apalit'),
(28, 'Two', 'Tw', 'Male', '2001-06-25', 'two@gmail.com', '1234567890', '09876543561', 'Sample ', 'Address'),
(29, 'Three', 'th', 'Male', NULL, 'three@gmail.com', '1234567890', '1234567890', 'Sample ', 'Sample'),
(33, 'Ricky Galpo', 'One', 'Male', '1970-01-01', 'rickygalpo7777@gmail.com', 'passwords', '12345678901', 'Pampanga', 'Address'),
(35, 'Perez Ashly', 'dsa', NULL, NULL, 'asddddd123@gmail.com', 'asd123!@#', '0999999999', 'asd', 'dsa'),
(36, 'Perez Ashly', 'asd', NULL, NULL, 'asdddddddd123@gmail.com', 'asd123!@#', '0999999999', 'asd', 'dsa');

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'puneeth', 'Reddy', 'puneethreddy951@gmail.com', '123456789', '9448121558', '123456789', 'sdcjns,djc'),
(14, 'hemanthu', 'reddy', 'hemanthreddy951@gmail.com', '123456788', '6526436723', 's,dc wfjvnvn', 'b efhfhvvbr'),
(15, 'hemu', 'ajhgdg', 'keeru@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(20, 'pramod', 'vh', 'pramod@gmail.com', '124335353', '9767645653', 'ksbdfcdf', 'sjrgrevgsib'),
(21, 'prajval', 'mcta', 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(25, 'otheruser', 'user', 'otheruser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(35, 'Perez Ashly', 'dsa', 'asddddd123@gmail.com', 'asd123!@#', '0999999999', 'asd', 'dsa'),
(36, 'Perez Ashly', 'asd', 'asdddddddd123@gmail.com', 'asd123!@#', '0999999999', 'asd', 'dsa'),
(37, 'Eight', 'ei', 'eight@gmail.com', '123456789', '0927016029', '896 Cansinala Apalit Pampanga', 'sampple'),
(38, 'archive', 'archive', 'archive@gmail.com', 'passwords', '1234567890', 'Apalit', 'Philippines'),
(39, 'archive', 'archive', 'archive@gmail.com', 'passwords', '09270160296', 'Apalit', 'Philippines'),
(40, 'archive', 'archive', 'archive@gmail.com', 'passwords', '09270160296', 'Apalit', 'Philippines'),
(41, 'Six', 'si', 'six@gmail.com', '1234567890', '1234567890', 'Pampanga', 'Sample'),
(42, 'Six', 'si', 'six@gmail.com', '1234567890', '1234567890', 'Pampanga', 'Sample'),
(43, 'Six', 'si', 'six@gmail.com', '1234567890', '1234567890', 'Pampanga', 'Sample'),
(44, 'archive', 'archive', 'archive@gmail.com', 'passwords', '09270160296', 'Apalit', 'Philippines'),
(45, 'Five', 'fi', 'five@gmail.com', '1234567890', '1234567890', 'Pampanga', 'Sample'),
(46, 'archive', 'archive', 'archive@gmail.com', 'passwords', '09270160296', 'Apalit', 'Philippines'),
(47, 'archive', 'archive', 'archive@gmail.com', 'passwords', '09270160296', 'Apalit', 'Philippines');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
