-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Décembre 2016 à 16:00
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `category` enum('action','comedy','scifiction','drama','thriller') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(2, 'Mulholand Drive', 'Naomi Wats', 'David Lynch', 'StudioCanal', 2001, '2', 'scifiction', ' Il raconte l''histoire d''une aspirante actrice appelée Betty Elms (Naomi Watts) fraichement arrivée à Los Angeles, en Californie ; elle rencontre et se lie d''amitié avec une femme amnésique (Laura Harring), victime d''un accident, grâce auquel elle a échappé à un meurtre. Le récit propose d''autres éléments apparemment dépourvus de liens mais qui finissent par se connecter de diverses manières ; des scènes et images surréalistes se rapportent également à la narration mystérieuse.', 'https://www.youtube.com/watch?v=dl9jSfdyspg'),
(3, 'Holy Motors', 'Denis Lavant', 'Leo Carax', 'StudioCanal', 2012, '1', 'comedy', 'Synopsis à venir', 'https://www.youtube.com/watch?v=CFF6Y-ifXPg'),
(4, 'Oldboy', 'Choi Min‑sik', 'Park Chan-Wook', 'Lim Seung-yong et Kim Dong-joo', 2003, '3', 'action', 'un film sud-coréen réalisé par Park Chan-wook, sorti en 2003, fondé sur un manga de Nobuaki Minegishi et Garon Tsuchiya sorti en 1997. Ce dernier est notamment inspiré en grande partie du Comte de Monte-Cristo.', 'https://www.youtube.com/watch?v=r_1DbgpSDYY'),
(6, 'Take Shelter', 'Michael Shannon', 'Jeff Nichols', 'Hydraulx Entertainment', 2011, '2', 'drama', 'Curtis LaForche est un jeune marié et père d''une petite fille atteinte de surdité. Il souffre de troubles apparemment délirants, assailli de visions et de rêves de tornades, de nuages d''étourneaux, de violences contre lui ou sa famille. Il se questionne d''autant plus que sa mère a été internée pour troubles mentaux à son âge : doit-il protéger sa famille en consacrant son temps et son argent à perfectionner et agrandir l''abri anti-tornades de son jardin ou doit-il se faire soigner ?', 'https://www.youtube.com/watch?v=AKAobX1V1yc');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `pa_id` int(11) NOT NULL,
  `pa_title` varchar(255) NOT NULL,
  `pa_keywords` varchar(255) NOT NULL,
  `pa_description` varchar(255) NOT NULL,
  `pa_content` varchar(50) NOT NULL,
  `pa_parent_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`pa_id`, `pa_title`, `pa_keywords`, `pa_description`, `pa_content`, `pa_parent_id`) VALUES
(1, 'Accuil', 'Accuil', 'Accuil', 'Accuil', 0),
(2, 'Liste des film', 'Liste des films', 'Liste des films', 'List', 1),
(3, 'Ajouter un film', 'Ajouter un film', 'Ajouter un film', 'Add', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pa_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
