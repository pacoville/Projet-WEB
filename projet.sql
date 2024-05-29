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


INSERT INTO `Disponibilite` (`dispo_id`, `coach_id`, `jour_semaine`, `debut_seance`, `fin_seance`) VALUES
(41, 1, 'lundi', '09:00:00', '10:00:00'),
(42, 1, 'lundi', '10:00:00', '11:00:00'),
(43, 1, 'lundi', '11:00:00', '12:00:00'),
(44, 1, 'lundi', '12:00:00', '13:00:00'),
(45, 1, 'lundi', '13:00:00', '14:00:00'),
(46, 1, 'lundi', '14:00:00', '15:00:00'),
(47, 1, 'lundi', '15:00:00', '16:00:00'),
(48, 1, 'lundi', '16:00:00', '17:00:00'),
(49, 1, 'mardi', '09:00:00', '10:00:00'),
(50, 1, 'mardi', '10:00:00', '11:00:00'),
(51, 1, 'mardi', '11:00:00', '12:00:00'),
(52, 1, 'mardi', '12:00:00', '13:00:00'),
(53, 1, 'mardi', '13:00:00', '14:00:00'),
(54, 1, 'mardi', '14:00:00', '15:00:00'),
(55, 1, 'mardi', '15:00:00', '16:00:00'),
(56, 1, 'mardi', '16:00:00', '17:00:00'),
(57, 1, 'mercredi', '09:00:00', '10:00:00'),
(58, 1, 'mercredi', '10:00:00', '11:00:00'),
(59, 1, 'mercredi', '11:00:00', '12:00:00'),
(60, 1, 'mercredi', '12:00:00', '13:00:00'),
(61, 1, 'mercredi', '13:00:00', '14:00:00'),
(62, 1, 'mercredi', '14:00:00', '15:00:00'),
(63, 1, 'mercredi', '15:00:00', '16:00:00'),
(64, 1, 'mercredi', '16:00:00', '17:00:00'),
(65, 1, 'jeudi', '09:00:00', '10:00:00'),
(66, 1, 'jeudi', '10:00:00', '11:00:00'),
(67, 1, 'jeudi', '11:00:00', '12:00:00'),
(68, 1, 'jeudi', '12:00:00', '13:00:00'),
(69, 1, 'jeudi', '13:00:00', '14:00:00'),
(70, 1, 'jeudi', '14:00:00', '15:00:00'),
(71, 1, 'jeudi', '15:00:00', '16:00:00'),
(72, 1, 'jeudi', '16:00:00', '17:00:00'),
(73, 1, 'vendredi', '09:00:00', '10:00:00'),
(74, 1, 'vendredi', '10:00:00', '11:00:00'),
(75, 1, 'vendredi', '11:00:00', '12:00:00'),
(76, 1, 'vendredi', '12:00:00', '13:00:00'),
(77, 1, 'vendredi', '13:00:00', '14:00:00'),
(78, 1, 'vendredi', '14:00:00', '15:00:00'),
(79, 1, 'vendredi', '15:00:00', '16:00:00'),
(80, 1, 'vendredi', '16:00:00', '17:00:00'),
(81, 1, 'samedi', '09:00:00', '10:00:00'),
(82, 1, 'samedi', '10:00:00', '11:00:00'),
(83, 1, 'samedi', '11:00:00', '12:00:00'),
(84, 1, 'samedi', '12:00:00', '13:00:00'),
(85, 1, 'samedi', '13:00:00', '14:00:00'),
(86, 1, 'samedi', '14:00:00', '15:00:00'),
(87, 1, 'samedi', '15:00:00', '16:00:00'),
(88, 1, 'samedi', '16:00:00', '17:00:00'),
(97, 2, 'mardi', '09:00:00', '10:00:00'),
(98, 2, 'mardi', '10:00:00', '11:00:00'),
(99, 2, 'mardi', '11:00:00', '12:00:00'),
(100, 2, 'mardi', '13:00:00', '14:00:00'),
(101, 2, 'mardi', '14:00:00', '15:00:00'),
(102, 2, 'mardi', '15:00:00', '16:00:00'),
(103, 2, 'mardi', '16:00:00', '17:00:00'),
(104, 2, 'mercredi', '09:00:00', '10:00:00'),
(105, 2, 'mercredi', '10:00:00', '11:00:00'),
(106, 2, 'mercredi', '11:00:00', '12:00:00'),
(107, 2, 'mercredi', '12:00:00', '13:00:00'),
(108, 2, 'mercredi', '14:00:00', '15:00:00'),
(109, 2, 'mercredi', '15:00:00', '16:00:00'),
(110, 2, 'mercredi', '16:00:00', '17:00:00'),
(111, 2, 'jeudi', '09:00:00', '10:00:00'),
(112, 2, 'jeudi', '10:00:00', '11:00:00'),
(113, 2, 'jeudi', '11:00:00', '12:00:00'),
(114, 2, 'jeudi', '14:00:00', '15:00:00'),
(115, 2, 'jeudi', '15:00:00', '16:00:00'),
(116, 2, 'jeudi', '16:00:00', '17:00:00'),
(117, 2, 'vendredi', '09:00:00', '10:00:00'),
(118, 2, 'vendredi', '10:00:00', '11:00:00'),
(119, 2, 'vendredi', '12:00:00', '13:00:00'),
(120, 2, 'vendredi', '13:00:00', '14:00:00'),
(121, 2, 'vendredi', '14:00:00', '15:00:00'),
(122, 2, 'vendredi', '15:00:00', '16:00:00'),
(123, 2, 'vendredi', '16:00:00', '17:00:00'),
(124, 2, 'samedi', '09:00:00', '10:00:00'),
(125, 2, 'samedi', '10:00:00', '11:00:00'),
(126, 2, 'samedi', '11:00:00', '12:00:00'),
(127, 2, 'samedi', '12:00:00', '13:00:00'),
(128, 2, 'samedi', '13:00:00', '14:00:00'),
(129, 2, 'samedi', '14:00:00', '15:00:00'),
(130, 2, 'samedi', '15:00:00', '16:00:00'),
(131, 2, 'samedi', '16:00:00', '17:00:00'),
(132, 3, 'lundi', '09:00:00', '10:00:00'),
(133, 3, 'lundi', '10:00:00', '11:00:00'),
(134, 3, 'lundi', '11:00:00', '12:00:00'),
(135, 3, 'lundi', '14:00:00', '15:00:00'),
(136, 3, 'lundi', '15:00:00', '16:00:00'),
(137, 3, 'lundi', '16:00:00', '17:00:00'),
(138, 3, 'mercredi', '09:00:00', '10:00:00'),
(139, 3, 'mercredi', '10:00:00', '11:00:00'),
(140, 3, 'mercredi', '11:00:00', '12:00:00'),
(141, 3, 'mercredi', '12:00:00', '13:00:00'),
(142, 3, 'mercredi', '13:00:00', '14:00:00'),
(143, 3, 'mercredi', '14:00:00', '15:00:00'),
(144, 3, 'mercredi', '15:00:00', '16:00:00'),
(145, 3, 'mercredi', '16:00:00', '17:00:00'),
(146, 3, 'jeudi', '09:00:00', '10:00:00'),
(147, 3, 'jeudi', '10:00:00', '11:00:00'),
(148, 3, 'jeudi', '11:00:00', '12:00:00'),
(149, 3, 'jeudi', '14:00:00', '15:00:00'),
(150, 3, 'jeudi', '15:00:00', '16:00:00'),
(151, 3, 'jeudi', '16:00:00', '17:00:00'),
(152, 3, 'vendredi', '09:00:00', '10:00:00'),
(153, 3, 'vendredi', '10:00:00', '11:00:00'),
(154, 3, 'vendredi', '12:00:00', '13:00:00'),
(155, 3, 'vendredi', '13:00:00', '14:00:00'),
(156, 3, 'vendredi', '14:00:00', '15:00:00'),
(157, 3, 'vendredi', '15:00:00', '16:00:00'),
(158, 3, 'vendredi', '16:00:00', '17:00:00'),
(159, 3, 'samedi', '09:00:00', '10:00:00'),
(160, 3, 'samedi', '10:00:00', '11:00:00'),
(161, 3, 'samedi', '11:00:00', '12:00:00'),
(162, 3, 'samedi', '12:00:00', '13:00:00'),
(163, 3, 'samedi', '13:00:00', '14:00:00'),
(164, 3, 'samedi', '14:00:00', '15:00:00'),
(165, 3, 'samedi', '15:00:00', '16:00:00'),
(166, 3, 'samedi', '16:00:00', '17:00:00'),
(167, 3, 'dimanche', '09:00:00', '10:00:00'),
(168, 3, 'dimanche', '10:00:00', '11:00:00'),
(169, 3, 'dimanche', '11:00:00', '12:00:00'),
(170, 3, 'dimanche', '12:00:00', '13:00:00'),
(171, 3, 'dimanche', '13:00:00', '14:00:00'),
(172, 4, 'lundi', '09:00:00', '10:00:00'),
(173, 4, 'lundi', '10:00:00', '11:00:00'),
(174, 4, 'lundi', '11:00:00', '12:00:00'),
(175, 4, 'lundi', '13:00:00', '14:00:00'),
(176, 4, 'lundi', '14:00:00', '15:00:00'),
(177, 4, 'lundi', '15:00:00', '16:00:00'),
(178, 4, 'mardi', '09:00:00', '10:00:00'),
(179, 4, 'mardi', '10:00:00', '11:00:00'),
(180, 4, 'mardi', '12:00:00', '13:00:00'),
(181, 4, 'mardi', '13:00:00', '14:00:00'),
