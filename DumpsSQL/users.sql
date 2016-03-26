-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2015 г., 00:44
-- Версия сервера: 5.5.45
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `authorize`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `randcode` varchar(64) NOT NULL,
  `temp` int(2) NOT NULL DEFAULT '0',
  `monero` varchar(32) NOT NULL DEFAULT '0',
  `okpay` varchar(32) NOT NULL DEFAULT '0',
  `cocapay` varchar(32) NOT NULL DEFAULT '0',
  `payeer` varchar(32) NOT NULL DEFAULT '0',
  `payza` varchar(32) NOT NULL DEFAULT '0',
  `perfectmoney` varchar(32) NOT NULL DEFAULT '0',
  `skrill` varchar(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
