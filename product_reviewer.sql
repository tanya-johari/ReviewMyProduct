-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 12:51 PM
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
CREATE DATABASE IF NOT EXISTS `product_reviewer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `product_reviewer`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Feb 07, 2022 at 11:31 AM
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
-- RELATIONSHIPS FOR TABLE `admin`:
--

-- --------------------------------------------------------

--
-- Table structure for table `itemref`
--
-- Creation: Feb 18, 2022 at 03:33 PM
--

CREATE TABLE `itemref` (
  `refid` int(5) NOT NULL,
  `item_id` int(11) NOT NULL,
  `reflink` varchar(300) NOT NULL,
  `store` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `itemref`:
--   `item_id`
--       `product` -> `item_id`
--

--
-- Dumping data for table `itemref`
--

INSERT INTO `itemref` (`refid`, `item_id`, `reflink`, `store`) VALUES
(7, 35, 'https://www.amazon.in/Samsung-Galaxy-M12-Storage-Processor/dp/B08XJGNQS7/ref=sr_1_1_sspa?keywords=mobile&qid=1645376717&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExWTdEMFFFTVhWU0dQJmVuY3J5cHRlZElkPUEwMDU5MDE3M0NGR0JQVDJLWklMMiZlbmNyeXB0ZWRBZElkPUEwNjAzMDg1MjRIS0ZFWjJKQjZJUCZ3aWRnZXROYW1lPXNw', 'amazon'),
(8, 36, 'https://www.amazon.in/Redmi-Activ-Metallic-Purple-Storage/dp/B09GFNZT24/ref=sr_1_2?keywords=All+Mobile+Phones&qid=1645377125&sr=8-2', 'amazon'),
(9, 37, 'https://www.amazon.in/Lenovo-IdeaPad-Fingerprint-Warranty-82H7016KIN/dp/B09NP5PCVY/ref=sr_1_5?keywords=laptops&qid=1645378364&sr=8-5', 'amazon'),
(10, 38, 'https://www.flipkart.com/boult-audio-thunder-bluetooth-headset/p/itm48d9e161831f9?pid=ACCFRY83ZWHDVK3M&lid=LSTACCFRY83ZWHDVK3MXIBESO&marketplace=FLIPKART&store=fcn&srno=b_1_1&otracker=CLP_Filters&fm=organic&iid=en_ylXFNIHtK6nOPxvX1OhFfvabMJ7%2FpRxr2YYg0%2FE2zDpoIDrRZR1Wily53HE1Cm%2BFd1TZa6STzUn%2BtX', 'flipkart'),
(11, 39, 'https://www.flipkart.com/boat-bassheads-950v2-wired-headset/p/itmc12c517b6c1c8?pid=ACCG7SCFWH4U7Y4B&lid=LSTACCG7SCFWH4U7Y4B2VBF9S&marketplace=FLIPKART&store=fcn&srno=b_1_1&otracker=browse&fm=organic&iid=en_nqFU3Lx3uXlTUnOGYeMpezteGcmRqO9H%2BsmmPRCLCWB149km35cTjHB2NGSyJJwjySr%2B7GZwyKBmHiVHZkyKKw%3D%', 'flipkart'),
(12, 40, 'https://www.flipkart.com/infinity-harman-glide-501-bluetooth-headset/p/itm73dcc364116e4?pid=ACCFN5H6R5SHZFX2&lid=LSTACCFN5H6R5SHZFX2D3IEJH&marketplace=FLIPKART&store=fcn&srno=b_1_9&otracker=browse&fm=organic&iid=e0042ba1-9779-4580-965d-608d268e82e3.ACCFN5H6R5SHZFX2.SEARCH&ppt=browse&ppn=browse', 'flipkart'),
(14, 42, 'https://www.amazon.in/Dell-Office21-Graphics-3515-D560704WIN9S/dp/B09NLSTF5Z/ref=sr_1_2_sspa?keywords=Best+Laptop&qid=1645382788&sr=8-2-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExVk1US0hCVklBTjQxJmVuY3J5cHRlZElkPUEwMTc4OTg2M0tUMERDOVhUODRTViZlbmNyeXB0ZWRBZElkPUEwMjE0NzA3MzVYTERZQURHRkNXNyZ3aWRnZXR', 'amazon'),
(19, 47, 'https://www.flipkart.com/realme-8s-5g-universe-blue-128-gb/p/itm79fdf59bdbe44?pid=MOBG5Y94XBCAQYPR&lid=LSTMOBG5Y94XBCAQYPR5BEJTK&marketplace=FLIPKART&store=tyy%2F4io&srno=b_8_169&otracker=browse&iid=9f0e5243-e6af-47ea-ba0b-309f96d8af0e.MOBG5Y94XBCAQYPR.SEARCH&ssid=4hv1zwuolc0000001645459879377', 'flipkart'),
(21, 49, 'https://www.amazon.in/Vivo-V21e-8GB-RAM-128GB/dp/B08ZMTTQ7D/ref=sr_1_1_sspa?qid=1645460180&rnid=1389432031&s=electronics&sr=1-1-spons&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEzRzBTN1FWNE5IMk5ZJmVuY3J5cHRlZElkPUEwMTMxNDYwM1BCRTcyMVc0M0lHVCZlbmNyeXB0ZWRBZElkPUEwMDUwNTk3MkNDSlAyU0tNRDM0NiZ3aWRnZXROYW1lPXNwX2F0Z', 'amazon'),
(22, 50, 'https://www.amazon.in/KALL-Smartphone-3GB-16GB-Blue/dp/B09SGCZXTR/ref=sr_1_2_sspa?qid=1645460180&rnid=1389432031&s=electronics&sr=1-2-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEzRzBTN1FWNE5IMk5ZJmVuY3J5cHRlZElkPUEwMTMxNDYwM1BCRTcyMVc0M0lHVCZlbmNyeXB0ZWRBZElkPUEwMjc5OTgyMlVZM01QQ0JFNFpITiZ3aWRnZXROY', 'amazon'),
(23, 51, 'https://www.amazon.in/OnePlus-Nord-Blue-128GB-Storage/dp/B097RD2JX8/ref=sr_1_6?qid=1645460180&rnid=1389432031&s=electronics&sr=1-6', 'amazon'),
(24, 52, 'https://www.amazon.in/Redmi-Horizon-Storage-Qualcomm%C2%AE-SnapdragonTM/dp/B09QSBF2T7/ref=sr_1_16?qid=1645460180&rnid=1389432031&s=electronics&sr=1-16', 'amazon'),
(25, 53, 'https://www.croma.com/apple-iphone-11-64gb-rom-4gb-ram-mhda3hn-a-black-/p/230106', 'croma'),
(26, 54, 'https://www.croma.com/apple-iphone-13-pro-max-256gb-rom-mlla3hn-a-graphite-/p/243527', 'croma'),
(27, 55, 'https://www.croma.com/samsung-galaxy-s21-fe-5g-256gb-rom-8gb-ram-sm-g990ezwginu-white-/p/247559', 'croma'),
(28, 53, 'https://www.amazon.in/New-Apple-iPhone-11-64GB/dp/B08L8DV7BX/ref=sr_1_1_sspa?keywords=iphone+11&qid=1645462348&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUFYQ1NVME8yNVpYS0smZW5jcnlwdGVkSWQ9QTAxMDM1OTkyNlJYODVBSDZIWDkyJmVuY3J5cHRlZEFkSWQ9QTA0ODk4NjEyMk9XQU5LSDRFTE5ZJndpZGdldE5hbWU9c3BfYXRmJmFjd', 'amazon');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Feb 20, 2022 at 01:06 PM
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime NOT NULL DEFAULT current_timestamp(),
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `category`) VALUES
(35, 'Samsung', 'Galaxy M12', 11499.00, '../assets/products/a99ef98050f401f0e5a27c26445ae498galaxym12.jpg', '2022-02-20 22:39:06', 'mobile'),
(36, 'Redmi', '9 Active', 9999.00, '../assets/products/8bb4391eec0762dcfdb8afe354cec0c0redmi9.jpg', '2022-02-20 22:48:20', 'mobile'),
(37, 'Lenovo', 'IdeaPad 3 11 Gen', 59490.00, '../assets/products/effe2e769726bccdb53d931d85d11875ideapad3.jpg', '2022-02-20 23:07:27', 'laptop'),
(38, 'Boult', 'Audio Thunder', 999.00, '../assets/products/ad21f2f2ebc6f113e80750e707f6b0fbboult.jpeg', '2022-02-21 00:11:12', 'headphones'),
(39, 'boAT', 'Bassheads 950v2', 1003.00, '../assets/products/496dc9397dc16a00c96ab2da3696ae05boat.jpeg', '2022-02-21 00:13:07', 'headphones'),
(40, 'Harman', 'INFINITY Glide', 999.00, '../assets/products/832fc2137da436aa75dc968b33df6adeharman.jpeg', '2022-02-21 00:14:22', 'headphones'),
(42, 'Dell', '15 2021', 53193.00, '../assets/products/55c79f2e3a4b8644a893aad43732d0fbdell.jpg', '2022-02-21 00:17:44', 'laptop'),
(47, 'realme', '8s 5G', 18049.00, '../assets/products/03908575100e8c6c795a9796d423abcfrealme-8s-5g.png', '2022-02-21 21:45:25', 'mobile'),
(49, 'Vivo', 'V21e 5G', 24990.00, '../assets/products/b40436b83a81e5bca31c89d1ecfbcc50vivo.jpeg', '2022-02-21 21:49:12', 'mobile'),
(50, 'I KALL', 'Z8 4G', 4899.00, '../assets/products/0bb8d6d5a15114af5aafdd1e4d6e1ea3IKALL.jpg', '2022-02-21 21:50:45', 'mobile'),
(51, 'OnePlus', 'Nord 2 5G', 29999.00, '../assets/products/466e0cf0e85e933873fd755e94299f34oneplus.jpg', '2022-02-21 21:52:23', 'mobile'),
(52, 'Redmi', 'Note 11', 15999.00, '../assets/products/ba7a4f9e958c19b2776786deec72409fredmi.png', '2022-02-21 21:54:29', 'mobile'),
(53, 'Apple', 'iPhone 11', 49990.00, '../assets/products/9209abb99ecf4646e958bbd96c04befciphone11.png', '2022-02-21 22:00:21', 'mobile'),
(54, 'Apple', 'iPhone 13 Pro Max', 139900.00, '../assets/products/f3eeee19ec414978c2a4d740ac0a071aiphone13.png', '2022-02-21 22:01:54', 'mobile'),
(55, 'Samsung', 'Galaxy S21 FE 5G', 63990.00, '../assets/products/05bf3b500a79b10f7f035ae04bfa999fsamsung.png', '2022-02-21 22:03:45', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--
-- Creation: Feb 09, 2022 at 10:19 AM
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
-- RELATIONSHIPS FOR TABLE `reviews`:
--   `item_id`
--       `product` -> `item_id`
--   `userid`
--       `usertable` -> `userid`
--

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `item_id`, `userid`, `content`, `rating`, `submit_date`) VALUES
(10025, 36, 24, 'Best buy at this price! The display quality is amazing and I do not have any complaint with the camera too. There is no other phone available at this price which comes with 4GB ram. You should go ahead with this.', 5, '2022-02-20 23:53:59'),
(10026, 37, 24, 'Best laptop for WFH use. Best keyboard,display is good, Microsoft Office 2019 provided, BACKLIGHT KEYBOARDS IS ALSO THEIR FOR 60K MODEL. Charging is fast, takes 1.5 hour to full charge. And battery back up is upto 4-5 hours.Boots up in seconds.', 5, '2022-02-20 23:55:03'),
(10027, 37, 17, 'Even upon contacting Lenovo support, issue is not yet resolved since 13/10/2021.. would suggest not to purchase Lenovo products .\r\n\r\nAnd even the laptop have 2 year warranty, still lenovo team is unable to resolve. Shame on Lenovo and Retailer selling it. Both are creating bad image of Amazon', 1, '2022-02-20 23:57:58'),
(10028, 37, 20, 'Good laptop but some pieces are faulty for mic and speakers, it was happened with me, but got replaced with new piece on next day, thanks for understanding issue and arranging replacement.', 5, '2022-02-21 00:22:28'),
(10029, 39, 20, 'Today I have received the product n am very much satisfied with the sound quality.At first I was confused about this but now am happy N njoyng it a lot. Very comfortable yet intense sound. Clarity is awesome. Only thing I would recommend that the build quality can be improved as it doesn\'t look like the premium ones.Though it\'s a beast N just go for it....!!! :)', 4, '2022-02-21 00:26:26'),
(10030, 49, 21, 'Brought this device within 3 days after release date, lookwise it is awesome Phone,face recognition and finger sensor are impressive with slim body and less weight(plus point) ,back cam is as expected and it captures nice images in night time(I\'ve attached Street light capture) selfie cam is nice however it slightly adds whitening effect(beauty+brightness together), performance is also nice,I compared this device to one Plus 7t in terms of performance and cam etc And it is impressive,this device is not for gamers btw! the speaker is somewhere loudish(makes irritating noise when in full volume) For daily/regular use it is awesome Phone loving the experience of v21\r\n(Vivo should consider dropping the price to 2/3k) reviewing after using it for 7 days!\r\n', 4, '2022-02-21 22:06:55'),
(10031, 49, 15, 'Battry only 4000mah and no\r\nSnapdragan porseser and and it is not in 256 gb stoage.\r\nWast of money. Total waste', 2, '2022-02-21 22:07:53'),
(10032, 49, 18, 'I was using vivo v11 pro. I switch to v21e.\r\nVery nice experience. I am fully satisfied with this phone. Dont read useless negative comment. Superb phone. Just go for it', 5, '2022-02-21 22:09:23'),
(10033, 54, 19, 'Best phone one can buy. Best camera ever and 120hz screen completely knocks out the competition! Croma is absolutely the best outlet to buy it from.', 5, '2022-02-21 22:15:11'),
(10034, 54, 17, 'Quit impressive', 5, '2022-02-21 22:15:37'),
(10035, 54, 18, 'Good', 4, '2022-02-21 22:15:59'),
(10036, 47, 15, 'Got this in offer in exchange of old phone for mum.. good deal.\r\nIt\'s really worth the price, she uses it watch lot videos and playing game.\r\nColor also looks better in person than on images..\r\nDash would have been bonus but never the less battery life will better.\r\nDesign wise for camera not sure y they want shoe 4 camera wen there is only 3.', 5, '2022-02-21 22:17:33'),
(10037, 47, 22, 'Best phone in this budget, camera is good, phone performance is good, battery last for almost two and half days. Attaching some camera snaps, also phone comes with some free editing apps that can be beneficial for creators. Micro Lense of camera works perfect. overall good phone.', 4, '2022-02-21 22:18:04'),
(10038, 53, 22, 'Battery backup wise Phone is damn good. It long lasts for one day and ultra wide angle lens are also very good', 5, '2022-02-21 22:19:21'),
(10039, 53, 19, 'Great product! Thanks for the assistance', 4, '2022-02-21 22:19:41'),
(10040, 53, 20, 'Really Satisfied with the product and hope it continues to function with zero issues.', 5, '2022-02-21 22:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--
-- Creation: Feb 07, 2022 at 11:31 AM
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` char(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone_no` char(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userimg` longblob NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `usertable`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `itemref`
--
ALTER TABLE `itemref`
  ADD PRIMARY KEY (`refid`),
  ADD KEY `ref_cons` (`item_id`);

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
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemref`
--
ALTER TABLE `itemref`
  MODIFY `refid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10041;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemref`
--
ALTER TABLE `itemref`
  ADD CONSTRAINT `ref_cons` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `con1` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`),
  ADD CONSTRAINT `con2` FOREIGN KEY (`userid`) REFERENCES `usertable` (`userid`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table admin
--

--
-- Metadata for table itemref
--

--
-- Metadata for table product
--

--
-- Metadata for table reviews
--

--
-- Metadata for table usertable
--

--
-- Metadata for database product_reviewer
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
