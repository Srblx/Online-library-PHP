-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 fév. 2023 à 19:07
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
-- Structure de la table `fornisseur`
--

CREATE TABLE `fornisseur` (
  `id` int(11) NOT NULL,
  `code_fournisseur` int(11) NOT NULL,
  `raison_social` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rue_fournisseur` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `localite` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel_fournisseur` int(11) NOT NULL,
  `url_fournisseur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail_fournisseur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fax_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fornisseur`
--

INSERT INTO `fornisseur` (`id`, `code_fournisseur`, `raison_social`, `rue_fournisseur`, `code_postal`, `localite`, `pays`, `tel_fournisseur`, `url_fournisseur`, `mail_fournisseur`, `fax_fournisseur`) VALUES
(1, 32, 'Lire dans les etoiles', 'Champ Elissé', 75000, 'Paris', 'France', 678654328, 'https://www.santaburre.fr', 'fournisseur@mail.fr', 442044202),
(11, 86, 'Librairie de la Plume', '12 rue des Livres', 75001, 'Paris', 'France', 1, 'www.librairiedelaplume.fr', 'contact@librairiedelaplume.fr', 382737465),
(12, 7854, 'Distribulivre', '32 avenue de la Lecture', 69002, 'Lyon', 'France', 4, 'www.distribulivre.com', 'contact@distribulivre.com', 976846574),
(13, 67, 'Papeterie des Arts', '10 rue du Papier', 31000, 'Toulouse', 'France', 5, 'www.papeteriedesarts.fr', 'contact@papeteriedesarts.fr', 783948576),
(14, 87, 'Livre&Co', '5 rue de la LittÃ©rature', 44000, 'Nantes', 'France', 2, 'www.livreandco.fr', 'contact@livreandco.fr', 653745473),
(15, 76589, 'Imprimerie Moderne', '18 boulevard de l\'Imprimerie', 75008, 'Paris', 'France', 1, 'www.imprimeriemoderne.fr', 'contact@imprimeriemoderne.fr', 2147483647);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fornisseur`
--
ALTER TABLE `fornisseur`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `code_fournisseur` (`code_fournisseur`) USING BTREE,
  ADD KEY `raison_social` (`raison_social`) USING BTREE,
  ADD KEY `code_postal` (`code_postal`) USING BTREE,
  ADD KEY `localite` (`localite`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fornisseur`
--
ALTER TABLE `fornisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
