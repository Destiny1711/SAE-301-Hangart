-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 oct. 2022 à 08:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hangart`
--

-- --------------------------------------------------------

--
-- Structure de la table `activité`
--

CREATE TABLE `activité` (
  `id_activite` int(11) NOT NULL,
  `nom_activite` varchar(50) DEFAULT NULL,
  `date_activite` date DEFAULT NULL,
  `horaires_activite` time DEFAULT NULL,
  `img_activite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `assiste`
--

CREATE TABLE `assiste` (
  `id_profil` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id_concours` int(11) NOT NULL,
  `nom_concours` varchar(50) DEFAULT NULL,
  `horaires_concours` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `intervenants`
--

CREATE TABLE `intervenants` (
  `id_intervenants` int(11) NOT NULL,
  `nom_intervenants` varchar(50) DEFAULT NULL,
  `prenom_intervenants` varchar(50) DEFAULT NULL,
  `pays_intervenants` varchar(50) DEFAULT NULL,
  `bio_intervenants` varchar(50) DEFAULT NULL,
  `img_intervenants` text NOT NULL,
  `id_activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `id_lots` int(11) NOT NULL,
  `nom_lots` varchar(50) DEFAULT NULL,
  `description_lots` varchar(50) DEFAULT NULL,
  `id_concours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `id_concours` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nom_profil` varchar(50) DEFAULT NULL,
  `prenom_profil` varchar(50) DEFAULT NULL,
  `email_profil` varchar(50) DEFAULT NULL,
  `mdp_profil` varchar(50) DEFAULT NULL,
  `adresse_profil` varchar(50) DEFAULT NULL,
  `tel_profil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activité`
--
ALTER TABLE `activité`
  ADD PRIMARY KEY (`id_activite`);

--
-- Index pour la table `assiste`
--
ALTER TABLE `assiste`
  ADD PRIMARY KEY (`id_profil`,`id_activite`),
  ADD KEY `id_activite` (`id_activite`);

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id_concours`);

--
-- Index pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD PRIMARY KEY (`id_intervenants`),
  ADD KEY `id_activite` (`id_activite`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id_lots`),
  ADD KEY `id_concours` (`id_concours`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`id_concours`,`id_profil`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activité`
--
ALTER TABLE `activité`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id_concours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `intervenants`
--
ALTER TABLE `intervenants`
  MODIFY `id_intervenants` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `id_lots` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assiste`
--
ALTER TABLE `assiste`
  ADD CONSTRAINT `assiste_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assiste_ibfk_2` FOREIGN KEY (`id_activite`) REFERENCES `activité` (`id_activite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD CONSTRAINT `intervenants_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activité` (`id_activite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `lots_ibfk_1` FOREIGN KEY (`id_concours`) REFERENCES `concours` (`id_concours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`id_concours`) REFERENCES `concours` (`id_concours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- insertion des valeurs dans la table 'activité'
--
INSERT INTO `activité` (`id_activite`, `nom_activite`, `date_activite`, `horaires_activite`, `img_activite`) 
VALUES 
('1', 'Grafitti Introduction', '2023-05-27', '10:00:00', 'img Grafitti Introduction');
('2', 'Custom Sneakers Inroduction', '2023-05-27', '10:00:00', 'img Custom Sneakers Inroduction'),
('3', 'Silkscreen Printing Introduction', '2023-05-27', '10:00:00', 'img Silkscreen Printing Introduction'), 
('4', 'Hip Hop Introduction', '2023-05-27', '10:00:00', 'img Hip Hop Introduction'),
('5', 'Nike Lab Introduction', '2023-05-27', '10:00:00', 'img Nike Lab Introduction'),
('6', 'Concert ', '2023-05-28', '02:00:00', 'img Concert');

--
--insertion des valeurs du concours dans la table 'concours'
--
INSERT INTO `concours` (`id_concours`, `nom_concours`, `horaires_concours`) VALUES ('1', 'Concours VIP', '48:00:00');

