-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 03 Février 2013 à 15:59
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
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 1, 1, 'Coooool !', '2013-02-11 00:00:00', 1),
(2, 1, 1, 'essais', '2013-01-03 03:11:55', 1);

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

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `lang` text NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=239 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `id_lang`, `lang`, `translation`) VALUES
(1, 1, 'fr', 'Intégration'),
(2, 2, 'fr', 'Ici vous apprendrez les secrets du "Savoir faire un beau site"'),
(3, 4, 'fr', 'Le HTML5, super !'),
(4, 5, 'fr', 'Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit. Lorem ipsum dolor sit amet, consecterus us adipiscing elit.'),
(5, 3, 'fr', 'Article'),
(6, 7, 'fr', 'Actualité'),
(7, 6, 'fr', 'Animation'),
(8, 8, 'fr', 'Ici vous apprendrez à dynamiser vos site web grace à des animations innovante ou utiles pour vos sites web'),
(9, 9, 'fr', 'Logiciels'),
(10, 10, 'fr', 'Ici vous apprendrez à vous servir de certain logiciels très utiles pour faciliter vos développements.'),
(11, 11, 'fr', 'PHP'),
(12, 12, 'fr', 'Tous les tutoriels utilisant le langage PHP'),
(13, 13, 'fr', 'Développement Fonctionnel'),
(14, 14, 'fr', 'Ici vous apprendrez à gérez la partit fonctionnel de votre site, c''est à dire la partie "Intelligente" de celui-ci.'),
(15, 15, 'fr', 'Référencement'),
(16, 16, 'fr', 'Pour que votre site soit visible, il est essentiel d''accorder une grande importance au référencement de celui-ci afin de devenir "SEO friendly" ! C''est par ici !'),
(17, 17, 'fr', 'Autres'),
(18, 18, 'fr', 'Tous les tutoriels inclassable dans les autres catégories seront dans celle-ci. Vous pourrez des articles divers sur le travail d''un web-developer par exemple.'),
(19, 19, 'fr', 'HTML'),
(20, 20, 'fr', 'Tous les tutoriels utilisant le langage HTML'),
(21, 21, 'fr', 'CSS'),
(22, 22, 'fr', 'Tous les tutoriels utilisant le langage CSS'),
(23, 23, 'fr', 'Javascript'),
(24, 24, 'fr', 'Tous les tutoriels utilisant le langage javascript'),
(25, 25, 'fr', 'JQuery'),
(26, 26, 'fr', 'Tous les tutoriels utilisant la bibliothèque JQuery, basé sur javascript'),
(27, 27, 'fr', 'tutorielPROUT'),
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
(238, 77, 'en', 'Notification for the backend home');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `node`
--

INSERT INTO `node` (`id`, `deleted`, `name`, `description`) VALUES
(1, 0, 27, 28),
(2, 0, 29, 30),
(3, 0, 76, 77);

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
('user', 'access', 'class access'),
('tag', 'deleted', 'type bool'),
('tag', 'articles', 'collection article');

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
  `app` text CHARACTER SET utf8 NOT NULL,
  `controler` text CHARACTER SET utf8 NOT NULL,
  `action` text CHARACTER SET utf8 NOT NULL,
  `matchurl` text CHARACTER SET utf8 NOT NULL,
  `route_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `urlrewriting`
--

INSERT INTO `urlrewriting` (`id`, `app`, `controler`, `action`, `matchurl`, `route_order`) VALUES
(1, 'frontend', 'blog', 'categories', 'les-categories.html', 0),
(2, 'frontend', 'blog', 'article', 'categorie-{2}/article-{1}.html', 0),
(3, 'frontend', 'blog', 'category', 'categorie-{1}.html', 1),
(4, 'frontend', 'blog', 'articles', 'les-articles.html', 0),
(5, 'frontend', 'blog', 'actualites', 'les-actualites.html', 0),
(6, 'frontend', 'blog', 'actualite', 'actualite-{1}.html', 1),
(7, 'frontend', 'error', '404', '404.html', 0),
(8, 'frontend', 'blog', 'tags', 'les-tags.html', 0),
(9, 'frontend', 'blog', 'tag', 'tag-{1}.html', 1),
(10, 'frontend', 'user', 'subscription', 'inscription-webtuts.html', 0),
(11, 'frontend', 'user', 'connection', 'connexion-webtuts.html', 0),
(13, 'frontend', 'user', 'profil', 'compte/{1}.html', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`, `country`, `city`, `site`, `languages`, `access`) VALUES
(1, 0, 0, 'fozeek', 'quentin', 'deneuve', 'quentin.deneuve@gmail.com', 0, '2013-02-01 00:00:00', 'homme', 'cc414bfc9c00475b59c87595299ff31d', 'France', 'Briis-sous-forge', 'http://fozeek.fr', 'html,css,php,javascript,jquery', 0),
(2, 0, 0, 'fitz_lucassen', 'thibault', 'dulon', 'thibault.dulon@gmail.com', 0, '2013-02-03 00:00:00', 'homme', 'ce0608b1cb5f1b15c59f9344f53729fd', 'France', 'Paris', 'http://fitz.hebergratuit.com', 'html,css,php,javascript,jquery,asp.net,csharp', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
