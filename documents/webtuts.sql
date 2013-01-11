-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2013 at 03:06 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Webtuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `deleted`, `category`, `node`, `tags`, `author`, `date`, `image`, `title`, `text`, `views`, `comments`) VALUES
(1, 0, 1, 0, 1, 1, '2012-12-15 00:00:00', 0, 4, 5, 32, 0),
(2, 0, 0, 1, 0, 1, '2013-01-11 00:00:00', 0, 31, 32, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id_category` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id_category`, `id_article`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE IF NOT EXISTS `article_comment` (
  `id_article` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id_article`, `id_comment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
  `id_article` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`id_article`, `id_tag`) VALUES
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `articles` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `articles`, `image`) VALUES
(1, 1, 2, 1, 1),
(2, 6, 8, 0, 3),
(3, 9, 10, 0, 2),
(4, 13, 14, 0, 6),
(5, 15, 16, 0, 4),
(6, 17, 18, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article`, `author`, `text`, `date`, `deleted`) VALUES
(1, 1, 1, 'Coooool !', '2013-02-11 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image`
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
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `lang` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `lang`
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
(34, 34, 'fr', '<?php echo "test"; ?>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `newsletter`
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
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `name`, `description`) VALUES
(1, 27, 28),
(2, 29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `orm_columns_types`
--

CREATE TABLE IF NOT EXISTS `orm_columns_types` (
  `name_table` text NOT NULL,
  `name_column` text NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orm_columns_types`
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
('page', 'date', 'type datetime');

-- --------------------------------------------------------

--
-- Table structure for table `page`
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
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `date`, `author`) VALUES
(1, 33, 34, '2013-01-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rewritingurl`
--

CREATE TABLE IF NOT EXISTS `rewritingurl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app` text NOT NULL,
  `replaceurl` text NOT NULL,
  `matchurl` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rewritingurl`
--

INSERT INTO `rewritingurl` (`id`, `app`, `replaceurl`, `matchurl`) VALUES
(1, 'backend', 'comment/show', 'let-me-show-a-comment');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `description`) VALUES
(1, 11, 12),
(2, 19, 20),
(3, 21, 22),
(4, 23, 24),
(5, 25, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`) VALUES
(1, 0, 0, 'fozeek', 'quentin', 'deneuve', '', 0, '0000-00-00 00:00:00', '', ''),
(2, 0, 0, 'lolilol', 'lollll', 'dd', 'ddd', 0, '0000-00-00 00:00:00', '', ''),
(3, 0, 0, 'testCreateSql2', '', '', '', 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
