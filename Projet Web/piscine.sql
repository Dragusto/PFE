-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 mai 2018 à 16:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `travail` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `dateDebut` date NOT NULL,
  `contrat` varchar(100) NOT NULL,
  `auteur` int(100) NOT NULL,
  `datePubli` datetime NOT NULL,
  `description` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`travail`, `lieu`, `dateDebut`, `contrat`, `auteur`, `datePubli`, `description`) VALUES
('trader', 'Paris', '2018-05-21', 'CDI', 0, '0000-00-00 00:00:00', ''),
('developpeur', 'Paris', '2018-05-30', 'CDD', 0, '0000-00-00 00:00:00', ''),
('qwerty', 'asdf', '2012-12-12', 'CDD', 2, '2018-05-05 10:23:34', 'qwertyuiopasdfghjklzxcvbnm,');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(100) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date_evenement` date NOT NULL,
  `temps` datetime NOT NULL,
  `nb_like` int(100) NOT NULL,
  `auteur` int(100) NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre`, `date_evenement`, `temps`, `nb_like`, `auteur`) VALUES
(1, 'meeting', '2012-12-12', '2018-05-04 09:54:03', 2, 0),
(2, 'reunion', '2018-05-20', '2018-05-04 09:58:22', 3221, 95),
(3, 'meeting', '2012-12-12', '2018-05-04 12:22:08', 3, 93),
(4, 'h', '2012-12-12', '2018-05-04 13:59:31', 2, 0),
(5, 'a', '0000-00-00', '2018-05-05 08:47:42', 0, 0),
(6, 'b', '0000-00-00', '2018-05-05 08:51:19', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `date_de_naissance` varchar(100) DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `travail` varchar(30) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id` int(10) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table membre';

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `date_de_naissance`, `ville`, `travail`, `adresse`, `email`, `id`, `admin`) VALUES
('a', 'a', NULL, NULL, NULL, NULL, 'a', 94, NULL),
('Blanc', 'Corentin', NULL, NULL, NULL, NULL, 'qc@gmail.com', 95, NULL),
('Chabennet', 'Quentin', '25 Avril 1995', NULL, 'Etudiant ING 3', '16 Sentier des Sablons Cachan 94230', 'qchabennet@gmail.com', 93, 1),
('aze', 'aze', NULL, NULL, NULL, NULL, 'aze', 99, NULL),
('az', 'aze', NULL, NULL, NULL, NULL, 'aze', 102, NULL),
('az', 'azer', NULL, NULL, NULL, 'qsxdcfvgbhunjinibftdrsew', 'azer', 103, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_send` int(100) NOT NULL,
  `id_receive` int(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_send`,`id_receive`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(100) NOT NULL,
  `nom_photo` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `nom_photo`) VALUES
(95, 'New Super-Man (2016-) 001-012 copie.jpg'),
(95, 'New Super-Man (2016-) 001-011 copie.jpg'),
(95, 'New Super-Man (2016-) 001-022 copie.jpg'),
(95, 'New Super-Man (2016-) 001-021 copie.jpg'),
(95, 'New Super-Man (2016-) 001-020 copie.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `relation` int(11) NOT NULL AUTO_INCREMENT,
  `id_1` int(100) NOT NULL,
  `id_2` int(100) NOT NULL,
  PRIMARY KEY (`relation`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `relation`
--

INSERT INTO `relation` (`relation`, `id_1`, `id_2`) VALUES
(13, 93, 95),
(2, 95, 103),
(11, 102, 95);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1 COMMENT='table utilisateur';

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `mdp`, `nom`, `prenom`, `admin`) VALUES
(93, 'qchabennet@gmail.com', '$2y$10$bjXI4W8VaiYCGGJtHA2O7e0ViNdR0satr.iBQZk6Ge/ZNxFX0mfXy', 'Chabennet', 'Quentin', NULL),
(94, 'a', '$2y$10$f9jpzaOGEVVpiBVE2hrSxeUtg9nxAlHciAhyx9XgUPQf4fwTEDfQK', 'a', 'a', NULL),
(95, 'qc@gmail.com', '$2y$10$9780d/.Sdx84YQRMj7CCU.M3Pz2oAtk8fRLhxRnbMnGSZeuftx/kS', 'Blanc', 'Corentin', NULL),
(96, 'a', '$2y$10$3nslFQ1vSgHPDWe9P2qmzOhDlJFFcAOTRswwCdWAHAcZw09mN0zZW', 'Chabennet', 'Thomas', NULL),
(97, 'a', '$2y$10$7c/toNTFUXH7gyhVAYTvgur/DF5DS4QTDxekbR6f4mZPFzMMNUYxi', 'Chabennet', 'a', NULL),
(98, 'a', '$2y$10$WduxhPhpYS8FV7OZjuuQ/.A.vUWRnRO429tNFCfeaxOwG.oMyhJt.', 'a', 'a', NULL),
(99, 'aze', '$2y$10$F.3Zy/jtoLZBosphRhnTDeHzrDxPW0PtrTRTa/Ln0PeD.BptNScAS', 'aze', 'aze', NULL),
(102, 'aze', '$2y$10$wvIyQUlGH.7xOycdCQabSeFY4CnJuDw/huBpF4wNAwNUcvgYy/iDa', 'az', 'aze', NULL),
(103, 'azer', '$2y$10$fNO4sGbjBypzRBAKi4Ele.wIcM6wzYMJmAxfan9wS/MBnszq1yzk.', 'az', 'azer', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
