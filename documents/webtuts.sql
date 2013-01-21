-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 21 Janvier 2013 à 11:55
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `webtuts`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `category` int(11) NOT NULL,
  `node` int(11) NOT NULL,
  `tags` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `text` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `deleted`, `category`, `node`, `tags`, `author`, `date`, `image`, `title`, `text`, `views`, `comments`) VALUES
(1, 0, 1, 1, 1, 1, '2012-12-15 00:00:00', 0, 4, 5, 32, 0),
(2, 0, 0, 2, 0, 1, '2013-01-11 00:00:00', 0, 31, 32, 0, 0),
(3, 0, 0, 3, 0, 1, '2013-01-02 00:00:00', 0, 78, 79, 0, 0),
(4, 0, 0, 3, 0, 1, '2013-01-13 18:24:36', 0, 80, 81, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE `article_category` (
  `id_category` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article_category`
--

INSERT INTO `article_category` (`id_category`, `id_article`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_comment`
--

CREATE TABLE `article_comment` (
  `id_article` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article_comment`
--

INSERT INTO `article_comment` (`id_article`, `id_comment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

CREATE TABLE `article_tag` (
  `id_article` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article_tag`
--

INSERT INTO `article_tag` (`id_article`, `id_tag`) VALUES
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `articles` int(11) DEFAULT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `deleted`, `name`, `description`, `articles`, `image`) VALUES
(1, 0, 1, 2, 1, 1),
(2, 0, 6, 8, 0, 3),
(3, 0, 9, 10, 0, 2),
(4, 0, 13, 14, 0, 6),
(5, 0, 15, 16, 0, 4),
(6, 0, 17, 18, 0, 5),
(7, 1, 35, 36, NULL, 7),
(8, 1, 35, 36, NULL, 7),
(9, 1, 35, 36, NULL, 7),
(10, 0, 71, 72, NULL, 7),
(11, 0, 73, 74, NULL, 7),
(12, 0, 82, 83, NULL, 1),
(13, 0, 84, 85, NULL, 1),
(14, 0, 88, 89, NULL, 1),
(15, 0, 92, 93, NULL, 1),
(16, 0, 94, 95, NULL, 1),
(17, 0, 96, 97, NULL, 1),
(18, 0, 108, 109, NULL, 1),
(19, 0, 110, 111, NULL, 1),
(20, 0, 144, 145, NULL, 1),
(21, 0, 146, 147, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cms_site_params`
--

CREATE TABLE `cms_site_params` (
  `title` text NOT NULL,
  `time` text NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_site_params`
--

INSERT INTO `cms_site_params` (`title`, `time`, `theme`) VALUES
('webtuts', 'test', 'default');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `article`, `author`, `text`, `date`, `deleted`) VALUES
(1, 1, 1, 'Coooool !', '2013-02-11 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `name`, `type`, `width`, `height`, `deleted`, `size`) VALUES
(1, 'puzzle', 'png', 54, 78, 0, 635),
(2, 'ecusson', 'png', 60, 79, 0, 682),
(3, 'etoile', 'png', 62, 79, 0, 592),
(4, 'coupe', 'png', 86, 80, 0, 871),
(5, 'dossier', 'png', 56, 76, 0, 473),
(6, 'outils', 'png', 76, 77, 0, 727);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `lang` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=229 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `id_lang`, `lang`, `text`) VALUES
(1, 1, 'fr', 'Int&eacute;gration'),
(2, 2, 'fr', 'Ici vous apprendrez les secrets du "Savoir faire un beau site"'),
(3, 4, 'fr', 'Le HTML5, super !'),
(4, 5, 'fr', 'Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit.'),
(5, 3, 'fr', 'Article'),
(6, 7, 'fr', 'Actualité'),
(7, 6, 'fr', 'Animation'),
(8, 8, 'fr', 'Ici vous apprendrez &agrave; dynamiser vos site web gr&acirc;ce &agrave; des animations innovante ou utiles pour vos sites web'),
(9, 9, 'fr', 'Logiciels'),
(10, 10, 'fr', 'Ici vous apprendrez &agrave; vous servir de certain logiciels tr&egrave;s utiles pour faciliter vos d&eacute;veloppements.'),
(11, 11, 'fr', 'PHP'),
(12, 12, 'fr', 'Tous les tutoriels utilisant le langage PHP'),
(13, 13, 'fr', 'D&eacute;veloppement Fonctionnel'),
(14, 14, 'fr', 'Ici vous apprendrez &agrave; g&eacute;rez la partit fonctionnel de votre site, c''est &agrave; dire la partie "Intelligente" de celui-ci.'),
(15, 15, 'fr', 'R&eacute;f&eacute;rencement'),
(16, 16, 'fr', 'Pour que votre site soit visible, il est essentiel d''accorder une grande importance au r&eacute;f&eacute;rencement de celui-ci afin de devenir "SEO friendly" ! C''est par ici !'),
(17, 17, 'fr', 'Autres'),
(18, 18, 'fr', 'Tous les tutoriels inclassable dans les autres cat&eacute;gories seront dans celle-ci. Vous pourrez des articles divers sur le travail d''un web-developer par exemple.'),
(19, 19, 'fr', 'HTML'),
(20, 20, 'fr', 'Tous les tutoriels utilisant le langage HTML'),
(21, 21, 'fr', 'CSS'),
(22, 22, 'fr', 'Tous les tutoriels utilisant le langage CSS'),
(23, 23, 'fr', 'Javascript'),
(24, 24, 'fr', 'Tous les tutoriels utilisant le langage javascript'),
(25, 25, 'fr', 'JQuery'),
(26, 26, 'fr', 'Tous les tutoriels utilisant la bibliothèque JQuery, basé sur javascript'),
(27, 27, 'fr', 'tutoriel'),
(28, 28, 'fr', 'Les types de contenu &eacute;tant des tutoriels'),
(29, 29, 'fr', 'actualit&eacute;'),
(30, 30, 'fr', 'Les types de contenu &eacute;tant des actualit&eacute;s'),
(31, 31, 'fr', 'Webtuts se lance sur le web !'),
(32, 32, 'fr', 'Cras elit ante, consequat sit amet tempor aliquet, condimentum vitae augue. Vivamus venenatis lectus et nunc auctor pulvinar a et elit. Integer vitae ipsum mauris, id posuere urna. Morbi ac dui eros, vel feugiat mi. Nam tortor sem, dictum et cursus sed, molestie non sapien. Suspendisse et ligula dolor. Vivamus commodo, nulla vel commodo convallis, nulla diam mattis magna, sed sollicitudin metus nisl sit amet arcu. Morbi et elementum dolor.'),
(33, 33, 'fr', 'Page test'),
(34, 34, 'fr', '<?php echo "test"; ?>\r\n'),
(35, 35, 'fr', 'TitleFr'),
(36, 35, 'en', 'TitleEn'),
(37, 36, 'fr', 'TitleFr'),
(38, 37, 'fr', 'TitleFr'),
(39, 37, 'en', 'TitleEn'),
(40, 38, 'fr', 'DescriptionFr'),
(41, 39, 'fr', 'TitleFr'),
(42, 39, 'en', 'TitleEn'),
(43, 40, 'fr', 'DescriptionFr'),
(44, 41, 'fr', 'TitleFr'),
(45, 41, 'en', 'TitleEn'),
(46, 42, 'fr', 'DescriptionFr'),
(47, 43, 'fr', 'TitleFr'),
(48, 43, 'en', 'TitleEn'),
(49, 44, 'fr', 'DescriptionFr'),
(50, 45, 'fr', 'TitleFr'),
(51, 45, 'en', 'TitleEn'),
(52, 46, 'fr', 'DescriptionFr'),
(53, 47, 'fr', 'TitleFr'),
(54, 47, 'en', 'TitleEn'),
(55, 48, 'fr', 'DescriptionFr'),
(56, 49, 'fr', 'TitleFr'),
(57, 49, 'en', 'TitleEn'),
(58, 50, 'fr', 'DescriptionFr'),
(59, 51, 'fr', 'TitleFr'),
(60, 51, 'en', 'TitleEn'),
(61, 52, 'fr', 'DescriptionFr'),
(62, 53, 'fr', 'TitleFr'),
(63, 53, 'en', 'TitleEn'),
(64, 54, 'fr', 'DescriptionFr'),
(65, 55, 'fr', 'TitleFr'),
(66, 55, 'en', 'TitleEn'),
(67, 56, 'fr', 'DescriptionFr'),
(68, 57, 'fr', 'TitleFr'),
(69, 57, 'en', 'TitleEn'),
(70, 58, 'fr', 'DescriptionFr'),
(71, 59, 'fr', 'TitleFr'),
(72, 59, 'en', 'TitleEn'),
(73, 60, 'fr', 'DescriptionFr'),
(74, 61, 'fr', 'TitleFr'),
(75, 61, 'en', 'TitleEn'),
(76, 62, 'fr', 'DescriptionFr'),
(77, 63, 'fr', 'TitleFr'),
(78, 63, 'en', 'TitleEn'),
(79, 64, 'fr', 'DescriptionFr'),
(80, 65, 'fr', 'TitleFr'),
(81, 65, 'en', 'TitleEn'),
(82, 66, 'fr', 'DescriptionFr'),
(83, 67, 'fr', 'TitleFr'),
(84, 67, 'en', 'TitleEn'),
(85, 68, 'fr', 'DescriptionFr'),
(86, 69, 'fr', 'TitleFr'),
(87, 69, 'en', 'TitleEn'),
(88, 70, 'fr', 'DescriptionFr'),
(89, 71, 'fr', 'TitleFr'),
(90, 71, 'en', 'TitleEn'),
(91, 72, 'fr', 'DescriptionFr'),
(92, 73, 'fr', 'TitleFr'),
(93, 73, 'en', 'TitleEn'),
(94, 74, 'fr', 'DescriptionFr'),
(95, 75, 'fr', 'webtuts'),
(96, 75, 'en', 'webtuts'),
(97, 76, 'fr', 'Notification backoffice'),
(98, 77, 'fr', 'Les notifications pour la page d''accueil du Backoffice'),
(99, 78, 'fr', 'Liste des fonctionalités de la class App'),
(100, 79, 'fr', 'App::getClass("article", $id); // retourne l''objet d''id $id\r\nApp::getClass("article"); // retourne l''objet vierge\r\nApp::getClass("article")->getTypages(); // retourne un tableau de tous les coulons et leurs typages\r\nApp::getClass("article")->hydrate($array); // hydrate un article avec $array le tableau de toutes les colonnes. Pour les langues il faut : \r\n…., "title" => array("fr" => "le titre", "en" => "the title"), ….\r\nPour les liens vers un objet, on met l''id, pour les liens OneToMany, on ne met rien.\r\nApp::getClass("article")->hydrate($array)->save(); //enregistre en BDD\r\nApp::getClass("article")->hydrate($array)->checkData(); regarde si l''hydrate est bon (renvoie tirs true pour le moment)\r\n\r\nApp::getClassArray("article", array( // sans second paramètre, ils sont tous retourné\r\n  "where" => $condition, // "nothave category" pour n''ayant aucune categories\r\n  "orderBy" => array($attribut, $way), // "orderBy" => $attribut // ASC par defaut\r\n  "limit" => array($start, $nb) // "limit" => $nb\r\n));\r\nJe travail actuellement pour mettre des "where", "and" et "or" de façon simple, pour ''instant vous êtes bloqué à une condition "where" :D'),
(119, 90, 'fr', 'Essai'),
(120, 91, 'fr', 'Test'),
(121, 92, 'fr', 'Test'),
(101, 80, 'fr', 'Liste des fonctionalités de la class Kernel'),
(102, 81, 'fr', 'Kernel::get("app") // Nom de l''app\r\nKernel::get("controller") // Nom du controller\r\nKernel::get("action") // Nom de l''action\r\nKernel::get("session") // Retourne l''objet Session\r\n  Kernel::get("session")->connect($id, md5($mdp));\r\n  Kernel::get("session")->disconnect();\r\nKernel::get("lang") // Nom de la lang\r\nKernel::get("langs") // Tableau de toutes les langues dispo\r\nKernel::get("langdefault") // lang par default\r\nKernel::get("params") // Tableau des paramètres du site\r\nKernel::get("cache") // Retourne l''objet Cache du kernel\r\nKernel::get("user") // retourne l''utilisateur connecté. Pareil que Kernel::get("session")->getUser();'),
(103, 82, 'fr', 'new'),
(104, 82, 'en', 'new'),
(105, 83, 'fr', 'new'),
(106, 83, 'en', 'new'),
(107, 84, 'fr', 'Nouvelle cat'),
(108, 84, 'en', 'New cat'),
(109, 85, 'fr', 'Nouvelle'),
(110, 85, 'en', 'New'),
(111, 86, 'fr', 'Nouvelle cat'),
(112, 86, 'en', 'New cat'),
(113, 87, 'fr', 'Nouvelle'),
(114, 87, 'en', 'New'),
(115, 88, 'fr', 'Nouvelle cat'),
(116, 88, 'en', 'New cat'),
(117, 89, 'fr', 'Nouvelle'),
(118, 89, 'en', 'New'),
(122, 92, 'en', 'Tes'),
(123, 93, 'fr', 'Test'),
(124, 93, 'en', 'Test'),
(125, 94, 'fr', 'Test'),
(126, 94, 'en', 'Tes'),
(127, 95, 'fr', 'Test'),
(128, 95, 'en', 'Test'),
(129, 96, 'fr', 'Test'),
(130, 96, 'en', 'Tes'),
(131, 97, 'fr', 'Test'),
(132, 97, 'en', 'Test'),
(133, 98, 'fr', 'test'),
(134, 99, 'fr', 'tes'),
(135, 100, 'fr', 'tes'),
(136, 101, 'fr', 'tes'),
(137, 102, 'fr', 'Tes'),
(138, 102, 'en', 'Tes'),
(139, 103, 'fr', 'Tes'),
(140, 103, 'en', 'Tes'),
(141, 104, 'fr', 'Test'),
(142, 104, 'en', 'Test'),
(143, 105, 'fr', 'Test'),
(144, 105, 'en', 'Test'),
(145, 106, 'fr', 'Tes'),
(146, 106, 'en', 'Tes'),
(147, 107, 'fr', 'Tes'),
(148, 107, 'en', 'tes'),
(149, 108, 'fr', 'Tes'),
(150, 108, 'en', 'Tes'),
(151, 109, 'fr', 'Tes'),
(152, 109, 'en', 'tes'),
(153, 110, 'fr', 'Tes'),
(154, 110, 'en', 'Tes'),
(155, 111, 'fr', 'Tes'),
(156, 111, 'en', 'Tes'),
(157, 112, 'fr', 'Test Type'),
(158, 112, 'en', 'Test Type'),
(159, 113, 'fr', 'Test Type'),
(160, 113, 'en', 'Test Type'),
(161, 114, 'fr', 'Test Type'),
(162, 114, 'en', 'Test Type'),
(163, 115, 'fr', 'Test Type'),
(164, 115, 'en', 'Test Type'),
(165, 116, 'fr', 'Test Type'),
(166, 116, 'en', 'Test Type'),
(167, 117, 'fr', 'Test Type'),
(168, 117, 'en', 'Test Type'),
(169, 118, 'fr', 'Test Type'),
(170, 118, 'en', 'Test Type'),
(171, 119, 'fr', 'Test Type'),
(172, 119, 'en', 'Test Type'),
(173, 120, 'fr', 'Test Type'),
(174, 120, 'en', 'Test Type'),
(175, 121, 'fr', 'Test Type'),
(176, 121, 'en', 'Test Type'),
(177, 122, 'fr', 'Test Type'),
(178, 122, 'en', 'Test Type'),
(179, 123, 'fr', 'Test Type'),
(180, 123, 'en', 'Test Type'),
(181, 124, 'fr', 'Test Type'),
(182, 124, 'en', 'Test Type'),
(183, 125, 'fr', 'Test Type'),
(184, 125, 'en', 'Test Type'),
(185, 126, 'fr', 'Test Type'),
(186, 126, 'en', 'Test Type'),
(187, 127, 'fr', 'Test Type'),
(188, 127, 'en', 'Test Type'),
(189, 128, 'fr', 'Test Type'),
(190, 128, 'en', 'Test Type'),
(191, 129, 'fr', 'Test Type'),
(192, 129, 'en', 'Test Type'),
(193, 130, 'fr', 'Test Type'),
(194, 130, 'en', 'Test Type'),
(195, 131, 'fr', 'Test Type'),
(196, 131, 'en', 'Test Type'),
(197, 132, 'fr', 'Test Type'),
(198, 132, 'en', 'Test Type'),
(199, 133, 'fr', 'Test Type'),
(200, 133, 'en', 'Test Type'),
(201, 134, 'fr', 'Test Type'),
(202, 134, 'en', 'Test Type'),
(203, 135, 'fr', 'Test Type'),
(204, 135, 'en', 'Test Type'),
(205, 136, 'fr', 'Test Type'),
(206, 136, 'en', 'Test Type'),
(207, 137, 'fr', 'Test Type'),
(208, 137, 'en', 'Test Type'),
(209, 138, 'fr', 'Test Type'),
(210, 138, 'en', 'Test Type'),
(211, 139, 'fr', 'Test Type'),
(212, 139, 'en', 'Test Type'),
(213, 140, 'fr', 'Test Type'),
(214, 140, 'en', 'Test Type'),
(215, 141, 'fr', 'Test Type'),
(216, 141, 'en', 'Test Type'),
(217, 142, 'fr', 'Test Type'),
(218, 142, 'en', 'Test Type'),
(219, 143, 'fr', 'Test Type'),
(220, 143, 'en', 'Test Type'),
(221, 144, 'fr', 'Test Type'),
(222, 144, 'en', 'Test Type'),
(223, 145, 'fr', 'Test Type'),
(224, 145, 'en', 'Test Type'),
(225, 146, 'fr', 'Testouille'),
(226, 146, 'en', 'Testouille'),
(227, 147, 'fr', 'Testouille'),
(228, 147, 'en', 'Testouille');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`) VALUES
(30, 'nicholas77@live.fr'),
(29, 'lu.nitoumbi@gmail.com'),
(28, 'elodie.maizeray@gmail.com'),
(25, 'serrano91@hotmail.fr'),
(24, 'bicheuxj@gmail.com'),
(27, 'gilles.taddei@gmail.com'),
(17, 'thibault.dulon@gmail.com'),
(21, 'quentin.deneuve@fozeek.fr'),
(31, 'thomas.millochau@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `node`
--

CREATE TABLE `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `node`
--

INSERT INTO `node` (`id`, `name`, `description`) VALUES
(1, 27, 28),
(2, 29, 30),
(3, 76, 77);

-- --------------------------------------------------------

--
-- Structure de la table `orm_columns_types`
--

CREATE TABLE `orm_columns_types` (
  `name_table` text NOT NULL,
  `name_column` text NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 DATA DIRECTORY='./webtuts/' INDEX DIRECTORY='./webtuts/';

--
-- Contenu de la table `orm_columns_types`
--

INSERT INTO `orm_columns_types` (`name_table`, `name_column`, `type`) VALUES
('access', 'name', 'type lang'),
('access', 'description', 'type lang'),
('article', 'deleted', 'type bool'),
('article', 'category', 'class category'),
('article', 'node', 'class node'),
('article', 'author', 'class user'),
('article', 'date', 'type datetime'),
('article', 'image', 'class image'),
('article', 'title', 'type lang'),
('article', 'text', 'type lang'),
('article', 'views', 'type integer'),
('category', 'name', 'type lang'),
('category', 'description', 'type lang'),
('comment', 'article', 'class article'),
('comment', 'author', 'class user'),
('comment', 'text', 'type text'),
('comment', 'date', 'type datetime'),
('comment', 'deleted', 'type bool'),
('image', 'name', 'type text'),
('image', 'type', 'type text'),
('image', 'width', 'type integer'),
('image', 'height', 'type integer'),
('image', 'deleted', 'type bool'),
('image', 'size', 'type integer'),
('newsletter', 'mail', 'type text'),
('user', 'deleted', 'type bool'),
('node', 'name', 'type lang'),
('node', 'description', 'type lang'),
('tag', 'name', 'type lang'),
('tag', 'description', 'type lang'),
('lang', 'lang', 'type text'),
('lang', 'text', 'type text'),
('user', 'banned', 'type bool'),
('user', 'mail', 'type text'),
('user', 'surname', 'type text'),
('user', 'pseudo', 'type text'),
('user', 'name', 'type text'),
('user', 'datesignin', 'type datetime'),
('user', 'image', 'class image'),
('user', 'civility', 'type text'),
('user', 'password', 'type text'),
('category', 'articles', 'collection article'),
('article', 'tags', 'collection tag'),
('category', 'image', 'class image'),
('article', 'comments', 'collection comment'),
('page', 'title', 'type lang'),
('page', 'content', 'type lang'),
('page', 'author', 'class user'),
('page', 'date', 'type datetime'),
('category', 'deleted', 'type bool'),
('user', 'access', 'class access');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `date`, `author`) VALUES
(1, 33, 34, '2013-01-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rewritingurl`
--

CREATE TABLE `rewritingurl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app` text NOT NULL,
  `replaceurl` text NOT NULL,
  `matchurl` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rewritingurl`
--

INSERT INTO `rewritingurl` (`id`, `app`, `replaceurl`, `matchurl`) VALUES
(1, 'backend', 'comment/show', 'let-me-show-a-comment');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `name`, `description`) VALUES
(1, 11, 12),
(2, 19, 20),
(3, 21, 22),
(4, 23, 24),
(5, 25, 26);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `banned` double NOT NULL,
  `pseudo` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mail` text NOT NULL,
  `image` int(11) NOT NULL,
  `datesignin` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  `access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`, `access`) VALUES
(1, 0, 0, 'fozeek', 'quentin', 'deneuve', '', 0, '0000-00-00 00:00:00', '', 'cc414bfc9c00475b59c87595299ff31d', 0),
(2, 0, 0, 'lolilol', 'lollll', 'dd', 'ddd', 0, '0000-00-00 00:00:00', '', '', 0),
(3, 0, 0, 'testCreateSql2', '', '', '', 0, '0000-00-00 00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
