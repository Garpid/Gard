-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2015 г., 06:03
-- Версия сервера: 5.5.35-log
-- Версия PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'Без названия',
  `author` varchar(255) DEFAULT NULL,
  `pubyear` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `author`, `pubyear`, `price`) VALUES
(1, 'Хоббит', 'Толкиен', 1923, 20000),
(2, 'Властелин колец', 'Толкиен', 1935, 2000),
(3, 'Искусство снайпера', 'Потапов Алексей', 2009, 150000),
(4, 'Словарь военных матерных терминов. Том 74', 'Виктор Григоренко', 1976, 180000),
(5, '«Черная смерть». Советская морская пехота в бою', 'Абрамов Евгений', 2009, 170000),
(6, 'На Западном фронте без перемен', 'Эрих Мария Ремарк', 1929, 150000),
(7, 'Искра жизни', 'Эрих Мария Ремарк', 1952, 150000),
(8, 'Веселый солдат', 'Астафьев Виктор', 2003, 150000);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(255) NOT NULL DEFAULT '',
  `pubyear` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderid` varchar(50) NOT NULL DEFAULT '',
  `datetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `title`, `author`, `pubyear`, `price`, `quantity`, `orderid`, `datetime`) VALUES
(1, 'Искусство снайпера', 'Потапов Алексей', 2009, 150000, 1, '54c4cb0016f9d', 1422324012),
(2, 'Словарь военных матерных терминов. Том 74', 'Виктор Григоренко', 1976, 180000, 1, '54c4cb0016f9d', 1422324012),
(3, '«Черная смерть». Советская морская пехота в бою', 'Абрамов Евгений', 2009, 170000, 1, '54c4cb0016f9d', 1422324012);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
