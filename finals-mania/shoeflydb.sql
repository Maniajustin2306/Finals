-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2022 at 11:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeflydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` int(9) NOT NULL,
  `usertype` varchar(6) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `datejoined` date NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userid`, `usertype`, `lastname`, `firstname`, `sex`, `address`, `birthday`, `datejoined`, `contact`, `email`, `pass`) VALUES
(1, 'Admin', 'Mania', 'Justin', 'Male', 'Capas, Tarlac', '2001-06-23', '2022-12-10', '930-266-0137', 'justinmania@email.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Member', 'Santos', 'Julian', 'Female', 'Estrada, Capas, Tarlac', '2002-12-28', '2022-12-11', '930-266-0137', 'juliansantos@email.com', '22d7fe8c185003c98f97e5d6ced420c7'),


-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `description`) VALUES
(3, 'Your navigation structure can be at fault â€“ itâ€™s a signal that you need to conduct efficient web testing or card sorting studies.'),
(4, 'Remember that if youâ€™re most interested in gathering feedback about your pricing page, the best way to go is to implement your feedback form directly on this page.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(9) NOT NULL,
  `memberid` int(9) NOT NULL,
  `orderdate` date NOT NULL,
  `totalitems` int(9) NOT NULL,
  `totalamount` int(9) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `memberid`, `orderdate`, `totalitems`, `totalamount`, `status`) VALUES
(1, 13, '2020-11-16', 2, 4800, 'Pending'),
(2, 1, '2020-11-16', 4, 8400, 'Pending'),
(3, 2, '2020-11-16', 4, 11200, 'Received'),
(4, 2, '2020-11-16', 4, 12000, 'Pending'),
(5, 2, '2020-11-16', 2, 12400, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodid` int(9) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `proddescrip` text NOT NULL,
  `prodprice` int(9) NOT NULL,
  `prodphoto1` varchar(50) NOT NULL,
  `prodphoto2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodid`, `prodname`, `proddescrip`, `prodprice`, `prodphoto1`, `prodphoto2`) VALUES
(11, 'Chuck Taylor', 'Rich, textured leather upper to the world\\\'s most iconic high top', 2400, 'Product1a.jpg', 'Product1b.jpg'),
(12, 'El Distrito 2.0', ' Solid tone sneakers with faux leather details', 2000, 'Product2a.jpg', 'Product2b.jpg'),
(13, 'El Distrito 2.0 (Black)', 'No Description Available', 2000, 'Product3a.jpg', 'Product3b.jpg'),
(14, 'El Distrito 2.0 (Classic)', 'No Description Available', 2200, 'Product4a.jpg', 'Product4b.jpg'),
(15, 'adidas Duramo', 'Lightweight feel', 3000, 'Product5a.jpg', 'Product5b.jpg'),
(16, 'Performing Running Shoes', 'Best for running', 3200, 'Product6a.jpg', 'Product6b.jpg'),
(17, 'Nike SB Charge Canvas', 'Best for lifestyle', 2800, 'Product7a.jpg', 'Product7b.jpg'),
(18, 'Nike Air Zoom Pegasus', 'Lightweight trainer designed for everyday running', 6200, 'Product8a.jpg', 'Product8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vieworders`
--

CREATE TABLE `vieworders` (
  `vieworderid` int(9) NOT NULL,
  `vophoto` varchar(255) NOT NULL,
  `voname` varchar(255) NOT NULL,
  `vosize` varchar(5) NOT NULL,
  `voquantity` int(9) NOT NULL,
  `voprice` int(9) NOT NULL,
  `vototal` int(9) NOT NULL,
  `vofquantity` int(9) NOT NULL,
  `voftotal` int(9) NOT NULL,
  `voorderid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vieworders`
--

INSERT INTO `vieworders` (`vieworderid`, `vophoto`, `voname`, `vosize`, `voquantity`, `voprice`, `vototal`, `vofquantity`, `voftotal`, `voorderid`) VALUES
(1, 'Product1a.jpg', 'Chuck Taylor', 'MD', 2, 4800, 4800, 2, 4800, 1),
(2, 'Product2a.jpg', 'El Distrito 2.0', 'MD', 2, 2000, 4000, 4, 8400, 2),
(3, 'Product4a.jpg', 'El Distrito 2.0 (Classic)', 'MD', 2, 2200, 4400, 4, 8400, 2),
(4, 'Product1a.jpg', 'Chuck Taylor', 'MD', 2, 4800, 4800, 4, 11200, 3),
(5, 'Product6a.jpg', 'Performing Running Shoes', 'MD', 2, 6400, 6400, 4, 11200, 3),
(6, 'Product5a.jpg', 'adidas Duramo', 'LG', 4, 3000, 12000, 4, 12000, 4),
(7, 'Product8a.jpg', 'Nike Air Zoom Pegasus', 'SM', 2, 6200, 12400, 2, 12400, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `vieworders`
--
ALTER TABLE `vieworders`
  ADD PRIMARY KEY (`vieworderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vieworders`
--
ALTER TABLE `vieworders`
  MODIFY `vieworderid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
