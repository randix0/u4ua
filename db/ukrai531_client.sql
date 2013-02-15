-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 15 2013 г., 19:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ukrai531_client`
--

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `youtube_img` varchar(255) NOT NULL,
  `youtube_code` varchar(50) NOT NULL,
  `iname` text NOT NULL,
  `idesc` text NOT NULL,
  `cantact_first_name` varchar(255) NOT NULL,
  `cantact_last_name` varchar(255) NOT NULL,
  `cantact_email` varchar(255) NOT NULL,
  `cantact_phone` varchar(20) NOT NULL,
  `rating_fb` int(11) NOT NULL,
  `rating_vk` int(11) NOT NULL,
  `rating_gp` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `views_count` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `u4ua_ideas`
--

INSERT INTO `u4ua_ideas` (`id`, `user_id`, `youtube_img`, `youtube_code`, `iname`, `idesc`, `cantact_first_name`, `cantact_last_name`, `cantact_email`, `cantact_phone`, `rating_fb`, `rating_vk`, `rating_gp`, `rating`, `views_count`, `is_active`, `is_deleted`, `add_date`) VALUES
(1, 1, 'http://i1.ytimg.com/vi/2yUZJZC2V40/0.jpg', '2yUZJZC2V40', 'Black Label Sociaty', 'Like this video? Come see hundreds more at KrankTV.com! - the Net''s biggest home for metal, death, grind, thrash, rapcore, heavy and hard rock music videos!\nIf you like the hard stuff, come get hooked on KrankTV.com! \nDirector: Rob Zombie', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 1360946305),
(2, 1, 'http://i1.ytimg.com/vi/oYZh9yQu1fo/0.jpg', 'oYZh9yQu1fo', 'Black Label Society-Bleed For Me live', 'DISCLAIMER: I DO NOT OWN ANY RIGHTS TO ALL ARTISTS, SONGS, ALBUMS, VIDEOS, ETC, ETC. FEATURED IN THIS CHANNEL, THE VIDEOS, ETC. ALL RIGHTS ARE OWNED BY THEIR RESPECTIVE OWNERS AND NOT BY ME AT ALL! THIS IS ALL JUST FOR FUN AND NOT A SERIOUS ACT OF COPYRIGHT INFRAGMENT. IF YOU ARE NOT OK WITH ME USING THE MUSIC OWNED BY YOU(RECORD LABEL, MANAGER, ETC.) THEN CONTACT ME THROUGH A PRIVATE MESSAGE AND I WILL BE MORE THAN HAPPY TO REMOVE YOUR CONTENT AND NEVER USE IT IN THE FUTURE FOR ANYTHING. ITS ALL COPYRIGHT PROTECTED, I KNOW. ', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 1360946675),
(3, 1, 'http://i1.ytimg.com/vi/nuDFbh-SulQ/0.jpg', 'nuDFbh-SulQ', '✞Black Label Society✞ - War Of Heaven', 'В долгосрочном периоде экономические последствия были минимальными. Проседание курса акций концерна в разгар скандала составило всего 0,6%. Спустя несколько месяцев восстановилась рыночная доля, а на рынке Италии позиции компании даже укрепились.', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 1360947410),
(4, 1, 'http://i1.ytimg.com/vi/RjWWWs4rPd0/0.jpg', 'RjWWWs4rPd0', 'Ozzy Osbourne - Dreamer', 'If you would like to watch this music video in 1152p: (HD+)\nNOTE: (You must have a screen resolution of 1920×1080 minimum and a dual-core processer in order to play this video in 1080 or 1152p)', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 1360947518),
(5, 1, 'http://i1.ytimg.com/vi/4Pbl4x1OKqs/0.jpg', '4Pbl4x1OKqs', 'Ozzy Osbourne - Hellraiser', 'Ozzy Osbourne - Hellraiser, from No More Tears album. \n\nNot an official music video\nNão é um clipe original\n\nThank you for all the views', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 1360947579);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas_attachments`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `path` varchar(255) NOT NULL,
  `iname` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas_team`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_team` (
  `id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_users`
--

CREATE TABLE IF NOT EXISTS `u4ua_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `url_friendly_name` varchar(255) NOT NULL,
  `timezone` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `access_level` tinyint(4) NOT NULL,
  `auto_login_key` varchar(255) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `facebook_oa_access_token` text NOT NULL,
  `facebook_oa_valid_till` int(11) NOT NULL,
  `vkontakte_id` bigint(20) NOT NULL,
  `vkontakte_oa_access_token` text NOT NULL,
  `vkontakte_oa_valid_till` int(11) NOT NULL,
  `google_id` bigint(20) NOT NULL,
  `google_oa_access_token` text NOT NULL,
  `google_oa_valid_till` int(11) NOT NULL,
  `online_till` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `u4ua_users`
--

INSERT INTO `u4ua_users` (`id`, `login`, `password`, `email`, `first_name`, `last_name`, `url_friendly_name`, `timezone`, `gender`, `access_level`, `auto_login_key`, `facebook_id`, `facebook_oa_access_token`, `facebook_oa_valid_till`, `vkontakte_id`, `vkontakte_oa_access_token`, `vkontakte_oa_valid_till`, `google_id`, `google_oa_access_token`, `google_oa_valid_till`, `online_till`, `add_date`) VALUES
(1, '', '', 'i@randix.info', 'Yuriy', 'Denishchenko', 'randix0', 2, 2, 0, '', 100000667500718, 'AAAE1OlpNSh0BANCy0sMXmZC7LcPYAzx1a8DbYS78LP404zzvOole9ZBFgRp1TCRn6dSqVowiZCsIZBTIuFcAHsIHpOmLWpQUP9th8K7cFwZDZD', 1366044892, 0, '', 0, 0, '', 0, 0, 1360933937),
(2, '', '', 'vladis.lavrenchuk@gmail.com', 'Vladis', 'Lavrenchuk', 'vladis.lavrenchuk', 2, 2, 0, '', 1828044770, 'AAAE1OlpNSh0BADRsZC8UgaypbeiurpxrzdF9fl3xm28mzHSYeqSLnS7hwr7VZAZAHbH0IeDFLTKILmAfdViKWjpb0kTG8vGdUYKlbcw8AZDZD', 1366115634, 0, '', 0, 0, '', 0, 0, 1360933967),
(3, '', '', 'sukhoroslov@gmail.com', 'Artem', 'Sukhoroslov', 'sukhoroslov', 2, 2, 0, '', 1050120214, 'AAAE1OlpNSh0BAEEcXL0PzB4KljnZAuiFybHCQZCPsz3XTCuQfHjxMhzkKGrYgTqPubrFo504yhey3YjRhvcTPuoH8a5dmnRE11yLpykQZDZD', 1366118104, 0, '', 0, 0, '', 0, 0, 1360934106);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
