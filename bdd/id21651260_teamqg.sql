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
-- Base de données : id21651260_teamqg
--

CREATE DATABASE IF NOT EXISTS teamqg DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE teamqg;

CREATE TABLE utilisateurs (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   prenom VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   pseudo VARCHAR(50) UNIQUE NOT NULL DEFAULT '',
   mdp VARCHAR(255) NOT NULL DEFAULT '',
   datenaissance DATE DEFAULT NULL,
   mail VARCHAR(50) UNIQUE NOT NULL,
   est_admin BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO utilisateurs (id, prenom, nom, pseudo, mdp, datenaissance, mail, est_admin) VALUES
(1, 'Erwan', 'Schahmaneche', 'Erwanschahmaneche', '$2y$10$Da15871H88lYB9QYzZVXJ.d4GHzLM31okt5Y38ZI5JjLqERHYmCJS', NULL, 'erwanschahmaneche@gmail.com', 1),
(2, 'Motoko', 'ARAKI', 'MotokoAraki', '$2y$10$Da15871H88lYB9QYzZVXJ.d4GHzLM31okt5Y38ZI5JjLqERHYmCJS', '2002-08-15', 'MotokoAraki@gmail.com', 1),
(3, 'Jeremy', 'Fortunat', 'JeremyFortunat', '$2y$10$Da15871H88lYB9QYzZVXJ.d4GHzLM31okt5Y38ZI5JjLqERHYmCJS', NULL, 'JeremyFortunat@gmail.com', 1),
(4, 'Ruth', 'Wandja', 'Ruth', '$2y$10$Da15871H88lYB9QYzZVXJ.d4GHzLM31okt5Y38ZI5JjLqERHYmCJS', NULL, 'Ruth@gmail.com', 1),
(5, 'pasadmin', 'pasadmin', 'pasadmin', '$2y$10$MAWqqMMWDaZvucKJdlPfkeSM3qKkFkJ1BiXaG/pxl7nhCeaSNOB0.', NULL, 'pasadmin@pasadmin.com', 0);

-- mdp : Erwan, Motoko, Jeremy, Ruth = admin     pasadmin = pasadmin

CREATE TABLE video (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    fichier LONGBLOB NOT NULL,
    datee DATE,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE assomembers (
  id INT NOT NULL PRIMARY KEY,
  nom VARCHAR(50) DEFAULT NULL,
  description VARCHAR(2000) DEFAULT NULL,
  imagefile VARCHAR(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO assomembers (id, nom, description, imagefile) VALUES
(1, 'Erwan', "Erwan schahmaneche est un jeune danseur qui fit ses premiers pas de danse dans le classique. \r\nGrand curieux, il n'hésite pas à se nourrir de plusieurs cultures, danses et autres disciplines artistiques. \r\nIl débute le freestyle en 2016 en même temps que le pop puis s'oriente au fur et à mesure vers le hip-hop en 2018 où il abordera l'approche au sol par le biais du break 1 an plus tard. Nourri par le théâtre et la poésie, il n'hésite pas à utiliser sa danse dans différentes pièces en la mêlant à la comédie. \r\nArborant les couleurs de son crew Overflow ( OVF ), Erwan s'inscrit dans une nouvelle génération qui n'attend que de construire ses ailes pour voler.", 'assets/membersimages/erwan.jpg'),
(2, 'Motoko', "Motoko ARAKI née le 15 août 2002 d’origine japonaise est une danseuse freestyle Hip Hop.\r\n\r\nElle découvre la danse par le street jazz à l’âge de 11 ans et commence aussi tôt à prendre des cours de hiphop LA style.\r\n\r\nElle intègre ensuite en 2015 l’Association Sportive Hip Hop dans son collège et découvre l’existence du lycée Turgot et passe les auditions dans le but d’y intégrer la section Hip Hop en 2017. C’est ainsi qu’elle rentre dans l’univers du freestyle Hip Hop. \r\n\r\nElle participe alors à des battles et des championnats scolaires comme l’UNSS et des créations comme « CoExist » créé par Biscuit. Ces années de lycée lui ont permit de créer son crew de danse Udeep constitué de cinq jeunes danseurs venant tous de Turgot.\r\n\r\nElle intègre ensuite en 2020 la formation INTRO fondée par Laura NALA qui l’amène d’autant plus à s’ouvrir dans le domaine professionnel de la danse, et à approfondir son indentité en tant que danseuse HIP HOP.\r\n\r\nElle est aujourd’hui danseuse professionnel dans la compagnie MAZELFRETEN est interprète dans deux créations « BIS REPETITA » et « MEMENTO ».", 'assets/membersimages/motoko.jpg'),
(3, 'Jeremy', "Jeremy Fortunat (ou Jey de son nom de danseur) est un danseur de Hip-Hop Freestyle et de House Dance depuis 2018. \r\nAyant toujours eu un lien fort avec la musique et la danse, Jey décide d’intégrer la section Hip-Hop du lycée Turgot. \r\nC’est donc là qu’il fait ses premiers pas dans le milieu underground. Durant le lycée, Jey s’est passionné de la culture Hip-Hop est a développé un amour du partage artistique avec ses camarades.\r\n C’est comme cela qu’il s’est forgé un style imprégné de douceur et d’amour. \r\nC’est un artiste très sensible qui met un point d’honneur sur l’authenticité et souhaite que chaque artiste se laisse la possibilité d’être le plus authentique possible. C’est donc dans cette continuité que le groupe de danse Udeep prend forme.\r\n Un crew de danse Hip-Hop dans lequel Jey se développe depuis 2019.", 'assets/membersimages/jeremy.jpg'),
(4, 'Ruth', "Ruth est une jeune danseuse Hip-Hop freestyle. C'est dans cette discipline qu'elle s'épanouit en la pratiquant lors de son entrée au lycée Turgot. \r\nDans le cadre de son apprentissage qui lui a permis de créer son univers, elle a touché à plusieurs autres styles dont le popping. \r\nRuth s'est aussi nourrie par la création, d'autant par l'observation de diverses oeuvres artistiques que par la participation au lycée à des créations de danseurs intervenants expérimentés, l'ouvrant sur une autre perception de la danse Hip-Hop pouvant être hybride avec d'autres styles, ou encore prendre sa propre initiative sur scene.\r\nDe par sa danse Ruth a la volonté de faire part de son essence, et de transmettre des émotions.", 'assets/membersimages/ruth.jpg');

CREATE TABLE competition (
  idCompetition INT NOT NULL PRIMARY KEY,
  nomcompetition VARCHAR(50) DEFAULT NULL,
  datecompetition DATE DEFAULT NULL,
  lieu VARCHAR(200) DEFAULT NULL,
  description VARCHAR(2000) NOT NULL,
  informations VARCHAR(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO competition (idCompetition, nomcompetition, datecompetition, lieu, description, informations) VALUES
(1, 'Championnat de Danse 2024', '2024-09-15', 'Paris', 'Compétition annuelle de danse hip-hop rassemblant des danseurs de toute la France.', 'Inscriptions ouvertes aux professionnels et amateurs.'),
(2, 'Battle Urban Vibes', '2024-10-20', 'Lyon', 'Battle de danse urbaine mettant en avant les talents émergents dans le milieu hip-hop.', 'Ouvert à tous les styles de danse urbaine.'),
(3, 'Showdown Breakdance', '2024-11-12', 'Marseille', 'Compétition internationale de breakdance réunissant les meilleurs breakers du monde entier.', 'Préparez-vous à un spectacle unique et intense.');

CREATE TABLE events (
  idEvent INT NOT NULL PRIMARY KEY,
  nom VARCHAR(50) DEFAULT NULL,
  lieu VARCHAR(50) DEFAULT NULL,
  date_event DATE DEFAULT NULL,
  description VARCHAR(2000) DEFAULT NULL,
  image_path VARCHAR(50) DEFAULT NULL,
  informations VARCHAR(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO events (idEvent, nom, lieu, date_event, description, image_path, informations) VALUES
(1, 'Inside Turgot', 'Dans le Chapiteau Rajganawak à Saint-Denis !', '2023-12-27', 'Team QG présente « INSIDE TURGOT ».\r\n\r\nUn projet qui vise à mettre en avant les visions, les identités et les histoires qui font de Turgot une expérience si précieuse.\r\nComment ? À travers des stages de danse d’une journée avec des danseurs qui ont marqué l’histoire de cette section Hip-Hop.\r\n\r\nPour cette édition autour de la House Dance, les intervenants seront: Sephora «  Rvndom » , Habib, Jey Udeep et Shell Udeep. Tous les quatre sont des acteurs importants de l’histoire de la House Dance à Turgot et vont nous partager leur vibe le mercredi 27 décembre ( profitez de la vidéo en attendant ).\r\n\r\nOù ? Dans le Chapiteau Rajganawak à Saint-Denis !\r\n\r\nAu programme: Discussions, échanges, workshop, repas, DANSE.\r\n\r\nOn vous attend nombreux !', 'assets/logo.png', '<input required type=\'radio\' id=\'var1\' name=\'registration[infos]\' value=\'1\' /><label>Etudiant à Turgot</label><br><input required type=\'radio\' id=\'var2\' name=\'registration[infos]\' value=\'2\' /><label>A étudié à Turgot</label><br><input required type=\'radio\' id=\'var3\' name=\'registration[infos]\' value=\'3\' /><label>Aucun des deux</label>'),
(2, 'Festival Hip-Hop Fusion', 'Parc de la Villette, Paris', '2024-09-05', 'Festival annuel célébrant la culture hip-hop avec des performances, des ateliers et des concerts.', 'assets/festival_hiphop.jpg', 'Découvrez la diversité du hip-hop à travers cet événement unique !'),
(3, 'Urban Groove Convention', 'Palais des Congrès, Marseille', '2024-10-10', 'Convention internationale réunissant les passionnés de danse urbaine pour des workshops, des battles et des conférences.', 'assets/urban_groove.jpg', 'Rencontrez des danseurs renommés et améliorez vos compétences !');

CREATE TABLE inscriptioncompetition (
  idCompetition INT NOT NULL,
  utilisateurs_id INT NOT NULL,
  PRIMARY KEY (idCompetition, utilisateurs_id),
  FOREIGN KEY (idCompetition) REFERENCES competition (idCompetition) ON DELETE CASCADE,
  FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO inscriptioncompetition (idCompetition, utilisateurs_id) VALUES
(1, 1),  -- Erwan inscrit à Championnat de Danse 2024
(2, 2),  -- Motoko inscrite à Battle Urban Vibes
(3, 3);  -- Jeremy inscrit à Showdown Breakdance

CREATE TABLE inscriptionevent (
  idEvent INT NOT NULL,
  utilisateurs_id INT NOT NULL,
  PRIMARY KEY (idEvent, utilisateurs_id),
  FOREIGN KEY (idEvent) REFERENCES events (idEvent) ON DELETE CASCADE,
  FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO inscriptionevent (idEvent, utilisateurs_id) VALUES
(1, 1),  -- Erwan Schahmaneche
(1, 2),  -- Motoko Araki
(2, 3),  -- Jeremy Fortunat
(3, 4),  -- Ruth
(3, 1);  -- Erwan Schahmaneche participe également à cet événement

CREATE TABLE membre (
  id INT NOT NULL,
  utilisateurs_id INT NOT NULL,
  PRIMARY KEY (id, utilisateurs_id),
  FOREIGN KEY (id) REFERENCES assomembers (id) ON DELETE CASCADE,
  FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO membre (id, utilisateurs_id) VALUES
(1, 1),  -- Erwan Schahmaneche
(2, 2),  -- Motoko Araki
(3, 3),  -- Jeremy Fortunat
(4, 4);  -- Ruth

CREATE TABLE newsletter (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO newsletter (id, nom, prenom, email) VALUES
(1, 'kris', 'kris', 'chris.aghayere@gmail.com');

CREATE TABLE socialpost (
  id VARCHAR(150) NOT NULL,
  origin VARCHAR(40) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO socialpost (id, origin) VALUES
('17986348604390179', 'instagram'),
('18007433783068556', 'instagram'),
('18014306416955007', 'instagram'),
('18047634994568844', 'instagram'),
('18109097596362153', 'instagram'),
('18006326471514011', 'instagram'),
('18014024036159196', 'instagram');

