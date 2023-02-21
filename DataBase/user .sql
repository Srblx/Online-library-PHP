-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 14:59
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
  `est_administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mdp`, `est_administrateur`) VALUES
(111, 'Delacour', 'Mathieu', 'mat@mail.fr', '$2y$10$HyZVlQ6VdXNT7rQqFFApXeHIj1SN.ZW./m2y1upJpSP/Hq9J79iGK', 0),
(112, 'Chateau', 'Fort', 'chateauFort@mail.fr', '$2y$10$meeUKxxjjZrr6xhnEfUOeOG0eqltrpGKUWbV8ic4JJSsq276AiPzO', 0),
(113, 'Citron', 'Pressé', 'citron@mail.fr', '$2y$10$BQ.tRCkSvDxa7fHVQudPwOfVAprX0aYbob5asSzaZlZTEgyNY2v8W', 0),
(124, 'a', 'a', 'ab@mail.fr', '$2y$10$tC7XcsS2yw7uNM9ycHq6XuPck2pJia4.LAEnOtf70EYvWYw1PJAFW', 0),
(125, 'a', 'a', 'alexiss@mail.fr', '$2y$10$6yqVwoZVUYabjc.Wel/CbeQ5Zt8VTFRh3qP9USe6khtpAKyacTgYa', 0),
(126, 'alexis', 'srbl', 'c@mail.fr', '$2y$10$WhgSMkFDBOe1L66Gz/MO/eGfygbTqZx999k3vsnYJwBrg47j8tO8O', 1),
(129, 'azertgyfds', 'qsdfgfds', 'ufhdjshgsofhjdgj@mail.fr', '$2y$10$l3bPykaIohsHr8G1PRUGxOIZkLvBV8SvTQKAo0Z5bYPCboPR0VRuq', 0),
(130, 'azertgyfdsdsfsfdsf', 'qsdfgfdsdsgfhdnfd', 'hfjhgbdfghbgj@mail.fr', '$2y$10$i6pgBMtT6RrOI8HSz5XmBedr3dEZqcnHxe.rz0z190/Rg9wlgaTmW', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
