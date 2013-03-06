-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 06 2013 г., 19:09
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
  `contact_role` varchar(255) NOT NULL,
  `rating_fb` int(11) NOT NULL,
  `rating_vk` int(11) NOT NULL,
  `rating_gp` int(11) NOT NULL,
  `rating_tw` int(11) NOT NULL,
  `rating_judges` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `views_count` int(11) NOT NULL,
  `comments_count` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_sample` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `u4ua_ideas`
--

INSERT INTO `u4ua_ideas` (`id`, `user_id`, `youtube_img`, `youtube_code`, `qr_code`, `iname`, `idesc`, `contact_first_name`, `contact_last_name`, `contact_email`, `contact_phone`, `contact_role`, `rating_fb`, `rating_vk`, `rating_gp`, `rating_tw`, `rating_judges`, `rating`, `views_count`, `comments_count`, `is_active`, `is_sample`, `is_deleted`, `add_date`) VALUES
(1, 1, 'http://i1.ytimg.com/vi/2yUZJZC2V40/0.jpg', '2yUZJZC2V40', 'upload/qr/u4ua_idea_1.png', 'Black Label Sociaty', 'Like this video? Come see hundreds more at KrankTV.com! - the Net''s biggest home for metal, death, grind, thrash, rapcore, heavy and hard rock music videos!\nIf you like the hard stuff, come get hooked on KrankTV.com! \nDirector: Rob Zombie', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1362400265),
(2, 2, 'http://i1.ytimg.com/vi/oYZh9yQu1fo/0.jpg', 'oYZh9yQu1fo', 'resources/img/qr/u4ua_idea_2.png', 'Black Label Society-Bleed For Me live', 'DISCLAIMER: I DO NOT OWN ANY RIGHTS TO ALL ARTISTS, SONGS, ALBUMS, VIDEOS, ETC, ETC. FEATURED IN THIS CHANNEL, THE VIDEOS, ETC. ALL RIGHTS ARE OWNED BY THEIR RESPECTIVE OWNERS AND NOT BY ME AT ALL! THIS IS ALL JUST FOR FUN AND NOT A SERIOUS ACT OF COPYRIGHT INFRAGMENT. IF YOU ARE NOT OK WITH ME USING THE MUSIC OWNED BY YOU(RECORD LABEL, MANAGER, ETC.) THEN CONTACT ME THROUGH A PRIVATE MESSAGE AND I WILL BE MORE THAN HAPPY TO REMOVE YOUR CONTENT AND NEVER USE IT IN THE FUTURE FOR ANYTHING. ITS ALL COPYRIGHT PROTECTED, I KNOW. ', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1360946675),
(3, 2, 'http://i1.ytimg.com/vi/nuDFbh-SulQ/0.jpg', 'nuDFbh-SulQ', 'resources/img/qr/u4ua_idea_3.png', '✞Black Label Society✞ - War Of Heaven', 'В долгосрочном периоде экономические последствия были минимальными. Проседание курса акций концерна в разгар скандала составило всего 0,6%. Спустя несколько месяцев восстановилась рыночная доля, а на рынке Италии позиции компании даже укрепились.', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360947410),
(4, 2, 'http://i1.ytimg.com/vi/RjWWWs4rPd0/0.jpg', 'RjWWWs4rPd0', 'resources/img/qr/u4ua_idea_4.png', 'Ozzy Osbourne - Dreamer', 'If you would like to watch this music video in 1152p: (HD+)\nNOTE: (You must have a screen resolution of 1920×1080 minimum and a dual-core processer in order to play this video in 1080 or 1152p)', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1360947518),
(5, 2, 'http://i1.ytimg.com/vi/4Pbl4x1OKqs/0.jpg', '4Pbl4x1OKqs', 'resources/img/qr/u4ua_idea_5.png', 'Ozzy Osbourne - Hellraiser', 'Ozzy Osbourne - Hellraiser, from No More Tears album. \n\nNot an official music video\nNão é um clipe original\n\nThank you for all the views', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 1, 0, 0, 0, 0, 1, 0, 11, 0, 0, 0, 1362171020),
(6, 3, 'http://i1.ytimg.com/vi/7WPVaOWYIl4/0.jpg', '7WPVaOWYIl4', 'resources/img/qr/u4ua_idea_6.png', 'FreeJam', 'Route 66, Kyiv, Ukraine/ 18.07.2011 снує багато варіацій уривків з Lorem Ipsum, але більшість з них зазнала певних змін на кшталт жартівливих вставок або змішування слів, які навіть не виглядають правдоподібно. Якщо ви збираєтесь використовувати Lorem Ipsum, ви маєте упевнитись в тому, що всередині тексту не приховано нічого, що могло б викликати у читача конфуз. Більшість відомих генераторів Lorem Ipsum в Мережі генерують текст шляхом повторення наперед заданих послідовностей Lorem Ipsum. Принципова відмінність цього генератора робить його першим справжнім генератором Lorem Ipsum. Він використовує словник з більш як 200 слів латини та цілий набір моделей речень - це дозволяє генерувати Lorem Ipsum, який виглядає осмислено. Таким чином, згенерований Lorem Ipsum не міститиме повторів, жартів, нехарактерних для латини слів і т.ін.', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1362050399),
(7, 1, 'http://i1.ytimg.com/vi/4Pbl4x1OKqs/0.jpg', '4Pbl4x1OKqs', 'resources/img/qr/u4ua_idea_7.png', 'Ozzy Osbourne - Hellraiser', 'Ozzy Osbourne - Hellraiser, from No More Tears album. \n\nNot an official music video\nNão é um clipe original\n\nThank you for all the views', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1362036787),
(8, 1, 'http://i1.ytimg.com/vi/HFyiZpI-ToQ/0.jpg', 'HFyiZpI-ToQ', 'upload/qr/u4ua_idea_8.png', 'Магазинчик БО. Эпизод 1. Интро плюс фонарь', 'Это самая первая серия "Магазинчика Бо". Проект был придуман мной еще в 2002 году, но запущен только в конце 2003-его. До это был сделан трейлер, с которым я ходил по всяким большим конторам и предлагал к спонсированию и помощи в разработке. Популярность Масяни была на самом пике и я старался вопользоватся этим, меня везде принимали на ура, Но, смотрели трейлер и на лице отображалось полное непонимание происходящего. Короче, несмотря на всю популярность, несмотря на большую востребованость, сериал никто так и не взялся производить. Никто так ни хрена не понял, о чем это вообще. Большие дяди тупили по полной.\n\nВ конце 2003 было принято решение производить сериал самостоятельно. Пошли они все, типа. Немного нагловатое решение производить сериал не имея денег совсем ни сколько. Но ок, денег немного худо-бедно давала Масяня и надо было рвать когти, пока хоть сколько-то есть, ибо ясно было, что никакой помощи мы не найдем, деньги в России дают только на гавеную попсу. Персонажи были разработаны Катей Гореловой, её же руки- бОльшая часть анимации. За мной была концептуальная, сценарная работа, озвучка, монтаж и режиссура, я определял в сериале абсолютно всё, поэтому я считаю сериал своим авторским проектом. Музон в сериале весь абсолютно чистый, с согласия авторов. Наслаждайтесь. \n\nПроизводство сериала прекратилось вместе с роспуском студии "Мульт.ру". Всего в сериале 26 серий плюс один музыкальный клип для "Сплина".', 'Yuriy', 'Denishchenko', 'i@randix.info', '+380634983248', 'Leader', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas_attachments`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `path` varchar(255) NOT NULL,
  `iname` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `u4ua_ideas_attachments`
--

INSERT INTO `u4ua_ideas_attachments` (`id`, `idea_id`, `user_id`, `type`, `ext`, `path`, `iname`, `is_deleted`, `add_date`) VALUES
(1, 7, 1, 'application/vnd.openxmlformats-officedocument.word', 'docx', 'upload/1260f67ff5f232ca0548ae9b6e7eb8b0d7969efd.docx', 'Raffaello_8_март_rules_реквизиты_apa.docx', 0, 1362390312),
(2, 1, 1, 'image/jpeg', 'jpg', 'upload/attachments/89193023e17ee4da12f96c1fc4b469823f2c5694.jpg', 'z_ec893519.jpg', 0, 1362409666),
(3, 8, 1, 'image/jpeg', 'jpg', 'upload/attachments/5f175852417f47d4547116186428f3ce62b464cd.jpg', 'z_ec893519.jpg', 0, 1362583450);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas_comments`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(512) NOT NULL,
  `user_avatar_m` varchar(255) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `idesc` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `u4ua_ideas_comments`
--

INSERT INTO `u4ua_ideas_comments` (`id`, `idea_id`, `user_id`, `user_full_name`, `user_avatar_m`, `iname`, `idesc`, `is_deleted`, `add_date`) VALUES
(1, 5, 1, 'Yuriy Denishchenko', '', '', 'Hs,f', 0, 1362487857),
(2, 5, 1, 'Yuriy Denishchenko', '', '', 'sdsdfsd', 0, 1362487988),
(3, 5, 1, 'Yuriy Denishchenko', '', '', 'fgdgdfg', 0, 1362488493),
(4, 5, 1, 'Yuriy Denishchenko', '', '', 'fgdgdfgdfgdsfg', 0, 1362488497),
(5, 5, 1, 'Yuriy Denishchenko', '', '', 'dsfgdfgd', 0, 1362488521),
(6, 5, 1, 'Yuriy Denishchenko', '', '', 'sdfsdfsdf', 0, 1362488536),
(7, 5, 1, 'Yuriy Denishchenko', '', '', 'we', 0, 1362488551),
(8, 5, 1, 'Yuriy Denishchenko', '', '', 'qwerwqtg', 0, 1362488555),
(9, 5, 1, 'Yuriy Denishchenko', '', '', 'ertertert', 0, 1362488562),
(10, 5, 1, 'Yuriy Denishchenko', '', '', 'wertetgdbcbh', 0, 1362488566),
(11, 5, 1, 'Yuriy Denishchenko', '', '', 'drtdfwggdffg', 0, 1362488573);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_ideas_team`
--

CREATE TABLE IF NOT EXISTS `u4ua_ideas_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar_s` varchar(255) NOT NULL,
  `avatar_m` varchar(255) NOT NULL,
  `avatar_b` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `u4ua_ideas_team`
--

INSERT INTO `u4ua_ideas_team` (`id`, `idea_id`, `user_id`, `first_name`, `last_name`, `role`, `avatar_s`, `avatar_m`, `avatar_b`, `is_deleted`, `add_date`) VALUES
(1, 7, 1, 'Артем', 'Сухорослов', 'Проджем-менеджер', 'upload/s_dcf8e289bc1cac0b8f8bfc587aff65f2bb0a794f.jpg', 'upload/m_dcf8e289bc1cac0b8f8bfc587aff65f2bb0a794f.jpg', 'upload/dcf8e289bc1cac0b8f8bfc587aff65f2bb0a794f.jpg', 0, 1362390249),
(2, 1, 1, 'dsd', 'dsd', 'dsd', 'upload/team/s_352e6d6de3007de411dad2bcd212feaaa2cba885.jpg', 'upload/team/m_352e6d6de3007de411dad2bcd212feaaa2cba885.jpg', 'upload/team/352e6d6de3007de411dad2bcd212feaaa2cba885.jpg', 0, 1362410166),
(3, 8, 1, 'Оля', 'Карась', 'ПМ', 'upload/team/s_353e4128a5219202509f0345ae19382af3cb7199.jpg', 'upload/team/m_353e4128a5219202509f0345ae19382af3cb7199.jpg', 'upload/team/353e4128a5219202509f0345ae19382af3cb7199.jpg', 0, 1362583474);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `u4ua_ideas_votes`
--

INSERT INTO `u4ua_ideas_votes` (`id`, `user_id`, `idea_id`, `handler_type`, `is_judge`, `is_deleted`, `add_date`) VALUES
(6, 1, 5, 'facebook', 0, 0, 1362394733),
(5, 1, 2, 'facebook', 1, 0, 1362394641);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_judges`
--

CREATE TABLE IF NOT EXISTS `u4ua_judges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_url` varchar(255) NOT NULL,
  `company_iname` varchar(512) NOT NULL,
  `role` varchar(255) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `idesc` text NOT NULL,
  `youtube_img` varchar(255) NOT NULL,
  `youtube_code` varchar(255) NOT NULL,
  `avatar_b` varchar(255) NOT NULL,
  `avatar_m` varchar(255) NOT NULL,
  `avatar_s` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `u4ua_judges`
--

INSERT INTO `u4ua_judges` (`id`, `user_id`, `first_name`, `last_name`, `company_url`, `company_iname`, `role`, `iname`, `idesc`, `youtube_img`, `youtube_code`, `avatar_b`, `avatar_m`, `avatar_s`, `is_deleted`, `add_date`) VALUES
(1, 1, 'Иван', 'Распутин', 'http://google.com', 'Google Inc', 'врпвра', 'парапр', 'параппр', 'http://i1.ytimg.com/vi/vgPBu0ZvXig/0.jpg', 'vgPBu0ZvXig', 'upload/judges/b_4f4ef6df4fdf3c40887e204c66177aa9329e636e.jpg', 'upload/judges/m_4f4ef6df4fdf3c40887e204c66177aa9329e636e.jpg', 'upload/judges/s_4f4ef6df4fdf3c40887e204c66177aa9329e636e.jpg', 0, 1362502845);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `u4ua_partners`
--

INSERT INTO `u4ua_partners` (`id`, `user_id`, `youtube_img`, `youtube_code`, `url`, `iname`, `idesc`, `avatar_b`, `avatar_m`, `avatar_s`, `is_deleted`, `add_date`) VALUES
(1, 1, '', '', 'http://google.com', 'Google Inc', 'The biggest company in the world', 'upload/partners/b_6c38fc39ac34156630618db4abb9b9d92d097728.jpg', 'upload/partners/m_6c38fc39ac34156630618db4abb9b9d92d097728.jpg', 'upload/partners/s_6c38fc39ac34156630618db4abb9b9d92d097728.jpg', 0, 1362580337);

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
  `avatar_b` varchar(255) NOT NULL,
  `avatar_m` varchar(255) NOT NULL,
  `avatar_s` varchar(255) NOT NULL,
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
  `is_judge` tinyint(4) NOT NULL,
  `online_till` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `u4ua_users`
--

INSERT INTO `u4ua_users` (`id`, `login`, `password`, `email`, `first_name`, `last_name`, `url_friendly_name`, `avatar_b`, `avatar_m`, `avatar_s`, `timezone`, `gender`, `access_level`, `auto_login_key`, `facebook_id`, `facebook_oa_access_token`, `facebook_oa_valid_till`, `vkontakte_id`, `vkontakte_oa_access_token`, `vkontakte_oa_valid_till`, `google_id`, `google_oa_access_token`, `google_oa_valid_till`, `twitter_id`, `twitter_oa_access_token`, `twitter_oa_valid_till`, `is_judge`, `online_till`, `add_date`) VALUES
(1, '', '', 'i@randix.info', 'Yuriy', 'Denishchenko', 'randix0', '', '', '', 2, 2, 100, '', 100000667500718, 'AAAE1OlpNSh0BANCy0sMXmZC7LcPYAzx1a8DbYS78LP404zzvOole9ZBFgRp1TCRn6dSqVowiZCsIZBTIuFcAHsIHpOmLWpQUP9th8K7cFwZDZD', 1366044892, 0, '', 0, '0', '', 0, 0, '', 0, 1, 0, 1360933937),
(2, '', '', 'vladis.lavrenchuk@gmail.com', 'Vladis', 'Lavrenchuk', 'vladis.lavrenchuk', '', '', '', 2, 2, 0, '', 1828044770, 'AAAE1OlpNSh0BADRsZC8UgaypbeiurpxrzdF9fl3xm28mzHSYeqSLnS7hwr7VZAZAHbH0IeDFLTKILmAfdViKWjpb0kTG8vGdUYKlbcw8AZDZD', 1366115634, 0, '', 0, '0', '', 0, 0, '', 0, 0, 0, 1360933967),
(3, '', '', 'sukhoroslov@gmail.com', 'Artem', 'Sukhoroslov', 'sukhoroslov', '', '', '', 2, 2, 0, '', 1050120214, 'AAAE1OlpNSh0BAEEcXL0PzB4KljnZAuiFybHCQZCPsz3XTCuQfHjxMhzkKGrYgTqPubrFo504yhey3YjRhvcTPuoH8a5dmnRE11yLpykQZDZD', 1366118104, 0, '', 0, '0', '', 0, 0, '', 0, 0, 0, 1360934106);

-- --------------------------------------------------------

--
-- Структура таблицы `u4ua_videos`
--

CREATE TABLE IF NOT EXISTS `u4ua_videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `youtube_img` varchar(255) NOT NULL,
  `youtube_code` varchar(255) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `idesc` text NOT NULL,
  `signature` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `u4ua_videos`
--

INSERT INTO `u4ua_videos` (`id`, `user_id`, `youtube_img`, `youtube_code`, `iname`, `idesc`, `signature`, `is_deleted`, `add_date`) VALUES
(1, 1, 'http://i1.ytimg.com/vi/bS4n1NNqBt8/0.jpg', 'bS4n1NNqBt8', '✞Black Label Society✞ - Hell Is High', 'Hell is high\nSo am I\nA junkie''s rush, flying across the sky\nA million miles an hour\nNo, it ain''t enough\nMachine gun mind and a junkie''s rush\n\nLife is good\nLife is fine\nPull the trigger one more time\n\nHell is high\nAnd you all know\nWhen the pedal hits the floor it''s time to roll\nA million miles an hour\nNo, it ain''t enough\nMachine gun mind and a junkie''s rush\n\nLife is good\nLife is fine\nPull the trigger one more time\n\nHell is high\nAnd so are you\nTake a look in the mirror\nYeah, you know its true\nA million miles an hour\nNo, it ain''t enough\nMachine gunmind and a junkie''s rush\n\nLife is good\nLife is fine\nPull the trigger one more time', '', 0, 1362586885),
(2, 1, '', '', 'sdcsdc', 'zxczxc', '', 0, 1362587028);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
