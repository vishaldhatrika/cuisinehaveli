-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2023 at 04:12 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20420382_food_order`
--
CREATE DATABASE IF NOT EXISTS `id20420382_food_order` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20420382_food_order`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(44, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(48, 'Vishal Dhatrika', 'vdhatr', '339c553c9f09796631e6d1e9decd21a1'),
(49, 'Kaushik Gupta', 'kgupta', '9acdb154a62224755f6d8903fcf76c3a'),
(50, 'Rakesh Jala', 'rjala', 'dba83f9fe1db22265e50cb7753e94fe7'),
(51, 'Sai Yashwanth Reddy Gujjula', 'sgujju', 'c264f914742a4706acd8e480786e6338');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `agent_id` int(10) UNSIGNED NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_contact` varchar(20) NOT NULL,
  `agent_status` varchar(40) DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_agents`
--

INSERT INTO `tbl_agents` (`agent_id`, `agent_name`, `agent_contact`, `agent_status`) VALUES
(9, 'AgentName 1', '12345676543', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(21, 'Biryani', 'cat_biryani887.jpg', 'Yes', 'Yes'),
(22, 'Breads', 'cat_breads806.jpg', 'Yes', 'Yes'),
(23, 'Curries', 'cat_curries392.jpg', 'Yes', 'Yes'),
(24, 'Desserts', 'cat_desserts668.jpg', 'Yes', 'Yes'),
(25, 'Appetizers', 'cat_appetizers878.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `primary_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `email`, `first_name`, `last_name`, `gender`, `contact`, `primary_address`, `password`) VALUES
(9, 'vd@vishal.me', 'Vishal', 'Dhatrika', 'male', '1234567890', 'No. 1, Street 1, ABC City, DEF - 12345', '715204df702f6c17c8faa7b0ea201221');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(138, 'Chicken Dum Biryani', 'Aromatic basmati rice layered with tender chicken and a medley of spices, slow-cooked to perfection.', 349.00, 'chickendumbiryani318.jpg', 21, 'Yes', 'Yes'),
(139, 'Egg Biryani', 'Flavorful basmati rice cooked with fragrant spices and succulent pieces of boiled egg, creating a delightful biryani experience.', 249.00, 'eggbiryani355.jpg', 21, 'Yes', 'Yes'),
(140, 'Paneer Biryani', 'An exquisite blend of fragrant basmati rice, succulent cubes of paneer (Indian cottage cheese), and aromatic spices, resulting in a delectable vegetarian biryani.', 249.00, 'paneerbiryani888.jpg', 21, 'Yes', 'Yes'),
(141, 'Veg Biryani', 'Aromatic basmati rice cooked with an assortment of fresh vegetables, fragrant spices, and herbs, offering a delightful and flavorsome vegetarian biryani.', 229.00, 'vegbiryani171.jpg', 21, 'Yes', 'Yes'),
(142, 'Chicken 65', '\"Spicy and succulent bite-sized pieces of fried chicken, coated with a tangy and flavorful marinade, making Chicken 65 a popular and appetizing dish.', 299.00, 'chicken6593.jpg', 25, 'Yes', 'Yes'),
(143, 'Triple Kababs', 'A trio of succulent and sizzling kababs, featuring flavorsome combinations of marinated meats or vegetables, grilled to perfection for a delightful culinary experience.', 329.00, 'triplekababs126.jpg', 25, 'Yes', 'Yes'),
(144, 'Paneer 65', 'Crispy and spicy cubes of paneer (Indian cottage cheese), marinated in a tangy and aromatic blend of spices, creating a flavorful and vegetarian version of the popular Chicken 65 dish.', 299.00, 'paneer65254.jpg', 25, 'Yes', 'Yes'),
(145, 'Butter Naan', 'Soft and fluffy Indian bread, freshly baked and brushed with melted butter, offering a delightful accompaniment to savor with a variety of flavorful curries and dishes.', 199.00, 'butternaan1.jpg', 22, 'Yes', 'Yes'),
(146, 'Rumali Roti', 'Thin, soft, and translucent Indian bread, skillfully hand-stretched like a handkerchief, ideal for wrapping around savory curries or savoring on its own, adding a touch of authenticity to any meal.', 199.00, 'rumaliroti327.jpg', 22, 'Yes', 'Yes'),
(147, 'Garlic Naan', 'Butter-infused Indian bread generously sprinkled with minced garlic and fresh herbs, baked to perfection, creating a flavorful and aromatic accompaniment to elevate any meal.', 199.00, 'garlicnaan315.jpg', 22, 'Yes', 'Yes'),
(148, 'Butter Chicken', 'Tender chicken cooked in a rich and creamy tomato-based sauce, infused with aromatic spices and finished with a touch of butter, creating a heavenly and indulgent dish known as Butter Chicken.', 249.00, 'butterchicken239.jpg', 23, 'Yes', 'Yes'),
(149, 'Palak Paneer', 'A classic Indian dish featuring cubes of paneer (Indian cottage cheese) simmered in a vibrant spinach gravy, delicately spiced with aromatic herbs, creating a nutritious and flavorsome Palak Paneer.', 299.00, 'palakpaneer883.jpg', 23, 'Yes', 'Yes'),
(150, 'Rajma', 'A comforting and hearty vegetarian dish made with red kidney beans cooked in a flavorful tomato-based gravy, seasoned with a blend of aromatic spices, offering a delightful Rajma experience.', 299.00, 'rajma386.jpg', 23, 'Yes', 'Yes'),
(151, 'Gulab Jamun', '\"Soft and spongy deep-fried milk dumplings soaked in a fragrant sugar syrup, Gulab Jamun is a sweet and indulgent Indian dessert that melts in your mouth.', 199.00, 'gulabjamun343.jpg', 24, 'Yes', 'Yes'),
(152, 'Khurbani Ka Meetha', 'A luscious and aromatic Indian dessert made with dried apricots, simmered in a rich syrup infused with cardamom and saffron, resulting in a delightful and fruity Khurbani Ka Meetha.', 299.00, 'khurbanikameetha240.jpg', 24, 'Yes', 'Yes'),
(153, 'Hot Chocolate', 'A comforting and indulgent beverage made with rich, creamy chocolate melted into steaming hot milk, providing a decadent and satisfying experience with every sip.', 299.00, 'hotchocolate798.jpg', 24, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `sn` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Placed',
  `agent_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`sn`, `order_id`, `customer_id`, `food_id`, `food_name`, `price`, `qty`, `total`, `order_date`, `status`, `agent_name`, `address`) VALUES
(33, '917271', 9, 138, 'Chicken Dum Biryani', 349.00, 1, 349.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(34, '917271', 9, 139, 'Egg Biryani', 249.00, 2, 498.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(35, '917271', 9, 140, 'Paneer Biryani', 249.00, 1, 249.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(36, '917271', 9, 145, 'Butter Naan', 199.00, 1, 199.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(37, '917271', 9, 146, 'Rumali Roti', 199.00, 1, 199.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(38, '917271', 9, 147, 'Garlic Naan', 199.00, 2, 398.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(39, '917271', 9, 148, 'Butter Chicken', 249.00, 1, 249.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(40, '917271', 9, 149, 'Palak Paneer', 299.00, 2, 598.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(41, '917271', 9, 150, 'Rajma', 299.00, 2, 598.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(42, '917271', 9, 151, 'Gulab Jamun', 199.00, 1, 199.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(43, '917271', 9, 152, 'Khurbani Ka Meetha', 299.00, 1, 299.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(44, '917271', 9, 153, 'Hot Chocolate', 299.00, 1, 299.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(45, '917271', 9, 142, 'Chicken 65', 299.00, 1, 299.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(46, '917271', 9, 143, 'Triple Kababs', 329.00, 1, 329.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(47, '917271', 9, 144, 'Paneer 65', 299.00, 1, 299.00, '2023-06-22 20:48:04', 'Accepted', 'No Agent is Available', 'No. 1, Street 1, ABC City, DEF - 12345'),
(48, '919275', 9, 145, 'Butter Naan', 199.00, 2, 398.00, '2023-06-22 21:32:51', 'Out For Delivery', 'AgentName 1', 'No. 1, Street 1, ABC City, DEF - 12345'),
(49, '919275', 9, 146, 'Rumali Roti', 199.00, 2, 398.00, '2023-06-22 21:32:51', 'Out For Delivery', 'AgentName 1', 'No. 1, Street 1, ABC City, DEF - 12345'),
(50, '919275', 9, 147, 'Garlic Naan', 199.00, 4, 796.00, '2023-06-22 21:32:51', 'Out For Delivery', 'AgentName 1', 'No. 1, Street 1, ABC City, DEF - 12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservations`
--

CREATE TABLE `tbl_reservations` (
  `table_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`table_id`, `customer_id`, `date`, `start_time`, `end_time`, `booking_id`) VALUES
(4, 9, '2023-05-30', '14:00:00', '16:00:00', 11),
(8, 9, '2023-05-30', '14:00:00', '16:00:00', 12),
(10, 9, '2023-05-30', '14:00:00', '16:00:00', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tabledata`
--

CREATE TABLE `tbl_tabledata` (
  `table_id` int(10) UNSIGNED NOT NULL,
  `seating_capacity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_tabledata`
--

INSERT INTO `tbl_tabledata` (`table_id`, `seating_capacity`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 6),
(7, 6),
(8, 8),
(9, 8),
(10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`agent_id`);

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
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_tabledata`
--
ALTER TABLE `tbl_tabledata`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `agent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
