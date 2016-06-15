-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 06:55 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `map`
--
CREATE DATABASE IF NOT EXISTS `map` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `map`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `details`, `date`) VALUES
(6, 'No Shuttles Available today from 12:00pm to 2:00pm', '2016-03-30 00:59:47'),
(7, 'All shuttles up and running again. Sorry for the inconvenience!', '2016-04-04 01:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `password`) VALUES
(1, 'testuser1@test.com', 'bc51a83eea09846dc02407dd0979968912a207a9'),
(2, 'admin@shuttle.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `routeinfo` text NOT NULL,
  `coords` text NOT NULL,
  `shuttleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shuttleid` (`shuttleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `routeinfo`, `coords`, `shuttleid`) VALUES
(2, 'Shuttle Route 2:\r\n\r\nJFK Underpass >> Wooding Drive >> School of Education >> Old Creative Festival Arts >> Optometry >> Gordon Street >> SAL HALL.\r\n\r\n*from 7:00pm to 6:00am Students from Santa Margarita, Tunapuna and St Augustine South.\r\n\r\nTIME:\r\n\r\nWeekdays\r\n6:00am to 10:00pm (Every 25 Minutes)\r\n10:00pm to 6:00am (Every Hour)', '[{"lat":10.649879,"long":-61.395859},{"lat":10.649578,"long":-61.395998},{"lat":10.648521,"long":-61.395976},{"lat":10.648647,"long":-61.397124},{"lat":10.645631,"long":-61.397714},{"lat":10.646728,"long":-61.40119},{"lat":10.645431,"long":-61.401458},{"lat":10.644792,"long":-61.401506},{"lat":10.643329,"long":-61.401578},{"lat":10.642975,"long":-61.402408},{"lat":10.63817,"long":-61.400303},{"lat":10.63805,"long":-61.399727},{"lat":10.638468,"long":-61.399636},{"lat":10.638736,"long":-61.398938}]', 1),
(3, 'Pick up and Drop off: tgr Times: 6:00', '[{"lat":10.638717,"long":-61.398916},{"lat":10.638419,"long":-61.398656},{"lat":10.638287,"long":-61.398999},{"lat":10.638474,"long":-61.39909},{"lat":10.638546,"long":-61.399423},{"lat":10.638141,"long":-61.399718},{"lat":10.638178,"long":-61.400169},{"lat":10.638847,"long":-61.400619},{"lat":10.64293,"long":-61.402384},{"lat":10.643812,"long":-61.402753}]', NULL),
(4, 'Shuttle Route 4:\r\n\r\nJFK Underpass >> Curepe >> Joyce Gibson Inniss Hall >> Field Station (Request Only).\r\n\r\n*from 6:00pm to 10:00pm San Juan Bus Terminus (Request Only).\r\n\r\nTIME:\r\n\r\nWeekdays\r\n6:00am to 10:00pm (Every 40 Minutes)\r\n10:00pm to 6:00am (Every Hour)', '[{"lat":10.638508,"long":-61.399004},{"lat":10.638423,"long":-61.399391},{"lat":10.638002,"long":-61.399734},{"lat":10.637959,"long":-61.400378},{"lat":10.639689,"long":-61.401064},{"lat":10.641755,"long":-61.401837},{"lat":10.642957,"long":-61.402341},{"lat":10.643189,"long":-61.40159},{"lat":10.644096,"long":-61.401547},{"lat":10.645298,"long":-61.401461},{"lat":10.645383,"long":-61.401912},{"lat":10.645467,"long":-61.40292},{"lat":10.645657,"long":-61.403908},{"lat":10.646753,"long":-61.404423},{"lat":10.647238,"long":-61.40498},{"lat":10.64785,"long":-61.405882},{"lat":10.648166,"long":-61.405689},{"lat":10.648324,"long":-61.406198},{"lat":10.648546,"long":-61.406799},{"lat":10.648672,"long":-61.407217},{"lat":10.64901,"long":-61.408199},{"lat":10.649495,"long":-61.409272},{"lat":10.650064,"long":-61.410903},{"lat":10.650781,"long":-61.412748},{"lat":10.651161,"long":-61.413993},{"lat":10.651519,"long":-61.415817},{"lat":10.651498,"long":-61.417383},{"lat":10.65114,"long":-61.418992},{"lat":10.651076,"long":-61.420451},{"lat":10.650697,"long":-61.42176},{"lat":10.650338,"long":-61.423177},{"lat":10.650106,"long":-61.424421},{"lat":10.649874,"long":-61.425258},{"lat":10.649347,"long":-61.42543},{"lat":10.649221,"long":-61.425215},{"lat":10.649326,"long":-61.424464},{"lat":10.649368,"long":-61.424185},{"lat":10.649052,"long":-61.424099},{"lat":10.648356,"long":-61.424078},{"lat":10.647723,"long":-61.423906},{"lat":10.647512,"long":-61.423455},{"lat":10.64785,"long":-61.421889},{"lat":10.648061,"long":-61.420966},{"lat":10.648272,"long":-61.419915},{"lat":10.647512,"long":-61.419743},{"lat":10.646838,"long":-61.419808},{"lat":10.6461,"long":-61.420494},{"lat":10.645804,"long":-61.420516},{"lat":10.645467,"long":-61.420065},{"lat":10.645277,"long":-61.420065}]', 2),
(21, 'Shuttle Route 5\r\n\r\nRound d Camp!\r\n\r\nTraverses all shuttle stops on main campus. Times: 24hr', '[{"lat":10.638002,"long":-61.399884},{"lat":10.636905,"long":-61.394906},{"lat":10.640532,"long":-61.39482},{"lat":10.641123,"long":-61.397824},{"lat":10.642936,"long":-61.398318},{"lat":10.645383,"long":-61.399133},{"lat":10.645214,"long":-61.401322},{"lat":10.643527,"long":-61.401622},{"lat":10.642894,"long":-61.402395},{"lat":10.640321,"long":-61.401279},{"lat":10.638128,"long":-61.40012}]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shuttle`
--

CREATE TABLE IF NOT EXISTS `shuttle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shuttle`
--

INSERT INTO `shuttle` (`id`, `coords`) VALUES
(1, '{"lat":10.645631,"long":-61.397714}'),
(2, '{"lat":10.651161,"long":-61.413993}');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`shuttleid`) REFERENCES `shuttle` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
