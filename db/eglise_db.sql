-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 déc. 2023 à 16:27
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
-- Base de données : `eglise_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(10) UNSIGNED NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminEmail`, `password`, `created_at`, `modified_at`) VALUES
(1, 'kiddo', 'kiddo@gmail.com', 'kiddoprodev', '2018-05-21 17:48:48', '2018-05-22 07:03:59');

-- --------------------------------------------------------

--
-- Structure de la table `appels`
--

CREATE TABLE `appels` (
  `appelID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `schoolID` int(10) NOT NULL,
  `appel` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `appels`
--

INSERT INTO `appels` (`appelID`, `studentID`, `schoolID`, `appel`, `created_at`, `modified_at`) VALUES
(548, 9, 9, ' pr', '2023-12-22 10:52:35', '2023-12-22 12:52:35'),
(549, 9, 9, ' pr', '2023-12-22 10:52:35', '2023-12-22 12:52:35'),
(550, 9, 9, ' pr', '2023-12-22 10:52:35', '2023-12-22 12:52:35'),
(574, 70, 77, ' ab', '2023-12-22 13:49:54', '2023-12-22 15:49:54'),
(576, 71, 75, ' ab', '2023-12-22 13:53:43', '2023-12-22 15:53:43'),
(577, 75, 71, ' ab', '2023-12-22 14:01:39', '2023-12-22 16:01:39'),
(580, 77, 70, ' ab', '2023-12-22 14:03:30', '2023-12-22 16:03:30');

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `appelID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `schoolID` int(10) NOT NULL,
  `appel` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`appelID`, `studentID`, `schoolID`, `appel`, `created_at`, `modified_at`) VALUES
(157, 9, 9, ' pr', '2023-12-22 10:52:35', '2023-12-22 12:52:35'),
(158, 9, 9, ' pr', '2023-12-22 10:52:35', '2023-12-22 12:52:35'),
(159, 71, 71, ' ab', '2023-12-22 12:54:28', '2023-12-22 14:54:28'),
(160, 71, 71, ' ab', '2023-12-22 12:56:53', '2023-12-22 14:56:53'),
(161, 70, 70, ' ab', '2023-12-22 13:02:43', '2023-12-22 15:02:43'),
(162, 70, 70, ' ab', '2023-12-22 13:02:50', '2023-12-22 15:02:50'),
(163, 0, 71, ' ab', '2023-12-22 13:18:00', '2023-12-22 15:18:00'),
(164, 0, 71, ' ab', '2023-12-22 13:18:02', '2023-12-22 15:18:02'),
(165, 0, 71, ' ab', '2023-12-22 13:18:03', '2023-12-22 15:18:03'),
(166, 0, 71, ' ab', '2023-12-22 13:18:04', '2023-12-22 15:18:04'),
(167, 0, 71, ' pr', '2023-12-22 13:18:09', '2023-12-22 15:18:09'),
(168, 0, 71, ' ab', '2023-12-22 13:18:14', '2023-12-22 15:18:14'),
(169, 70, 0, ' pr', '2023-12-22 13:24:18', '2023-12-22 15:24:18'),
(170, 70, 0, ' pr', '2023-12-22 13:24:25', '2023-12-22 15:24:25'),
(171, 70, 77, ' pr', '2023-12-22 13:30:32', '2023-12-22 15:30:32'),
(172, 71, 75, ' pr', '2023-12-22 13:31:29', '2023-12-22 15:31:29'),
(173, 70, 77, ' pr', '2023-12-22 13:30:32', '2023-12-22 15:30:32'),
(174, 70, 77, ' pr', '2023-12-22 13:33:08', '2023-12-22 15:33:08'),
(175, 70, 77, ' pr', '2023-12-22 13:30:32', '2023-12-22 15:30:32'),
(176, 70, 77, ' pr', '2023-12-22 13:30:32', '2023-12-22 15:30:32'),
(177, 70, 77, ' pr', '2023-12-22 13:33:08', '2023-12-22 15:33:08'),
(178, 70, 77, ' pr', '2023-12-22 13:33:08', '2023-12-22 15:33:08'),
(179, 70, 77, ' pr', '2023-12-22 13:34:00', '2023-12-22 15:34:00'),
(180, 70, 77, ' pr', '2023-12-22 13:34:00', '2023-12-22 15:34:00'),
(181, 70, 77, ' pr', '2023-12-22 13:34:00', '2023-12-22 15:34:00'),
(182, 70, 77, ' pr', '2023-12-22 13:34:00', '2023-12-22 15:34:00'),
(183, 71, 75, ' pr', '2023-12-22 13:34:33', '2023-12-22 15:34:33'),
(184, 71, 75, ' pr', '2023-12-22 13:34:33', '2023-12-22 15:34:33'),
(185, 71, 75, ' pr', '2023-12-22 13:34:33', '2023-12-22 15:34:33'),
(186, 71, 75, ' pr', '2023-12-22 13:34:33', '2023-12-22 15:34:33'),
(187, 70, 77, ' pr', '2023-12-22 13:35:40', '2023-12-22 15:35:40'),
(188, 70, 77, ' ab', '2023-12-22 13:45:15', '2023-12-22 15:45:15'),
(189, 70, 77, ' ab', '2023-12-22 13:46:01', '2023-12-22 15:46:01'),
(190, 71, 75, ' ab', '2023-12-22 13:49:43', '2023-12-22 15:49:43'),
(191, 70, 77, ' ab', '2023-12-22 13:49:54', '2023-12-22 15:49:54'),
(192, 71, 75, ' ab', '2023-12-22 13:51:48', '2023-12-22 15:51:48'),
(193, 71, 75, ' ab', '2023-12-22 13:53:43', '2023-12-22 15:53:43'),
(194, 75, 71, ' ab', '2023-12-22 14:01:39', '2023-12-22 16:01:39'),
(195, 77, 70, ' ab', '2023-12-22 14:03:21', '2023-12-22 16:03:21'),
(196, 77, 70, ' ab', '2023-12-22 14:03:26', '2023-12-22 16:03:26'),
(197, 77, 70, ' ab', '2023-12-22 14:03:30', '2023-12-22 16:03:30');

-- --------------------------------------------------------

--
-- Structure de la table `calls`
--

CREATE TABLE `calls` (
  `callID` int(10) UNSIGNED NOT NULL,
  `schoolID` int(100) NOT NULL,
  `gift` int(100) NOT NULL,
  `parole` int(100) NOT NULL,
  `visitor_seek` int(100) NOT NULL,
  `visitor_prison` int(100) NOT NULL,
  `visitor` int(100) NOT NULL,
  `week_study` int(100) NOT NULL,
  `commende` int(100) NOT NULL,
  `familly_prayer` int(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `calls`
--

INSERT INTO `calls` (`callID`, `schoolID`, `gift`, `parole`, `visitor_seek`, `visitor_prison`, `visitor`, `week_study`, `commende`, `familly_prayer`, `deleted`, `created_at`, `modified_at`) VALUES
(87, 9, 4, 4, 5, 7, 4, 4, 5, 6, 0, '2023-12-22 10:52:01', '2023-12-22 12:52:01');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `cmdID` int(10) NOT NULL,
  `schoolID` int(10) NOT NULL,
  `Nbre_Livre` int(100) NOT NULL,
  `pu` int(100) NOT NULL,
  `payer` int(100) NOT NULL,
  `date_payer` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_remb` date NOT NULL,
  `rembours` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`cmdID`, `schoolID`, `Nbre_Livre`, `pu`, `payer`, `date_payer`, `date_remb`, `rembours`) VALUES
(1, 9, 321, 42, 3, '0000-00-00 00:00:00', '0000-00-00', 1000),
(2, 9, 46513, 865, 46513, '0000-00-00 00:00:00', '0000-00-00', 0),
(3, 9, 46513, 865, 46513, '0000-00-00 00:00:00', '0000-00-00', 0),
(5, 9, 5632, 7642, 86513, '2023-12-21 08:35:27', '2023-12-21', 42953231),
(9, 67, 1700, 10, 1000, '2023-12-21 13:44:23', '2023-12-21', 1521),
(10, 9, 2, 142, 0, '2023-12-21 15:02:33', '0000-00-00', 0),
(11, 9, 20, 50, 125, '2023-12-21 15:19:05', '0000-00-00', 0),
(13, 9, 3223, 2, 3, '2023-12-21 16:03:41', '0000-00-00', 0),
(14, 70, 100, 10, 100, '2023-12-22 10:58:21', '2023-12-22', 900);

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `progamID` int(10) NOT NULL,
  `schoolID` int(10) NOT NULL,
  `chef` varchar(100) NOT NULL,
  `chef_task` varchar(100) NOT NULL,
  `chef_vice` varchar(100) NOT NULL,
  `chef_vice_task` varchar(200) NOT NULL,
  `secretaire` varchar(100) NOT NULL,
  `secret_task` varchar(100) NOT NULL,
  `secret_vice` varchar(100) NOT NULL,
  `secret_vice_task` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `person_task` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`progamID`, `schoolID`, `chef`, `chef_task`, `chef_vice`, `chef_vice_task`, `secretaire`, `secret_task`, `secret_vice`, `secret_vice_task`, `person`, `person_task`, `date`, `deleted`, `created_at`, `modified_at`) VALUES
(13, 2, 'dfsd', 'rt', 'wr', 'gf', 'd', 'asa', 'd', 'ds', 'v', 'gf', '2023-12-24', 0, '2023-12-11 10:01:18', '2023-12-11 12:01:18'),
(14, 2, 'dfsd', 'sasa', 's', 'saa', 'v', 'asa', 'd', 'ds', 'c', 'gf', '2023-12-23', 0, '2023-12-11 10:03:44', '2023-12-11 12:03:44'),
(15, 1, 'dfsd', 'sasa', 's', 'saa', 'v', 'asa', 'd', 'ds', 'c', 'gf', '2023-12-16', 0, '2023-12-11 10:04:08', '2023-12-11 12:04:08'),
(16, 2, 'dfsd', 'sasa', 's', 'saa', 'v', 'asa', 'd', 'ds', 'c', 'gf', '2023-12-30', 0, '2023-12-12 15:35:22', '2023-12-12 17:35:22'),
(17, 62, 'dfsd', 'sasa', 'd', 'dg', 'v', 'asa', 'ss', 'ds', 'c', 'sd', '2023-12-23', 0, '2023-12-21 16:16:15', '2023-12-21 18:16:15');

-- --------------------------------------------------------

--
-- Structure de la table `schools`
--

CREATE TABLE `schools` (
  `schoolID` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `chef` varchar(100) NOT NULL,
  `secretaire` varchar(100) NOT NULL,
  `telchef` int(8) NOT NULL,
  `telsecret` int(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `schools`
--

INSERT INTO `schools` (`schoolID`, `school_name`, `chef`, `secretaire`, `telchef`, `telsecret`, `deleted`, `created_at`, `modified_at`) VALUES
(70, 'Mbuye', 'keza', 'ndayi keza', 8651320, 8964531, 0, '2023-12-22 10:54:30', '2023-12-22 12:54:30'),
(71, 'GIFURWE', 'keza', 'ndayi keza', 456523, 6532, 0, '2023-12-22 10:54:55', '2023-12-22 12:54:55');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `studentID` int(10) UNSIGNED NOT NULL,
  `schoolID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` text NOT NULL,
  `commune` varchar(200) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `street_number` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.jpg',
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`studentID`, `schoolID`, `name`, `surname`, `date_naissance`, `telephone`, `commune`, `quarter`, `street`, `street_number`, `photo`, `deleted`, `created_at`, `modified_at`) VALUES
(75, 71, 'vcb', 'cghvnhb', '2000-02-12', '96 95 84 85', 'xcv@gmail.com', 'kloop', 'cvbndfghj', 'asdfgh', 'default.jpg', 0, '2023-12-22 10:56:20', '2023-12-22 12:56:20'),
(77, 70, 'vcb', 'cghvnhb', '0000-00-00', '96 95 84 85', 'xcv@gmail.com', 'kloop', 'cvbndfghj', 'asdfgh', 'default.jpg', 0, '2023-12-22 13:02:26', '2023-12-22 15:02:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `schoolID` int(10) UNSIGNED NOT NULL,
  `us_name` varchar(100) NOT NULL,
  `us_surname` varchar(100) NOT NULL,
  `us_phone` int(10) NOT NULL,
  `us_email` varchar(200) DEFAULT NULL,
  `us_password` varchar(100) NOT NULL,
  `born_day` varchar(100) NOT NULL,
  `born_month` varchar(100) NOT NULL,
  `born_year` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `schoolID`, `us_name`, `us_surname`, `us_phone`, `us_email`, `us_password`, `born_day`, `born_month`, `born_year`, `deleted`, `created_at`, `modified_at`) VALUES
(2, 2, 'MANIRAKIZA', 'Didace', 132, 'kiddo@gmail.com', 'kiddoprodev', '1', '1', '2023', 0, '2023-10-14 00:45:13', '2023-10-14 02:45:13'),
(5, 1, 'Kirogodye', 'Cony', 65390929, 'help@inkinolive.com', 'inkino22', '1', '1', '2023', 0, '2023-10-18 20:01:32', '2023-10-18 22:01:32'),
(7, 10, 'divin', 'dddd', 652535, 'divin@gmail.com', 'divin', '17', '4', '2023', 0, '2023-12-11 14:16:39', '2023-12-11 16:16:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Index pour la table `appels`
--
ALTER TABLE `appels`
  ADD PRIMARY KEY (`appelID`);

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`appelID`);

--
-- Index pour la table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`callID`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`cmdID`);

--
-- Index pour la table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`progamID`);

--
-- Index pour la table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolID`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `appels`
--
ALTER TABLE `appels`
  MODIFY `appelID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `appelID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT pour la table `calls`
--
ALTER TABLE `calls`
  MODIFY `callID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `cmdID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `progamID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
