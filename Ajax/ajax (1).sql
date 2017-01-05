-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Janvier 2017 à 17:26
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_pseudo` varchar(255) NOT NULL,
  `chat_message` varchar(1000) NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_pseudo`, `chat_message`, `chat_date`) VALUES
(1, 'nov', 'blabla', '2017-01-05 14:30:00'),
(2, 'nov', 'blabla test', '2017-01-05 14:31:14'),
(3, 'nov', 'brbrbr', '2017-01-05 14:33:20'),
(4, 'nov', 'brbrbr', '2017-01-05 14:33:23'),
(5, 'nov', 'brbrbr', '2017-01-05 14:33:26'),
(6, 'nov', 'brbrbr', '2017-01-05 14:33:27'),
(7, 'nov', 'c''est un test', '2017-01-05 14:48:12'),
(8, 'nov', 'ash est la...', '2017-01-05 14:49:01'),
(9, 'nov', 'c''est un test encore', '2017-01-05 14:49:24'),
(10, 'nov', 'qdsfqsdf', '2017-01-05 14:49:46'),
(11, 'chat', 'ouais ouais', '2017-01-05 15:18:07'),
(12, 'chat', 'ouais ouais', '2017-01-05 15:18:08'),
(13, 'chat2', 'ouais ouais', '2017-01-05 15:18:15'),
(14, 'chat2', 'ouais ouais', '2017-01-05 15:18:17'),
(15, 'chat2', 'ouais ouais', '2017-01-05 15:20:10'),
(16, 'ash', 'mouais mouais', '2017-01-05 15:23:11'),
(17, 'vince', 'popopopo', '2017-01-05 15:23:57'),
(18, 'yann', 'vous etes tous nuuuulllls', '2017-01-05 15:25:27'),
(19, 'nov', 'drole de bande', '2017-01-05 15:36:48'),
(20, 'thibault', 'je fume, causez', '2017-01-05 15:37:53'),
(21, 'pierre', 'hatchoum, hachoum !', '2017-01-05 15:38:11'),
(22, 'Nov', 'Bl:ab', '2017-01-05 16:00:53'),
(23, 'Nov', 'Mouais mouais encore un test', '2017-01-05 16:17:58'),
(24, 'Nov', 'Mouais mouais encore un test', '2017-01-05 16:18:20'),
(25, 'Nov', 'Mouais mouais encore un test', '2017-01-05 16:18:21'),
(26, 'Nov', 'test', '2017-01-05 16:18:48'),
(27, 'Nov', 'Test test test', '2017-01-05 16:20:10');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'nov@nov.com'),
(2, 'nov2@nov.com'),
(3, 'nov3@nov.com'),
(4, 'nov4@nov.com'),
(5, 'nov5@nov.com'),
(6, 'nov@nov6.com'),
(7, 'nov@nov.com'),
(8, 'nov@nov.com'),
(9, 'nov@nov.com'),
(10, 'nov@nov.com'),
(11, 'novlike@gmail.com'),
(12, 'novlike2@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
