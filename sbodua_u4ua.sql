-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 18 2013 г., 09:27
-- Версия сервера: 5.1.45
-- Версия PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sbodua_u4ua`
--

-- --------------------------------------------------------

--
-- Структура таблицы `idea`
--

CREATE TABLE IF NOT EXISTS `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_url` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `cfname` varchar(255) NOT NULL DEFAULT '',
  `clname` varchar(255) NOT NULL DEFAULT '',
  `cemail` varchar(255) NOT NULL DEFAULT '',
  `cphone` varchar(255) NOT NULL DEFAULT '',
  `tmp` enum('true','false') NOT NULL DEFAULT 'true',
  `created` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `vote_users` int(11) NOT NULL,
  `vote_judges` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `video_url` (`video_url`),
  KEY `title` (`title`),
  KEY `cfname` (`cfname`),
  KEY `clname` (`clname`),
  KEY `cemail` (`cemail`),
  KEY `cphone` (`cphone`),
  KEY `tmp` (`tmp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=222336 ;

--
-- Дамп данных таблицы `idea`
--

INSERT INTO `idea` (`id`, `video_url`, `title`, `description`, `cfname`, `clname`, `cemail`, `cphone`, `tmp`, `created`, `id_user`, `vote_users`, `vote_judges`) VALUES
(123, 'P1JFtuJ745I', 'Where That''s Suspicious Behavior is now', 'The company won Best Presentation at the Launch Festival and secured a $50,000 investment pledge from MailChimp, an email-newsletter company that sponsored the conference.\n\nLoopt, Apple Worldwide Developers Conference 2008\nLoopt, Apple Worldwide Developers Conference 2008\n\nCompany: Loopt\n\nProduct: Mobile app for connecting people on the go\n\nFounders: Alok Deshpande, Sam Altman, Nick Sivo\n\nWhy it''s a great pitch: After a brief intro of the product, Altman brings up the pain point. He says it''s amazing how often you''re at a restaurant a couple of blocks away from a friend or in an airport with a friend, and don''t know about it. \n\nThen he goes back into the product to show how Loopt''s new iPhone app solves that issue. It''s not your typical pitch to a VC but it''s short, concise, and to the point.\n\nWhere Loopt is now: Green Dot Corporation acquired Loopt earlier this year for $43 million. Before the acquisition, Loopt had raised $32 million from investors like Y Combinator, New Enterprise Associates, and Sequoia Capital.\n\nRead more: http://www.businessinsider.com/the-best-startup-pitches-of-all-time-2012-11?op=1#ixzz2K6SdIkLv', 'Тарас', 'Бездетный', 'bts@sb.od.ua', '', 'false', 1359485790, 2, 0, 0),
(321, 'zhlOue2z55Y', 'Yext, TechCrunch 50 2009', 'Company: Yext\n\nProduct: Pay-per-action phone calls advertising business that manages and summarizes relevant phone calls\n\nFounders: Howard Lerman, Brian Distelburger, Brent Metz\n\nWhy it''s a great pitch: Lerman immediately presents the problem, which is that local businesses want phone calls and not clicks. But if you charge on a pay-per-call basis, businesses end up paying for irrelevant calls.  \n\nLerman then shows how Yext plans to solve that issue. He uses an example of Frank''s auto-repair in Alaska, and walks the audience through how Frank can customize his profile to receive relevant calls. \n\nHe then asks the audience, what kind of car he should call Frank about and actually does a live call. After waiting a couple of minutes, he demonstrates how the call information successfully ends up in Frank''s inbox.\n\nLerman''s presentation is the perfect example of show, not tell.\n\nWhere Yext is now: Since debuting at TechCrunch 50 in 2009, Yext has developed an entirely new product for local businesses called PowerListings for managing their listings across sites like Yelp, SuperPages, Citysearch, and others. PowerListings is now used by more than 50,000 paying locations.\n\nTo date, Yext has raised $65.8 million from investors including Institutional Venture Partners, SV Angel, and CrunchFund. It is currently valued at around $200 million.\n\nRead more: http://www.businessinsider.com/the-best-startup-pitches-of-all-time-2012-11?op=1#ixzz2K6Sl3egI\n', 'Alisia', 'Socia', 'u4ua.dev@gmail.com', '', 'false', 1359573946, 1, 0, 0),
(222333, '9ihbmq2GTfU', 'SoMoLend, Startup 2012 ', 'Company: SoMoLend\n\nProduct: Web and mobile-based peer-to-peer lending technology for raising capital \n\nFounder: Candace Suzanne Klein \n\nWhy it''s a great pitch: Klein does a great job of selling the problem before selling the solution. After a short intro, Klein highlights the two main problems that the company solves. First, banks don''t lend to small businesses. Second, individuals and corporations aren''t happy with their stock market returns and their passbook savings so they''re taking their financial portfolios back into their own hands and investing locally. She says it''s created a perfect storm. \n\nInvestors always want to know the size of the market, so she notes how its expected to become a $100 billion market by 2015. She then specifies exactly who they''re targeting: the business borrower and the lender. \n\nObviously, there are a lot of companies emerging in the peer-to-peer lending market, so she highlights SoMoLend''s competitive advantage, which is that they''re social, mobile, and local. She also notes that unlike other companies like Kickstarter, the money on SoMoLend is debt that must be paid back. \n\nAnother great moment is when she says, "For the first time ever" borrowers can raise friends and family capital for their business on an easy-to-use website. Using phrases like "for the first time ever" may sound bombastic, but don''t shy away from them. It''s important to sell the audience on what''s new and different.\n\nWhere SoMoLend is now: SoMoLend won a prize worth $75,000 at Startup 2012. It has raised $1.48 million in capital to date. \n\nRead more: http://www.businessinsider.com/the-best-startup-pitches-of-all-time-2012-11?op=1#ixzz2K6T2GTOt\n', 'Noname', 'Nouser', 'no@mail.com', '', 'false', 1359485790, 2, 100, 20),
(11, 'LV-k3oMGdyE', 'SendGrid, TechStars Boulder Demo Day 2009', 'Company: SendGrid\n\nProduct: Cloud-based email service to deliver transactional emails\n\nFounders: Isaac Saldana, Tim Jenkins, Jose Lopez\n\nWhy it''s a great pitch: Even though it''s a technical pitch, "[Saldana] lays out the differentiation from what he''s doing to what people naturally assume that he''s doing which is just another email, news marketing type of thing," TechStars founder David Cohen says in a breakdown.\n\nCohen also notes how it''s great that Isaac mentions that he has a hundred paying customers already, because it''s great for validation and makes people want to listen. \n\nHe does a good job of "twisting the knife" and showing what the value proposition is. He notes that 20% of emails sent don''t make it to the intended recipient. He also points to a study that for every 1% of emails not delivered, eBay loses $14 million a year.  \n\nSaldana harps on paying customers, which tells investors that that''s what he really cares about. He also tells investors what he plans to do with the money, which is something investors care about, but what some entrepreneurs forget to mention.\n\nWhere SendGrid is now: SendGrid has sent more than 30 billion emails since launching, with big-name companies like Pinterest, Foursquare, Spotify, and Hootsuite relying on the service.\n\nThe company has raised $27.4 million to date from investors including Foundry Group, David Cohen, Jeff Clavier, SoftTech VC, FF Angel LLC, and 500 Startups.\n\nRead more: http://www.businessinsider.com/the-best-startup-pitches-of-all-time-2012-11?op=1#ixzz2K6TFAeOi', 'Alisia 2', 'Socia 2', 'u4ua.dev@gmail.com', '', 'false', 1359573946, 1, 33, 22),
(222334, 'oqvnJM_g2Mw', 'werwerwer', 'asdfasdfasdf', 'Artem', 'Sukhoroslov', '', '', 'false', 1360570994, 5, 0, 0),
(222335, 'LmapkPSk-os', 'Raspberry PI', 'The Raspberry Pi is a credit-card sized computer that plugs into your TV and a keyboard. It’s a capable little PC which can be used for many of the things that your desktop PC does, like spreadsheets, word-processing and games. It also plays high-definition video. We want to see it being used by kids all over the world to learn programming.', 'Yuriy', 'Denishchenko', '', '', 'false', 1360772503, 6, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `idea_command`
--

CREATE TABLE IF NOT EXISTS `idea_command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_idea` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT '',
  KEY `id` (`id`),
  KEY `id_idea` (`id_idea`),
  KEY `name` (`name`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `idea_command`
--

INSERT INTO `idea_command` (`id`, `id_idea`, `name`, `role`) VALUES
(1, 123, 'ta be', 'ro');

-- --------------------------------------------------------

--
-- Структура таблицы `judges`
--

CREATE TABLE IF NOT EXISTS `judges` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `video_url` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `words` text,
  `description` text,
  UNIQUE KEY `id_user` (`id_user`),
  KEY `name` (`name`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `judges`
--

INSERT INTO `judges` (`id_user`, `video_url`, `name`, `title`, `words`, `description`) VALUES
(1, 'hQOiO4qpnOc', 'Равшан', 'Наша Раша.', 'Вечером тёлкамана всех нас деламана. Ни рука деламана, тёлка деламана.', 'Гастарбайтери практично не говорять по-російськи (Равшан — дуже погано, Джамшут — взагалі не говорить), дуже погано знають те, що повинні робити, і через це роблять все неправильно і псують. При цьому на «своєму» мовою, вигаданому авторами (в одній із серії названий начальником «тарабарском», з невеликими словесними включеннями з незрозумілого для авторів скетчкому таджицької мови також говорять секаса (секс), вони спілкуються на вельми серйозні теми, такі як мистецтво, кіно, мобільні та комп''ютерні технології, що створює додатковий комічний ефект, а в 4 сезоні, під час будівництва олімпійських об''єктів, навіть перекручують і спотворюють назви спортивних ігор на вульгарний манер. Крім того, коли «начальника» задає Равшану питання, той його повторює раз або два, перш ніж відповісти.');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `siteurl` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `siteurl` (`siteurl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `name`, `siteurl`, `description`) VALUES
(1, 'Google', 'www.google.com', 'Із самого початку ми зосереджуємося на забезпеченні найкращих рішень для користувачів. Створюючи новий веб-переглядач або вдосконалюючи вигляд домашньої сторінки, ми передусім дбаємо про те, щоб вони служили користувачам, а не нашим внутрішнім цілям чи отриманню прибутку.'),
(2, 'Microsoft', 'www.microsoft.com', 'As a company, and as individuals, we value integrity, honesty, openness, personal excellence, constructive self-criticism, continual self-improvement, and mutual respect. We are committed to our customers and partners and have a passion for technology. We take on big challenges, and pride ourselves on seeing them through. We hold ourselves accountable to our customers, shareholders, partners, and employees by honoring our commitments, providing results, and striving for the highest quality.'),
(3, 'Yandex', 'yandex.ru', 'Яндекс — крупнейшая российская поисковая система и интернет-портал. По данным Liveinternet за декабрь 2012 года, доля Яндекса на поисковом рынке России составляет 60,5%. Месячная аудитория портала — 52 миллиона человек (ComScore, декабрь 2012). Яндекс присутствует также в Украине, Казахстане, Беларуси и Турции. Главная задача Яндекса — отвечать на вопросы пользователей.'),
(4, 'Apple Inc.', 'apple.com', 'Apple Inc., formerly Apple Computer, Inc., is an American multinational corporation headquartered in Cupertino, California that designs, develops, and sells consumer electronics, computer software, and personal computers. Its best-known hardware products are the Mac line of computers, the iPod, the iPhone, and the iPad. Its software includes the OS X and iOS operating systems, the iTunes media browser, the Safari web browser, and the iLife and iWork creativity and production suites. The company was founded on April 1, 1976, and incorporated as Apple Computer, Inc. on January 3, 1977. The word "Computer" was removed from its name on January 9, 2007, reflecting its shifted focus towards consumer electronics after the introduction of the iPhone.'),
(5, 'Фонд Виктора Пинчука', 'pinchukfund.org', 'Протягом понад 10 років відомий український бізнесмен та громадський діяч Віктор Пінчук розробляв, фінансував та втілював у життя благодійні програми та проекти. На початку 2006 року об''єднав цю діяльність у рамках Фонду Віктора Пінчука з метою забезпечення більш послідовного, професійного та відповідального підходу та розвитку нових проектів. На сьогодні Фонд оперує більш ніж 20 проектами в різних галузях суспільного життя, включаючи охорону здоров’я, освіту, мистецтво, розвиток громадянського суспільства і філантропії та глобальну інтеграцію.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `facebook_id` varchar(255) NOT NULL DEFAULT '',
  `is_judge` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `email` (`email`),
  KEY `name` (`name`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `facebook_id` (`facebook_id`),
  KEY `is_judge` (`is_judge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `first_name`, `last_name`, `facebook_id`, `is_judge`, `last_login`) VALUES
(1, 'u4ua.dev@gmail.com', 'Alisia Socia', 'Alisia', 'Socia', '100004868076135', 0, 0),
(2, 'bts@sb.od.ua', 'Тарас Бездетный', 'Тарас', 'Бездетный', '1659837441', 0, 0),
(3, '', 'Andriy Yaroshenko', 'Andriy', 'Yaroshenko', '685815706', 0, 0),
(4, '', 'Olga Belkova', 'Olga', 'Belkova', '100000190820888', 0, 0),
(5, '', 'Artem Sukhoroslov', 'Artem', 'Sukhoroslov', '1050120214', 0, 0),
(6, '', 'Yuriy Denishchenko', 'Yuriy', 'Denishchenko', '100000667500718', 0, 0),
(7, '', 'Olga Grynko', 'Olga', 'Grynko', '100002661384289', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
