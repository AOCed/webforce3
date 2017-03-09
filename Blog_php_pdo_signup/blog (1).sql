-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Décembre 2016 à 17:15
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ar_id` int(11) NOT NULL,
  `ar_title` varchar(255) NOT NULL,
  `ar_id_user` int(11) NOT NULL,
  `ar_text` longtext NOT NULL,
  `ar_image` varchar(255) NOT NULL,
  `ar_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ar_id`, `ar_title`, `ar_id_user`, `ar_text`, `ar_image`, `ar_date`) VALUES
(1, 'Article1', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', '', '2016-12-15 14:23:41'),
(2, 'Article2', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', '', '2016-12-15 14:23:44'),
(3, 'Article3 modifié', 1, 'Lorem ipsum dolor bla bla sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', '', '2016-12-15 14:29:08'),
(4, 'modif sans image encorrrrre', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', '', '2016-12-15 14:29:55'),
(6, 'Modif Modif sans image', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', 'img/1481889751.gif', '2016-12-15 16:42:45'),
(7, 'On teste modif image en Lamacase', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quibusdam explicabo quaerat minus dolor nesciunt tenetur neque, vitae, corporis debitis odio animi ab cumque fugit consequatur! Omnis iure commodi dolorem!', 'img/1481894981.jpg', '2016-12-15 16:48:24'),
(8, 'Seulement Image modifiée', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro expedita explicabo ad aspernatur, error molestiae, veritatis facilis unde, asperiores officia officiis minima velit! Fugit, voluptatum architecto. Expedita minima modi sapiente.', 'img/1481889291.jpg', '2016-12-15 16:59:59');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_is_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_is_admin`) VALUES
(1, 'novlike@gmail.com', 'nov', 1),
(3, 'abc@gmail.com', 'f8c1d87006fbf7e5cc4b026c3138bc046883dc71', 0),
(17, 'nov@nov.com', '$2y$10$G1Y3kTB0Guq73pFfdovVxeU4qkfro1Y4v0PYoRwW245Os7VLiOK3m', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ar_id`),
  ADD KEY `ar_id_user` (`ar_id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
