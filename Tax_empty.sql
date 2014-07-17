-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 17 Lip 2014, 22:13
-- Wersja serwera: 5.5.36-MariaDB
-- Wersja PHP: 5.5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `taxes_mb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tax`
--

CREATE TABLE IF NOT EXISTS `Tax` (
  `internalId` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxesPIT` double DEFAULT NULL,
  `taxesCIT` double DEFAULT NULL,
  `taxesVAT` double DEFAULT NULL,
  `taxesOther` double DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `mayorName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mayorEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`internalId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1241 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
