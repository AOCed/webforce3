--
-- Base de données :  `exo1_userslist`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `color`) VALUES
(1, 'Toyota', '2068', 2017, 'Bleue'),
(2, 'Toyota', 'FuryWarrior', 2017, 'Rouge'),
(3, 'Toy Yoda', 'Coruscanti', 2017, 'Vert'),
(4, 'Warcar', 'Doomhammer', 2017, 'Vert'),
(5, 'Navette lambda', 'Sheev', 2017, 'Grise'),
(6, 'Railgun', 'Biribiri', 2009, 'Yellow'),
(13, 'Unreal', 'Dominator', 2009, 'Red');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
