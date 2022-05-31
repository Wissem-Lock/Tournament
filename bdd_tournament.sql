-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 mai 2022 à 11:43
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tournament`
--
CREATE DATABASE IF NOT EXISTS `tournament` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tournament`;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `description`) VALUES
(1, 'League of Legends', 'League of Legends est un jeu de stratégie en équipe dans lequel deux équipes de cinq champions s\'affrontent pour détruire la base adverse.'),
(2, 'Overwatch', 'Overwatch est un jeu de tir futuriste basé sur une équipe dynamique. Chaque match est une bataille acharnée qui oppose 6 héros uniques.'),
(3, 'Rocket League', 'Bienvenue dans un mélange détonnant de football d\'arcade et de chaos motorisé !'),
(4, 'Fifa', 'FIFA 21 est un jeu vidéo de football.'),
(5, 'Call of Duty', 'Call of Duty ou COD est une série de jeux vidéo de tir à la première personne sur la guerre.'),
(6, 'Valorant', 'Valorant est un jeu vidéo free-to-play de tir à la première personne en multijoueur.');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_games` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `games_id` (`id_games`),
  KEY `team_id` (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `id_games`, `id_team`) VALUES
(10, 3, 79),
(11, 2, 79),
(12, 2, 79),
(13, 2, 79),
(14, 2, 79),
(15, 4, 79),
(16, 4, 79),
(17, 4, 79),
(18, 1, 79);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `chief` varchar(255) DEFAULT NULL,
  `nb_player` int(9) DEFAULT NULL,
  `win` int(9) DEFAULT NULL,
  `logo` text,
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id_team`, `name`, `chief`, `nb_player`, `win`, `logo`) VALUES
(75, 'Quality', 'Anivia', 1, NULL, NULL),
(76, 'Controle', 'Bouli', 1, NULL, NULL),
(77, 'Expendables', 'Karthus', 1, NULL, NULL),
(78, 'Estbani', 'Wissem', 1, NULL, NULL),
(79, 'pÃ©quÃ©', 'Wissem', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `win` int(9) DEFAULT NULL,
  `team` int(9) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `team` (`team`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `date`, `win`, `team`, `password`) VALUES
(25, 'Wissem', 'wissem@gmail.com', '2022-05-20 14:34:01', NULL, 79, '$2y$10$bmuMwlYNGwMT03RSMjIfpeb.QFZgARWU8rkpeSB7vkzNQ7ZS6zMjC'),
(26, 'Anivia', 'anivia@gmail.com', '2022-05-20 14:34:28', NULL, NULL, '$2y$10$X5PdY8Y0Fna2ERR19ST.Selp1Cj/eJVfTt7BYuFOJwdDVjFPWGiXq'),
(27, 'bibi', 'bibi@gmail.com', '2022-05-22 13:13:50', NULL, NULL, '$2y$10$SEX2OQokp.pFvibD8Vkwt.nE/.wBsnGtpA8xC19d3Xi0nzj0heYXa'),
(28, 'Karidoy', 'karidoy@gmail.com', '2022-05-23 20:20:50', NULL, NULL, '$2y$10$qZ6Ehn1pZwVuUz2euGZhy.RCQXr3A4DY4zP2kT3m0DnlfgAcRF6P.'),
(30, 'boubou', 'boubou@gmail.com', '2022-05-26 17:30:21', NULL, NULL, '$2y$10$XpNESzyhsjZ8IPkfRyIfHeZKuvtvrzOc7AZm5kex8EjtwLlhr9aMC'),
(31, 'Karthus', 'karthus@gmail.com', '2022-05-27 11:29:11', NULL, NULL, '$2y$10$Jsdsq4dNSFqzSqz7eJiSqsdLD56JSNsdkkPAD2N?Qdsdsf8UHZJNFshfbikzgbbd');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `games_id` FOREIGN KEY (`id_games`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `team_id` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tent` FOREIGN KEY (`team`) REFERENCES `team` (`id_team`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
