-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 déc. 2023 à 16:01
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `bingo_grid`
--

CREATE TABLE `bingo_grid` (
  `id` int(11) NOT NULL,
  `gridname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bingo_grid`
--

INSERT INTO `bingo_grid` (`id`, `gridname`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `cell`
--

CREATE TABLE `cell` (
  `id` int(11) NOT NULL,
  `coord_x` int(11) NOT NULL,
  `coord_y` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `bingo_grid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cell`
--

INSERT INTO `cell` (`id`, `coord_x`, `coord_y`, `content`, `bingo_grid_id`) VALUES
(53, 1, 1, 'Valeur_Cellule_1_1', 1),
(54, 2, 1, 'Valeur_Cellule_2_1', 1),
(55, 3, 1, 'Valeur_Cellule_3_1', 1),
(56, 4, 1, 'Valeur_Cellule_4_1', 1),
(57, 5, 1, 'Valeur_Cellule_5_1', 1),
(58, 1, 2, 'Valeur_Cellule_1_2', 1),
(59, 2, 2, 'Valeur_Cellule_2_2', 1),
(60, 3, 2, 'Valeur_Cellule_3_2', 1),
(61, 4, 2, 'Valeur_Cellule_4_2', 1),
(62, 5, 2, 'Valeur_Cellule_5_2', 1),
(63, 1, 3, 'Valeur_Cellule_1_3', 1),
(64, 2, 3, 'Valeur_Cellule_2_3', 1),
(65, 3, 3, 'Valeur_Cellule_3_3', 1),
(66, 4, 3, 'Valeur_Cellule_4_3', 1),
(67, 5, 3, 'Valeur_Cellule_5_3', 1),
(68, 1, 4, 'Valeur_Cellule_1_4', 1),
(69, 2, 4, 'Valeur_Cellule_2_4', 1),
(70, 3, 4, 'Valeur_Cellule_3_4', 1),
(71, 4, 4, 'Valeur_Cellule_4_4', 1),
(72, 5, 4, 'Valeur_Cellule_5_4', 1),
(73, 1, 5, 'Valeur_Cellule_1_5', 1),
(74, 2, 5, 'Valeur_Cellule_2_5', 1),
(75, 3, 5, 'Valeur_Cellule_3_5', 1),
(76, 4, 5, 'Valeur_Cellule_4_5', 1),
(77, 5, 5, 'Valeur_Cellule_5_5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231124133157', '2023-11-24 14:32:14', 79),
('DoctrineMigrations\\Version20231124134456', '2023-11-24 14:45:13', 12),
('DoctrineMigrations\\Version20231124141042', '2023-11-24 15:10:46', 406),
('DoctrineMigrations\\Version20231201095354', '2023-12-01 10:54:35', 200),
('DoctrineMigrations\\Version20231203183934', '2023-12-03 19:40:07', 320),
('DoctrineMigrations\\Version20231203184508', '2023-12-03 19:45:15', 40),
('DoctrineMigrations\\Version20231205203410', '2023-12-05 21:34:23', 51),
('DoctrineMigrations\\Version20231205233237', '2023-12-06 00:32:56', 53),
('DoctrineMigrations\\Version20231205235034', '2023-12-06 00:50:47', 77),
('DoctrineMigrations\\Version20231206002511', '2023-12-06 01:25:17', 82),
('DoctrineMigrations\\Version20231206223216', '2023-12-06 23:32:22', 69),
('DoctrineMigrations\\Version20231206224933', '2023-12-06 23:49:48', 273),
('DoctrineMigrations\\Version20231207092141', '2023-12-07 10:21:58', 63),
('DoctrineMigrations\\Version20231207123157', '2023-12-07 13:32:13', 44);

-- --------------------------------------------------------

--
-- Structure de la table `make_access`
--

CREATE TABLE `make_access` (
  `id` int(11) NOT NULL,
  `id_grid_id` int(11) NOT NULL,
  `iduser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `make_access`
--

INSERT INTO `make_access` (`id`, `id_grid_id`, `iduser_id`) VALUES
(1, 1, 21);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `read_access`
--

CREATE TABLE `read_access` (
  `id` int(11) NOT NULL,
  `id_grid_id` int(11) NOT NULL,
  `id_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `read_access`
--

INSERT INTO `read_access` (`id`, `id_grid_id`, `id_user_id`) VALUES
(1, 1, 21);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `is_actif` tinyint(1) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `roles`, `is_actif`, `profile_picture`) VALUES
(20, '$2y$13$ON5JnfHofa70wOY7oDIiNeQVO4N8DHiV9/e.Qg.AZeZ7Gaz69ovYu', 'admin@gmail.com', '[\"ROLE_ADMIN\",\"ROLE_MOD\"]', 1, 'e87c4098-2780-4986-b4f7-cd8541c0312e-6577217f9b47f.jpg'),
(21, '$2y$13$oJOmCw4CnNAp4ZftzW9nC.IK0e.b3KT3ffo6kU/0NQT/y2xl3SV/2', 'user@innactif', '[]', 0, 'e87c4098-2780-4986-b4f7-cd8541c0312e-657721a3096d0.jpg'),
(22, '$2y$13$oOC6blYlBUjZdJK/Vjx0/uwPua236wMYXGfY0zVbaf8FsHboENG5G', 'user@actif.fr', '[]', 1, 'e87c4098-2780-4986-b4f7-cd8541c0312e-657721f2725b1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bingo_grid`
--
ALTER TABLE `bingo_grid`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cell`
--
ALTER TABLE `cell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CB8787E25BF8C5CD` (`bingo_grid_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `make_access`
--
ALTER TABLE `make_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EAE9A792F26CC1E5` (`id_grid_id`),
  ADD KEY `IDX_EAE9A792786A81FB` (`iduser_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `read_access`
--
ALTER TABLE `read_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8788BDE5F26CC1E5` (`id_grid_id`),
  ADD KEY `IDX_8788BDE579F37AE5` (`id_user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bingo_grid`
--
ALTER TABLE `bingo_grid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cell`
--
ALTER TABLE `cell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `make_access`
--
ALTER TABLE `make_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `read_access`
--
ALTER TABLE `read_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cell`
--
ALTER TABLE `cell`
  ADD CONSTRAINT `FK_CB8787E25BF8C5CD` FOREIGN KEY (`bingo_grid_id`) REFERENCES `bingo_grid` (`id`);

--
-- Contraintes pour la table `make_access`
--
ALTER TABLE `make_access`
  ADD CONSTRAINT `FK_EAE9A792786A81FB` FOREIGN KEY (`iduser_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_EAE9A792F26CC1E5` FOREIGN KEY (`id_grid_id`) REFERENCES `bingo_grid` (`id`);

--
-- Contraintes pour la table `read_access`
--
ALTER TABLE `read_access`
  ADD CONSTRAINT `FK_8788BDE579F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_8788BDE5F26CC1E5` FOREIGN KEY (`id_grid_id`) REFERENCES `bingo_grid` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
