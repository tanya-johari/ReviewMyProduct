-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 11:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_reviewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminusername` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phoneno` char(10) NOT NULL,
  `adminimg` longblob NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `passwrd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminusername`, `fname`, `lname`, `Email`, `phoneno`, `adminimg`, `dob`, `gender`, `passwrd`) VALUES
(1, 'abc123', 'virat', 'kohli', 'admin@gmail.com', '9999999999', 0x6361726f7573656c2d30322e6a7067, '2022-02-03', 'male', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, '../assets/products/1.png', '2020-03-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 7', 122.00, '../assets/products/2.png', '2022-01-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 122.00, '../assets/products/3.png', '2022-01-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 122.00, '../assets/products/4.png', '2022-01-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 122.00, '../assets/products/5.png', '2022-01-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 122.00, '../assets/products/6.png', '2022-01-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 122.00, '../assets/products/8.png', '2022-01-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 122.00, '../assets/products/10.png', '2022-01-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 152.00, '../assets/products/11.png', '2022-01-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, '../assets/products/12.png', '2022-01-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 152.00, '../assets/products/14.png', '2022-01-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 152.00, '../assets/products/15.png', '2022-01-28 11:08:57'),
(15, 'Apple', 'i13', 40000.00, '../assets/products/af5daed1b5cc0eb11c4ab97a40a31ff733.jpg', NULL),
(16, 'mi', 'redmi', 5000.00, '../assets/products/95ea8cd498641ae7ea93b35f01caf95644.jfif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `item_id`, `userid`, `content`, `rating`, `submit_date`) VALUES
(1002, 15, 1, '2 months and still received incorrect pre twice, then they just ignored my request for what I was promised. I ordered red and they just sent black, I did not get any contact that I would be receiving incorrect item', 3, '2022-02-09 15:56:15'),
(1003, 9, 13, 'This was an awesome phone and I loved having the fun turquoise colour. Unfortunately I smashed the back camera when dropping to and would caution users that this is an extremely breakable piece of technology.', 3, '2022-02-09 15:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` char(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userimg` longblob NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userid`, `name`, `gender`, `Email`, `phone_no`, `username`, `userimg`, `password`, `dob`) VALUES
(1, 'vish', '', 'vishakhay036@gmail.com', 5678, 'yryhu', '1234', '2022-01-01');
INSERT INTO `usertable` (`userid`, `name`, `gender`, `Email`, `phone_no`, `username`, `userimg`, `password`, `dob`) VALUES
(13, 'aisha', 'female', 'aisha@gmail.com', 2223333, 'aisha11',  'rohit', '2022-02-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `Userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `con1` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`),
  ADD CONSTRAINT `con2` FOREIGN KEY (`userid`) REFERENCES `usertable` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
