-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 mars 2020 à 18:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT DELAYED INTO `avis` (`id`, `commentaire`, `id_produits`, `id_utilisateur`, `date`) VALUES
(19, 'Très bon pc, je recommande !', 58, 12, '2020-03-09 19:56:34'),
(20, 'Bon pc tout en un pour de la bureautique', 59, 12, '2020-03-09 19:57:08');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nomurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT DELAYED INTO `categorie` (`id`, `nom`, `nomurl`) VALUES
(1, 'PC Gamer', 'gamer'),
(2, 'PC Bureautique', 'bureautique'),
(3, 'PC Multimédia', 'multimedia');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT DELAYED INTO `commande` (`id`, `id_utilisateur`, `id_produits`, `quantité`, `prix`, `date`, `adresse`) VALUES
(22, 15, 44, 1, 750, '2020-03-08 18:15:30', '43000 Avenue DesFleurs'),
(23, 12, 45, 1, 835, '2020-03-09 08:46:32', '43000 Avenue DesFleurs'),
(20, 15, 45, 1, 835, '2020-03-06 18:03:39', '43000 Avenue DesFleurs'),
(25, 15, 60, 1, 550, '2020-03-09 19:43:44', 'une adresse de livraison par défaut'),
(26, 12, 46, 1, 1500, '2020-03-09 19:55:53', 'adresse de livraison par défaut'),
(27, 12, 45, 1, 835, '2020-03-09 19:55:53', 'adresse de livraison par défaut');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produits` int(11) DEFAULT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT DELAYED INTO `images` (`id`, `id_produits`, `chemin`, `hauteur`, `largeur`) VALUES
(41, 44, '../img/UvLTIBDP4m.jpg', 200, 200),
(42, 45, '../img/ETUy6WVeNH.jpg', 200, 200),
(43, 46, '../img/f49Qoh7Xnc.jpg', 200, 200),
(51, 54, '../img/iCXVVThZ6i.jpg', 200, 200),
(52, 55, '../img/plOsJWSyXQ.jpg', 200, 200),
(53, 56, '../img/0vTO8xa2AD.jpg', 200, 200),
(55, 58, '../img/Cffzg47yup.jpg', 200, 200),
(56, 59, '../img/4uQW6t6iIY.jpg', 200, 200),
(57, 60, '../img/zNx3iRHDtJ.jpg', 200, 200),
(58, 61, '../img/joPcz0YuFF.jpg', 200, 200),
(59, 62, '../img/7FI4POD7ih.jpg', 200, 200);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT DELAYED INTO `produits` (`id`, `nom`, `id_categorie`, `id_sous_categorie`, `description`, `prix`) VALUES
(46, 'HP Obelisk', 1, 1, 'Le PC de HP est équipé d’un processeur Intel Core i7-9700F et de 16 Go de RAM SSDRAM DDR4. D’un point de vue stockage, il est équipé d\'un disque dur de 1 To et d\'un SSD de 128 Go . Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de HP vous procure une connectivité WiFi  mais il possède également un port Ethernet pour une connexion filaire. En toute situation, pour répondre à vos besoins divers, il est équipé de 8 x USB 3.1 afin de pouvoir connecter vos périphériques externes.', 1500),
(45, 'HP Pavillon Gaming', 1, 1, 'Ecran FHD IPS anti-reflets micro-bords à rétroéclairage WLED (1920 x 1080px)\r\nProcesseur Intel Core i5-9300H 4 cœurs\r\nMémoire vive 8 Go SDRAM DDR4\r\nHDD 1 To + SSD 128 Go\r\nNvidia GeForce GTX 1650\r\nSystème d\'exploitation Windows 10\r\nClavier AZERTY avec pavé numérique\r\nWebcam avec microphone\r\nJusqu\'à 10h30 d\'autonomie', 835),
(44, 'HP Omen 15', 1, 1, 'Ecran : Full HD IPS anti-reflets micro-bords à rétroéclairage WLED de 39,6 cm (15,6\") de diagonale (1 920 x 1 080). Type d\'alimentation: Adaptateur secteur 150 W\r\nStockage et mémoire : 8 Go de RAM, Hybride (Disque Dur + SSD) 1000 Go + 128 Go\r\nProcesseur : Intel Core i5-8300H (2,3 GHz de fréquence de base, jusqu’à 4 GHz avec technologie Intel Turbo Boost, 8 Mo de mémoire cache, 4 cœurs)\r\nCarte Graphique : Carte NVIDIA GeForce GTX 1050 Ti (4 Go de mémoire GDDR5 dédiée)\r\nConnectivité : 1 port USB 3.1 Type-C ; 3 ports USB 3.1 Gen 1 ; 1 port HDMI\r\nLa vie de la batterie mixé utilisation: Jusqu\'à 6 heures et 15 minutes', 750),
(54, 'ASUS ROG STRIX', 1, 2, 'Ce PC ASUS ROG est équipé d’un processeur Intel Core i7-8700 et de 8 Go de RAM DDR4. D’un point de vue stockage, il est équipé d\'un Disque dur 1 To accompagné d\'un SSD de 128 Go . Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place sur le PC. L’ordinateur ASUS ROG Huracan G21CN-FR102T vous offre un design affirmé et agressif. IL intègre un paneau latéral repliable aimanté qui permet d\'améliorer la circulation de l\'air et mieux refroidir les composants pour de meilleures performances. Le chassis ROG Huracan est éclairé par la technologie AURA SYNC qui propose une palette de 16 million de couleurs et la synchronisation des effets lumineux entre les périphériques RGB compatibles et votre PC', 1299.99),
(55, 'MSI Infinite', 1, 3, 'Le PC de MSI est équipé d’un processeur Intel Core i7-9700F avec 16 Go de RAM DDR4. D’un point de vue stockage, il est équipé d\'un disque dur de 1 To et d\'un SSD de 512 Go. Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de MSI vous procure une connectivité WiFi  mais il possède également un port Ethernet pour une connexion filaire. En toute situation, pour répondre à vos besoins divers, il est équipé de 4 x USB 3.1 et de 5 x USB 2.0 afin de pouvoir connecter vos périphériques externes.', 1649.99),
(56, 'HP 22c0057nf', 2, 1, 'Le PC de HP est équipé d’un processeur Intel Pentium J5005 avec 4 Go de RAM DDR4. D’un point de vue stockage, il est équipé d\'un disque dur 1 To 7200 tours/mn. Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de HP vous procure une connectivité de tout confort : WiFi, Bluetooth 4.2 mais il possède également un port Ethernet pour une connexion filaire. En toute situation, pour répondre à vos besoins divers, il est équipé de 2 ports USB 2.0 ; 2 ports USB 3.0 afin de pouvoir connecter vos périphériques externes.', 460),
(58, 'ASUS ZenBook Duo', 2, 2, 'Le ZenBook Duo est équipé d\'un puissant processeur Intel® Core™ i5 de 10e génération. Avec ses quatre cœurs, le ZenBook Duo peut facilement gérer toutes les applications de votre écran principal et du ScreenPad™ Plus, pour un flux de travail inter-écrans extrêmement fluide. Pour ce modèle, Asus a fait le choix d\'intégrer le processeur Intel® Core™ i5-10210U (1,6 GHz / 4,2 GHz Turbo - Quad-Core - Cache 6 Mo).', 1044.99),
(59, 'MSI Pro 20EXTS 7M044XEU Noir', 2, 3, 'Gagnez en confort avec le PC tout-en-un MSI Pro 20EXTS ! Conçu pour offrir de bonnes performances pour un prix abordable, cet ordinateur tout-en-un sera un achat idéal pour toutes les tâches professionnelles courantes. Il sera aussi adapté pour le divertissement occasionnel.\r\n\r\nLe MSI Pro 20EXTS 7M-044XEU offre d\'excellentes performances et un fonctionnement rapide grâce à son processeur Intel Core i3-7100, ses 4 Go de mémoires DDR4 extensibles jusqu\'à 32 Go et son SSD M.2 SATA de 128 Go.', 649.95),
(60, 'HP 15dw0025nf', 3, 1, 'Profitez de bonnes performances et de fluidité tous les jours avec le PC portable HP 15-dw0025nf ! Ses composants de qualité vous offrent l\'efficacité dont vous avez besoin au quotidien tandis que son écran de 15.6\" Full HD vous apporte une image de qualité pour le divertissement. Avec un processeur Intel Core i3-8145U, 4 Go de mémoire DDR4 et son SSD M.2 NVMe de 256 Go, ce modèle propose les performances en adéquation avec les activités quotidiennes (internet, bureautique, multimédia). Le disque dur 1 To assure de son côté le stockage de vos fichiers.', 549.95),
(61, 'ASUS FX10CP FR017T', 3, 2, 'Le PC Asus FX10CP - FR017T est équipé d’un processeur Intel Core i5 -8400 avec 8 Go de RAM DDR4. D’un point de vue stockage, le Asus  est équipé d’un disque dur de 1To et un SSD 128 Go M.2. Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur deAsus vous procure une connectivité de tout confort : WiFi, Bluetooth 5.0 mais il possède également un port Ethernet pour une connexion filaire.', 749.99),
(62, 'MSI Infinite S 9SI054EU', 3, 3, 'Le PC de MSI  est équipé d’un processeur Intel Core i5 9400F avec 8 Go de RAM DDR4. D’un point de vue stockage, il est équipé d’un disque SSD de 128 Go et un disque dur 1 To. Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de MSI vous procure une connectivité de tout confort : WiFi, Bluetooth 4.2 mais il possède également un port Ethernet pour une connexion filaire.', 999.99);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `chemin` varchar(50) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT DELAYED INTO `sous_categorie` (`id`, `nom`, `chemin`, `hauteur`, `largeur`) VALUES
(1, 'hp', '../img/hp.jpg', 200, 200),
(2, 'asus', '../img/asus.jpg', 200, 200),
(3, 'msi', '../img/msi.jpg', 200, 200);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT DELAYED INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `email`, `password`, `grade`) VALUES
(12, 'Firefou', 'Gonzalez', 'Adrien', 'adrien1361@hotmail.fr', '$2y$12$R9bvoYGcnfMF49LCUuzD1.0DdvWkNRapF5HgecrmRhz0Ec0gYHHWO', 'utilisateur'),
(15, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$12$ihiKI19eh6qc.jIXzhb.G.nNa6R3FyGEGv6ooDVyM30ucW0ZMtl/W', 'admin'),
(16, 'Walken99', 'Gonzalez', 'Adrien', 'adrien1361@hotmail.fr', '$2y$12$xhQxcEmwz32mvaUSO97.gO0v.QXeeB90ad6KzszUH9dXIeri1Ysd2', 'utilisateur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
