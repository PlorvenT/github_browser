-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 22 2017 г., 23:15
-- Версия сервера: 5.5.54-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `github_browser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(30) NOT NULL,
  `status` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `like`
--

INSERT INTO `like` (`id`, `object`, `status`, `type`) VALUES
(1, '123123', 1, 1),
(2, '123123', 1, 1),
(3, '993322', 2, 1),
(4, '3451238', 1, 2),
(5, '3431193', 1, 2),
(6, '5737429', 2, 2),
(7, '2235667', 2, 2),
(8, '14681791', 1, 2),
(9, '37696487', 1, 2),
(10, '197995', 2, 1),
(11, '47294', 2, 1),
(12, '209837', 1, 1),
(13, '100198', 1, 1),
(14, '440902', 1, 1),
(15, '438046', 1, 1),
(16, '730039', 1, 1),
(17, '1178722', 2, 1),
(18, '5290963', 1, 2),
(19, '3135625', 1, 1),
(20, '6073983', 1, 2),
(21, '1088217', 1, 1),
(22, '947681', 1, 1),
(23, '440472', 1, 1),
(24, '4094321', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
