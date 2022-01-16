-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 01:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpreviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `page_id`, `name`, `content`, `rating`, `submit_date`) VALUES
(1, 1, 'David Deacon', 'I use this website daily, the amount of content is brilliant.', 5, '2020-01-09 20:43:02'),
(2, 1, 'John Doe', 'Great website, great content, and great support!', 4, '2020-01-09 21:00:41'),
(3, 1, 'Robert Billings', 'Website needs more content, good website but content is lacking.', 3, '2020-01-09 21:10:16'),
(4, 1, 'Daniel Callaghan', 'Great!', 5, '2020-01-09 23:51:05'),
(5, 1, 'Bobby', 'Not much content.', 2, '2020-01-14 21:54:24'),
(6, 1, 'Joshua Kennedy', 'Fantasic website, has everything I need to know.', 5, '2020-01-16 17:34:27'),
(7, 1, 'Johannes Hansen', 'Really like this website, helps me out a lot!', 5, '2020-01-16 17:35:12'),
(8, 1, 'Wit Kwiatkowski', 'Please provide more quality content.', 5, '2020-01-16 17:36:03'),
(9, 1, 'Ã“li ÃžÃ³rÃ°arson', 'Thanks', 5, '2020-01-16 17:36:34'),
(10, 1, 'Jaroslava BerÃ¡nkovÃ¡', '', 5, '2020-01-16 17:37:48'),
(11, 1, 'Naomi Holt', 'Appreciate the amount of content you guys do.', 5, '2020-01-16 17:39:17'),
(12, 1, 'Isobel Whitehead', 'Thank you for providing a website that helps us out a lot!', 5, '2020-01-16 17:40:28'),
(13, 1, 'Warren Mills', 'Everything is awesome!', 5, '2020-01-16 19:34:08'),
(14, 1, 'Larry Johnson', 'Brilliant, thank you for providing quality content!', 5, '2020-01-29 18:40:36'),
(15, 1, 'tanya', 'very good!!!!', 4, '2022-01-16 18:11:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
