-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 13 Mai 2010 à 09:44
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `user230`
--

-- --------------------------------------------------------

--
-- Structure de la table `tib_armoires`
--
-- Création: Jeu 13 Mai 2010 à 11:31
--

CREATE TABLE IF NOT EXISTS `tib_armoires` (
  `idArmoire` int(8) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `piece` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idArmoire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=132 ;

--
-- Contenu de la table `tib_armoires`
--


-- --------------------------------------------------------

--
-- Structure de la table `tib_editeurs`
--
-- Création: Jeu 13 Mai 2010 à 11:35
--

CREATE TABLE IF NOT EXISTS `tib_editeurs` (
  `idEditeur` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` mediumint(4) DEFAULT NULL,
  `ville` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresseMail` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `adresseInternet` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEditeur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=151 ;

--
-- Contenu de la table `tib_editeurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `tib_fournisseurs`
--
-- Création: Jeu 13 Mai 2010 à 11:36
--

CREATE TABLE IF NOT EXISTS `tib_fournisseurs` (
  `idFournisseur` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` smallint(4) NOT NULL,
  `ville` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `adresseMail` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `adresseInternet` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `tib_fournisseurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `tib_jeux`
--
-- Création: Jeu 13 Mai 2010 à 11:37
--

CREATE TABLE IF NOT EXISTS `tib_jeux` (
  `idJeux` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `interieur` binary(1) NOT NULL,
  `exterieur` binary(1) NOT NULL,
  `ageMin` tinyint(2) DEFAULT NULL,
  `ageMax` tinyint(2) DEFAULT NULL,
  `joueurMin` tinyint(2) DEFAULT NULL,
  `joueurMax` tinyint(2) DEFAULT NULL,
  `dateAchat` date NOT NULL,
  `dureeGarantie` tinyint(2) DEFAULT NULL,
  `idArmoire` int(8) DEFAULT NULL,
  `idEditeur` int(8) DEFAULT NULL,
  `idFournisseur` int(8) DEFAULT NULL,
  PRIMARY KEY (`idJeux`),
  KEY `idArmoire` (`idArmoire`),
  KEY `idEditeur` (`idEditeur`),
  KEY `idFournisseur` (`idFournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=901 ;

--
-- Contenu de la table `tib_jeux`
--


-- --------------------------------------------------------

--
-- Structure de la table `tib_joueurs`
--
-- Création: Jeu 13 Mai 2010 à 11:38
--

CREATE TABLE IF NOT EXISTS `tib_joueurs` (
  `idJoueur` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `adresseMail` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idJoueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1211 ;

--
-- Contenu de la table `tib_joueurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `tib_parties_jouees`
--
-- Création: Jeu 13 Mai 2010 à 11:38
--

CREATE TABLE IF NOT EXISTS `tib_parties_jouees` (
  `idJeux` int(8) NOT NULL,
  `idJoueur` int(8) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `points` tinyint(2) NOT NULL,
  PRIMARY KEY (`idJeux`,`idJoueur`,`date`,`heure`),
  KEY `idJeux` (`idJeux`),
  KEY `idJoueur` (`idJoueur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tib_parties_jouees`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tib_jeux`
--
ALTER TABLE `tib_jeux`
  ADD CONSTRAINT `idEditeur` FOREIGN KEY (`idEditeur`) REFERENCES `tib_editeurs` (`idEditeur`),
  ADD CONSTRAINT `idArmoire` FOREIGN KEY (`idArmoire`) REFERENCES `tib_armoires` (`idArmoire`),
  ADD CONSTRAINT `idFournisseur` FOREIGN KEY (`idFournisseur`) REFERENCES `tib_fournisseurs` (`idFournisseur`);

--
-- Contraintes pour la table `tib_parties_jouees`
--
ALTER TABLE `tib_parties_jouees`
  ADD CONSTRAINT `idJeux` FOREIGN KEY (`idJeux`) REFERENCES `tib_jeux` (`idJeux`),
  ADD CONSTRAINT `idJoueur` FOREIGN KEY (`idJoueur`) REFERENCES `tib_joueurs` (`idJoueur`);
