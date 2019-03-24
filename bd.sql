-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 24 mars 2019 à 18:48
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ordinateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`) VALUES
(4, 'BTS2 IG'),
(5, 'L1 IG'),
(6, 'L2 IG'),
(7, 'L3 IG'),
(8, 'L1 SB'),
(9, 'L2 SB'),
(10, 'L3 SB'),
(11, 'L1 ELM');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `ordinateur_id` int(11) NOT NULL,
  `date_emprunt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `etudiant_id`, `ordinateur_id`, `date_emprunt`) VALUES
(10, 8, 15, '2019-03-23 10:01:20');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `classe_id`) VALUES
(2, 'A0012019', 'GAYE', 'MOUSSA', 'moussagaye699@gmail.com', '763349693', 'YEMBEUL', 4),
(4, 'A0022019', 'GAYE', 'MAME GOR', 'gayememegor97@gmail.com', '766490958', 'POINT E', 4),
(5, 'A0032019', 'GAYE', 'MAYE ABO', 'mayeabogaye@gmail.com', '77 453 45 36', 'ALMADI', 4),
(6, 'A0042019', 'FAYE', 'BOURE', 'fayezizou5@gmail.com', '783492241', 'THIAROYE', 10),
(7, 'A0052019', 'MBENGUE', 'BABACAR', 'babacar.mbengue10@gmail.com', '768354367', 'THIAROYE', 4),
(8, 'A0002019', 'DIOUF', 'SALIOU', 'diouf0207@gmail.com', '771296544', 'DIAXAAY', 10);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'HP'),
(2, 'SAMSUNG'),
(4, 'COMPAQ'),
(5, 'DELL');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

CREATE TABLE `ordinateur` (
  `id` int(11) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `disque` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `processeur` varchar(50) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ordinateur`
--

INSERT INTO `ordinateur` (`id`, `serie`, `disque`, `ram`, `processeur`, `marque_id`, `os_id`, `image`) VALUES
(2, '00927899009990', '250 GB', 'duo core i5', 'intel', 1, 2, ''),
(8, '1345666665', '500gb', '4 GB', 'CORE I7', 1, 1, 'pc1.png'),
(9, '134566666560069', '500gb', '4 GB', 'intel', 1, 7, ''),
(10, '2332323323', '400 GB', '8 GB', 'AMD', 1, 3, 'pc3.png'),
(11, '233333333', '200GB', '16GB', 'CORE I3', 1, 3, 'pc4.png'),
(12, '234566778899', '1TB', '16GB', 'CORE I5', 1, 2, 'pc5.jpg'),
(13, '1233456789', '345GB', '32GB', 'ATOM', 1, 3, 'pc7.jpg'),
(14, '87556656', '500GB', '16GB', 'DUO CORE', 4, 2, 'pc8.jpeg'),
(15, '45464664', '120GB', '32GB', 'INTEL CORE I9 9900K', 4, 1, 'pc9.jpg'),
(16, '564647744', '1TB', '5GB', 'INTEL CORE I7 9700K', 4, 2, 'pc10.jpg'),
(17, '84678875', '500GB', '4 GB', 'AMD RYZEN 52600K', 4, 7, ''),
(18, '5637663378733', '200GB', '2GB', 'AMD RYZEN THREAD DRIPPER', 2, 2, 'pc20.jpg'),
(19, '67543568864', '600GB', '8GB', 'CORE I7', 2, 1, 'pc21.jpg'),
(20, '466455655544', '400 GB', '3GB', 'AMD', 2, 3, 'pc22.jpg'),
(21, '853574335', '400 GB', '32GB', 'CORE I7', 2, 1, 'pc23.jpeg'),
(22, '3488696987744', '500GB', '32', 'INTEL CORE I7 9700K', 5, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `version` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `os`
--

INSERT INTO `os` (`id`, `nom`, `version`) VALUES
(1, 'WINDOWS', '7'),
(2, 'WINDOWS', '8'),
(3, 'KALI LINUX', '2018.4'),
(4, 'KALI LINUX', '2019.1'),
(5, 'MAC OS X', '10.8'),
(7, 'WINDOWS', '10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `prenom`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrateur', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`),
  ADD KEY `ordinateur_id` (`ordinateur_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marque_id` (`marque_id`),
  ADD KEY `os_id` (`os_id`);

--
-- Index pour la table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`ordinateur_id`) REFERENCES `ordinateur` (`id`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD CONSTRAINT `ordinateur_ibfk_1` FOREIGN KEY (`os_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `ordinateur_ibfk_2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
