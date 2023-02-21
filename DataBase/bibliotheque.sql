-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 14:06
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
(1, 32, 'Lire dans les etoiles', 'Champ Elissé', 75000, 'Paris', 'France', 678987652, 'https://www.santaburre.fr/?gclid=Cj0KCQiAxbefBhDfARIsAL4XLRqAcjSpqfj3SbATBYSGQ-Yn2VHsf-CX5mFdjZVtPIN', 'fournisseur@mail.fr', 442049938),
(3, 1, '', '', 0, 'marseille', '', 0, '', '', 0),
(4, 1, '', '', 0, 'marseille', '', 0, '', '', 0),
(5, 123, 'sas', 'avenue', 13000, 'montpelier', 'france', 9876543, 'iiiii', '@mail.fr', 9876543),
(6, 0, 'a', 'a', 0, 'a', 'a', 0, '', 'a', 0),
(7, 0, 'z', 'z', 1234, 'HGFDS', 'SFDS', 98765432, '', 'REEZT', 0),
(8, 0, 'fd', '', 0, 'f', 'f', 0, '', 'f', 0);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `isbn` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `titre` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `theme` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombreDePage` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `format` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nomAuteur` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenomAuteur` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `editeur` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `anneeEdition` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prix` decimal(6,0) NOT NULL,
  `langue` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `isbn`, `titre`, `theme`, `nombreDePage`, `format`, `nomAuteur`, `prenomAuteur`, `editeur`, `anneeEdition`, `prix`, `langue`) VALUES
(3, '9782080687104', 'Comment dominer le stress et les soucis\r\n', 'Psycologie', '204 pages', 'Classique', 'Carnegie\r\n', 'Dale', 'None', '31/03/2005', '8', 'anglais'),
(5, '2253081477', 'La semaine de 4heures', 'Developpement personnel', '320 pages', 'Classique', 'Ferries', 'Timothy', 'PEARSON', '30 avril 2010', '19', 'Français\r\n'),
(7, '2266227920', 'Influence et manipulation ', 'Développement personnel', ' 408', '11cm x 17cm', ' Cialdini', ' Robert B.', 'Pocket', ' 17/04/2014', '9', 'Français anglais\r\n'),
(8, ' 2266268554', 'Miracle morning', 'Développement personnel ', '240 pages', 'De poche', ' Elrod', ' Hal', 'First', '10 mars 2016', '17', 'Anglais'),
(10, ' 225323821X', 'Comment résoudre les conflits', 'Développement personnel', '224 pages', 'de poche', 'Carnegie', ' Dale ', ' Lgf', ' 13/10/2021', '14', 'Français '),
(18, '2707188794', 'Les mots sont des fenêtres (ou bien ce sont des murs)', 'Développement personnel', ' 320', '', 'B. Rosenberg', 'Marshall', 'La decouverte', '28/04/2016', '20', 'Français '),
(19, '2807328156', 'Psychologie du haut potentiel', 'Psychologie', '672 pages', 'Classique', 'Gauvrit', ' Nicolas', 'De Boeck Supérieur', '26/05/2021', '42', 'Français '),
(24, '', 'lart subtile de sen foutre', 'Développement psychologique', '188 pages', 'Classique', 'Manson', 'Mark', 'Eyrolles', 'Juin 2017', '0', 'Français '),
(25, '2266268171', 'La Puissance de l acceptation', 'Développement personnel', '288 pages', '', 'Bourbeau', ' Lise ', ' Pocket', ' 07/09/2017', '8', 'Français '),
(26, ' 2761915968', 'Cessez dêtre gentil soyez vrai', 'Développement psychologique', '349 pages', 'Classique', 'Ansembourg', ' Thomas', 'de lHomme ', ' février 2001', '8', 'Français '),
(27, '2010008995', 'Les misérables', 'rêve et le suicide', '352', 'Classique', 'Hugo', 'Victor', 'Ldp Jeunesse', '0', '5', 'Français'),
(34, '', 'Le lièvre et la tortue', 'fable', '30', 'Broché', 'la fontaine', 'jea n', 'Jeunesse', '1900', '10', 'Français'),
(35, '', 'la ligne vert', 'drame', '500', 'de poche', 'King', 'sephen', 'le livre de poche', '2000', '9', 'Français'),
(36, '', 'comme toi', 'romantique', '450', 'classique', 'Jewell', 'lisa', 'Lds', '2015', '8', 'Français'),
(37, '', 'it ends with us the emotional', 'romantique', '890', '', 'Hoover', 'Collen', 'larousse', '2018', '11', 'Français'),
(38, '', 'comment developper l&#039;autodisipline', 'Développement personnel', '550', 'classique', 'Meadows', 'Martin', '', '2010', '13', 'anglais'),
(39, '', 'l&#039;art de la victoire', 'sport', '380', 'classique', 'Knight', 'Phil', 'hugo poche', '2018', '9', 'anglais'),
(40, '', 'Vendre les secret de ma methode', 'Marketing', '290', 'de poche', 'Belfort', 'Jordan', 'Maison edit', '2004', '18', 'anlgais'),
(41, '', 'Ne la reveillez pas', 'Horreur', '750', 'de poche', 'Delacroix', 'Angelina', 'packet', '2017', '9', 'Francais'),
(42, '', 'Entre deux monde', 'Policier', '675', 'classique', 'Nrek', 'Olivier', 'pocket', '2019', '8', 'Français'),
(43, '', 'Un long chemin vers la liberté', 'autobiogrphique', '767', 'classique', 'Mandela', 'nelson', 'Le livre de poche', '1996', '10', 'Francais'),
(44, '', 'Un voisin etrange', 'Horreur', '1500', '', 'Dennison', 'Florian', '', '2017', '10', 'anglais'),
(46, 'uninformed', 'Harry potter', 'uninformed', '', 'uninformed', 'Rowling', 'J.K', 'uninformed', '', '25', 'uninformed');

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
  `utilisateur` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fournisseur` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `mdp`, `utilisateur`, `fournisseur`) VALUES
(1, 'Dupont', 'Eric', 'b@mail.fr', 'azerty', '', '0'),
(108, 'Alexis', 'Serbelloni', 'a@mail.fr', 'a', '', '0'),
(111, 'Delacour', 'Mathieu', 'mat@mail.fr', '$2y$10$HyZVlQ6VdXNT7rQqFFApXeHIj1SN.ZW./m2y1upJpSP/Hq9J79iGK', '', '0'),
(112, 'Chateau', 'Fort', 'chateauFort@mail.fr', '$2y$10$meeUKxxjjZrr6xhnEfUOeOG0eqltrpGKUWbV8ic4JJSsq276AiPzO', '', '0'),
(113, 'Citron', 'Pressé', 'citron@mail.fr', '$2y$10$BQ.tRCkSvDxa7fHVQudPwOfVAprX0aYbob5asSzaZlZTEgyNY2v8W', '', '0'),
(124, 'a', 'a', 'ab@mail.fr', '$2y$10$tC7XcsS2yw7uNM9ycHq6XuPck2pJia4.LAEnOtf70EYvWYw1PJAFW', '', ''),
(125, 'a', 'a', 'alexiss@mail.fr', '$2y$10$6yqVwoZVUYabjc.Wel/CbeQ5Zt8VTFRh3qP9USe6khtpAKyacTgYa', '', ''),
(126, 'alexis', 'srbl', 'c@mail.fr', '$2y$10$WhgSMkFDBOe1L66Gz/MO/eGfygbTqZx999k3vsnYJwBrg47j8tO8O', '', '');

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
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `titre` (`titre`) USING BTREE,
  ADD UNIQUE KEY `nomAuteur` (`nomAuteur`) USING BTREE,
  ADD UNIQUE KEY `prenomAuteur` (`prenomAuteur`) USING BTREE;

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
-- AUTO_INCREMENT pour la table `fornisseur`
--
ALTER TABLE `fornisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
