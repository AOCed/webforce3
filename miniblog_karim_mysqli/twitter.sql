-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Décembre 2016 à 16:58
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `msg_text` varchar(140) NOT NULL,
  `msg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `users_id`, `msg_text`, `msg_date`) VALUES
(7, 1, '140 caractère max...', '2016-12-13 12:32:02'),
(10, 1, 'h est pas hachable', '2016-12-13 12:48:08'),
(12, 1, 'Ouais ca marche !', '2016-12-13 12:49:13'),
(13, 1, 'sonny est la', '2016-12-13 12:55:55'),
(14, 1, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '2016-12-13 14:30:21'),
(15, 1, 'Un nouveau test message arrive !', '2016-12-13 14:37:12'),
(16, 1, 'jaime ou jaime pas', '2016-12-13 14:53:42'),
(17, 1, 'j''aime', '2016-12-13 14:55:00'),
(18, 1, 'abraca-dabra-magique', '2016-12-13 14:56:13'),
(19, 1, 'Je voudrais &eacute;crire le plus long possible dans ce champs pour voir o&ugrave; ca se coupe. ouais ouais encore et encore', '2016-12-13 15:54:11'),
(20, 1, 'Je voudrais &eacute;crire le plus long possible dans ce champs pour voir o&ugrave; ca se coupe. ouais ouais encore et encore et encore et en', '2016-12-13 15:54:21'),
(21, 1, 'On est en train d''injecter des &quot;virus&quot; dans la BDD pour la faire tomber...hihihihi', '2016-12-13 16:36:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_firstname` varchar(255) NOT NULL,
  `users_lastname` varchar(255) NOT NULL,
  `users_mail` varchar(255) NOT NULL,
  `users_password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`users_id`, `users_firstname`, `users_lastname`, `users_mail`, `users_password`) VALUES
(1, 'Nov', 'like', 'novlike@nov.com', '$2y$10$89Nn4KB/4Lix8TgIYbYSoOU/1uytzOs2DP0.kjF0fswu6VanQWWp6');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `msg_date` (`msg_date`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
