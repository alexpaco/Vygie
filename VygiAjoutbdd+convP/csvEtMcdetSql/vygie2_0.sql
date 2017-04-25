-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 13 Avril 2017 à 07:42
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vygie2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id_Departement` int(11) NOT NULL,
  `nom_Departement` varchar(255) DEFAULT NULL,
  `code_dept` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE `ecoles` (
  `id_Ecole` int(11) NOT NULL,
  `nom_Ecole` varchar(255) DEFAULT NULL,
  `adresse_Ecole` varchar(255) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL,
  `id_Ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `infecters`
--

CREATE TABLE `infecters` (
  `infecter_id` int(11) NOT NULL,
  `infecter_Actif` tinyint(4) DEFAULT NULL,
  `id_Ecole` int(11) DEFAULT NULL,
  `id_Maladie` int(11) DEFAULT NULL,
  `infecter_Date` date DEFAULT NULL,
  `infecter_DateFin` date DEFAULT NULL,
  `infecter_NbEnfant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maladies`
--

CREATE TABLE `maladies` (
  `id_Maladie` int(11) NOT NULL,
  `nom_Maladie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id_Ville` int(11) NOT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `nom_Ville` varchar(255) DEFAULT NULL,
  `id_Departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id_Departement`);

--
-- Index pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id_Ecole`),
  ADD KEY `FK_Ecoles_id_Ville` (`id_Ville`);

--
-- Index pour la table `infecters`
--
ALTER TABLE `infecters`
  ADD PRIMARY KEY (`infecter_id`);

--
-- Index pour la table `maladies`
--
ALTER TABLE `maladies`
  ADD PRIMARY KEY (`id_Maladie`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_Ville`),
  ADD KEY `FK_Villes_id_Departement` (`id_Departement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id_Departement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id_Ecole` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `infecters`
--
ALTER TABLE `infecters`
  MODIFY `infecter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maladies`
--
ALTER TABLE `maladies`
  MODIFY `id_Maladie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_Ville` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD CONSTRAINT `FK_Ecoles_id_Ville` FOREIGN KEY (`id_Ville`) REFERENCES `villes` (`id_Ville`);

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `FK_Villes_id_Departement` FOREIGN KEY (`id_Departement`) REFERENCES `departements` (`id_Departement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
