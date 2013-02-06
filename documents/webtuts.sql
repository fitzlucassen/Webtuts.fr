-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 06 Février 2013 à 21:51
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `webtuts`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `code` text NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id`, `deleted`, `code`, `description`) VALUES
(1, 0, 'ACCESS_BO', 0);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `deleted`, `category`, `node`, `tags`, `author`, `date`, `image`, `title`, `text`, `views`, `comments`) VALUES
(1, 0, 1, 1, 1, 1, '2012-12-15 00:00:00', 0, 4, 5, 32, 0),
(2, 0, 0, 2, 0, 1, '2013-01-11 00:00:00', 0, 31, 32, 0, 0),
(3, 0, 0, 3, 0, 1, '2013-01-02 00:00:00', 0, 78, 79, 0, 0),
(4, 0, 0, 3, 0, 1, '2013-01-13 18:24:36', 0, 80, 81, 0, 0),
(5, 0, 0, 4, 0, 1, '2013-02-14 00:00:00', 0, 84, 85, 0, 0),
(6, 0, 0, 4, 0, 1, '2013-02-08 00:00:00', 0, 86, 87, 0, 0),
(7, 0, 0, 4, 0, 1, '2013-02-05 00:00:00', 0, 88, 89, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
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
-- Structure de la table `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
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

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `articles` int(11) DEFAULT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `deleted`, `name`, `description`, `articles`, `image`) VALUES
(1, 0, 1, 2, 1, 1),
(2, 0, 6, 8, 0, 3),
(3, 0, 9, 10, 0, 2),
(4, 0, 13, 14, 0, 6),
(5, 0, 15, 16, 0, 4),
(6, 0, 17, 18, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `cms_site_params`
--

CREATE TABLE IF NOT EXISTS `cms_site_params` (
  `title` text NOT NULL,
  `time` text NOT NULL,
  `theme` text NOT NULL,
  `app` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_site_params`
--

INSERT INTO `cms_site_params` (`title`, `time`, `theme`, `app`) VALUES
('webtuts', 'test', 'default', 'frontend');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `article`, `author`, `text`, `date`, `deleted`) VALUES
(1, 1, 1, 'Coooool !', '2013-02-11 00:00:00', 0),
(2, 1, 1, 'essais', '2013-01-03 03:11:55', 0);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `name`, `type`, `width`, `height`, `deleted`, `size`) VALUES
(1, 'puzzle', 'png', 54, 78, 0, 635),
(2, 'ecusson', 'png', 60, 79, 0, 682),
(3, 'etoile', 'png', 62, 79, 0, 592),
(4, 'coupe', 'png', 86, 80, 0, 871),
(5, 'dossier', 'png', 56, 76, 0, 473),
(6, 'outils', 'png', 76, 77, 0, 727),
(7, 'fitz-lucassen.png', '', 80, 80, 0, 790);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `lang` text NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=277 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `id_lang`, `lang`, `translation`) VALUES
(1, 1, 'fr', 'Intégration'),
(2, 2, 'fr', 'Ici vous verrez tous les secrets d''une bonne intégration en apprenant les bons réflexe à acquérir ainsi que certaines astuces importantes à connaître pour ne pas se torturer la tête pendant des heures !'),
(3, 4, 'fr', 'Le HTML5, super !'),
(4, 5, 'fr', 'Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit.'),
(5, 3, 'fr', 'Article'),
(6, 7, 'fr', 'Actualité'),
(7, 6, 'fr', 'Animation'),
(8, 8, 'fr', 'Ici vous apprendrez à dynamiser vos site web grace à des animations innovante ou utiles pour vos sites web ainsi que pour rendre design encore plus attractif !'),
(9, 9, 'fr', 'Logiciels'),
(10, 10, 'fr', 'Ici vous apprendrez à vous servir de certain logiciels très utiles pour faciliter vos développements. L''environnement de développement et les avantages qu''il peut apporter sont souvent négligés par la plupart des développeurs.'),
(11, 11, 'fr', 'PHP'),
(12, 12, 'fr', 'Tous les tutoriels utilisant le langage PHP'),
(13, 13, 'fr', 'Développement Fonctionnel'),
(14, 14, 'fr', 'Ici vous apprendrez à gérez la partit fonctionnel de votre site, c''est à dire la partie "Intelligente" de celui-ci.\nC''est une partie importante d''un site car sans les langages serveurs, votre site ne pourrait être dynamique.'),
(15, 15, 'fr', 'Référencement'),
(16, 16, 'fr', 'Pour que votre site soit visible, il est essentiel d''accorder une grande importance au référencement de celui-ci afin de devenir "SEO friendly" ! Les robots de google sont intransigeant et il faut très vite acquérir les bons réflexes pour augmenter son référencement naturel !'),
(17, 17, 'fr', 'Autres'),
(18, 18, 'fr', 'Tous les tutoriels inclassable dans les autres catégories seront dans celle-ci. Vous pourrez donc trouver des articles divers sur le travail d''un web-developer par exemple.'),
(19, 19, 'fr', 'HTML'),
(20, 20, 'fr', 'Tous les tutoriels utilisant le langage HTML'),
(21, 21, 'fr', 'CSS'),
(22, 22, 'fr', 'Tous les tutoriels utilisant le langage CSS'),
(23, 23, 'fr', 'Javascript'),
(24, 24, 'fr', 'Tous les tutoriels utilisant le langage javascript'),
(25, 25, 'fr', 'JQuery'),
(26, 26, 'fr', 'Tous les tutoriels utilisant la bibliothèque JQuery, basé sur javascript'),
(28, 28, 'fr', 'Les types de contenu étant des tutoriels'),
(29, 29, 'fr', 'actualité'),
(30, 30, 'fr', 'Les types de contenu étant des actualités'),
(31, 31, 'fr', 'Webtuts se lance sur le web !'),
(32, 32, 'fr', 'Cras elit ante, consequat sit amet tempor aliquet, condimentum vitae augue. Vivamus venenatis lectus et nunc auctor pulvinar a et elit. Integer vitae ipsum mauris, id posuere urna. Morbi ac dui eros, vel feugiat mi. Nam tortor sem, dictum et cursus sed, molestie non sapien. Suspendisse et ligula dolor. Vivamus commodo, nulla vel commodo convallis, nulla diam mattis magna, sed sollicitudin metus nisl sit amet arcu. Morbi et elementum dolor.'),
(33, 33, 'fr', 'Page test'),
(95, 75, 'fr', 'webtuts'),
(96, 75, 'en', 'webtuts'),
(97, 76, 'fr', 'Notification backoffice'),
(98, 77, 'fr', 'Les notifications pour la page d''accueil du Backoffice'),
(99, 78, 'fr', 'Liste des fonctionalités de la class App'),
(100, 79, 'fr', 'App::getClass("article", $id); // retourne l''objet d''id $id\r\nApp::getClass("article"); // retourne l''objet vierge\r\nApp::getClass("article")->getTypages(); // retourne un tableau de tous les coulons et leurs typages\r\nApp::getClass("article")->hydrate($array); // hydrate un article avec $array le tableau de toutes les colonnes. Pour les langues il faut : \r\n…., "title" => array("fr" => "le titre", "en" => "the title"), ….\r\nPour les liens vers un objet, on met l''id, pour les liens OneToMany, on ne met rien.\r\nApp::getClass("article")->hydrate($array)->save(); //enregistre en BDD\r\nApp::getClass("article")->hydrate($array)->checkData(); regarde si l''hydrate est bon (renvoie tirs true pour le moment)\r\n\r\nApp::getClassArray("article", array( // sans second paramètre, ils sont tous retourné\r\n  "where" => $condition, // "nothave category" pour n''ayant aucune categories\r\n  "orderBy" => array($attribut, $way), // "orderBy" => $attribut // ASC par defaut\r\n  "limit" => array($start, $nb) // "limit" => $nb\r\n));\r\nJe travail actuellement pour mettre des "where", "and" et "or" de façon simple, pour ''instant vous êtes bloqué à une condition "where" :D'),
(101, 80, 'fr', 'Liste des fonctionalités de la class Kernel'),
(102, 81, 'fr', 'Kernel::get("app") // Nom de l''app\r\nKernel::get("controller") // Nom du controller\r\nKernel::get("action") // Nom de l''action\r\nKernel::get("session") // Retourne l''objet Session\r\n  Kernel::get("session")->connect($id, md5($mdp));\r\n  Kernel::get("session")->disconnect();\r\nKernel::get("lang") // Nom de la lang\r\nKernel::get("langs") // Tableau de toutes les langues dispo\r\nKernel::get("langdefault") // lang par default\r\nKernel::get("params") // Tableau des paramètres du site\r\nKernel::get("cache") // Retourne l''objet Cache du kernel\r\nKernel::get("user") // retourne l''utilisateur connecté. Pareil que Kernel::get("session")->getUser();'),
(233, 4, 'en', 'HTML5, Awesome !'),
(234, 1, 'en', 'Integration'),
(235, 27, 'en', 'This text doesn''t has its traduction !'),
(237, 76, 'en', 'Backend notification'),
(238, 77, 'en', 'Notification for the backend home'),
(239, 82, 'fr', 'Pages'),
(240, 83, 'fr', 'Pages'),
(241, 84, 'fr', 'à propos'),
(242, 85, 'fr', '<div class="title">À propos</div>\n<ul>\n<p>Webtuts est un blog présentant des tutoriels solutionnant des problèmes concrets sur la réalisation de son propre site web avec diverses astuces et techniques expliquées de façon détaillés pour répondre aux besoins de tous. Le développement de ce même blog sera, le plus souvent possible, prit comme exemple à ces tutoriaux.<p>\n</ul>\n\n<div class="title">L''équipe</div>\n<div class="sub-title">Jonathan<span class="color-grey"> Rédacteur en chef / Développeur </span></div>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\n<div class="sub-title">Quentin<span class="color-grey"> Directeur / Développeur </span></div>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\n<div class="sub-title">Richard<span class="color-grey"> Développeur </span></div>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\n<div class="sub-title">Thibault<span class="color-grey"> Responsable marketing / Développeur </span></div>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>'),
(243, 86, 'fr', 'nous contacter'),
(244, 87, 'fr', '<div class="title">Contact</div>'),
(245, 84, 'en', 'about'),
(246, 86, 'en', 'contact us'),
(247, 85, 'en', '<div class="title">About us</div>\r\n<ul>\r\n<p>Webtuts is a website for showing a lot of tuts. These tuts are about website: how to make it, how to manage it and much more. Tricks and technics are explain for everyone, with or without skills. Redactors using the development of this own website for writing tuts.\r\n</ul>\r\n\r\n<div class="title">The team</div>\r\n<div class="sub-title">Jonathan<span class="color-grey"> Chef redactor / Developer </span></div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\r\n<div class="sub-title">Quentin<span class="color-grey"> Director / Developer </span></div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\r\n<div class="sub-title">Richard<span class="color-grey"> Developer </span></div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>\r\n<div class="sub-title">Thibault<span class="color-grey"> Marketing / Developer </span></div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi harum consectetur quos cumque atque tempore maxime doloribus eaque vel qui odio rerum et labore impedit. Dolores illo similique nihil.</p>'),
(248, 87, 'en', '<div class="title">Contact</div>'),
(249, 88, 'fr', 'tous les partenaires'),
(250, 89, 'fr', '<div class="title">Partenaires</div>'),
(251, 88, 'en', 'all partners'),
(252, 89, 'en', '<div class="title">Partners</div>'),
(255, 3, 'en', 'Article'),
(254, 2, 'en', 'Here you will find all the secrets of a successful integration in learning good reflex, as well as some important tips to know to not to torture your mind for hours!'),
(256, 6, 'en', 'Animation'),
(257, 7, 'en', 'News'),
(258, 8, 'en', 'Here you will learn how to boost your website thanks to innovative or useful animations for your webdesign and to make it even more attractive!'),
(259, 10, 'en', 'Here you will learn to use some useful software to help your development. The development environment and the benefits it can provide are often overlooked by most developers.'),
(260, 9, 'en', 'Software'),
(261, 11, 'en', 'PHP'),
(262, 12, 'en', 'All tuts using PHP language'),
(263, 13, 'en', 'Functional development'),
(264, 14, 'en', 'Here you will learn how to manage the functional part of your website, it''s the "Intelligent" part of it.\r\nThis is an important part of a website because without server languages, your website couldn''t be dynamic.'),
(265, 15, 'en', 'SEO'),
(266, 17, 'en', 'Others'),
(267, 19, 'en', 'HTML'),
(268, 21, 'en', 'CSS'),
(269, 16, 'en', 'To your website be visible, it is essential to give importance to SEO and becoming "SEO friendly"! Google bots are uncompromising and you must quickly acquire good habits to increase your SEO!'),
(270, 18, 'en', 'All tutorials unclassifiable in other categories will be in it. So you can find various articles on the work of a web-developer for example.'),
(271, 22, 'en', 'All tuts using CSS language'),
(272, 20, 'en', 'All tuts using HTML language'),
(273, 23, 'en', 'Javascript'),
(274, 25, 'en', 'JQuery'),
(275, 24, 'en', 'All tuts using Javascript language'),
(276, 26, 'en', 'All tuts using JQuery framework');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
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

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `node`
--

INSERT INTO `node` (`id`, `deleted`, `name`, `description`) VALUES
(1, 0, 27, 28),
(2, 0, 29, 30),
(3, 0, 76, 77),
(4, 0, 82, 83);

-- --------------------------------------------------------

--
-- Structure de la table `orm_columns_types`
--

CREATE TABLE IF NOT EXISTS `orm_columns_types` (
  `name_table` text NOT NULL,
  `name_column` text NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `orm_columns_types`
--

INSERT INTO `orm_columns_types` (`name_table`, `name_column`, `type`) VALUES
('access', 'code', 'type text'),
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
('user', 'access', 'collection access'),
('tag', 'deleted', 'type bool'),
('tag', 'articles', 'collection article'),
('user', 'city', 'type text'),
('user', 'country', 'type text'),
('user', 'languages', 'type text'),
('user', 'site', 'type text'),
('user', 'app', 'type text'),
('user', 'theme', 'type text');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
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
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) DEFAULT '0',
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `articles` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `deleted`, `name`, `description`, `articles`) VALUES
(1, 0, 11, 12, 0),
(2, 0, 19, 20, 0),
(3, 0, 21, 22, 0),
(4, 0, 23, 24, 0),
(5, 0, 25, 26, 0);

-- --------------------------------------------------------

--
-- Structure de la table `urlrewriting`
--

CREATE TABLE IF NOT EXISTS `urlrewriting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` text NOT NULL,
  `app` text CHARACTER SET utf8 NOT NULL,
  `controler` text CHARACTER SET utf8 NOT NULL,
  `action` text CHARACTER SET utf8 NOT NULL,
  `matchurl` text CHARACTER SET utf8 NOT NULL,
  `route_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `urlrewriting`
--

INSERT INTO `urlrewriting` (`id`, `lang`, `app`, `controler`, `action`, `matchurl`, `route_order`) VALUES
(1, 'fr', 'frontend', 'blog', 'categories', 'les-categories.html', 0),
(2, 'fr', 'frontend', 'blog', 'article', 'categorie-{1}/article-{2}.html', 0),
(3, 'fr', 'frontend', 'blog', 'category', 'categorie-{1}.html', 1),
(4, 'fr', 'frontend', 'blog', 'articles', 'les-articles.html', 0),
(5, 'fr', 'frontend', 'blog', 'actualites', 'les-actualites.html', 0),
(6, 'fr', 'frontend', 'blog', 'actualite', 'actualite-{1}.html', 1),
(7, 'fr', 'frontend', 'error', '404', '404.html', 0),
(8, 'fr', 'frontend', 'blog', 'tags', 'les-tags.html', 0),
(9, 'fr', 'frontend', 'blog', 'tag', 'tag-{1}.html', 1),
(10, 'fr', 'frontend', 'user', 'subscription', 'inscription-webtuts.html', 0),
(11, 'fr', 'frontend', 'user', 'connection', 'connexion-webtuts.html', 0),
(13, 'fr', 'frontend', 'user', 'profil', 'profil-{1}.html', 1),
(14, 'fr', 'frontend', 'page', 'index', 'page-{1}.html', 1),
(15, 'en', 'frontend', 'blog', 'categories', 'categories.html', 0),
(16, 'fr', 'frontend', 'user', 'compte', 'compte.html', 0),
(18, 'en', 'frontend', 'blog', 'article', 'category-{1}/article-{2}.html', 0),
(19, 'en', 'frontend', 'blog', 'category', 'category-{1}.html', 1),
(20, 'en', 'frontend', 'blog', 'articles', 'articles.html', 0),
(21, 'en', 'frontend', 'blog', 'actualites', 'news.html', 0),
(22, 'en', 'frontend', 'blog', 'actualite', 'news-{1}.html', 1),
(23, 'en', 'frontend', 'error', '404', 'error-404.html', 0),
(24, 'en', 'frontend', 'blog', 'tags', 'tags.html', 0),
(25, 'en', 'frontend', 'blog', 'tag', 'tag-{1}.html', 1),
(26, 'en', 'frontend', 'user', 'subscription', 'webtuts-subscription.html', 0),
(27, 'en', 'frontend', 'user', 'connection', 'webtuts-connection.html', 0),
(28, 'en', 'frontend', 'user', 'profil', 'profile-{1}.html', 1),
(29, 'en', 'frontend', 'page', 'index', 'page-{1}.html', 1),
(30, 'en', 'frontend', 'user', 'compte', 'account.html', 0),
(31, 'fr', 'frontend', 'page', 'contact', 'contactez-nous.html', 0),
(32, 'en', 'frontend', 'page', 'contact', 'contact-us.html', 0),
(33, 'fr', 'frontend', 'page', 'about', 'a-propos-de-webtuts.html', 0),
(34, 'en', 'frontend', 'page', 'about', 'about-webtuts.html', 0),
(35, 'fr', 'frontend', 'page', 'sitemap', 'plan-du-site.html', 0),
(36, 'en', 'frontend', 'page', 'sitemap', 'sitemap.html', 0),
(37, 'fr', 'frontend', 'page', 'partners', 'tous-les-partenaires-de-webtuts.html', 0),
(38, 'en', 'frontend', 'page', 'partners', 'all-webtuts-partners.html', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `banned` double NOT NULL,
  `app` text NOT NULL,
  `theme` text NOT NULL,
  `pseudo` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mail` text NOT NULL,
  `image` int(11) NOT NULL,
  `datesignin` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  `country` varchar(140) NOT NULL DEFAULT 'France',
  `city` varchar(140) DEFAULT '',
  `site` varchar(255) DEFAULT '',
  `languages` varchar(255) DEFAULT '',
  `access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `app`, `theme`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`, `country`, `city`, `site`, `languages`, `access`) VALUES
(1, 0, 0, 'frontend', 'default', 'fozeek', 'quentin', 'deneuve', 'quentin.deneuve@gmail.com', 0, '2013-02-01 00:00:00', 'homme', 'e1d75b9a8b4d045d96180b6ec6f5e686', 'France', 'Briis-sous-forge', 'http://fozeek.fr', 'html,css,php,javascript,jquery', 0),
(2, 0, 0, '', '', 'fitz_lucassen', 'thibault', 'dulon', 'thibault.dulon@gmail.com', 7, '2013-02-03 00:00:00', 'homme', 'ce0608b1cb5f1b15c59f9344f53729fd', 'France', 'Paris', 'http://fitz.hebergratuit.com', 'html,css,php,javascript,jquery,asp.net,csharp', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_access`
--

INSERT INTO `user_access` (`id_user`, `id_access`) VALUES
(1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
