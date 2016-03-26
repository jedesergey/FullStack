-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2015 г., 00:58
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
-- Структура таблицы `ordersMoneroCocaPay`
--

CREATE TABLE IF NOT EXISTS `ordersMoneroCocaPay` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `time2` datetime NOT NULL,
  `user` varchar(32) NOT NULL,
  `price` varchar(32) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `total` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `fee` varchar(32) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `user2` varchar(32) NOT NULL,
  `type2` varchar(32) NOT NULL,
  `fee2` varchar(32) NOT NULL,	
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
