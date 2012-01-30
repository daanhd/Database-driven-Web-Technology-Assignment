-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 Jan 2012 om 14:52
-- Serverversie: 5.5.9
-- PHP-Versie: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbweb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups`
--

CREATE TABLE `groups` (
  `ID_group` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `groups`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `payments`
--

CREATE TABLE `payments` (
  `ID_payment` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `payments`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `bankaccount` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `group_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` VALUES(1, 'Daan Disselhorst', '0', 'daanhd', 0, 'ad921d60486366258809553a3db49a4a', '2012-01-24');
INSERT INTO `users` VALUES(4, 'Joop Jansen', '403231744', 'joop', 4, 'ad921d60486366258809553a3db49a4a', '2012-01-29');
INSERT INTO `users` VALUES(5, 'Kees Hendrik', '567823', 'kees', 5, 'ad921d60486366258809553a3db49a4a', '2012-01-29');
