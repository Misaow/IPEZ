-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 05 Juin 2014 à 15:17
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tclient`
--

INSERT INTO `tclient` (`id`, `mail`, `nom`, `prenom`, `mdp`, `newsletter`) VALUES
(1, 'admin@admin.fr', 'ge', 'Samien', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'aume@fsefe.fr', 'ge', 'gUS', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'foxayile@yahoo.fr', 'ayile', 'ayile', 'd41d8cd98f00b204e9800998ecf8427e', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tevent`
--

INSERT INTO `tevent` (`id`, `nom`, `description`, `date`, `heure`, `lieu`) VALUES
(1, 'Smartphone', 'Vente de Smartphone 3.0', '2014-06-03', '01:00:00', 'Lyon'),
(2, 'Tablette', 'Vente de Tablette 3.0', '2014-06-19', '10:00:05', 'Paris'),
(3, 'tv', '', '2014-06-02', '01:00:00', 'Paname'),
(4, 'Telephone retro', 'Vente privé de nos anciens téléphones', '2014-06-07', '17:00:40', 'Paris 20');

-- --------------------------------------------------------

--
-- Structure de la table `thistoriquevente`
--

CREATE TABLE IF NOT EXISTS `thistoriquevente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TEvent_id` int(11) NOT NULL,
  `TProduit_id` int(11) NOT NULL,
  `nb_vente` int(3) NOT NULL,
  PRIMARY KEY (`id`,`TProduit_id`),
  KEY `fk_THistoriqueVente_TEvent1_idx` (`TEvent_id`),
  KEY `fk_THistoriqueVente_TProduit1_idx` (`TProduit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `thistoriquevente`
--

INSERT INTO `thistoriquevente` (`id`, `TEvent_id`, `TProduit_id`, `nb_vente`) VALUES
(1, 1, 12, 20),
(3, 1, 15, 3),
(4, 1, 14, 4),
(6, 2, 14, 54),
(7, 2, 15, 1),
(8, 1, 15, 22),
(9, 2, 16, 10),
(10, 1, 16, 11),
(11, 2, 12, 0),
(12, 3, 12, 15);

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

--
-- Contenu de la table `tparticipation`
--

INSERT INTO `tparticipation` (`TClient_id`, `TEvent_id`) VALUES
(3, 2),
(3, 4),
(1, 2),
(2, 2),
(3, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `tproduit`
--

INSERT INTO `tproduit` (`id`, `nom`, `description`, `nb_vente`, `nb_stock`, `image`, `TTypeProduit_id`) VALUES
(12, 'Galaxy tab 6', 'Samsung Ipad 6 TAblette, le telephone des loosers', 11, 15, NULL, 2),
(14, 'Iphone tab 6', 'Aplle Ipad 6 TAblette, le telephone des loosers', 0, 15, NULL, 1),
(15, 'Iphone 5 tab 6', 'Aplle Ipad 6 Smartphone, le telephone des loosers', 0, 15, NULL, 1),
(16, 'Iphone 5 tab 6', 'Aplle Ipad 6 Smartphone, le telephone des loosers', 1, 15, NULL, 1),
(17, 'Nokia 3310', 'Téléphone Rétro', 0, 20, NULL, 2),
(18, 'Nokia 3210', 'Téléphone Rétro', 0, 20, NULL, 2),
(19, 'LG Tab 8.3', 'Tablette 8 pouce', 0, 15, NULL, 1),
(20, 'Nexus 10', 'Tablette 10 pouce', 0, 15, NULL, 1),
(21, 'Galaxy S3', 'Smartphone Samsung', 0, 15, NULL, 2),
(22, 'Galaxy S4', 'Smartphone Samsung', 0, 15, NULL, 2),
(23, 'Montre 3.0 Samsung', '', 0, 0, NULL, 4);

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

--
-- Contenu de la table `ttypeevent`
--

INSERT INTO `ttypeevent` (`TEvent_id`, `TTypeProduit_id`) VALUES
(1, 1),
(2, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ttypeproduit`
--

CREATE TABLE IF NOT EXISTS `ttypeproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ttypeproduit`
--

INSERT INTO `ttypeproduit` (`id`, `nom`, `description`) VALUES
(1, 'Smartphone', '3.0'),
(2, 'Tablette', '2.0'),
(4, 'Montre', 'Tout Type');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `thistoriquevente`
--
ALTER TABLE `thistoriquevente`
  ADD CONSTRAINT `fk_THistoriqueVente_TEvent1` FOREIGN KEY (`TEvent_id`) REFERENCES `tevent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_THistoriqueVente_TProduit1` FOREIGN KEY (`TProduit_id`) REFERENCES `tproduit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
