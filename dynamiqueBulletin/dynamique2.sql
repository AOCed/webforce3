-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Décembre 2016 à 13:14
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dynamique2`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `el_id` int(11) NOT NULL AUTO_INCREMENT,
  `el_name` varchar(50) NOT NULL,
  `el_firstname` varchar(50) NOT NULL,
  PRIMARY KEY (`el_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`el_id`, `el_name`, `el_firstname`) VALUES
(1, 'Bouffay', 'Karim'),
(2, 'Martin', 'Pascal'),
(3, 'Dupont', 'Marcel'),
(4, 'Leloup', 'Jeanne');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `ma_id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_name` varchar(50) NOT NULL,
  PRIMARY KEY (`ma_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`ma_id`, `ma_name`) VALUES
(1, 'Français'),
(2, 'Mathématiques'),
(3, 'Histoire'),
(4, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `no_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_el_id` int(11) NOT NULL,
  `fk_ma_id` int(11) NOT NULL,
  `no_note` decimal(10,2) NOT NULL,
  PRIMARY KEY (`no_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`no_id`, `fk_el_id`, `fk_ma_id`, `no_note`) VALUES
(1, 1, 2, '10.00'),
(2, 1, 1, '13.00'),
(3, 2, 1, '5.00'),
(4, 2, 2, '19.00'),
(5, 1, 2, '12.00');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_title` varchar(255) NOT NULL,
  `pa_keywords` varchar(255) NOT NULL,
  `pa_description` varchar(255) NOT NULL,
  `pa_content` text NOT NULL,
  `pa_parent_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`pa_id`, `pa_title`, `pa_keywords`, `pa_description`, `pa_content`, `pa_parent_id`) VALUES
(1, 'Accueil', 'Accueil', 'Accueil', 'accueil', 0),
(2, 'Bulletin', 'Bulletin', 'Bulletin', 'bulletin', 1),
(3, 'Ajouts', 'Ajouts', 'Ajouts', 'ajouts', 1),
(5, 'Matière', 'Matière', 'Matière', 'matiere', 3),
(6, 'Note', 'Note', 'Note', 'note', 3),
(7, 'Elève', 'Elève', 'Elève', 'eleve', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
