-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 17, 2019 at 02:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `cellno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pw`, `cellno`) VALUES
(2, 'yousaf20', 'audionic', '3315701354'),
(3, 'hamza50', 'mypakistan', '03315701351');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `cellno` varchar(15) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pw`, `cellno`, `address`) VALUES
(5, 'hkhan70', '123123', '03345104995', 'Harley Street LANE 7A'),
(6, 'ahmed60', 'thrones', '03345104995', 'Lalazar Chowk'),
(7, 'hamna39', 'northsouth', '519242318', 'Bilal Colony Shamsabad '),
(8, 'alveena50', 'pakistan', '03356069875', 'Defence Road');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` int(255) NOT NULL,
  `item_day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `item_price`, `item_day`) VALUES
(1, 'chowmein rice', 350, 'Mon'),
(2, 'Kheer', 100, 'Thu'),
(9, 'Nihari', 200, 'Thu'),
(12, 'Ras malai', 150, 'Mon'),
(14, 'Kofta', 150, 'Thu'),
(15, 'Custard', 100, 'Wed'),
(16, 'Biryani', 200, 'Tue'),
(17, 'Pasta', 200, 'Tue');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_price` int(255) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_price`, `customer_name`, `status`) VALUES
(1, 'Ras malai ', 150, 'hkhan70', 'cancelled'),
(2, 'Kheer ', 100, 'hkhan70', 'cancelled'),
(3, 'Biryani ', 200, 'hkhan70', 'delivered'),
(4, 'Kofta ', 150, 'hkhan70', 'delivered'),
(5, 'Kofta ', 150, 'hkhan70', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `review` mediumtext NOT NULL,
  `customer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_name`, `review`, `customer_name`) VALUES
(1, 'Kheer', 'What a fantastic dish it was. I was totally impressed by the taste of it.', 'alveena50'),
(2, 'payee', 'What a delicious dish it is.I recommend it totally to customers.', 'alveena50'),
(3, 'Custard', 'Very tasty and delicious.I recommend it to all in town.', 'alveena50'),
(4, 'Nihari', 'It is  very good and tasty dish.Try it atleast once.', 'alveena50'),
(5, 'Pasta', 'My favourite dish since childhood and they never fail to amaze my tastebuds.', 'hkhan70'),
(6, 'Kofta', 'They offer amazing and motuhlicking koftas.I enjoyed it totally.', 'hamna39'),
(7, 'Ras malai', 'My favourite sweet dish and i love it alot', 'hkhan70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
