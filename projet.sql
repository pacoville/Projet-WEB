-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 29 mai 2024 à 09:19
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `admin_id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Administrateur`
--

INSERT INTO `Administrateur` (`admin_id`, `utilisateur_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Chat`
--

CREATE TABLE `Chat` (
  `chat_id` int(11) NOT NULL,
  `seance_id` int(11) DEFAULT NULL,
  `type_chat` enum('texte','audio','video') DEFAULT NULL,
  `contenu_chat` text,
  `temps_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `client_id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `adresse_ligne1` varchar(255) DEFAULT NULL,
  `adresse_ligne2` varchar(255) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `num_etudiant` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Coach`
--

CREATE TABLE `Coach` (
  `coach_id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `cv` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Coach`
--

INSERT INTO `Coach` (`coach_id`, `utilisateur_id`, `specialite`, `photo`, `video`, `cv`) VALUES
(1, 1, 'Natation', 'phillipe.jpeg', 'phillipe.mp4', NULL),
(2, 3, 'Tennis', 'benoit.jpg', 'benoit.mp4', NULL),
(3, 4, 'Basketball', 'michel.jpg', 'michel.mp4', NULL),
(4, 5, 'Cycliste', 'david.jpg', 'david.mp4', NULL),
(5, 6, 'Coach Sportif', 'john.jpg', 'john.mp4', NULL),
(6, 7, 'Football', 'didier.jpg', 'didier.mp4', NULL),
(7, 8, 'Rugby', 'christophe.jpg', 'christophe.mp4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Detail_Paiement`
--


CREATE TABLE `Detail_Paiement` (
  `detail_id` int(11) NOT NULL,
  `paiement_id` int(11) DEFAULT NULL,
  `type_carte` enum('visa','mastercard','americanexpress','paypal') DEFAULT NULL,
  `num_carte` varchar(20) DEFAULT NULL,
  `nom_carte` varchar(100) DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `cvc` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Disponibilite`
--


CREATE TABLE `Disponibilite` (
  `dispo_id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `jour_semaine` enum('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche') DEFAULT NULL,
  `debut_seance` time DEFAULT NULL,
  `fin_seance` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Disponibilite`
--
