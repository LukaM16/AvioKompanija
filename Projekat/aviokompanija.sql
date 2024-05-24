-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2024 at 09:48 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aviokompanija`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifra` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `let`
--

DROP TABLE IF EXISTS `let`;
CREATE TABLE IF NOT EXISTS `let` (
  `let_id` int NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `vreme` time NOT NULL,
  `destinacija` varchar(100) NOT NULL,
  PRIMARY KEY (`let_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `let`
--

INSERT INTO `let` (`let_id`, `datum`, `vreme`, `destinacija`) VALUES
(1, '2024-05-27', '16:40:00', 'Spanija-Madrid'),
(2, '2024-05-30', '17:20:00', 'Portugal-Lisabon');

-- --------------------------------------------------------

--
-- Table structure for table `putnik`
--

DROP TABLE IF EXISTS `putnik`;
CREATE TABLE IF NOT EXISTS `putnik` (
  `putnik_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `let_id` int DEFAULT NULL,
  `prtljag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`putnik_id`),
  KEY `let_id` (`let_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `putnik`
--

INSERT INTO `putnik` (`putnik_id`, `ime`, `prezime`, `let_id`, `prtljag`) VALUES
(1, 'Marko', 'Markovic', 1, 'Dva kofera'),
(2, 'Petar', 'Petrovic', 1, 'Tri torbe'),
(3, 'Stefan', 'Stefanovic', 2, 'Dva kofera'),
(4, 'Miki', 'Petrovic', 2, 'Jedan kofer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
