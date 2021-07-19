-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 juil. 2021 à 15:56
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotify`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_artiste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom_artiste`, `description_artiste`) VALUES
(1, 'Sabri', 'Rappeur'),
(2, 'Josue', 'Chanteur');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210719140229', '2021-07-19 14:02:31', 191);

-- --------------------------------------------------------

--
-- Structure de la table `son`
--

DROP TABLE IF EXISTS `son`;
CREATE TABLE IF NOT EXISTS `son` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_son` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longueur_son` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `son`
--

INSERT INTO `son` (`id`, `nom_son`, `longueur_son`) VALUES
(1, 'fzffzfqfzfq', 4);

-- --------------------------------------------------------

--
-- Structure de la table `son_artiste`
--

DROP TABLE IF EXISTS `son_artiste`;
CREATE TABLE IF NOT EXISTS `son_artiste` (
  `son_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL,
  PRIMARY KEY (`son_id`,`artiste_id`),
  KEY `IDX_35678B8E65EFA242` (`son_id`),
  KEY `IDX_35678B8E21D25844` (`artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `son_artiste`
--

INSERT INTO `son_artiste` (`son_id`, `artiste_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'test@live.fr', '[]', '$2y$13$wMj3aDyxn6U9Ndqnh.U.7O5sZQaDxlJTs3KwsOC/MDwLnzUXC1q9a'),
(2, 'sabri@live.fr', '[]', '$2y$13$E9vIf2nyt6n.lPamE9G4v.0BrKKEDvPhbELw/ztFNqbEy6AuTMTbO'),
(3, 'sabri.arrar@gmail.com', '[]', '$2y$13$BY6h5hhozIXKnxsDPHzEzel/rTnrSBAuSTFOPduL9nZgttHyIlgme');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `son_artiste`
--
ALTER TABLE `son_artiste`
  ADD CONSTRAINT `FK_35678B8E21D25844` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35678B8E65EFA242` FOREIGN KEY (`son_id`) REFERENCES `son` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
