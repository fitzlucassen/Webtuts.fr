-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 24 Janvier 2013 à 10:24
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `webtuts`
--

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
