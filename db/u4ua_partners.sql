-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 18 2013 г., 15:12
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
-- Структура таблицы `u4ua_partners`
--

CREATE TABLE IF NOT EXISTS `u4ua_partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `youtube_img` varchar(255) NOT NULL,
  `youtube_code` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `iname` varchar(512) NOT NULL,
  `idesc` text NOT NULL,
  `avatar_b` varchar(255) NOT NULL,
  `avatar_m` varchar(255) NOT NULL,
  `avatar_s` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `u4ua_partners`
--

INSERT INTO `u4ua_partners` (`id`, `user_id`, `youtube_img`, `youtube_code`, `url`, `iname`, `idesc`, `avatar_b`, `avatar_m`, `avatar_s`, `is_deleted`, `add_date`) VALUES
(1, 1, '', '', 'http://google.com', 'Google Inc', 'The biggest company in the world', 'upload/partners/b_6e12bd911da4d5ba3bd72b279dfac5854c87a7c2.jpg', 'upload/partners/m_6e12bd911da4d5ba3bd72b279dfac5854c87a7c2.jpg', 'upload/partners/s_6e12bd911da4d5ba3bd72b279dfac5854c87a7c2.jpg', 0, 1362580337),
(2, 1, 'http://i1.ytimg.com/vi/h1Z1_4h2ydM/0.jpg', 'h1Z1_4h2ydM', 'ываыва', 'ваываываыа', 'ывавыа', 'upload/partners/b_300d11b00ac787ec8abfdd4b53230995b11359ab.jpg', 'upload/partners/m_300d11b00ac787ec8abfdd4b53230995b11359ab.jpg', 'upload/partners/s_300d11b00ac787ec8abfdd4b53230995b11359ab.jpg', 0, 1363013368);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
