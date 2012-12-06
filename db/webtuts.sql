-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 06 Décembre 2012 à 00:10
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
  `code_lang_name` int(11) NOT NULL,
  `code_lang_description` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_name` (`code_lang_name`),
  KEY `code_lang_description` (`code_lang_description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `category` int(11) NOT NULL,
  `node` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image` int(11) NOT NULL,
  `code_lang_title` int(11) NOT NULL,
  `code_lang_text` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_title` (`code_lang_title`),
  KEY `code_lang_text` (`code_lang_text`),
  KEY `category` (`category`),
  KEY `node` (`node`),
  KEY `autor` (`autor`),
  KEY `image` (`image`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
  `id_article` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  KEY `id_article` (`id_article`),
  KEY `id_tag` (`id_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_lang_name` int(11) NOT NULL,
  `code_lang_description` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_name` (`code_lang_name`),
  KEY `code_lang_description` (`code_lang_description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  KEY `autor` (`autor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`) VALUES
(14, 'quentin.deneuve@fozeek.fr'),
(15, 'thibault.dulon@gmail.com'),
(16, 'plop@plop.fr');

-- --------------------------------------------------------

--
-- Structure de la table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_lang_name` int(11) NOT NULL,
  `code_lang_description` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_name` (`code_lang_name`),
  KEY `code_lang_description` (`code_lang_description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_lang_name` int(11) NOT NULL,
  `code_lang_description` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_name` (`code_lang_name`),
  KEY `code_lang_description` (`code_lang_description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `url_rewriting`
--

CREATE TABLE IF NOT EXISTS `url_rewriting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_lang_name` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code_lang_name` (`code_lang_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_sign_in` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id_user` int(11) NOT NULL,
  `id_access` int(11) NOT NULL,
  KEY `id_access` (`id_access`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
