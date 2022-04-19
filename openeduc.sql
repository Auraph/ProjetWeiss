-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 avr. 2022 à 14:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `openeduc`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `numero`, `rue`, `commune`, `cp`) VALUES
(1, 'sasas', 'sa', 'as', 's'),
(2, 'sasas', 'sa', 'as', 's'),
(3, 'd', 'ad', 'ad', 'ad'),
(4, 'd', 'ad', 'ad', 'ad'),
(5, '4', 'frgre', 'gregrg', 'greg'),
(6, '45', 'rue scholet', 'Strasbourg', '67000'),
(7, '45', 'rue scholet', 'Strasbourg', '67000'),
(8, 'ererere', 'rere', 'rerer', 'rerere'),
(9, 'ererere', 'rere', 'rerer', 'rerere'),
(10, 'ererere', 'rere', 'rerer', 'rerere'),
(11, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(12, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(13, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(14, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(15, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(16, 'uhigig', 'uigik', 'iuuki', 'iubkiu'),
(17, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(18, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(19, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(20, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(21, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(22, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(23, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(24, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(25, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(26, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(27, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(28, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(29, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(30, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv'),
(31, 'jhhjvhjv', 'jvhj', 'jhhjvhjvjh', 'hv');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `idEcole` int(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `effectifs` int(20) NOT NULL,
  `niveau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `idEcole`, `nom`, `effectifs`, `niveau`) VALUES
(1, 2, 'ad', 0, 'ad'),
(2, 2, 'fzfzf', 0, 'effzfz'),
(3, 2, 'zfzf', 0, 'zfzfz'),
(4, 3, 'vreilitbfvz', 0, 'kuymmbza'),
(5, 3, 'zettydb', 0, 'rgertkyd'),
(6, 4, 'erere', 0, 'rerer'),
(7, 5, 'erere', 0, 'rerer'),
(8, 6, 'erere', 0, 'rerer'),
(9, 7, 'lbul', 0, 'lbkjm'),
(10, 8, 'lbul', 0, 'lbkjm'),
(11, 9, 'lbul', 0, 'lbkjm'),
(12, 10, 'lbul', 0, 'lbkjm'),
(13, 11, 'lbul', 0, 'lbkjm'),
(14, 12, 'lbul', 0, 'lbkjm'),
(15, 13, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(16, 14, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(17, 15, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(18, 16, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(19, 17, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(20, 18, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(21, 19, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(22, 20, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(23, 21, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(24, 22, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(25, 23, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(26, 24, 'uvuivuiviuvkiu', 0, 'uivuivuvivui'),
(27, 25, 'uvuivuiviuvkiu', 0, 'uivuivuvivui');

-- --------------------------------------------------------

--
-- Structure de la table `correspondant`
--

CREATE TABLE `correspondant` (
  `id` int(11) NOT NULL,
  `idEcole` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `entite` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `genre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `correspondant`
--

INSERT INTO `correspondant` (`id`, `idEcole`, `nom`, `prenom`, `entite`, `mail`, `telephone`, `fonction`, `genre`) VALUES
(1, 4, 'rerer', 'erere', 'APEA', 'rere', 'rere', 'rere', 'M.'),
(2, 4, 'rere', 'rerere', 'Mairie', 'rerer', 'erere', 'Maire', 'M.'),
(3, 5, 'rerer', 'erere', 'APEA', 'rere', 'rere', 'rere', 'M.'),
(4, 5, 'rere', 'rerere', 'Mairie', 'rerer', 'erere', 'Maire', 'M.'),
(5, 6, 'rerer', 'erere', 'APEA', 'rere', 'rere', 'rere', 'M.'),
(6, 6, 'rere', 'rerere', 'Mairie', 'rerer', 'erere', 'Maire', 'M.'),
(7, 7, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(8, 7, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(9, 8, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(10, 8, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(11, 9, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(12, 9, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(13, 10, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(14, 10, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(15, 11, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(16, 11, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(17, 12, 'ui', 'uvi', 'APEA', 'uivvilug', 'gguil', 'gli', 'M.'),
(18, 12, 'i', 'giulvivljb', 'Mairie', 'lbjlbjlbui', 'vliuiuv', 'Maire', 'M.'),
(19, 13, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(20, 13, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(21, 14, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(22, 14, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(23, 15, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(24, 15, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(25, 16, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(26, 16, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(27, 17, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(28, 17, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(29, 18, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(30, 18, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(31, 19, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(32, 19, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(33, 20, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(34, 20, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(35, 21, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(36, 21, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(37, 22, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(38, 22, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(39, 23, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(40, 23, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(41, 24, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(42, 24, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.'),
(43, 25, 'jjhjvhjvl', 'lhv', 'APEA', 'lvvivuiu', 'uivuvuiviuv', 'uivuivivuiv', 'M.'),
(44, 25, 'ivuivuivuvi', 'iviuvuiviviuviuv', 'Mairie', 'iuuvuiuviviubuiv', 'aiuuiviuvuviuv', 'Maire', 'M.');

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `idAdresse` int(11) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `typeEcole` varchar(50) NOT NULL,
  `dateMiseAJour` varchar(20) NOT NULL,
  `anneeScolaire` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id`, `nom`, `identifiant`, `idAdresse`, `telephone`, `mail`, `typeEcole`, `dateMiseAJour`, `anneeScolaire`) VALUES
(1, 'adad', 'd', 3, 'ad', 'ad', 'Maternelle', '05-04-2022', 'ad'),
(2, 'adad', 'd', 4, 'ad', 'ad', 'Maternelle', '05-04-2022', 'ad'),
(3, 'Martine', '8484864', 5, 'rhtuugbtte', 'regregre', 'Collège', '05-04-2022', 'gergrg'),
(4, 'sasasa', 'rerer', 8, 'rerer', 'erere', 'Maternelle', '07-04-2022', 'erer'),
(5, 'sasasa', 'rerer', 9, 'rerer', 'erere', 'Maternelle', '07-04-2022', 'erer'),
(6, 'sasasa', 'rerer', 10, 'rerer', 'erere', 'Maternelle', '07-04-2022', 'erer'),
(7, ' dzefefe', 'fzefezf', 11, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(8, ' dzefefe', 'fzefezf', 12, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(9, ' dzefefe', 'fzefezf', 13, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(10, ' dzefefe', 'fzefezf', 14, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(11, ' dzefefe', 'fzefezf', 15, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(12, ' dzefefe', 'fzefezf', 16, 'li', 'hui', 'Maternelle', '12-04-2022', 'bugimhi'),
(13, 'fesf', 'hvjhvhj', 17, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(14, 'fesf', 'hvjhvhj', 18, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(15, 'fesf', 'hvjhvhj', 19, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(16, 'fesf', 'hvjhvhj', 20, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(17, 'fesf', 'hvjhvhj', 21, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(18, 'fesf', 'hvjhvhj', 22, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(19, 'fesf', 'hvjhvhj', 23, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(20, 'fesf', 'hvjhvhj', 24, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(21, 'fesf', 'hvjhvhj', 25, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(22, 'fesf', 'hvjhvhj', 26, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(23, 'fesf', 'hvjhvhj', 29, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(24, 'fesf', 'hvjhvhj', 30, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj'),
(25, 'fesf', 'hvjhvhj', 31, 'hjjvjv', 'vhhjvjhvjh', 'Maternelle', '12-04-2022', 'hjvhhjvhjvhj');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `droit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `identifiant`, `mdp`, `droit`) VALUES
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 1),
(3, 'asa', 'baa7a52965b99778f38ef37f235e9053', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `correspondant`
--
ALTER TABLE `correspondant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `correspondant`
--
ALTER TABLE `correspondant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
