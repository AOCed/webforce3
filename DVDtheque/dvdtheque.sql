-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Décembre 2016 à 17:48
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dvdtheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

CREATE TABLE `list` (
  `dvd_id` int(11) NOT NULL,
  `dvd_title` varchar(255) NOT NULL,
  `dvd_story` text NOT NULL,
  `dvd_director` varchar(255) NOT NULL,
  `dvd_actors` varchar(255) NOT NULL,
  `dvd_genre` varchar(255) NOT NULL,
  `dvd_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `list`
--

INSERT INTO `list` (`dvd_id`, `dvd_title`, `dvd_story`, `dvd_director`, `dvd_actors`, `dvd_genre`, `dvd_year`) VALUES
(2, 'Ghost in the shell', '', '', '', '', 2001),
(3, 'Innocence', '', '', '', '', 2005),
(4, 'Farinelli', '', 'Gérard Corbiau', 'Stefano Dionisi, Elsa Zylberstein', '', 1994),
(5, 'C''est arrivé près de chez vous', '', 'Rémy Belvaux', 'Benoit Poelvoorde', '', 1992),
(6, 'Identity', '', '', 'John Cusack, Ray Liotta, Amanda Peet', '', 2003),
(7, 'Eros', '', 'Wong Kar Wai, Steven Soderbergh, Antonioni', '', '', 2004),
(8, 'Les invasions barbares', '', 'Denys Arcand', '', '', 2003),
(9, 'Le déclin de l''empire américain', '', 'Denys Arcand', '', '', 1986),
(10, 'Shara', '', 'Naomi Kawase', '', '', 2004),
(11, 'La guerre des Rose', '', 'Danny De Vito', 'Michael Douglas, Kathleen Turner, Danny De Vito', '', 1989),
(12, 'Entretien avec un vampire', '', 'Neil Jordan', 'Tom Cruise, Brad Pitt', '', 1994),
(13, 'Scarface', '', 'Brian de Palma', 'Al Pacino', '', 1978),
(14, 'Point Break', '', '', 'Patrick Swayze, Keanu Reeves', '', 1991),
(15, 'L''étoffe des héros', '', 'Philip Kaufman', '', '', 1983),
(16, 'Dogville', '', 'Lars Von Trier', 'Nicole Kidman', '', 2000),
(17, 'In the mood for love', '', 'Wong Kar Wai', 'Maggie Cheung, Tony Leung', '', 2001),
(18, '2046', '', 'Wong Kar Wai', '', '', 2005),
(19, 'Instincts meurtriers', '', 'Philip Kaufman', 'Andy Garcia, Samuel L. Jackson, Ashley Judd', '', 2004),
(20, 'Marie-Antoinette', '', 'Sofia Coppola', 'Kirsten Dunst', '', 2006),
(21, 'Lost in translation', '', 'Sofia Coppola', 'Bill Murray, Scarlett Johansson', '', 2004),
(22, 'American psycho', '', 'Mary Harron', 'Christian Bale, Willem Dafoe, Jared Leto', '', 2000),
(23, 'Bowling for Columbine', '', 'Michael Moore', '', '', 2002),
(24, 'Fahrenheit 9/11', '', 'Michael Moore', '', '', 2004),
(25, 'High Fidelity', '', 'Stephen Frears', 'John Cusack, Jack Black', '', 2000),
(26, 'Soleil vert', '', 'Richard Fleischer', 'Charlton Heston', '', 1973),
(27, 'Les ailes du désir', '', 'Wim Wenders', 'Peter Falk', '', 1987),
(28, 'Les autres', '', 'Alejandro Amenabar', 'Nicole Kidman', '', 2000),
(29, 'Vol au dessus d''un nid de coucou', '', 'Milos Forman', 'Jack Nicholson, Louise Fletcher', '', 1975),
(30, 'L''insoutenable légèreté de l''être', '', 'Philip Kaufman', 'Juliette Binoche, Daniel Day-Lewis', '', 1988),
(31, 'Minority Report', '', 'Steven Spielberg', 'Tom Cruise', '', 2003),
(32, 'La plage', '', 'Dany Boyle', 'Leonardo di Caprio, Guillaume Canet, Virginie Ledoyen', '', 2001),
(33, 'La passion du Christ', '', 'Mel Gibson', '', '', 2004),
(34, 'La dernière tentation du Christ', '', 'Martin Scorsese', 'Willem Dafoe, Harvey Keitel', '', 1998),
(35, 'Mariages', '', 'Valérie Guignabodet', 'Jean Dujardin, Mathilde Seigner', '', 2004),
(36, 'Les temps modernes', '', 'Charlie Chaplin', 'Charlot', '', 1936),
(37, 'Solaris', '', 'Steven Soderbergh', 'Geroge Clooney', '', 2003),
(38, 'Elephant Man', '', 'David Lynch', '', '', 1982),
(39, 'Une histoire vraie', '', 'David Lynch', '', '', 1999),
(40, 'Lunes de Fiel', '', 'Roman Polanski', 'Emmanuelle Seigner, Peter Coyote, Hugh Grant, Kristin Scott Thomas', '', 1992),
(41, 'Gladiator', '', 'Ridley Scott', 'Russell Crowe', '', 2000),
(42, 'Troie', '', 'Wolfwang Petersen', 'Brad Pitt, Orlando Bloom', '', 2004),
(43, 'La liste de Schindler', '', 'Steven Spielberg', 'Liam Neeson, Ralph Fiennes, Ben Kingsley', '', 1993),
(44, 'Intimité', '', 'Patrice Chereau', '', '', 2001),
(45, 'Devdas', '', 'Sanjay Leela Bhansali', '', '', 2002),
(46, 'Kama Sutra', '', 'Mira Nair', '', '', 1996),
(47, 'Le village', '', 'Night Shyamalan', '', '', 2000),
(48, 'Barsaat', '', '', '', '', 2005),
(49, 'Virgin suicides', '', 'Sofia Coppola', 'Kirsten Dunst, Josh Hartnett', '', 2001),
(50, 'Immortal', '', 'Enki Bilal', 'Linda Hardy, Charlotte Rampling', '', 2004),
(51, 'Blink', '', 'Michael Apted', 'Madeleine Stowe', '', 2000),
(52, 'Dans l''ombre de Manhattan', '', 'Sidney Lumet', 'Andy Garcia, Richard Dreyfuss', '', 2000),
(53, 'Syriana', '', 'Stephen Gaghan', 'George Clooney, Matt Damon', '', 2005),
(54, 'Ma vie sans moi', '', 'Isabel Coixet', '', '', 2002),
(55, 'Dancer in the dark', '', 'Lars Von Trier', 'Bjork', '', 2000),
(56, 'Super Size me', '', 'Morgan Spurlock', '', '', 2004),
(57, 'K-pax', '', 'Iain Softley', 'Kevin Spacey, Jeff Bridges', '', 2002),
(58, 'American pie 1-4', '', '', '', '', 1999),
(59, 'Le sens de la vie', '', 'Monty Python''s', '', '', 1983),
(60, 'Vanilla Sky', '', 'Cameron Crowe', 'Tom Cruise, Penelope Cruz', '', 2001),
(61, 'Kingdom of heaven', '', 'Ridley Scott', 'Orlando Bloom', '', 2005),
(62, 'American history X', '', 'Tony Kaye', 'Edward Norton, Edward Furlong', '', 2000),
(63, 'A tombeau ouvert', '', 'Martin Scorsese', 'Nicolas Cage', '', 2000),
(64, 'Le pianiste', '', 'Roman Polanski', 'Adrien Brody', '', 2002),
(65, 'Revelations', '', 'Michael Mann', 'Russell Crowe, Al Pacino', '', 2000),
(66, 'The fountain', '', 'Darren Aronofsky', 'Hugh Jackman', '', 2000),
(67, 'American beauty', '', 'Sam Mendes', 'Kevin Spacey', '', 2000),
(68, 'Nouvelle cuisine', '', 'Fruit Chan', '', '', 2004),
(69, 'Le parfum', '', 'Tom Tykwer', '', '', 2006),
(70, 'Rencontre Ã  Elizabethtown', '', 'Cameron Crowe', 'Kisten Dunst, Orlando Bloom', '', 2005),
(71, 'Harry un ami qui vous veut du bien', '', 'Dominik Moll', 'Sergi Lopez, Mathilde Seigner', '', 2000),
(72, 'Arrète moi si tu peux', '', 'Steven Spielberg', 'Leonardo di Caprio, Tom Hanks', '', 2002),
(73, 'Le boulet', '', 'Alain Berberian', 'Gérard Lanvin, Benoit Poelvoorde, José Garcia', '', 2001),
(74, 'Romeo + Juliet', '', '', '', '', 1996),
(75, '24 heures avant la nuit', '', 'Spike Lee', 'Edward Norton', '', 2003),
(76, 'Stage Beauty', '', 'Richard Eyre', 'Rupert Everett, Claire Danes', '', 2004),
(77, 'La dernière marche', '', 'Tim Robbins', 'Sean Penn , Susan Sarandon', '', 1995),
(78, 'Nathalie', '', 'Anne Fontaine', 'Emmanuelle Béart, Depardieu', '', 2003),
(79, 'Chantons sous la pluie', '', 'Gene Kelly', 'Gene Kemmy', '', 1951),
(80, 'L''appartement', '', 'Gilles Mimouni', '', '', 2000),
(81, 'Mullhodand Drive', '', 'David Lynch', '', '', 2001),
(82, 'Le sourire de Mona Lisa', '', 'Mike Newell', 'Julia Roberts, Kirsten Dunst', '', 2000),
(83, 'Revenge', '', 'Tony Scott', 'Kevin Costner, Madeleine Stowe', '', 1990),
(84, 'The truman show', '', 'Peter Weir', 'Jim Carrey', '', 1998),
(85, 'From Hell', '', 'Freres Hughes', 'Johnny Depp', '', 2000),
(86, 'La neuvième porte', '', 'Roman Polanski', 'Johnny Depp, Emmanuelle Seigner', '', 1999),
(87, 'Hollywood sunrise', '', 'Anthony Drazan', 'Sean Penn, Kevin Spacey', '', 1998),
(88, 'Le mari de la coiffeuse', '', 'Patrice Leconte', 'Jean Rochefort', '', 2000),
(89, 'Dracula', '', 'Francis Ford Coppola', 'Gary Oldman, Winona Ryder, Keanu Reeves', '', 1992),
(90, 'Mars Attacks', '', 'Tim Burton', 'Jack Nicholson', '', 1996),
(91, 'Les noces funèbres', '', 'Tim Burton', '', '', 2005),
(92, 'Edward aux mains d''argent', '', 'Tim Burton', 'Johnny Depp, Winona Ryder', '', 1990),
(93, 'Sleepy Hollow', '', 'Tim Burton', 'Johnny Depp, Christina Ricci', '', 1999),
(94, 'L''étrange Noël de Mr Jack', '', 'Tim Burton', '', '', 1994),
(95, 'Beetlejuice', '', 'Tim Burton', 'Michael Keaton, Geena Davis', '', 1988),
(96, 'Big Fish', '', 'Tim Burton', 'Ewan Mc Gregor', '', 2003),
(97, 'Les sorcières d''Eastwick', '', 'George Miller', 'Jack Nicholson, Susan Sarandon, Michelle Pfeiffer, Cher', '', 1987),
(98, 'The game', '', 'David Fincher', 'Sean Penn, Michael Douglas', '', 1997),
(99, 'Babel', '', 'Alejandro Gonzalez inarritu', 'Brad Pitt, Cate Blanchett', '', 2006),
(100, 'Le patient anglais', '', 'Anthony Minghella', 'Ralph Fienes, Kristin Scott Thomas, Binoche, Dafoe', '', 1996),
(101, 'Requiem for a dream', '', 'Darren Aronofsky', 'Jared Leto, Jennifer Connelly', '', 2000),
(102, 'Fight Club', '', 'David Fincher', 'Brad Pitt, Edward Norton', '', 1999),
(103, 'Usual suspects', '', 'Bryan Singer', 'Kevin Spacey', '', 1995),
(104, 'La ligne verte', '', 'Frank Darabont', 'Tom Hanks', '', 1999),
(105, 'Seven', '', 'David Fincher', 'Brad Pitt, Morgan Freeman', '', 1995),
(106, 'Ce que je sais d''elle', '', 'Rodrigo Garcia', 'Glenn Close, Cameron Diaz, Holly Hunter', '', 2000),
(107, 'La leçon de piano', '', 'Jane Campion', 'Holly Hunter, Harvey Keitel', '', 1993),
(108, 'Mystic River', '', 'Clint Eastwood', 'Sean Penn, Tim Robbins,', '', 2003),
(109, 'La science des rêves', '', 'Michel Gondry', '', '', 2006),
(110, 'Love actually', '', 'Richard Curtis', 'Hugh Grant', '', 2004),
(111, 'Un long dimanche de fiançailles', '', 'Jean-Pierre Jeunet', 'Audrey Tautou, Gaspard Ulliel', '', 2003),
(112, 'Insomnia', '', 'Christopher Nolan', 'Al Pacino, Robin Williams', '', 2002),
(113, 'L''associé du diable', '', 'Taylor Hackford', 'Keanu Reeves, Al Pacino', '', 1997),
(114, 'En pleine tempète', '', 'Wolfwang Petersen', 'George Clooney, Mark Wahlberg', '', 2000),
(115, 'Ocean''s eleven', '', 'Steven Soderbergh', '', '', 2001),
(116, 'Ocean''s twelve', '', 'Steven Soderbergh', '', '', 2004),
(117, 'Sweeney Todd', '', 'Tim Burton', 'Johnny Depp', '', 2007),
(118, 'Le nombre 23', '', 'JoÃ«l Schumacher', 'Jim Carrey', '', 2007),
(119, 'Amadeus', '', 'Milos Forman', '', '', 1984),
(120, '21 grammes', '', 'Alejandro Gonzalez inarritu', 'Sean Penn, Naomi Watts', '', 2003),
(121, 'Un homme d''exception', '', 'Ron Award', 'Russel Crowe, Jennifer Connelly', '', 2001),
(122, 'Dans la peau de John Malkovich', '', 'Spike Jonze', 'John Malkovich', '', 1999),
(123, 'Le labyrinthe de Pan', '', 'Guillermo Del Toro', 'Sergi Lopez', '', 2006),
(124, 'Quand Harry rencontre Sally', '', 'Rob Reiner', 'Mer Ryan, Billy Crystal', '', 1989),
(125, 'Tueurs nés', '', 'Oliver Stone', 'Woody Harrrelson, Juliet Lewis', '', 1994),
(126, 'La femme défendue', '', 'Philippe Harel', 'Isabelle Carré', '', 1997),
(127, 'Birdy', '', 'Alan Parker', '', '', 1995),
(128, 'Midnight express', '', 'Alan Parker', '', '', 1978),
(129, 'Philadelphia', '', 'Alan Parker', 'Tom Hanks, Denzel Washington', '', 1993),
(130, 'Signes', '', 'Night Shyamalan', 'Mel Gibson, Joaquin Phoenix', '', 2002),
(131, 'Sixième sens', '', 'Night Shyamalan', 'Bruce Willis', '', 1999),
(132, 'Angel heart', '', 'Alan Parker', 'Mickey Rourke', '', 1987),
(133, 'The pledge', '', 'Sean Penn', 'Jack Nicholson, Robin Wright', '', 2001),
(134, 'Sur la route de Madisson', '', 'Clint Eastwood', 'Clint Eastwood', '', 1995),
(135, 'Le cercle des poÃ¨tes disparus', '', 'Peter Weir', 'Robin Williams', '', 1990),
(136, 'Swimming with sharks', '', 'George Huang', 'Kevin Spacey', '', 1995),
(137, 'Sens unique', '', 'Roger Donaldson', 'Kevin Costner, Geane Hackman', '', 1987),
(138, 'Too young to die', '', 'Robert Markowitz', 'Brad Pitt', '', 1990),
(139, 'Dragon rouge', '', 'Brett Ratner', 'Anthony Hopkins, Ralph Fiennes', '', 2002),
(140, 'Dernières heures à  Denver', '', 'Gay Fleder', 'Andy Garcia', '', 1995),
(141, 'Les incorruptibles', '', 'Brian De Palma', '', '', 1987),
(142, 'Le parrain 1-3', '', 'Francis Ford Coppola', '', '', 1972),
(143, 'Reservoir dogs', '', 'Quentin Tarantino', '', '', 1992),
(144, '300', '', 'Zack Snyder', 'Gerard Butler', '', 2007),
(145, 'Into the wild', '', 'Sean Penn', 'Emile Hirsch', '', 2008),
(146, 'Narco', '', 'Tristan Aurouet', 'Benoit Poelvoorde, Guillaume Canet', '', 2000),
(147, 'Twin peaks', '', 'David Lynch', 'Kyle MacLachlan, Sheryl Lee', '', 1992),
(148, 'Swimming pool', '', '', '', '', 2002),
(149, 'Sexe mensonges et vidéo', '', '1988', '', '', 2000),
(150, 'L''ours', '', 'Jean-Jacques Anaud', '', '', 1988),
(151, 'Misery', '', '', '', '', 1990),
(152, 'Recherche Susan Desesperemment', '', '', '', '', 1985),
(153, 'Rain Man', '', '', '', '', 1988),
(154, 'The full monty', '', '', '', '', 1997),
(155, 'Didier', '', '', '', '', 1996),
(156, 'Fenêtre secrète', '', 'David Koepp', 'Johnny Depp', '', 2004),
(157, 'JF partagerait appartement', '', 'Barbet Schroeder', '', '', 1995),
(158, 'Le poids de l''eau', '', 'Kathryn Bigelow', 'Sean Penn', '', 2002),
(159, 'Liaison fatale', '', 'Adrian Lyne', 'Michael Douglas', '', 1987),
(160, 'Eternal sunshine of the spotless mind', '', 'Michel Gondry', 'Jim Carrey', '', 2005),
(161, 'Tideland', '', 'Terry Gilliam', '', '', 2007),
(162, 'Mon voisin le tueur', '', 'Jonathan Lynn', '', '', 1999),
(163, 'Lettres à un tueur', '', 'David Carson', '', '', 1999),
(164, 'La vie de David Gale', '', 'Alan Parker', '', '', 2002),
(165, 'Podium', '', 'Yann Moix', 'Poelvoorde', '', 2003),
(166, 'Austin Powers l''espion qui m''a tirée', '', 'Jay Roach', '', '', 1999),
(167, 'Les lois de l''attraction', '', 'Roger Avary', '', '', 2000),
(168, 'CLoser (entre adultes consentants)', '', 'Mike Nichols', '', '', 2004),
(169, 'Scoop', '', 'Woody Allen', '', '', 2007),
(170, 'J''ai toujours rêvé d''etre un gangster', '', 'Samuel Benchetrit', '', '', 2007),
(171, 'Cry baby', '', 'John Waters', 'Johnny Depp', '', 1989),
(172, 'La vie des autres', '', 'Florian Henckel von Donnersmark', '', '', 2006),
(173, 'Crash', '', 'David Cronenberg', '', '', 1996),
(174, 'Little miss sunshine', '', 'Jonathan Dayton', '', '', 2006),
(175, 'Million dollar baby', '', 'Clint Eastwood', '', '', 2004),
(176, 'Cloverfield', '', 'Matt Reeves', '', '', 2008),
(177, 'Sex and the city', '', 'Michael Patrick King', '', '', 2008),
(178, 'Valse avec Bachir', '', 'Ari Folman', '', '', 2008),
(179, 'Soy Cuba', '', 'Mikhail Kalatozov', '', '', 1964),
(180, 'Very Bad things', '', 'Peter Berg', '', '', 1998),
(181, 'Amours chiennes', '', 'Alejandro Gonzales Inarritu', '', '', 2000),
(182, '4 mois 3 semaines 2 jours', '', 'Cristian Mungiu', '', '', 2007),
(183, 'La double vie de Véronique', '', 'Krzysztof Kieslowski', 'Irène Jacob', '', 1991),
(184, 'Le temps des gitans', '', 'Emir Kusturica', '', '', 1989),
(185, 'L''ultime souper', '', 'Stacy Title', '', '', 1996),
(186, 'Ne le dis Ã  personne', '', 'Guillaume Canet', '', '', 2006),
(187, 'Shutter island', '', 'Martin Scorsese', '', '', 2010),
(188, 'I love you Phillip Morris', '', 'John Requa & Glenn Ficarra', '', '', 2009),
(189, 'Gainsbourg (vie héroïque)', '', 'Joann Sfar', '', '', 2010),
(190, 'Démineurs', '', 'Kathryn Bigelow', '', '', 2008),
(191, 'Le ruban blanc', '', 'Michael Haneke', '', '', 2009),
(192, 'Mr Nobody', '', 'Jaco Van Dormael', '', '', 2010),
(193, 'Thirst', '', 'Park Chan-Wook', '', '', 2009),
(194, 'Persepolis', '', 'Mariane Satrapi & Vincent Paronnaud', '', '', 2007),
(195, 'La route', '', 'John Hillcoat', '', '', 2009),
(196, 'Les promesses de l''ombre', '', 'David Cronenberg', 'Naomi Watts', '', 2007),
(197, 'Harry Potter Ã  l''école des sorciers', '', '', '', '', 2001),
(198, 'Harry Potter et la chambre des secrets', '', '', '', '', 2002),
(199, 'Harry Potter et le prisonnier d''Azkaban', '', '', '', '', 2004),
(200, 'Harry Potter et la coupe de feu', '', '', '', '', 2005),
(201, 'Harry Potter et l''ordre du Phoenix', '', '', '', '', 2007),
(202, 'Harry Potter et le prince de sang-mélé', '', '', '', '', 2009),
(203, 'Inception', '', 'Christopher Nolan', '', '', 2010),
(204, 'Benny Hill', '', 'Benny Hill', '', '', 2000),
(205, 'Antichrist', '', 'Lars Von Trier', 'Charlotte Gainsbourg', '', 2009),
(206, 'Rencontres du troisiÃ¨me type', '', 'Steven Spielberg', 'Richard Dreyfuss', '', 2000),
(207, 'Les uns et les autres', '', 'Claude Lelouch', 'Robert Hossein', '', 1981),
(208, 'Shining', '', 'Stanley Kubrick', 'Jack Nicholson', '', 1980),
(209, 'Un héros très discret', '', 'Jacques Audiard', 'Mathieu Kassovitz', '', 2000),
(210, 'La déchirure', '', 'Roland Joffe', 'Sam Waterstone, John Malkovich', '', 2000),
(211, 'L''enjeu', '', 'Barbet Schroeder', 'Andy Garcia, Michael Keaton', '', 1997),
(212, 'Adieu ma concubine', '', 'Chen Kaige', '', '', 1993),
(213, 'L''armée des douze singes', '', 'Terry Gilliam', 'Bruce Willis, Brad Pitt', '', 1997),
(214, 'Dune', '', 'David Lynch', 'Sting', '', 2000),
(215, 'Abyss', '', 'James Cameron', '', '', 2000),
(216, 'Die hard 2 - 58 min pour vivre', '', 'Renny Harlin', 'Bruce Willis', '', 1990),
(217, 'La ligne rouge', '', 'Terrence Malick', 'Sean Penn', '', 2000),
(218, 'Brazil', '', 'Terry Gilliam', 'Robert de Niro', '', 1975),
(219, 'Le diable s''habille en Prada', '', 'David Frankel', '', '', 2006),
(220, 'Boys don''t cry', '', 'Kimberly Peirce', 'Hilary Swank', '', 1991),
(221, 'Ensemble, c''est tout', '', 'CLaude Berri', 'Audrey Toutou', '', 2000),
(222, 'Fargo', '', 'Ethan & Joel Coen', '', '', 1996),
(223, 'Les choristes', '', 'Christophe Barratier', 'Gérard Jugnot', '', 2004),
(224, 'Amen', '', 'Costa Gavras', 'Mathieu Kassovitz', '', 2002),
(225, 'Blue Velvet', '', 'David Lynch', 'Kyle Mac Lachlan', '', 1996),
(226, 'Die hard 1 - piège de cristal', '', 'John Mac Tiernan', 'Bruce Willis', '', 1988),
(227, 'Ma femme est une actrice', '', 'Yvan Attal', 'Charlotte Gainsbourg', '', 2001),
(228, 'Pars vite et reviens tard', '', 'Régis Warnier', 'José Garcia', '', 2007),
(229, 'L''histoire sans fin', '', 'Wolfgang Petersen', '', '', 1984),
(230, 'La maison sur l''océan', '', 'Irwin Winkler', 'Kristin Scott Thomas', '', 2001),
(231, 'Jennifer 8', '', 'Scott Rudin', 'Andy Garcia, Uma Thurman', '', 1992),
(232, 'Cyrano de Bergerac', '', 'Jean-Paul Rappneau', 'Gérard Depardieu', '', 1990),
(233, 'Le chacal', '', 'Michael Caton-Jones', 'Bruce Willis', '', 1997),
(234, 'Moonwalker', '', '', 'Michael Jackson', '', 1988),
(235, '4 mariages et un enterrement', '', 'Mike Newell', 'Hugh Grant, Andie Mac Dowell', '', 1994),
(236, 'Mission', '', 'Roland Joffe', 'Robert de Niro', '', 1986),
(237, 'Femme fatale', '', 'Brian de Palma', 'Antonio Banderas', '', 2001),
(238, 'Chicago', '', 'Rob Marshall', 'Richard Gere', '', 2002),
(239, 'Welcome to the Rileys', '', 'Jake Scott', '', '', 2009),
(240, 'Melancholia', 'Histoire folle', 'Lars Von Trier', '', '', 2011),
(241, 'Mala noche', '', 'Gus Van Sant', '', '', 1985),
(242, 'Gerry', '', 'Gus Van Sant', '', '', 2002),
(243, 'Last days', '', 'Gus Van Sant', '', '', 2005),
(244, 'Paranoid Park', '', 'Gus Van Sant', '', '', 2007),
(245, 'Watchmen', '', 'Zack Snyder', '', '', 2009),
(246, 'L''effet papillon', '', '', '', '', 2004),
(247, 'Un balcon sur la mer', '', 'Nicole Garcia', '', '', 2011),
(248, 'Boy A', '', '', '', '', 2007),
(249, 'City island', '', 'Raymond de Felitta', '', '', 2009),
(250, 'Kick-Ass', '', '', '', '', 2010),
(251, 'Splice', '', '', '', '', 2009),
(252, 'The ghost writer', '', 'Roman Polanski', '', '', 2010),
(253, 'The million dollar hotel', '', 'Win Wenders', '', '', 2000),
(254, 'Black Swan', '', 'Darren Aronofsky', '', '', 2010),
(255, '99f', '', 'Jan Kounen', '', '', 2008),
(256, 'Renaissance', '', 'Christian Volckman', '', '', 2006),
(257, 'Orange mécanique', '', 'Stanley Kubrick', '', '', 1971),
(258, 'Gomorra', '', 'Matteo Garrone', '', '', 2008),
(259, 'Le cabinet du docteur Caligari', '', 'Robert Wiene', '', '', 1919),
(260, 'Penelope', '', '', '', '', 2006),
(261, 'Coraline', '', '', '', '', 2009),
(262, 'Home', '', 'Yann Arthus-Bertrand', '', '', 2009),
(263, 'We need to talk about Kevin', '', 'Lynne Ramsay', '', '', 2010),
(264, 'Gran Torino', '', 'Clint Eastwood', '', '', 2000),
(265, 'Never let me go', '', '', '', '', 2010),
(266, 'La piel que habito', '', 'Pedro Almodovar', '', '', 2011),
(267, 'The tree of life', '', 'Terrence Malick', 'Brad Pitt', '', 2010),
(268, 'Comment tuer son boss', '', '', '', 'Black Comedy', 2011),
(269, 'Another happy day', '', 'Sam Levinson', '', '', 2011),
(270, 'Enfermés dehors', '', 'Albert Dupontel', '', '', 2000),
(271, 'Control', '', 'Anton Corbjin', '', '', 2007),
(272, 'L''autre monde', '', 'Gilles Marchand', '', '', 2010),
(273, 'L''incroyable destin de Harold Crick', '', '', '', '', 2006),
(274, 'Hidden Agenda', '', 'Ken Loach', '', '', 1990),
(275, 'Hero', '', '', '', '', 2000),
(276, 'This is it', '', '', '', '', 2009),
(277, 'Shame', '', 'Steve Mc Queen', 'Michael Fassbender', '', 2011),
(278, 'Les noces rebelles', '', 'Sam Mendes', '', '', 2008),
(279, 'Hunger', '', 'Steve Mc Queen', '', '', 2000),
(280, 'Slumdog millionaire', '', 'Danny Boyle', '', '', 2009),
(281, 'Don''t come knocking', '', 'Win Wenders', '', '', 2005),
(282, 'This must be the place', '', 'Paolo Sorrentino', '', '', 2011),
(283, 'Good morning england', '', 'Richard Curtis', '', '', 2009),
(284, 'A cross the universe - Justice', '', 'Romain Gavras', '', '', 2008),
(285, 'Radiohead', '', '', '', '', 2008),
(286, 'The gathering', '', '', '', '', 2007),
(287, 'Baraka', '', 'Ron Fricke', '', '', 1992),
(288, 'Le fabuleux destin d''Amélie Poulain', '', 'Jean-Pierre Jeunet', '', '', 2001),
(289, 'Un jour sur terre', '', '', '', '', 2007),
(290, 'Funny games US', '', 'Michael Haneke', '', '', 2007),
(291, 'Veer Zaara', '', 'Yash Chopra', '', '', 2004),
(292, 'Matrix 1-3', '', '', '', '', 1999),
(293, 'cirque plume n°8', '', '', '', '', 2000),
(294, 'Un jour est égal Ã  tous les jours', '', '', '', '', 2004),
(295, 'The spirit', '', '', '', '', 2008),
(296, 'Sex and the city 2', '', '', '', '', 2010),
(297, 'Restless', '', '', '', '', 2011),
(298, 'Sin city', '', '', '', '', 2000),
(299, 'Detachment', '', 'Tony Kaye', '', '', 2011),
(300, 'Manolete', '', 'Menno Meyjes', '', '', 2010),
(301, 'Elephant', '', 'Gus Van Sant', '', '', 2003),
(302, 'Ghost in the shell 2', '', '', '', '', 2000),
(303, 'Drive', 'Un jeune mécanicien taciturne travaille dans un petit garage de Los Angeles et effectue à l''occasion des cascades pour le cinéma. Mais de nuit, il sert aussi de conducteur à des membres du crime organisé. Le patron du garage, Shannon, voudrait en plus le voir participer à des courses automobiles et, pour concrétiser cela, finit par solliciter le soutien financier du mafieux Bernie Rose.', 'Nicolas Winding refn', 'Ryan Gosling', 'Thriller, Film Noir', 2011),
(304, 'Cashback', '', '', '', '', 2000),
(305, 'My blueberry nights', '', 'Wong Kar Wai', '', '', 2007),
(306, 'Pina', '', 'Win Wenders', '', '', 2010),
(307, 'Les chèvres du Pentagone', '', 'Grant Heslov', '', '', 2009),
(308, 'Harrison''s flowers', '', 'Elie Chouraqui', 'Adrien  Brody', '', 2000),
(309, 'Par effraction', '', 'Anthony Minghella', '', '', 2007),
(310, 'L''âge des ténèbres', '', 'Denys Arcand', '', '', 2007),
(311, 'Dans la peau de Jacques Chirac', '', 'Karl zéro', '', '', 2006),
(312, 'Manhattan', '', 'Woody Allen', '', '', 1979),
(313, 'Looking for Eric', '', 'Ken Loach', '', '', 2009),
(314, 'The Darjeeling limited', '', 'Wes Anderson', '', '', 2007),
(315, 'Etreintes brisées', '', 'Pedro Almodovar', '', '', 2009),
(316, 'Charlie et la chocolaterie', '', 'Tim Burton', '', '', 2005),
(317, 'Harvey Milk', '', 'Gus Van Sant', '', '', 2009),
(318, 'Trainspotting', '', 'Danny Boyle', '', '', 1996),
(319, 'J''ai tué ma mère', '', 'Xavier Dolan', 'Xavier Dolan', '', 2000),
(320, 'Les amours imaginaires', '', 'Xavier Dolan', '', '', 2000),
(321, 'Laurence Anyways', '', 'Xavier Dolan', '', '', 2000),
(322, 'Tom à la ferme', '', 'Xavier Dolan', '', '', 2000),
(323, 'Le grand soir', '', 'Benoit Delepine & Gustave Kerven', '', '', 2012),
(324, 'L''incroyable destin de Harold Crick', '', 'Marc Forster', '', '', 2006),
(325, 'Une nuit en enfer', '', 'Robert Rodriguez', '', '', 2002),
(326, 'La grande bellezza', '', 'Paolo Sorrentino', '', '', 2013),
(327, 'La secrétaire', '', '', '', '', 2000),
(328, 'Mud', '', 'Jeff Nichols', 'Matthew McConaughey', '', 2012),
(329, 'Stoker', 'a 2013 American psychological thriller film directed by Park Chan-wook', 'Park Chan-wook', 'Nicole Kidman', 'Thriller', 2013),
(330, 'Lost Highway', '', 'David Lynch', '', '', 1996),
(331, 'Perfect mothers', '', 'Anne Fontaine', '', '', 2012),
(339, 'Holy Motors', 'Après un premier plan représentant des spectateurs endormis (ou morts ?) à la projection de ce qui semble être un vieux film, nous nous retrouvons dans la chambre d''un Dormeur (Leos Carax lui-même), réveillé par le bruit d''un paquebot, des mouettes et des vagues. Il pose ses mains sur un mur de sa chambre, et y découvre un petit trou, dans lequel il introduit une clé apparue à son majeur. Il se retrouve dans la salle de cinéma aperçue dans la première scène.', 'Leo Carax', 'Denis Lavant, Kylie Minogue, Eva Mendes', 'Fantastique', 2011),
(340, 'Mononoke Hime', '', ' Hayao Miyazaki', '', '', 1997);

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
(1, 'Home', 'Home', 'Home', 'Home', 0),
(2, 'List', 'List', 'List', 'List', 1),
(3, 'Add', 'Add', 'Add', 'Add', 1),
(8, 'Modify', 'Modify', 'Modify', 'Modify', 1),
(9, 'Search', 'Search', 'Search', 'Search', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`dvd_id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pa_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `list`
--
ALTER TABLE `list`
  MODIFY `dvd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
