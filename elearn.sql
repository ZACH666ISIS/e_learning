
--
-- Base de données : `elearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) DEFAULT NULL,
  `titre` text,
  `img` text,
  `date_pub` date DEFAULT NULL,
  `matiere` text,
  `pdf` text,
  PRIMARY KEY (`idArticle`),
  KEY `idCours` (`idCours`)
) ENGINE=MyISAM AUTO_INCREMENT=3255 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `idCours`, `titre`, `img`, `date_pub`, `matiere`, `pdf`) VALUES
(3249, 345, 'Informatique', 'img/1638126089_article.jpg', '2021-11-28', 'Java OOP', 'pdf/1638126089_pdf.pdf'),
(3251, 346, 'ELECTRONIQUE', 'img/1638127722_article.jpg', '2021-11-28', 'Quadripole', 'pdf/1638127722_pdf.pdf'),
(3254, 346, 'ELECTRONIQUE', 'img/1639613469_article.jpg', '2021-12-16', 'LES DIODES', 'pdf/1639613469_pdf.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCours`)
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `titre`) VALUES
(346, 'ELECTRONIQUE'),
(345, 'Informatique'),
(347, 'CHIMIE');

-- --------------------------------------------------------

--
-- Structure de la table `etude`
--

DROP TABLE IF EXISTS `etude`;
CREATE TABLE IF NOT EXISTS `etude` (
  `idUser` int(11) DEFAULT NULL,
  `niveau_etude` int(11) NOT NULL,
  `domaine` varchar(50) DEFAULT NULL,
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etude`
--

INSERT INTO `etude` (`idUser`, `niveau_etude`, `domaine`) VALUES
(7, 3, 'Informatique'),
(8, 3, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

DROP TABLE IF EXISTS `moderateur`;
CREATE TABLE IF NOT EXISTS `moderateur` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`idAdmin`, `nom`, `prenom`, `grade`, `email`, `password`) VALUES
(1, 'ZIANE', 'ZAKARIA', 'SA', 'zakariaziane@hotmail.com', '#root#'),
(2, 'ILYAS', 'QAFFOU', 'SA', 'ilyas@gmail.com', '123456'),
(19, 'El Ayachi', 'Rachid', 'PROF', 'elayachi@fstbm.ac.ma', '123456789'),
(18, 'Zougagh', 'Hicham', 'PROF', 'hzm_1979@yahoo.fr', '123456789'),
(17, 'Hair', 'Abdellatif', 'PROF', 'abd_hair@yahoo.com', '123456789'),
(16, 'Fakir', 'Mohamed', 'PROF', 'm.fakir@usms.ma', '12345678'),
(20, 'Idrissi', 'Najlae', 'PROF', 'n.idrissi@usms.ma', '123456789'),
(21, 'Aouaj', 'Abdellah', 'PROF', 'a.aouaj@usms.ma', '123456789'),
(22, 'Rabi', 'Souad', 'PROF', 's.rabi@hotmail.com', '123456789'),
(23, 'Laallam', 'Latifa', 'PROF', 'jouaitia@gmail.com', '123456789'),
(24, 'Hanine', 'Hafida', 'PROF', 'hafidahanine@gmail.com', '123456789'),
(25, 'ZEKHNI', 'abdo', 'PROF', 'abdo_33@live.fr', '123456789'),
(26, 'lahrach', 'oussama', 'PROF', 'oussama@usms.fr', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `msg`
--

INSERT INTO `msg` (`nom`, `email`, `sujet`, `message`) VALUES
('zakaria', 'anas04talabi@usmdzdz.ma', 'TEST', 'salam bghit nt9ayd m3AKOM');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `idProf` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `CIN` varchar(30) DEFAULT NULL,
  `date_inscrp` date DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `img` text,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProf`),
  KEY `idAdmin` (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`idProf`, `nom`, `prenom`, `email`, `password`, `CIN`, `date_inscrp`, `idAdmin`, `img`, `score`) VALUES
(22, 'Idrissi', 'Najlae', 'n.idrissi@usms.ma', '123456789', 'AA32321', '2021-11-28', 20, 'img/1638122724_index.jpg', 4),
(21, 'El Ayachi', 'Rachid', 'elayachi@fstbm.ac.ma', '123456789', 'HH33221', '2021-11-28', 19, 'img/1638122602_index.jpg', 5),
(20, 'Zougagh', 'Hicham', 'hzm_1979@yahoo.fr', '123456789', 'BJ77788', '2021-11-28', 18, 'img/1638122539_index.jpg', 5),
(18, 'Fakir', 'Mohamed', 'm.fakir@usms.ma', '12345678', 'AA23433', '2021-11-28', 16, 'img/1638122414_index.jpg', 4),
(19, 'Hair', 'Abdellatif', 'abd_hair@yahoo.com', '123456789', 'AA99099', '2021-11-28', 17, 'img/1638122489_index.jpg', 5),
(23, 'Aouaj', 'Abdellah', 'a.aouaj@usms.ma', '123456789', 'IA22222', '2021-11-28', 21, 'img/1638122802_index.jpg', 5),
(24, 'Rabi', 'Souad', 's.rabi@hotmail.com', '123456789', 'M233123', '2021-11-28', 22, 'img/1638122922_index.jpg', 4),
(25, 'Laallam', 'Latifa', 'jouaitia@gmail.com', '123456789', 'SH5533', '2021-11-28', 23, 'img/1638122996_index.jpg', 2),
(26, 'Hanine', 'Hafida', 'hafidahanine@gmail.com', '123456789', 'X12334', '2021-11-28', 24, 'img/1638123113_index.jpg', 3),
(27, 'ZEKHNI', 'abdo', 'abdo_33@live.fr', '123456789', 'QQA2222', '2021-11-28', 25, 'img/1638126577_index.JPG', 2),
(28, 'lahrach', 'oussama', 'oussama@usms.fr', '123456789', 'BJ44682', '2021-12-15', 26, 'img/1639612321_index.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `CIN` varchar(30) DEFAULT NULL,
  `ddn` date DEFAULT NULL,
  `sexe` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `email`, `mdp`, `telephone`, `CIN`, `ddn`, `sexe`) VALUES
(7, 'ZIANE', 'ZAKARIA', 'zakariaziane@hotmail.com', 'BRKZLxRVHpt2A', 665182881, 'HH245051', '2000-4-16', 'MAS');
(7, 'LAHRACH', 'Oussama', 'oussama@gmail.com', 'BRY6iHxAAt2A', 666789381, 'BJ289051', '2001-11-8', 'MAS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
