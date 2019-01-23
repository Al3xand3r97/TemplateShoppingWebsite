-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23 Ian 2019 la 12:12
-- Versiune server: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concursosf`
--
CREATE DATABASE IF NOT EXISTS `concursosf` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `concursosf`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(128) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`) VALUES
(1, 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 'Alexandru'),
(2, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'User1'),
(8, 'OFH', 'a1c3f71b4bf12ffd737ba560a2e8b949', 'Of Horse'),
(7, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'User3'),
(6, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'User2');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `mesaj` text NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `comments`
--

INSERT INTO `comments` (`cid`, `nume`, `mail`, `mesaj`, `data`) VALUES
(1, 'Alexandru', 'alx97_marcu@yahoo.com', 'First sent message!', '2018-11-21 23:10:43'),
(2, 'test', 'test_test@test.com', 'spamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspamspam', '2018-11-22 18:41:25'),
(3, 'sd', 'sdfs@sdfsdf.com', 'sdfsdf', '2018-11-24 16:56:24'),
(4, 'Test', 'test_test@test.com', 'Test from public IP', '2018-11-24 22:23:01'),
(5, 'Of Horse', 'horsemean@ofh.rs', 'text', '2018-12-22 15:45:56');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cos_cumparaturi`
--

DROP TABLE IF EXISTS `cos_cumparaturi`;
CREATE TABLE IF NOT EXISTS `cos_cumparaturi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produs` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `cos_cumparaturi`
--

INSERT INTO `cos_cumparaturi` (`id`, `id_produs`, `admin_id`, `data`) VALUES
(47, 3, 1, '2018-11-24 18:53:53'),
(42, 5, 1, '2018-11-24 18:53:20'),
(41, 2, 1, '2018-11-24 18:53:17'),
(40, 4, 1, '2018-11-24 18:53:16'),
(39, 3, 1, '2018-11-24 18:53:14'),
(59, 2, 2, '2018-11-25 13:03:00'),
(58, 3, 2, '2018-11-24 22:24:30'),
(57, 2, 2, '2018-11-24 22:24:28'),
(56, 3, 2, '2018-11-24 22:24:24'),
(55, 2, 2, '2018-11-24 21:57:03');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse`
--

DROP TABLE IF EXISTS `produse`;
CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id`, `name`, `price`, `type`) VALUES
(2, 'Iphone5', 2000, 'Electronics'),
(3, 'TV', 25000, 'Electronics'),
(4, 'Radio', 120, 'House'),
(5, 'Shovel', 50, 'Garden');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `profileimg`
--

DROP TABLE IF EXISTS `profileimg`;
CREATE TABLE IF NOT EXISTS `profileimg` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `userid` int(128) NOT NULL,
  `status` int(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 6, 1),
(4, 7, 0),
(5, 8, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
