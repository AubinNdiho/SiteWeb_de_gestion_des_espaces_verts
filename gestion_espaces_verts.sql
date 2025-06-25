-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 juin 2025 à 14:48
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_espaces_verts`
--

-- --------------------------------------------------------

--
-- Structure de la table `archivecitoyen`
--

DROP TABLE IF EXISTS `archivecitoyen`;
CREATE TABLE IF NOT EXISTS `archivecitoyen` (
  `Matricul` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Adresse` varchar(20) NOT NULL,
  `MotDePasse` varchar(20) NOT NULL,
  `DateNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archivecitoyen`
--

INSERT INTO `archivecitoyen` (`Matricul`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `MotDePasse`, `DateNaissance`) VALUES
('1002/88.321', 'KAMARO', 'Leonidas', 'kamaro@gmail.com', '62354158', 'kamenge', '', '1997-02-06');

-- --------------------------------------------------------

--
-- Structure de la table `archivedemande_utilisation`
--

DROP TABLE IF EXISTS `archivedemande_utilisation`;
CREATE TABLE IF NOT EXISTS `archivedemande_utilisation` (
  `Id_Demande` int NOT NULL,
  `Date_Demande` date NOT NULL,
  `Id_Espace` int NOT NULL,
  `Matricul` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archivedemande_utilisation`
--

INSERT INTO `archivedemande_utilisation` (`Id_Demande`, `Date_Demande`, `Id_Espace`, `Matricul`, `Description`) VALUES
(34, '2025-06-21', 51, '1002/999.36', 'atteindre mes souhaits.');

-- --------------------------------------------------------

--
-- Structure de la table `archive_espace`
--

DROP TABLE IF EXISTS `archive_espace`;
CREATE TABLE IF NOT EXISTS `archive_espace` (
  `Id_Espace` int NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Localisation` varchar(20) NOT NULL,
  `Superficie` decimal(20,0) NOT NULL,
  `Type_espace` int NOT NULL,
  `Disponibilite` varchar(20) NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archive_espace`
--

INSERT INTO `archive_espace` (`Id_Espace`, `Nom`, `Localisation`, `Superficie`, `Type_espace`, `Disponibilite`, `Description`) VALUES
(61, 'jardin d`eden', 'kinindo', 1200320, 0, 'indisponible', 'il se localise pres du terrain de football');

-- --------------------------------------------------------

--
-- Structure de la table `archive_facture`
--

DROP TABLE IF EXISTS `archive_facture`;
CREATE TABLE IF NOT EXISTS `archive_facture` (
  `Id_Facture` int NOT NULL,
  `Montant` varchar(20) NOT NULL,
  `Date_Facture` date NOT NULL,
  `Statut_Paiement` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Matricul` varchar(20) NOT NULL,
  `Id_Espace` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archive_facture`
--

INSERT INTO `archive_facture` (`Id_Facture`, `Montant`, `Date_Facture`, `Statut_Paiement`, `Matricul`, `Id_Espace`) VALUES
(25, '2500000', '2025-06-20', 'realisation des proj', '1004/171.110', 45);

-- --------------------------------------------------------

--
-- Structure de la table `archive_louer`
--

DROP TABLE IF EXISTS `archive_louer`;
CREATE TABLE IF NOT EXISTS `archive_louer` (
  `Id_louer` int NOT NULL,
  `Matricul` varchar(20) NOT NULL,
  `Id_Espace` int NOT NULL,
  `Date_debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `Motif` varchar(30) NOT NULL,
  `Montant` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archive_louer`
--

INSERT INTO `archive_louer` (`Id_louer`, `Matricul`, `Id_Espace`, `Date_debut`, `Date_fin`, `Motif`, `Montant`) VALUES
(85, '1004/171.110', 45, '2025-06-20', '2025-08-24', 'realisation des prjets d`agric', '2500000');

-- --------------------------------------------------------

--
-- Structure de la table `chef_services`
--

DROP TABLE IF EXISTS `chef_services`;
CREATE TABLE IF NOT EXISTS `chef_services` (
  `Matricul` varchar(20) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  PRIMARY KEY (`Matricul`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chef_services`
--

INSERT INTO `chef_services` (`Matricul`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `MotDePasse`, `DateNaissance`) VALUES
('120/558.369', 'KABURA ', 'Emmanuel', 'kabura@gmail.com', '62896541', 'kinama', 'kab12345', '1995-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `citoyen`
--

DROP TABLE IF EXISTS `citoyen`;
CREATE TABLE IF NOT EXISTS `citoyen` (
  `Matricul` varchar(20) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  PRIMARY KEY (`Matricul`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `citoyen`
--

INSERT INTO `citoyen` (`Matricul`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `MotDePasse`, `DateNaissance`) VALUES
('1002/999.36', 'NIJIMBERE', 'Claude', 'nijimbere@gmail.com', '62598472', 'MUTANGA-NORD', '12345niji', '2000-06-23'),
('1004/171.597', 'NINZIZA', 'Mervin', 'mervin@gmail.com', '62458964', 'KIGOBE Sud', '12345', '2003-08-05'),
('1004/171.110', 'Kajeneza', 'Briant', 'briant@gmail.com', '62458958', 'Ngagara', '12345', '2003-08-06'),
('1004/171.596', 'NDIHOKUBWAYO', 'Aubin Tresor', 'ndiho@gmail.com', '62458963', 'Mutanga Nord', '12345', '2003-08-05');

-- --------------------------------------------------------

--
-- Structure de la table `demande_utilisation`
--

DROP TABLE IF EXISTS `demande_utilisation`;
CREATE TABLE IF NOT EXISTS `demande_utilisation` (
  `Id_Demande` int NOT NULL AUTO_INCREMENT,
  `Date_Demande` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Id_Espace` int DEFAULT NULL,
  `Matricul` varchar(20) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_Demande`),
  KEY `Id_Espace` (`Id_Espace`),
  KEY `Matricul` (`Matricul`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demande_utilisation`
--

INSERT INTO `demande_utilisation` (`Id_Demande`, `Date_Demande`, `Id_Espace`, `Matricul`, `Description`) VALUES
(31, '2025-06-19 22:00:00', 64, '1004/171.597', 'deroulement d`un match interscolaire'),
(32, '2025-06-19 22:00:00', 45, '1004/171.110', 'realisation des projet d`agriculture'),
(33, '2025-06-19 22:00:00', 63, '1004/171.596', 'camp des scouts'),
(35, '2025-06-19 22:00:00', 51, '1004/171.596', 'realisation d`');

-- --------------------------------------------------------

--
-- Structure de la table `espaces_verts`
--

DROP TABLE IF EXISTS `espaces_verts`;
CREATE TABLE IF NOT EXISTS `espaces_verts` (
  `Id_Espace` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  `Localisation` varchar(150) DEFAULT NULL,
  `Superficie` decimal(10,2) DEFAULT NULL,
  `Type_espace` varchar(50) NOT NULL,
  `disponibilite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Espace`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `espaces_verts`
--

INSERT INTO `espaces_verts` (`Id_Espace`, `Nom`, `Localisation`, `Superficie`, `Type_espace`, `disponibilite`, `description`) VALUES
(45, 'jardin de Ngagara', 'Ngagara', 4500.00, 'Jardin', 'disponible', 'il se trouve a NGAGARA Q6 6eme avenue n0 23'),
(51, 'parc de Ruvubu', 'kanyosha', 12000.00, 'parc', 'indisponible', 'il se trouve en face du terrain des jeux'),
(52, 'parc indepandent', 'kinindo', 234332.00, 'Parc urbain', 'disponible', 'il se localise juste a cote de l*ecole Bon berger'),
(56, 'Burundi mon pays', 'CIBITOKE', 1200320.00, 'Pelouse', 'indisponible', 'il se trouve a la frotiere de cibitoke et mutakura'),
(58, 'Terrain de tous ', 'Rohero', 1200320.00, 'Jardin', 'disponible', 'il exige de l`hygiene suffisante et il se localise a Rohero'),
(59, 'Ma parcelle', 'kanyosha', 1200320.00, 'Parc urbain', 'disponible', 'il se trouve deriere l`ecole ami des enfants'),
(60, 'pelouse de plaisir', 'kinindo', 1200320.00, 'pelouse', 'indisponible', 'il est bien amenage et se trouve a la frontiere de kinindo vers kibenga2'),
(63, 'pelouse du pays', 'carama', 1200.00, 'Pelouse', 'indisponible', 'se trouve a carama en face de kumayirabiri a la 8e avenue'),
(64, 'Stade Intwari', 'Rohero', 50000.00, 'Zone fleurie', 'indisponible', 'Ville-Bujumbura Avenue Muyinga'),
(65, 'jardin de l`eglise', 'NGAGARA ', 20000.00, 'Jardin', 'disponible', 'il se trouve ');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `Id_Facture` int NOT NULL AUTO_INCREMENT,
  `Montant` int DEFAULT NULL,
  `Date_Facture` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Statut_Paiement` varchar(20) DEFAULT NULL,
  `Matricul` varchar(20) DEFAULT NULL,
  `id_Espace` int NOT NULL,
  PRIMARY KEY (`Id_Facture`),
  KEY `Matricul` (`Matricul`),
  KEY `id_Espace` (`id_Espace`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`Id_Facture`, `Montant`, `Date_Facture`, `Statut_Paiement`, `Matricul`, `id_Espace`) VALUES
(24, 2000000, '2025-06-19 22:00:00', 'deroulement d`un mat', '1004/171.597', 64),
(26, 1000000, '2025-06-19 22:00:00', 'camps pour les scout', '1004/171.596', 63);

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

DROP TABLE IF EXISTS `louer`;
CREATE TABLE IF NOT EXISTS `louer` (
  `Id_louer` int NOT NULL AUTO_INCREMENT,
  `Matricul` varchar(20) DEFAULT NULL,
  `Id_Espace` int DEFAULT NULL,
  `Date_debut` date DEFAULT NULL,
  `Date_fin` date DEFAULT NULL,
  `Motif` varchar(200) DEFAULT NULL,
  `Montant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_louer`),
  KEY `Id_Espace` (`Id_Espace`),
  KEY `Matricul` (`Matricul`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`Id_louer`, `Matricul`, `Id_Espace`, `Date_debut`, `Date_fin`, `Motif`, `Montant`) VALUES
(84, '1004/171.597', 64, '2025-07-20', '2025-07-20', 'deroulement d`un match interscolaire', '2000000'),
(86, '1004/171.596', 63, '2025-06-20', '2025-08-20', 'camp des scouts', '1000000'),
(87, '1004/171.596', 51, '2025-06-20', '2025-07-03', 'realisation des projets', '2000000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_Espace`) REFERENCES `espaces_verts` (`Id_Espace`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
