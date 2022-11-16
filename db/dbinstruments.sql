-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2022 at 09:30 PM
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
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instruments_ibfk_1` (`fammille_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `name`, `img`, `description`, `date`, `qnt`, `price`, `fammille_id`, `user_id`) VALUES
(42, 'das', 'assets/img/upload/default/default_picture.png', 'dsa', '2022-11-03', 432, '42.00', 2, 30),
(43, 'dd', 'assets/img/upload/63751ac17015a2.01713257.png', 'dsa', '2022-11-06', 32, '32.00', 2, 30);

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
  `img` text NOT NULL,
  `dateEntre` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img`, `dateEntre`) VALUES
(30, 'Aphrodite Small', 'zope@mailinator.com', 'Pa$$w0rd!', '', '2022-11-15 23:04:18'),
(31, 'Karen Shaw', 'hapifaxy@mailinator.com', 'Pa$$w0rd!', 'assets/img/upload/users/default/user_inco.png', '2022-11-16 21:46:31'),
(32, 'Alma Parsons', 'tygugi@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 21:48:56'),
(33, 'Alden Waller', 'gepyzip@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 21:52:28'),
(34, 'Kevyn Tate', 'lira@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 21:53:21'),
(35, 'Berk Pearson', 'midyzesude@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 21:55:29'),
(36, 'Adele Wagner', 'zynisosyh@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 22:00:21'),
(37, 'Emerald Jones', 'gedi@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 22:00:41'),
(38, 'Simon Blackburn', 'vahox@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 22:01:07'),
(39, 'Zia Clayton', 'tucinodo@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 22:01:48'),
(40, 'Sawyer Herman', 'mote@mailinator.com', 'Pa$$w0rd!', 'dsa', '2022-11-16 22:02:42'),
(41, 'Yvonne Cochran', 'zuhoke@mailinator.com', 'Pa$$w0rd!', '', '2022-11-16 22:04:27'),
(42, 'Desirae Wilkins', 'coguzaqa@mailinator.com', 'Pa$$w0rd!', '', '2022-11-16 22:04:43'),
(43, 'Clementine Farley', 'pabefimyho@mailinator.com', 'Pa$$w0rd!', '', '2022-11-16 22:05:16'),
(44, 'Galvin Chase', 'bozonimow@mailinator.com', 'Pa$$w0rd!', '', '2022-11-16 22:05:28'),
(45, 'Ethan Holcomb', 'wolonyd@mailinator.com', 'Pa$$w0rd!', 'assets/img/upload/users/default/user_inco.png', '2022-11-16 22:08:36'),
(46, 'Kylynn Tran', 'cyru@mailinator.com', 'Pa$$w0rd!', 'assets/img/upload/users/6375515fc210c2.74329977.png', '2022-11-16 22:08:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`fammille_id`) REFERENCES `fammiles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `instruments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
