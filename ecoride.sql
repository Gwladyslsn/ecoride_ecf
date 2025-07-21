-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 21 juil. 2025 à 17:59
-- Version du serveur : 8.0.42
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecoride`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `name_admin` varchar(255) DEFAULT NULL,
  `lastname_admin` varchar(255) DEFAULT NULL,
  `email_admin` varchar(255) DEFAULT NULL,
  `password_admin` varchar(255) DEFAULT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Avoir`
--

CREATE TABLE `Avoir` (
  `id_user` int NOT NULL,
  `id_preferences` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `id_car` int NOT NULL,
  `brand_car` varchar(255) DEFAULT NULL,
  `model_car` varchar(255) DEFAULT NULL,
  `color_car` varchar(255) DEFAULT NULL,
  `year_car` year DEFAULT NULL,
  `energy_car` varchar(255) DEFAULT NULL,
  `licensePlate_car` varchar(10) DEFAULT NULL,
  `firstPlate_car` date DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `photo_car` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`id_car`, `brand_car`, `model_car`, `color_car`, `year_car`, `energy_car`, `licensePlate_car`, `firstPlate_car`, `id_user`, `photo_car`) VALUES
(1, 'Tesla', 'Modele S3', NULL, '2018', 'Electrique', NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `carpooling`
--

CREATE TABLE `carpooling` (
  `id_carpooling` int NOT NULL,
  `departure_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_hour` time DEFAULT NULL,
  `arrival_hour` time DEFAULT NULL,
  `departure_city` varchar(255) DEFAULT NULL,
  `arrival_city` varchar(255) DEFAULT NULL,
  `nb_place` int DEFAULT NULL,
  `price_place` int DEFAULT NULL,
  `id_car` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int NOT NULL,
  `name_employee` varchar(255) DEFAULT NULL,
  `lastname_employee` varchar(255) DEFAULT NULL,
  `email_employee` varchar(255) DEFAULT NULL,
  `password_employee` varchar(255) DEFAULT NULL,
  `dateHire_employee` date DEFAULT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Participer`
--

CREATE TABLE `Participer` (
  `id_carpooling` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int NOT NULL,
  `note_reviews` int DEFAULT NULL,
  `date_reviews` date DEFAULT NULL,
  `comment_reviews` text,
  `status_reviews` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_carpooling` int DEFAULT NULL,
  `id_employee` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `name_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'chauffeur'),
(2, 'passager'),
(3, 'chauffeur-passager');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `lastname_user` varchar(255) DEFAULT NULL,
  `dob_user` date DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `phone_user` varchar(12) DEFAULT NULL,
  `postcode_user` varchar(10) DEFAULT NULL,
  `photo_user` varchar(255) DEFAULT NULL,
  `credit_user` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  `avatar_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `lastname_user`, `dob_user`, `email_user`, `password_user`, `phone_user`, `postcode_user`, `photo_user`, `credit_user`, `id_role`, `avatar_user`) VALUES
(1, 'Max', 'li', NULL, 'max@email.com', '$2y$10$wJwdqCWS.4B4RSgEhXCZk.YQ8KVQiCG8HW13cD1C7plOsVHHGWCm.', NULL, NULL, NULL, NULL, 2, NULL),
(2, 'Tata', 'Tati', NULL, 'tata@email.com', '$2y$10$.qhVh.dTsnyIqZdQJ1nlPeWrTWR1AUCQoHkZHCwuc5ananwuzZFqa', NULL, NULL, NULL, NULL, 2, NULL),
(3, 'Toto', 'Dupont', NULL, 'toto@email.com', '$2y$10$U7MVwfrZb9wsJJe3/VAQ5eMqbfuwgwTDMIuOiSxFtGOssRWlJsK3C', NULL, NULL, NULL, NULL, 3, 'avatar_687e62c46188f.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id_preferences` int NOT NULL,
  `smoker` tinyint(1) DEFAULT NULL,
  `pet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `Avoir`
--
ALTER TABLE `Avoir`
  ADD PRIMARY KEY (`id_user`,`id_preferences`),
  ADD KEY `id_preferences` (`id_preferences`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `carpooling`
--
ALTER TABLE `carpooling`
  ADD PRIMARY KEY (`id_carpooling`),
  ADD KEY `id_car` (`id_car`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `Participer`
--
ALTER TABLE `Participer`
  ADD PRIMARY KEY (`id_carpooling`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_carpooling` (`id_carpooling`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id_preferences`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `carpooling`
--
ALTER TABLE `carpooling`
  MODIFY `id_carpooling` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id_preferences` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `Avoir`
--
ALTER TABLE `Avoir`
  ADD CONSTRAINT `Avoir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `Avoir_ibfk_2` FOREIGN KEY (`id_preferences`) REFERENCES `user_preferences` (`id_preferences`);

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `carpooling`
--
ALTER TABLE `carpooling`
  ADD CONSTRAINT `carpooling_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car` (`id_car`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `Participer`
--
ALTER TABLE `Participer`
  ADD CONSTRAINT `Participer_ibfk_1` FOREIGN KEY (`id_carpooling`) REFERENCES `carpooling` (`id_carpooling`),
  ADD CONSTRAINT `Participer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_carpooling`) REFERENCES `carpooling` (`id_carpooling`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
