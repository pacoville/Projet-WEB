-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 16:46
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `seance_id` int DEFAULT NULL,
  `type_chat` enum('texte','audio','video') DEFAULT NULL,
  `contenu_chat` text,
  `temps_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`),
  KEY `seance_id` (`seance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `num_etudiant` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `utilisateur_id`, `num_etudiant`) VALUES
(1, 29, '123456789'),
(3, 38, '98756');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `coach_id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `cv` text,
  `disponibilite_lundi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_lundi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_mardi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_mardi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_mercredi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_mercredi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_jeudi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_jeudi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_vendredi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_vendredi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_samedi_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_samedi_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_dimanche_matin` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  `disponibilite_dimanche_apres_midi` enum('Disponible','Non disponible') DEFAULT 'Disponible',
  PRIMARY KEY (`coach_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`coach_id`, `utilisateur_id`, `specialite`, `photo`, `video`, `cv`, `disponibilite_lundi_matin`, `disponibilite_lundi_apres_midi`, `disponibilite_mardi_matin`, `disponibilite_mardi_apres_midi`, `disponibilite_mercredi_matin`, `disponibilite_mercredi_apres_midi`, `disponibilite_jeudi_matin`, `disponibilite_jeudi_apres_midi`, `disponibilite_vendredi_matin`, `disponibilite_vendredi_apres_midi`, `disponibilite_samedi_matin`, `disponibilite_samedi_apres_midi`, `disponibilite_dimanche_matin`, `disponibilite_dimanche_apres_midi`) VALUES
(13, 37, 'Tennis', 'nino.jpg', 'nino.mp4', 'cv_tennis.xml', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible'),
(14, 39, 'musculation', 'coach.jpg', 'coach.mp4', 'cv_basketball.xml', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible', 'Disponible');

-- --------------------------------------------------------

--
-- Structure de la table `detail_paiement`
--

DROP TABLE IF EXISTS `detail_paiement`;
CREATE TABLE IF NOT EXISTS `detail_paiement` (
  `detail_id` int NOT NULL AUTO_INCREMENT,
  `paiement_id` int DEFAULT NULL,
  `type_carte` enum('visa','mastercard','americanexpress','paypal') DEFAULT NULL,
  `num_carte` varchar(20) DEFAULT NULL,
  `nom_carte` varchar(100) DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `cvc` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `paiement_id` (`paiement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
CREATE TABLE IF NOT EXISTS `disponibilite` (
  `dispo_id` int NOT NULL AUTO_INCREMENT,
  `coach_id` int DEFAULT NULL,
  `jour_semaine` enum('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche') DEFAULT NULL,
  `debut_seance` time DEFAULT NULL,
  `fin_seance` time DEFAULT NULL,
  PRIMARY KEY (`dispo_id`),
  KEY `coach_id` (`coach_id`)
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `paiement_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date_paiement` datetime DEFAULT NULL,
  `statut_paiement` enum('en attente','effectuer','echouer') DEFAULT NULL,
  `methode_paiement` enum('visa','mastercard','americanexpress','paypal') DEFAULT NULL,
  PRIMARY KEY (`paiement_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `seance_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  `coach_id` int DEFAULT NULL,
  `temps_seance` datetime DEFAULT NULL,
  `statut_seance` varchar(25) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`seance_id`),
  KEY `client_id` (`client_id`),
  KEY `coach_id` (`coach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(20) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp_hash` varchar(255) DEFAULT NULL,
  `role` enum('admin','coach','client') DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`utilisateur_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `prenom`, `nom`, `adresse`, `code_postal`, `ville`, `email`, `mdp_hash`, `role`, `numero`) VALUES
(21, 'jean', 'raymond', '11122 rue', '75000', 'paris', 'jean@jean', '$2y$10$i6Tc2ummLPtaEumsKVyVUOEUGBxOICiHUahovIyzY8F2DwT42E3uq', 'client', '05165121'),
(27, 'jean', 'pepete', '11 rue', '78000', 'versailles', 'jean@gmail.com', '$2y$10$F/1yEibIiFu7zxZd3OuaEe9GOya/Tj.c8r1.QnyvagYP27u9gYclK', 'admin', '011591562'),
(28, 'rubens', 'lateltin', '11 rue jhceu', '75000', 'paris', 'rl@gmail.com', '$2y$10$/0.cl3i8VHoIYxOaYgNJG.km0TH8/9OWbiFsZv9Y7jGLbPi9ikkOa', 'coach', '025156'),
(29, 'brieuc', 'molko', '6 rue de gondi', '78870', 'bailly', 'brieuc.molko@edu.ece.fr', '$2y$10$4aVzAPOAGAKmpyRJpTKMs.OaG6ruic8/vSVh/fD8DMwi4Fe9hN/2C', 'client', '0768421393'),
(30, 'rayan', 'malki', '10 rue sextius', '75015', 'paris', 'rayan.malki@edu.ece.fr', '$2y$10$8BugasvhmpnbiTkr4qCZBel12bMv3BqsZv6pgCK6e3wZ6TIujsmiG', 'admin', '0665698596'),
(37, 'Marie', 'Leroux', '10 rue qextius', '75018', 'paris', 'marie.leroux@example.com', '$2y$10$C4Dfx0rHeeVDPxvkjdj7W.1N7EbJQJvyk22BJQ9ap3TDG1LYwvjz2', 'coach', '0987654321'),
(38, 'jean', 'messia', '11 fdfe', '1595', 'hzhdbhzd', 'ki@ki', '$2y$10$Mw6IX0QdFP4a8HjQiiqleuM4kDd44spyPUd2Ce5/48TNIxpa.b55G', 'client', '0214948'),
(39, 'coach', 'admin', '6 rue henry de gondy 78870 bailly', '78870', 'bailly', 'coach@c', '$2y$10$H9unjYi3ktzvrYKydAqmyOX4tbyG00xDb5utV4r9u1ZAcSTkajpbm', 'coach', '05532');

-- --------------------------------------------------------

--
-- Structure de la table `établissement`
--

DROP TABLE IF EXISTS `établissement`;
CREATE TABLE IF NOT EXISTS `établissement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numéros` varchar(15) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `responsable` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `établissement`
--

INSERT INTO `établissement` (`id`, `nom`, `adresse`, `numéros`, `ville`, `email`, `image`, `responsable`) VALUES
(1, 'paris', '11 rue de paris', '0768421393', 'paris', 'paris@gmail.com', 'salle1.jpg', 'jean marie'),
(2, 'marseilles', '1 rue de marseilles', '123654', 'Marseilles', 'marseilles@gmail.com', 'salle2.jpg', 'luc bessons');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`seance_id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `detail_paiement`
--
ALTER TABLE `detail_paiement`
  ADD CONSTRAINT `detail_paiement_ibfk_1` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`paiement_id`);

--
-- Contraintes pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD CONSTRAINT `disponibilite_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
