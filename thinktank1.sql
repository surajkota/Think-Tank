-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2016 at 08:17 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thinktank1`
--
CREATE DATABASE IF NOT EXISTS `thinktank1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thinktank1`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment` varchar(40) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `uemail` varchar(40) NOT NULL,
  `wemail` varchar(40) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `topic` varchar(100) NOT NULL,
  `lbemail` varchar(50) NOT NULL,
  `wemail` varchar(50) NOT NULL,
  PRIMARY KEY (`topic`,`lbemail`,`wemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thinktank`
--

CREATE TABLE IF NOT EXISTS `thinktank` (
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `entry` varchar(500) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`email`,`topic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `issued` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
