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
  `bio_intervenants` varchar(500) DEFAULT NULL,
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
ALTER TABLE `activite`
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
-- insertion des valeurs dans la table `activité`
--
INSERT INTO `activité` (`id_activite`, `nom_activite`, `date_activite`, `horaires_activite`, `img_activite`) 
VALUES 
('1', 'Grafitti Introduction', '2023-05-27', '10:00:00', 'GrafittiIntroduction.png'),
('2', 'Custom Sneakers Inroduction', '2023-05-27', '10:00:00', 'CustomSneakersInroduction.png'),
('3', 'Silkscreen Printing Introduction', '2023-05-27', '10:00:00', 'SilkscreenPrintingIntroduction.png'), 
('4', 'Hip Hop Introduction', '2023-05-27', '10:00:00', 'HipHopIntroduction.png'),
('5', 'Nike Lab Introduction', '2023-05-27', '10:00:00', 'NikeLabIntroduction.png'),
('6', 'Concert ', '2023-05-28', '02:00:00', 'Concert.png');

--
<<<<<<< Updated upstream
-- insertion des valeurs du concours dans la table 'concours'
=======
-- insertion des valeurs dans la table 'concours'
>>>>>>> Stashed changes
--


INSERT INTO `concours` (`id_concours`, `nom_concours`, `horaires_concours`) 
VALUES 
('1', 'Concours VIP', '48:00:00');

--
<<<<<<< Updated upstream
-- insertion des valeurs du concours dans la table 'intervenants'
--
=======
-- insertion des valeurs dans la table `intervenants`
--

>>>>>>> Stashed changes
INSERT INTO `intervenants` (`id_intervenants`, `nom_intervenants`, `prenom_intervenants`, `pays_intervenants`, `bio_intervenants`, `img_intervenants`, `id_activite`)
VALUES
('1', 'Alberni', 'Camille', 'France', '@Camille Alberni, aka Dege, is a graffiti artist from Puy-en-Velay, who has been passionate about art and especially about bomb painting since he was very young. Plasterer-painter entrepreneur and decorator by profession, the young man also one of the brightest graffiti artists in the department and far beyond. You can find it on the Grafitti stand.', 'CamilleAlberni.png', '1'),
('2', 'Kaes', 'Jay', 'England', '@Jay Kaes is presently working on a creative process that focuses on the interrelation of art and technology. It is about the change of human beings due to technology and its exponential growth, and the art especially reflects the human ability to deal with these changes that affect the way we see ourselves as well as our vision of the future as a society. You can find it on the Grafitti stand.', 'JayKaes.png', '1'),
('3', 'Rak', 'Natalia', 'Poland', '@Natalia Rak portraits, mostly, women and creates a mystery and metaphor around their stories. New to the streets, she has created some images that are already iconic in the street art world. She’s been mostly recognized for her murals. She will be present on the Grafitti stand.', 'NataliaRak.png', '1'),
('4', 'Giorgino', 'Francesco Camillo', 'Italy', '@Francesco Camillo Giorgino aka Millo, is an Italian artist who paints large-scale murals featuring locals exploring their urban setting. It uses simple lines in black and white with a few lines of color. He often incorporates architectural elements into his paintings on several floors. You can find it on the Grafitti stand.', 'FrancesCamilloGiorgino.png', '1'),
('5', 'Lopez', 'Fabio', 'Spain', '@Fabio Lopez known under the pseudonym DOURONE is a Spanish artist who entered the art world at the age of 14.  In 1999, he devoted himself to graffiti in the streets of Madrid, his hometown. You can find it on the Grafitti stand.', 'FabioLopez.png', '1'),
('6', 'Trasfi', 'Kenza', 'France', '@Knz.tv is an independent artist specialized in the customization of sneakers. Indeed, she was able to combine her two passions: drawing and sneakers and make it her main activity. She will be present on the Sneakers stand.', 'Knztv.png', '2'),
('7', 'Kiraya', 'Aida', 'England', '@AfroKickz is an independent artist inspired by Africa and black culture, which she transcribes on her various customs. She will be present on the Sneakers stand.', 'AfroKickz.png', '2'),
('8', 'Terzo', 'Marko', 'United States', '@Marko is a young American artist known mainly for his customs for the starts he puts on video on the YouTube platform. You can find it on the Sneakers stand.', 'Marko.png', '2'),
('9', 'Bembury', 'Salehe', 'United States', '@Salehe Bembury is a creative by trade. He is most notably making his mark in the world of footwear design. Since 2009, he has applied his Industrial Design degree and interdisciplinary design skills to a diverse array of footwear brands. You can find it on the Sneakers stand.', 'SalaheBembury.png', '2'),
('10', 'Esperluette', 'Emma', 'France', ' @Esperluette is a young rising artist from Le Puy-en-Velay, specialized in screen printing. She will be present on the Silkscreen Printing stand.', 'Esperluette.png', '3'),
('11', 'Bolino', 'Pakito', 'France', ' @PakitoB olino is a French artist, cartoonist and publisher. His style is a mixture of black romanticism, quirky and grotesque, crossed by punk energy and humor no less black, devastating. You can find it on the Silkscreen Printing stand.', 'PakitoBolino.png', '3'),
('12', 'Carbone', 'Aude', 'France', ' @Aude Carbone is a screen printing artist known for her abstract creations, which she describes as a journey into the imagination. She will be present on the Silkscreen Printing stand.', 'AudeCarbone.png', '3'),
('13', 'Bourgeois', 'Larry & Laurent', 'France', ' @TheTwins are a duo of dancers-choreographers, specialized in New-Style, a style composing the dances of Hip-hop. You can find them on the Hip Hop stand.', 'LesTwins.png', '4'),
('14', 'Merzouki  ', 'Mourad', 'France', ' @Mourad Merzouki is a French choreographer specialized in Hip-Hop. Director of the Centre Chorégraphique de Créteil and Val de Marne, Mourad Merzouki will be present on the Hip Hop stand.', 'MouradMerzouki.png', '4'),
('15', 'Robson', 'Wade', 'Australia', '@Wade Robson is young and dynamic, Wade Robson is rocking the under-30 scene in hip hop dance. In 2007, Wade Robson won an Emmy Award for his choreography in the hugely popular television show. You can find it on the Hip Hop stand. ', 'WadeRobson.png', '4'),
('16', 'Rémy', 'Batiste', 'France', '@Batiste Rémy is a designer from Avignon working for the brand swoosh, nike. He is known for having participated in the design of the air max + collection. You can find it on the Nike Lab stand. ', 'BatisteRémy.png','5'),
('17', 'Team', 'Nike Lab', 'England', '@Nike Lab Teamwill be happy to welcome you, to help you customize your most beautiful pieces.', 'NikeLabTeam.png','5');

--
<<<<<<< Updated upstream
-- insertion des valeurs dans la table 'lots'
=======
-- insertion des valeurs dans la table `lots`
>>>>>>> Stashed changes
--
INSERT INTO `lots` (`id_lots`, `nom_lots`, `description_lots`, `id_concours`)
VALUES
('1', 'Painting', 'Try to win the work of the artist of your choice.', '1'),
('2', 'Nike Outfit', 'Try to win the Nike outfit of your choice.', '1'),
('3', 'Sneaker', 'Try to win the Nike Sneakers custom of your choice.', '1');
