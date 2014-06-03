-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 03 Juin 2014 à 15:37
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ipez`
--
CREATE DATABASE IF NOT EXISTS `ipez` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ipez`;

-- --------------------------------------------------------

--
-- Structure de la table `tadmin`
--

CREATE TABLE IF NOT EXISTS `tadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tadmin`
--

INSERT INTO `tadmin` (`id`, `login`, `mdp`, `is_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tclient`
--

CREATE TABLE IF NOT EXISTS `tclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(25) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `TClientcol_UNIQUE` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tclient`
--

INSERT INTO `tclient` (`id`, `mail`, `nom`, `prenom`, `mdp`, `newsletter`) VALUES
(1, 'aume@fefe.fr', 'ge', 'damien', 'test', 1),
(5, 'aume@fsefe.fr', 'ge', 'Samien', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tevent`
--

CREATE TABLE IF NOT EXISTS `tevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tparticipation`
--

CREATE TABLE IF NOT EXISTS `tparticipation` (
  `TClient_id` int(11) NOT NULL,
  `TEvent_id` int(11) NOT NULL,
  KEY `fk_TParticipation_TClient_idx` (`TClient_id`),
  KEY `fk_TParticipation_TEvent1_idx` (`TEvent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tproduit`
--

CREATE TABLE IF NOT EXISTS `tproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `nb_vente` int(11) DEFAULT NULL,
  `nb_stock` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `TTypeProduit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`TTypeProduit_id`),
  KEY `fk_TProduit_TTypeProduit1_idx` (`TTypeProduit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `tproduit`
--

INSERT INTO `tproduit` (`id`, `nom`, `description`, `nb_vente`, `nb_stock`, `image`, `TTypeProduit_id`) VALUES
(6, 'HTC 6', 'HTC 6 Smartphone, le telephone des loosers', 10, 10, NULL, 1),
(7, 'Samsung 6', 'Samsung 6 Smartphone, le telephone des loosers', 2, 18, NULL, 1),
(8, 'Iphone 6', 'Apple Iphone 6 Smartphone, le telephone des loosers', 5, 15, NULL, 1),
(9, 'Galaxy tab 6', 'Apple Iphone 6 TAblette, le telephone des loosers', 3, 17, NULL, 2),
(11, 'Galaxy tab 6', 'Apple Iphone 6 TAblette, le telephone des loosers', 0, 20, NULL, 2),
(12, 'Ipad 6', 'Apple Ipad 6 TAblette, le telephone des loosers', 2, 8, NULL, 2),
(13, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(14, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(15, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(16, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(17, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(18, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(19, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(20, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(21, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(22, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(23, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(24, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(25, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(26, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(27, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2),
(28, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ttypeevent`
--

CREATE TABLE IF NOT EXISTS `ttypeevent` (
  `TEvent_id` int(11) NOT NULL,
  `TTypeProduit_id` int(11) NOT NULL,
  KEY `fk_TTypeEvent_TEvent1_idx` (`TEvent_id`),
  KEY `fk_TTypeEvent_TTypeProduit1_idx` (`TTypeProduit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ttypeproduit`
--

CREATE TABLE IF NOT EXISTS `ttypeproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ttypeproduit`
--

INSERT INTO `ttypeproduit` (`id`, `nom`, `description`) VALUES
(1, 'Smartphone', 'Téléphone Intelligent'),
(2, 'Tablette', 'Réinvente ton quotidien');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tparticipation`
--
ALTER TABLE `tparticipation`
  ADD CONSTRAINT `fk_TParticipation_TClient` FOREIGN KEY (`TClient_id`) REFERENCES `tclient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TParticipation_TEvent1` FOREIGN KEY (`TEvent_id`) REFERENCES `tevent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tproduit`
--
ALTER TABLE `tproduit`
  ADD CONSTRAINT `fk_TProduit_TTypeProduit1` FOREIGN KEY (`TTypeProduit_id`) REFERENCES `ttypeproduit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ttypeevent`
--
ALTER TABLE `ttypeevent`
  ADD CONSTRAINT `fk_TTypeEvent_TEvent1` FOREIGN KEY (`TEvent_id`) REFERENCES `tevent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TTypeEvent_TTypeProduit1` FOREIGN KEY (`TTypeProduit_id`) REFERENCES `ttypeproduit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
