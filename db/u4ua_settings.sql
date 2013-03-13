-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 13 2013 г., 18:39
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u4ua`
--

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_settings`
--

CREATE TABLE IF NOT EXISTS `u4ua_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iname` varchar(255) NOT NULL,
  `idesc` text NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `ch_user_id` int(11) NOT NULL,
  `ch_date` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `u4ua_settings`
--

INSERT INTO `u4ua_settings` (`id`, `iname`, `idesc`, `code`, `value`, `ch_user_id`, `ch_date`, `is_deleted`) VALUES
(1, 'Вес голоса судьи', 'Количество баллов за голос судьи', 'judge_vote_weight', '20', 1, 1363192029, 0),
(2, 'Вес звезды', 'Количество голосов судей на 1 звезду', 'star_weight', '1', 1, 1363192503, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
