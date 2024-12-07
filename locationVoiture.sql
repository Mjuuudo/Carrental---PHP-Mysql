-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2024 at 01:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locationVoiture`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `Id_admin` int(10) UNSIGNED NOT NULL,
  `nom_adm` varchar(20) NOT NULL,
  `prenom_adm` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `num_tele` varchar(20) NOT NULL,
  `password_adm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `DateInscription` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passsword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`Id`, `Nom`, `Prenom`, `telephone`, `Mail`, `DateInscription`, `passsword`) VALUES
(1, 'sattar', 'sara', 608070905, 'sara@gmail.com', '2024-12-03 12:15:09', '12345678'),
(2, 'hajar', 'sattar', 987654323, 'Sara.Sattar@emsi-edu.ma', '2024-12-03 12:16:05', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `Paiements`
--

CREATE TABLE `Paiements` (
  `Id_paiement` int(10) UNSIGNED NOT NULL,
  `id_res` int(10) UNSIGNED NOT NULL,
  `montant` decimal(10,0) UNSIGNED NOT NULL,
  `date_paiement` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `methode_paiement` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE `Reservations` (
  `Id_res` int(10) UNSIGNED NOT NULL,
  `id_utilisateur` int(10) UNSIGNED NOT NULL,
  `id_voiture` int(10) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `Id_voi` int(10) UNSIGNED NOT NULL,
  `marque` varchar(30) NOT NULL,
  `modele` varchar(30) NOT NULL,
  `Annee` int(11) NOT NULL,
  `prix_par_jour` decimal(10,0) NOT NULL,
  `disponibilitee` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`Id_admin`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Indexes for table `Paiements`
--
ALTER TABLE `Paiements`
  ADD PRIMARY KEY (`Id_paiement`),
  ADD KEY `id_res` (`id_res`);

--
-- Indexes for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`Id_res`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_voiture` (`id_voiture`);

--
-- Indexes for table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`Id_voi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `Id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Paiements`
--
ALTER TABLE `Paiements`
  MODIFY `Id_paiement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `Id_res` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `Id_voi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Paiements`
--
ALTER TABLE `Paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `Reservations` (`Id_res`) ON DELETE CASCADE;

--
-- Constraints for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Clients` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_voiture`) REFERENCES `voitures` (`Id_voi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
