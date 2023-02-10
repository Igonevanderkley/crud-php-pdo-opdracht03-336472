-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 10 feb 2023 om 16:34
-- Serverversie: 5.7.36
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atractiepark`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `achtbaan`
--

DROP TABLE IF EXISTS `achtbaan`;
CREATE TABLE IF NOT EXISTS `achtbaan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NaamAchtbaan` varchar(50) DEFAULT NULL,
  `NaamPretpark` varchar(50) DEFAULT NULL,
  `Land` varchar(50) DEFAULT NULL,
  `Topsnelheid` varchar(50) DEFAULT NULL,
  `Hoogte` int(11) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Cijfer` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
