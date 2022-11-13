-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2022 at 09:09 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinstruments`
--

-- --------------------------------------------------------

--
-- Table structure for table `fammiles`
--

DROP TABLE IF EXISTS `fammiles`;
CREATE TABLE IF NOT EXISTS `fammiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fammiles`
--

INSERT INTO `fammiles` (`id`, `name`) VALUES
(1, 'Bois'),
(2, 'Clavirs'),
(3, 'Cordes\r\n'),
(4, 'Cuivres\r\n'),
(5, 'Percussions\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
CREATE TABLE IF NOT EXISTS `instruments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `qnt` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `fammille_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instruments_ibfk_1` (`fammille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `name`, `img`, `description`, `date`, `qnt`, `price`, `fammille_id`) VALUES
(19, 'dsa', 'WhatsApp Image 2022-11-09 at 19.43.33.jpg', 'dsa', '2022-11-03', 4, '23.00', 1),
(20, 'piano', '1665422549484__DSC0078[1].jpg', 'dsa', '2022-11-08', 2, '23.00', 1),
(21, 'dsa', 'icons8-javascript-48.png', 'dsa', '2022-11-01', 2, '3.00', 2),
(22, 'dsa', 'icons8-javascript-48.png', 'dsadsadsadsad', '2022-11-05', 23, '2.00', 4),
(24, 'dsad', 'cover-scrum-board.png', 'dsa', '2022-11-08', 3, '2.00', 1),
(25, 'beby', 'WhatsApp Image 2022-11-09 at 19.43.33.jpg', 'dsadsa', '2022-11-10', 24, '42.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `instrument_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `instrument_id` (`instrument_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateEntre` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dateEntre`) VALUES
(21, 'saad moumou', 's@g.com', 's', '2022-11-11 17:32:57'),
(26, 'issam', 's@gs.com', 's', '2022-11-12 12:35:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`fammille_id`) REFERENCES `fammiles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`instrument_id`) REFERENCES `instruments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
