-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 13 Janvier 2013 à 19:10
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
(1, 0, 1, 0, 1, 1, '2012-12-15 00:00:00', 0, 4, 5, 32, 0),
(2, 0, 0, 1, 0, 1, '2013-01-11 00:00:00', 0, 31, 32, 0, 0),
(3, 0, 0, 2, 0, 1, '2013-01-02 00:00:00', 0, 78, 79, 0, 0),
(4, 0, 0, 2, 0, 1, '2013-01-13 18:24:36', 0, 80, 81, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(11, 0, 73, 74, NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `cms_site_params`
--

CREATE TABLE `cms_site_params` (
  `title` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_site_params`
--

INSERT INTO `cms_site_params` (`title`, `time`) VALUES
('webtuts', 'test');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

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
(13, 13, 'fr', 'D&eacute;veloppement<br/>Fonctionnel'),
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
(101, 80, 'fr', 'Liste des fonctionalités de la class Kernel'),
(102, 81, 'fr', 'Kernel::get("app") // Nom de l''app\r\nKernel::get("controller") // Nom du controller\r\nKernel::get("action") // Nom de l''action\r\nKernel::get("session") // Retourne l''objet Session\r\n  Kernel::get("session")->connect($id, md5($mdp));\r\n  Kernel::get("session")->disconnect();\r\nKernel::get("lang") // Nom de la lang\r\nKernel::get("lange") // Tableau de toutes les langues dispo\r\nKernel::get("langdefault") // lang par default\r\nKernel::get("params") // Tableau des paramètres du site\r\nKernel::get("cache") // Retourne l''objet Cache du kernel\r\nKernel::get("user") // retourne l''utilisateur connecté. Pareil que Kernel::get("session")->getUser();');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
('article', 'views', 'type int'),
('category', 'name', 'type lang'),
('category', 'description', 'type lang'),
('comment', 'article', 'class article'),
('comment', 'author', 'class user'),
('comment', 'text', 'type text'),
('comment', 'date', 'type datetime'),
('comment', 'deleted', 'type bool'),
('image', 'name', 'type string'),
('image', 'type', 'type string'),
('image', 'width', 'type int'),
('image', 'height', 'type int'),
('image', 'deleted', 'type bool'),
('image', 'size', 'type int'),
('newsletter', 'mail', 'type string'),
('user', 'deleted', 'type bool'),
('node', 'name', 'type lang'),
('node', 'description', 'type lang'),
('tag', 'name', 'type lang'),
('tag', 'description', 'type lang'),
('lang', 'lang', 'type string'),
('lang', 'text', 'type string'),
('user', 'banned', 'type bool'),
('user', 'mail', 'type string'),
('user', 'surname', 'type string'),
('user', 'pseudo', 'type string'),
('user', 'name', 'type string'),
('user', 'datesignin', 'type datetime'),
('user', 'image', 'class image'),
('user', 'civility', 'type string'),
('user', 'password', 'type string'),
('category', 'articles', 'collection article'),
('article', 'tags', 'collection tag'),
('category', 'image', 'class image'),
('article', 'comments', 'collection comment'),
('page', 'title', 'type lang'),
('page', 'content', 'type lang'),
('page', 'author', 'class user'),
('page', 'date', 'type datetime'),
('category', 'deleted', 'type bool');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`) VALUES
(1, 0, 0, 'fozeek', 'quentin', 'deneuve', '', 0, '0000-00-00 00:00:00', '', 'cc414bfc9c00475b59c87595299ff31d'),
(2, 0, 0, 'lolilol', 'lollll', 'dd', 'ddd', 0, '0000-00-00 00:00:00', '', ''),
(3, 0, 0, 'testCreateSql2', '', '', '', 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
