-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2025 at 04:05 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation_vol`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

DROP TABLE IF EXISTS `aeroport`;
CREATE TABLE IF NOT EXISTS `aeroport` (
  `Nom_A` varchar(20) NOT NULL,
  `Nom_V` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Nom_A`),
  KEY `Nom_V` (`Nom_V`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`Nom_A`, `Nom_V`) VALUES
('Nsimalen', 'Yaoundé'),
('Air France', 'Paris'),
('Turquish place', NULL),
('Turquish plac', NULL),
('ddd ddd', NULL),
('Doui', 'Turquie');

-- --------------------------------------------------------

--
-- Table structure for table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `Numero_A` int(11) NOT NULL AUTO_INCREMENT,
  `Constructeur` varchar(30) NOT NULL,
  `Modele` varchar(20) NOT NULL,
  `Nom_C` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Numero_A`),
  KEY `Nom_C` (`Nom_C`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`Numero_A`, `Constructeur`, `Modele`, `Nom_C`) VALUES
(1, 'Nasa', 'Boing500', 'Camerco'),
(2, 'Silicon Valley', 'Texan', 'Air France'),
(3, 'Basilic', 'Rips', 'Kenyan Airline'),
(4, 'Elite Mondiale', 'Cisco', 'Air du Sahel');

-- --------------------------------------------------------

--
-- Table structure for table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `Nom_C` varchar(50) NOT NULL,
  PRIMARY KEY (`Nom_C`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compagnie`
--

INSERT INTO `compagnie` (`Nom_C`) VALUES
('Air du Sahel'),
('Air France'),
('CamerCo'),
('Ethiopian Airline'),
('Kenyan Airline');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

DROP TABLE IF EXISTS `occupation`;
CREATE TABLE IF NOT EXISTS `occupation` (
  `Numero_V` int(11) NOT NULL,
  `Nom_PE` varchar(20) NOT NULL,
  PRIMARY KEY (`Numero_V`,`Nom_PE`),
  KEY `Nom_PE` (`Nom_PE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`Numero_V`, `Nom_PE`) VALUES
(1, 'Ange Djomo'),
(4, ''),
(10, 'Ketsia Motue Ursulla');

-- --------------------------------------------------------

--
-- Table structure for table `passager`
--

DROP TABLE IF EXISTS `passager`;
CREATE TABLE IF NOT EXISTS `passager` (
  `Nom_PA` varchar(30) NOT NULL,
  PRIMARY KEY (`Nom_PA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passager`
--

INSERT INTO `passager` (`Nom_PA`) VALUES
(''),
('Fleur Fomin'),
('Junias'),
('Ketsia Motue Ursulla'),
('Monsieu'),
('Yamine Yamine');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `Nom_PE` varchar(20) NOT NULL,
  `Fonction` varchar(30) NOT NULL,
  `Nom_C` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Nom_PE`),
  KEY `Nom_C` (`Nom_C`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`Nom_PE`, `Fonction`, `Nom_C`) VALUES
('Ketsia Motue Ursulla', 'Commercial', 'Air France'),
('Ange Djomo', 'Developper', 'Air du Sahel'),
('Junias', 'PDG', 'Air France');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Numero_V` int(11) NOT NULL,
  `Nom_PA` varchar(30) NOT NULL,
  `dateReservation` date NOT NULL,
  PRIMARY KEY (`Numero_V`,`Nom_PA`),
  KEY `Nom_PA` (`Nom_PA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Numero_V`, `Nom_PA`, `dateReservation`) VALUES
(2, 'Junias', '2025-02-16'),
(8, 'Ketsia Motue Ursulla', '2025-02-16'),
(11, 'Yamine Yamine', '2025-02-16'),
(4, 'Junias', '2025-02-16'),
(7, 'Fleur Fomin', '2025-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `Nom_V` varchar(20) NOT NULL,
  PRIMARY KEY (`Nom_V`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`Nom_V`) VALUES
('Bafoussam'),
('Egypt'),
('Ethiopie'),
('Kenya'),
('Maroc'),
('Turquie'),
('YaoundÃ©');

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `Numero_V` int(11) NOT NULL AUTO_INCREMENT,
  `Jour` date DEFAULT NULL,
  `HeureDepart` time NOT NULL,
  `HeureArrivee` time NOT NULL,
  `PlacesLibres` int(11) DEFAULT NULL,
  `Numero_A` int(11) DEFAULT NULL,
  `aeroportDepart` varchar(50) DEFAULT NULL,
  `aeroportArrive` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Numero_V`),
  KEY `Numero_A` (`Numero_A`),
  KEY `aeroportDepart` (`aeroportDepart`),
  KEY `aeroportArrive` (`aeroportArrive`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`Numero_V`, `Jour`, `HeureDepart`, `HeureArrivee`, `PlacesLibres`, `Numero_A`, `aeroportDepart`, `aeroportArrive`) VALUES
(1, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(2, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(3, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(4, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(5, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(6, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(7, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(8, '2025-02-23', '13:15:00', '14:15:00', 20, 1, 'Nsimalen', 'Air France'),
(9, '2025-02-28', '02:54:00', '04:54:00', 100, 1, 'Air France', 'Nsimalen'),
(10, '2025-02-28', '02:54:00', '04:54:00', 100, 1, 'Air France', 'Nsimalen'),
(11, '2025-02-28', '02:54:00', '04:54:00', 100, 1, 'Air France', 'Nsimalen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
