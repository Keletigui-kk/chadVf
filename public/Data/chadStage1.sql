-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- HÃ´te : 127.0.0.1
-- GÃ©nÃ©rÃ© le : Dim 07 fÃ©v. 2021 Ã  01:48
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es : `chadsatge1`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- DÃ©chargement des donnÃ©es de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'ComptabilitÃ©'),
(2, 'Culture');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- DÃ©chargement des donnÃ©es de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210118123705', '2021-01-18 13:37:15', 79),
('DoctrineMigrations\\Version20210118125546', '2021-01-18 13:56:32', 71),
('DoctrineMigrations\\Version20210118143317', '2021-01-18 15:33:25', 157),
('DoctrineMigrations\\Version20210119100020', '2021-01-19 11:00:26', 123),
('DoctrineMigrations\\Version20210119101113', '2021-01-19 11:11:27', 247),
('DoctrineMigrations\\Version20210120091205', '2021-01-20 10:12:13', 1021),
('DoctrineMigrations\\Version20210120094306', '2021-01-20 10:43:11', 63),
('DoctrineMigrations\\Version20210120104135', '2021-01-20 11:41:49', 58),
('DoctrineMigrations\\Version20210120104454', '2021-01-20 11:45:01', 52),
('DoctrineMigrations\\Version20210120150902', '2021-01-20 16:09:16', 607),
('DoctrineMigrations\\Version20210120151334', '2021-01-20 16:13:43', 383),
('DoctrineMigrations\\Version20210120155952', '2021-01-20 17:00:02', 287),
('DoctrineMigrations\\Version20210120161819', '2021-01-20 17:18:25', 61),
('DoctrineMigrations\\Version20210121111747', '2021-01-21 12:18:13', 1043),
('DoctrineMigrations\\Version20210121121410', '2021-01-21 13:14:17', 226),
('DoctrineMigrations\\Version20210121125812', '2021-01-21 13:58:16', 219),
('DoctrineMigrations\\Version20210121142639', '2021-01-21 15:26:48', 186),
('DoctrineMigrations\\Version20210121142935', '2021-01-21 15:29:42', 70),
('DoctrineMigrations\\Version20210121172157', '2021-01-21 18:22:05', 72),
('DoctrineMigrations\\Version20210121173406', '2021-01-21 18:34:11', 89),
('DoctrineMigrations\\Version20210121174654', '2021-01-21 18:47:03', 69),
('DoctrineMigrations\\Version20210121174851', '2021-01-21 18:48:57', 159),
('DoctrineMigrations\\Version20210125211843', '2021-01-25 22:18:56', 369),
('DoctrineMigrations\\Version20210125233734', '2021-01-26 00:37:53', 88),
('DoctrineMigrations\\Version20210127170737', '2021-01-27 18:07:55', 113),
('DoctrineMigrations\\Version20210129151137', '2021-01-29 16:12:01', 136),
('DoctrineMigrations\\Version20210129151604', '2021-01-29 16:16:29', 68),
('DoctrineMigrations\\Version20210129151649', '2021-01-29 16:16:55', 65),
('DoctrineMigrations\\Version20210203111057', '2021-02-03 12:11:08', 180),
('DoctrineMigrations\\Version20210205215453', '2021-02-05 22:56:52', 295);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `lieudenaissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieudetravail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcoursprof` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcoursscolaire` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `is_activate` tinyint(1) NOT NULL,
  `codepostale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- DÃ©chargement des donnÃ©es de la table `infos`
--

INSERT INTO `infos` (`id`, `nom`, `prenom`, `birthday`, `lieudenaissance`, `adresse`, `ville`, `pays`, `tel`, `metier`, `lieudetravail`, `parcoursprof`, `parcoursscolaire`, `nationalite`, `civilite`, `users_id`, `is_activate`, `codepostale`, `category_id`, `image_name`, `updated_at`) VALUES
(12, 'Keita', 'Keletigui', '2002-01-01', 'Paris', '1 rue de Paris', 'Dijon', 'FRANCE', '0902340749', 'DÃ©veloppeur', 'Paris', 'bla bla', 'bla bla', 'FranÃ§ais', 'MariÃ©(e)', 21, 1, '21000', NULL, '601bc118ae363972760298.png', '2021-02-04 10:40:40'),
(14, 'Diallo', 'Samba', '1967-01-01', 'Paris', 'rue', 'Paris', 'FRANCE', '0902340749', 'DÃ©veloppeur', 'Paris', 'BLA BLA', 'BLA BLA', 'Americain', 'MariÃ©(e)', 23, 1, '77190', NULL, '601dfa3ab36ea265783060.png', '2021-02-06 03:08:58');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `registered_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- DÃ©chargement des donnÃ©es de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `is_verified`, `registered_at`) VALUES
(21, 'test@demo.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$V0pNZkZRdjAxUXpzcnBGWQ$SLL0LjZqqf7hYipT+gJ/tXmi1u4apH6Oa7YFLU1Ujow', 1, '2021-02-03 12:15:40'),
(23, 'test1@demo.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Z01NTzU1UWJDTE5MekxyTQ$ytYieQY7fHvA6AHaRM2bh+FZrR1HbaRuz++1x98Eb0U', 1, '2021-02-06 03:07:42');

--
-- Index pour les tables dÃ©chargÃ©es
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EECA826D67B3B43D` (`users_id`),
  ADD KEY `IDX_EECA826D12469DE2` (`category_id`);
ALTER TABLE `infos` ADD FULLTEXT KEY `IDX_EECA826D6C6E55B5A625945BAC199498` (`nom`,`prenom`,`image_name`);

--
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables dÃ©chargÃ©es
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables dÃ©chargÃ©es
--

--
-- Contraintes pour la table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `FK_EECA826D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_EECA826D67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
