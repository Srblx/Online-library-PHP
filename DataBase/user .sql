-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 fév. 2023 à 13:27
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mdp` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mdp2` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mdp`, `mdp2`) VALUES
(1, 'Dupont', 'Eric', 'b@mail.fr', 'azerty', ''),
(2, 'Alexis', 'Serbelloni', 'a@mail.fr', 'a', ''),
(19, 'Dumont', 'Leo', 'c@mail.fr', 'azerty', ''),
(20, 'Casagrande', 'Theo', 'Theo.c@mail.fr', 'a', ''),
(22, 'Lasarovitch', 'Pierre', 'e@mail.fr', 'azerty', ''),
(23, 'Pascal', 'Bertrand', 'f@mail.fr', 'a', ''),
(56, 'Tapis', 'Marc', 'Marc@mail.fr', '123456789', ''),
(67, 'Fil', 'Mathieu', 'mat@mail.fr', '$2y$10$9rwKpTnIvrB73gB4fzFUIeEhUdHcZNgXEninmJyeQC8ZtSUOUkPD2', ''),
(68, 'Filopa', 'Zoa', 'zoa@mail.fr', '$2y$10$.LlEVn/MNGvUyp1BgWyR2O/EaGcrzjw5cORcZAF2MW.uLl6uOjkMS', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `nom` (`nom`) USING BTREE,
  ADD KEY `prenom` (`prenom`) USING BTREE,
  ADD KEY `mail` (`mail`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
