-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 15 mai 2024 à 08:57
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id21651260_teamqg`
--

DELIMITER $$
--
-- Procédures
--
/*
CREATE DEFINER=`teamqg`@`%` PROCEDURE `routine1` (INOUT `eid` INT)   SELECT * 
FROM inscriptionevent
WHERE idEvent = eid$$
*/
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `assomembers`
--

CREATE TABLE utilisateurs (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   prenom VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   pseudo VARCHAR(50) DEFAULT '',
   mdp VARCHAR(255) DEFAULT '',
   mail VARCHAR(50) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `assomembers` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `imagefile` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Déchargement des données de la table `assomembers`
--

INSERT INTO `assomembers` (`id`, `nom`, `description`, `imagefile`) VALUES
(1, 'Erwan', 'Erwan schahmaneche est un jeune danseur qui fit ses premiers pas de danse dans le classique. \r\nGrand curieux, il n\'hésite pas à se nourrir de plusieurs cultures, danses et autres disciplines artistiques. \r\nIl débute le freestyle en 2016 en même temps que le pop puis s\'oriente au fur et à mesure vers le hip-hop en 2018 où il abordera l\'approche au sol par le biais du break 1 an plus tard. Nourri par le théâtre et la poésie, il n\'hésite pas à utiliser sa danse dans différentes pièces en la mêlant à la comédie. \r\nArborant les couleurs de son crew Overflow ( OVF ), Erwan s\'inscrit dans une nouvelle génération qui n\'attend que de construire ses ailes pour voler.', 'assets/membersimages/erwan.jpg'),
(2, 'Motoko', 'Motoko ARAKI née le 15 août 2002 d’origine japonaise est une danseuse freestyle Hip Hop.\r\n\r\nElle découvre la danse par le street jazz à l’âge de 11 ans et commence aussi tôt à prendre des cours de hiphop LA style.\r\n\r\nElle intègre ensuite en 2015 l’Association Sportive Hip Hop dans son collège et découvre l’existence du lycée Turgot et passe les auditions dans le but d’y intégrer la section Hip Hop en 2017. C’est ainsi qu’elle rentre dans l’univers du freestyle Hip Hop. \r\n\r\nElle participe alors à des battles et des championnats scolaires comme l’UNSS et des créations comme « CoExist » créé par Biscuit. Ces années de lycée lui ont permit de créer son crew de danse Udeep constitué de cinq jeunes danseurs venant tous de Turgot.\r\n\r\nElle intègre ensuite en 2020 la formation INTRO fondée par Laura NALA qui l’amène d’autant plus à s’ouvrir dans le domaine professionnel de la danse, et à approfondir son indentité en tant que danseuse HIP HOP.\r\n\r\nElle est aujourd’hui danseuse professionnel dans la compagnie MAZELFRETEN est interprète dans deux créations « BIS REPETITA » et « MEMENTO ».', 'assets/membersimages/motoko.jpg'),
(3, 'Jeremy', 'Jeremy Fortunat (ou Jey de son nom de danseur) est un danseur de Hip-Hop Freestyle et de House Dance depuis 2018. \r\nAyant toujours eu un lien fort avec la musique et la danse, Jey décide d’intégrer la section Hip-Hop du lycée Turgot. \r\nC’est donc là qu’il fait ses premiers pas dans le milieu underground. Durant le lycée, Jey s’est passionné de la culture Hip-Hop est a développé un amour du partage artistique avec ses camarades.\r\n C’est comme cela qu’il s’est forgé un style imprégné de douceur et d’amour. \r\nC’est un artiste très sensible qui met un point d’honneur sur l’authenticité et souhaite que chaque artiste se laisse la possibilité d’être le plus authentique possible. C’est donc dans cette continuité que le groupe de danse Udeep prend forme.\r\n Un crew de danse Hip-Hop dans lequel Jey se développe depuis 2019.', 'assets/membersimages/jeremy.jpg'),
(4, 'Ruth', 'Ruth est une jeune danseuse Hip-Hop freestyle. C\'est dans cette discipline qu\'elle s\'épanouit en la pratiquant lors de son entrée au lycée Turgot. \r\nDans le cadre de son apprentissage qui lui a permis de créer son univers, elle a touché à plusieurs autres styles dont le popping. \r\nRuth s\'est aussi nourrie par la création, d\'autant par l\'observation de diverses oeuvres artistiques que par la participation au lycée à des créations de danseurs intervenants expérimentés, l\'ouvrant sur une autre perception de la danse Hip-Hop pouvant être hybride avec d\'autres styles, ou encore prendre sa propre initiative sur scene.\r\nDe par sa danse Ruth a la volonté de faire part de son essence, et de transmettre des émotions.', 'assets/membersimages/ruth.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `idCompetition` int(11) NOT NULL,
  `nomcompetition` varchar(50) DEFAULT NULL,
  `datecompetition` date DEFAULT NULL,
  `lieu` varchar(200) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `informations` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `idEvent` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `date_event` date DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image_path` varchar(50) DEFAULT NULL,
  `informations` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`idEvent`, `nom`, `lieu`, `date_event`, `description`, `image_path`, `informations`) VALUES
(1, 'Inside Turgot', 'Dans le Chapiteau Rajganawak à Saint-Denis !', '2023-12-27', 'Team QG présente « INSIDE TURGOT ».\r\n\r\nUn projet qui vise à mettre en avant les visions, les identités et les histoires qui font de Turgot une expérience si précieuse.\r\nComment ? À travers des stages de danse d’une journée avec des danseurs qui ont marqué l’histoire de cette section Hip-Hop.\r\n\r\nPour cette édition autour de la House Dance, les intervenants seront: Sephora «  Rvndom » , Habib, Jey Udeep et Shell Udeep. Tous les quatre sont des acteurs importants de l’histoire de la House Dance à Turgot et vont nous partager leur vibe le mercredi 27 décembre ( profitez de la vidéo en attendant ).\r\n\r\nOù ? Dans le Chapiteau Rajganawak à Saint-Denis !\r\n\r\nAu programme: Discussions, échanges, workshop, repas, DANSE.\r\n\r\nOn vous attend nombreux !', 'assets/logo.png', '<input required type=\'radio\' id=\'var1\' name=\'registration[infos]\' value=\'1\' /><label>Etudiant à Turgot</label><br><input required type=\'radio\' id=\'var2\' name=\'registration[infos]\' value=\'2\' /><label>A étudié à Turgot</label><br><input required type=\'radio\' id=\'var3\' name=\'registration[infos]\' value=\'3\' /><label>Aucun des deux</label>');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

--
-- Déchargement des données de la table `inscription`
--

/*INSERT INTO `inscription` (`idInscription`, `nom`, `prenom`, `email`, `age`, `autreinformations`) VALUES
(1, 'Surasri', 'Jean-Paul', 'jean-paul.surasri@student-cs.fr', 23, NULL),
(3, 'Goutaudier', 'Tess', 'tess.gtdr@gmail.com', 16, '3'),
(4, 'Vincent', 'Nellia', 'n.vincentmathiot@gmail.com', 16, NULL),
(10, 'Schilling', 'Jeanne', 'jeanne.schilling@hotmail.fr', 21, NULL),
(11, 'CARIUS ', 'Livie', 'hitomi.laika@gmail.com', 49, NULL),
(12, 'CHIARAMELLO', 'Lili Mae', 'Lilimaechiaramello92@gmail.com ', 16, NULL),
(14, 'Toure', 'Ibrahim ', 'IbrahimT75@outlook.fr', 19, NULL),
(15, 'Kibebe ', 'Noelie', 'Noeliekibebe@gmail.com', 27, NULL),
(16, 'Koyo', 'Dorothee', 'Dorotheekoyo@gmail.com', 27, NULL),
(17, 'Connan', 'Malaurie ', 'malaurie.connan@gmail.com', 16, NULL),
(18, 'Yamamoto', 'Yuki', 'yymmt3.waste@gmail.com', 25, NULL),
(19, 'Kiminou', 'Jessica', 'Jessica.kiminou@gmail.com', 23, NULL),
(47, 'kris', 'kris', 'chris.aghayere@gmail.com', 19, 'annees = 3 '),
(48, 'Jdizbd', 'Bskdbd', 'Bekejd .kfoebd@(38/!:', 37, '');*/

-- --------------------------------------------------------

--
-- Structure de la table `inscriptioncompetition`
--

CREATE TABLE `inscriptioncompetition` (
  `idCompetition` int(11) NOT NULL,
  `idInscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionevent`
--

CREATE TABLE `inscriptionevent` (
  `idEvent` int(11) NOT NULL,
  `idInscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `inscriptionevent`
--

INSERT INTO `inscriptionevent` (`idEvent`, `idInscription`) VALUES
(1, 1),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `idInscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'kris', 'kris', 'chris.aghayere@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `socialpost`
--

CREATE TABLE `socialpost` (
  `id` varchar(150) NOT NULL,
  `origin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `socialpost`
--

INSERT INTO `socialpost` (`id`, `origin`) VALUES
('17986348604390179', 'instagram'),
('18007433783068556', 'instagram'),
('18014306416955007', 'instagram'),
('18047634994568844', 'instagram'),
('18109097596362153', 'instagram'),
('18006326471514011', 'instagram'),
('18014024036159196', 'instagram');

CREATE TABLE video (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    fichier LONGBLOB NOT NULL,
    datee DATE,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assomembers`
--
ALTER TABLE `assomembers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`idCompetition`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idInscription`);

--
-- Index pour la table `inscriptioncompetition`
--
ALTER TABLE `inscriptioncompetition`
  ADD PRIMARY KEY (`idCompetition`,`idInscription`),
  ADD KEY `idInscription` (`idInscription`);

--
-- Index pour la table `inscriptionevent`
--
ALTER TABLE `inscriptionevent`
  ADD PRIMARY KEY (`idEvent`,`idInscription`),
  ADD KEY `inscriptionevent_ibfk_2` (`idInscription`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`,`idInscription`),
  ADD KEY `idInscription` (`idInscription`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assomembers`
--
ALTER TABLE `assomembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `idCompetition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idInscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscriptioncompetition`
--
ALTER TABLE `inscriptioncompetition`
  ADD CONSTRAINT `inscriptioncompetition_ibfk_1` FOREIGN KEY (`idCompetition`) REFERENCES `competition` (`idCompetition`),
  ADD CONSTRAINT `inscriptioncompetition_ibfk_2` FOREIGN KEY (`idInscription`) REFERENCES `inscription` (`idInscription`);

--
-- Contraintes pour la table `inscriptionevent`
--
ALTER TABLE `inscriptionevent`
  ADD CONSTRAINT `inscriptionevent_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `events` (`idEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptionevent_ibfk_2` FOREIGN KEY (`idInscription`) REFERENCES `inscription` (`idInscription`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id`) REFERENCES `assomembers` (`id`),
  ADD CONSTRAINT `membre_ibfk_2` FOREIGN KEY (`idInscription`) REFERENCES `inscription` (`idInscription`);

--
-- Contraintes pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `newsletter_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inscription` (`idInscription`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





