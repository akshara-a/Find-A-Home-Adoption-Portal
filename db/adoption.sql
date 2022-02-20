-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2022 at 07:58 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18492996_adoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Breed` varchar(255) NOT NULL,
  `About` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `Name`, `Breed`, `About`, `Image`, `Status`) VALUES
(1, 'Oscar', 'German Shepherd', 'The German Shepherd is a breed of medium to large-sized working dog that originated in Germany.', '1.jpeg', 1),
(2, 'Rosie', 'Beagle', 'The beagle is a breed of small hound that is similar in appearance to the much larger foxhound. ', '2.jpeg', 1),
(3, 'Charlie', 'Doberman', 'The Dobermann, a breed from US and Canada is a medium-large breed of domestic dog.', '3.jpg', 1),
(4, 'Molly', 'Dalmatian', 'It is a medium-sized dog, noted for its white coat marked with black or liver-colored spots.', '4.jpg', 1),
(5, 'Archie', 'German Shepherd', 'The German Shepherd is a breed of medium to large-sized working dog that originated in Germany.', '5.jpg', 1),
(6, 'Jack', 'Beagle', 'The beagle is a breed of small hound that is similar in appearance to the much larger foxhound. ', '6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `interest_form`
--

CREATE TABLE `interest_form` (
  `id` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `PetName` varchar(30) NOT NULL,
  `Breed` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_form`
--
ALTER TABLE `interest_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interest_form`
--
ALTER TABLE `interest_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
