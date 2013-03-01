-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 01 2013 г., 19:07
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
  `qr_code` varchar(255) NOT NULL,
  `iname` text NOT NULL,
  `idesc` text NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `rating_fb` int(11) NOT NULL,
  `rating_vk` int(11) NOT NULL,
  `rating_gp` int(11) NOT NULL,
  `rating_tw` int(11) NOT NULL,
  `rating_judges` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `views_count` int(11) NOT NULL,
  `comments_count` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `u4ua_ideas`
--

INSERT INTO `u4ua_ideas` (`id`, `user_id`, `youtube_img`, `youtube_code`, `qr_code`, `iname`, `idesc`, `contact_first_name`, `contact_last_name`, `contact_email`, `contact_phone`, `rating_fb`, `rating_vk`, `rating_gp`, `rating_tw`, `rating_judges`, `rating`, `views_count`, `comments_count`, `is_active`, `is_deleted`, `add_date`) VALUES
(1, 1, 'http://i1.ytimg.com/vi/2yUZJZC2V40/0.jpg', '2yUZJZC2V40', 'resources/img/qr/u4ua_idea_1.png', 'Black Label Sociaty', 'Like this video? Come see hundreds more at KrankTV.com! - the Net''s biggest home for metal, death, grind, thrash, rapcore, heavy and hard rock music videos!\nIf you like the hard stuff, come get hooked on KrankTV.com! \nDirector: Rob Zombie', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360946305),
(2, 1, 'http://i1.ytimg.com/vi/oYZh9yQu1fo/0.jpg', 'oYZh9yQu1fo', 'resources/img/qr/u4ua_idea_2.png', 'Black Label Society-Bleed For Me live', 'DISCLAIMER: I DO NOT OWN ANY RIGHTS TO ALL ARTISTS, SONGS, ALBUMS, VIDEOS, ETC, ETC. FEATURED IN THIS CHANNEL, THE VIDEOS, ETC. ALL RIGHTS ARE OWNED BY THEIR RESPECTIVE OWNERS AND NOT BY ME AT ALL! THIS IS ALL JUST FOR FUN AND NOT A SERIOUS ACT OF COPYRIGHT INFRAGMENT. IF YOU ARE NOT OK WITH ME USING THE MUSIC OWNED BY YOU(RECORD LABEL, MANAGER, ETC.) THEN CONTACT ME THROUGH A PRIVATE MESSAGE AND I WILL BE MORE THAN HAPPY TO REMOVE YOUR CONTENT AND NEVER USE IT IN THE FUTURE FOR ANYTHING. ITS ALL COPYRIGHT PROTECTED, I KNOW. ', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360946675),
(3, 1, 'http://i1.ytimg.com/vi/nuDFbh-SulQ/0.jpg', 'nuDFbh-SulQ', 'resources/img/qr/u4ua_idea_3.png', '✞Black Label Society✞ - War Of Heaven', 'В долгосрочном периоде экономические последствия были минимальными. Проседание курса акций концерна в разгар скандала составило всего 0,6%. Спустя несколько месяцев восстановилась рыночная доля, а на рынке Италии позиции компании даже укрепились.', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360947410),
(4, 1, 'http://i1.ytimg.com/vi/RjWWWs4rPd0/0.jpg', 'RjWWWs4rPd0', 'resources/img/qr/u4ua_idea_4.png', 'Ozzy Osbourne - Dreamer', 'If you would like to watch this music video in 1152p: (HD+)\nNOTE: (You must have a screen resolution of 1920×1080 minimum and a dual-core processer in order to play this video in 1080 or 1152p)', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360947518),
(5, 1, 'http://i1.ytimg.com/vi/4Pbl4x1OKqs/0.jpg', '4Pbl4x1OKqs', '', 'Ozzy Osbourne - Hellraiser', 'Ozzy Osbourne - Hellraiser, from No More Tears album. \n\nNot an official music video\nNão é um clipe original\n\nThank you for all the views', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360947579),
(6, 1, 'http://i1.ytimg.com/vi/7WPVaOWYIl4/0.jpg', '7WPVaOWYIl4', 'resources/img/qr/u4ua_idea_6.png', 'FreeJam', 'Route 66, Kyiv, Ukraine/ 18.07.2011 снує багато варіацій уривків з Lorem Ipsum, але більшість з них зазнала певних змін на кшталт жартівливих вставок або змішування слів, які навіть не виглядають правдоподібно. Якщо ви збираєтесь використовувати Lorem Ipsum, ви маєте упевнитись в тому, що всередині тексту не приховано нічого, що могло б викликати у читача конфуз. Більшість відомих генераторів Lorem Ipsum в Мережі генерують текст шляхом повторення наперед заданих послідовностей Lorem Ipsum. Принципова відмінність цього генератора робить його першим справжнім генератором Lorem Ipsum. Він використовує словник з більш як 200 слів латини та цілий набір моделей речень - це дозволяє генерувати Lorem Ipsum, який виглядає осмислено. Таким чином, згенерований Lorem Ipsum не міститиме повторів, жартів, нехарактерних для латини слів і т.ін.', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1362050399);

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
-- Структура таблицы `u4ua_ideas_comments`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `idesc` text NOT NULL,
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
-- Структура таблицы `u4ua_ideas_votes`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `handler_type` varchar(10) NOT NULL,
  `is_judge` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `google_id` varchar(50) NOT NULL,
  `google_oa_access_token` text NOT NULL,
  `google_oa_valid_till` int(11) NOT NULL,
  `twitter_id` bigint(20) NOT NULL,
  `twitter_oa_access_token` varchar(255) NOT NULL,
  `twitter_oa_valid_till` int(11) NOT NULL,
  `online_till` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `u4ua_users`
--

INSERT INTO `u4ua_users` (`id`, `login`, `password`, `email`, `first_name`, `last_name`, `url_friendly_name`, `timezone`, `gender`, `access_level`, `auto_login_key`, `facebook_id`, `facebook_oa_access_token`, `facebook_oa_valid_till`, `vkontakte_id`, `vkontakte_oa_access_token`, `vkontakte_oa_valid_till`, `google_id`, `google_oa_access_token`, `google_oa_valid_till`, `twitter_id`, `twitter_oa_access_token`, `twitter_oa_valid_till`, `online_till`, `add_date`) VALUES
(1, '', '', 'i@randix.info', 'Yuriy', 'Denishchenko', 'randix0', 2, 2, 0, '', 100000667500718, 'AAAE1OlpNSh0BANCy0sMXmZC7LcPYAzx1a8DbYS78LP404zzvOole9ZBFgRp1TCRn6dSqVowiZCsIZBTIuFcAHsIHpOmLWpQUP9th8K7cFwZDZD', 1366044892, 0, '', 0, '0', '', 0, 0, '', 0, 0, 1360933937),
(2, '', '', 'vladis.lavrenchuk@gmail.com', 'Vladis', 'Lavrenchuk', 'vladis.lavrenchuk', 2, 2, 0, '', 1828044770, 'AAAE1OlpNSh0BADRsZC8UgaypbeiurpxrzdF9fl3xm28mzHSYeqSLnS7hwr7VZAZAHbH0IeDFLTKILmAfdViKWjpb0kTG8vGdUYKlbcw8AZDZD', 1366115634, 0, '', 0, '0', '', 0, 0, '', 0, 0, 1360933967),
(3, '', '', 'sukhoroslov@gmail.com', 'Artem', 'Sukhoroslov', 'sukhoroslov', 2, 2, 0, '', 1050120214, 'AAAE1OlpNSh0BAEEcXL0PzB4KljnZAuiFybHCQZCPsz3XTCuQfHjxMhzkKGrYgTqPubrFo504yhey3YjRhvcTPuoH8a5dmnRE11yLpykQZDZD', 1366118104, 0, '', 0, '0', '', 0, 0, '', 0, 0, 1360934106);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
