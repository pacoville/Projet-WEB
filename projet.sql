-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 31 mai 2024 à 09:35
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
  `fin_seance` time DEFAULT NULL,
  `dispo` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Paiement`
--

CREATE TABLE `Paiement` (
  `paiement_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date_paiement` datetime DEFAULT NULL,
  `statut_paiement` enum('en attente','effectuer','echouer') DEFAULT NULL,
  `methode_paiement` enum('visa','mastercard','americanexpress','paypal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Seance`
--

CREATE TABLE `Seance` (
  `seance_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `temps_seance` datetime DEFAULT NULL,
  `statut_seance` enum('reserve','realise','annule') DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(20) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp_hash` varchar(255) DEFAULT NULL,
  `role` enum('admin','coach','client') DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `Chat`
--
ALTER TABLE `Chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `seance_id` (`seance_id`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `Coach`
--
ALTER TABLE `Coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `Detail_Paiement`
--
ALTER TABLE `Detail_Paiement`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `paiement_id` (`paiement_id`);

--
-- Index pour la table `Disponibilite`
--
ALTER TABLE `Disponibilite`
  ADD PRIMARY KEY (`dispo_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Index pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD PRIMARY KEY (`paiement_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`seance_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Chat`
--
ALTER TABLE `Chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Coach`
--
ALTER TABLE `Coach`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Detail_Paiement`
--
ALTER TABLE `Detail_Paiement`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Disponibilite`
--
ALTER TABLE `Disponibilite`
  MODIFY `dispo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT pour la table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Seance`
--
ALTER TABLE `Seance`
  MODIFY `seance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `Chat`
--
ALTER TABLE `Chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`seance_id`) REFERENCES `Seance` (`seance_id`);

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `Coach`
--
ALTER TABLE `Coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `Detail_Paiement`
--
ALTER TABLE `Detail_Paiement`
  ADD CONSTRAINT `detail_paiement_ibfk_1` FOREIGN KEY (`paiement_id`) REFERENCES `Paiement` (`paiement_id`);

--
-- Contraintes pour la table `Disponibilite`
--
ALTER TABLE `Disponibilite`
  ADD CONSTRAINT `disponibilite_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `Coach` (`coach_id`);

--
-- Contraintes pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`client_id`);

--
-- Contraintes pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`client_id`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`coach_id`) REFERENCES `Coach` (`coach_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
