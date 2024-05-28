-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 06:59 AM
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
-- Database: `mercatinousato`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `NomeCategoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID`, `NomeCategoria`) VALUES
(3, 'Elettronica'),
(2, 'Oggetti per la casa'),
(4, 'Sport'),
(1, 'Vestiti');

-- --------------------------------------------------------

--
-- Table structure for table `oggetto`
--

CREATE TABLE `oggetto` (
  `IDogg` int(11) NOT NULL,
  `NomeOggetto` varchar(50) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL,
  `IdUtente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oggetto`
--

INSERT INTO `oggetto` (`IDogg`, `NomeOggetto`, `Foto`, `Descrizione`, `IDCategoria`, `IdUtente`) VALUES
(9, 'Nike AF1', 'images/scarpe.jpeg', 'Nike Air Force 1 Rosse e Bianche', 2, 2),
(10, 'maglia nike', 'images/maglia.jpeg', 'maglietta bianca nike', 2, 2),
(11, 'Giacca in pelle', 'images/giacca.jpg', 'Giacca x moto Dainese (vera pelle) usata', 2, 11),
(12, 'Cappellino Gucci', 'images/cappellino.jpg', 'Cappellino bianco Gucci', 1, 12),
(14, 'pantaloni', 'images/pantaloni.jpeg', 'pantaloni levis con fantasia', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proposta`
--

CREATE TABLE `proposta` (
  `ID` int(11) NOT NULL,
  `Cifra` decimal(10,2) NOT NULL,
  `DataOra` datetime DEFAULT NULL,
  `Stato` tinyint(1) DEFAULT NULL,
  `IdOfferente` int(11) DEFAULT NULL,
  `IdOggetto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposta`
--

INSERT INTO `proposta` (`ID`, `Cifra`, `DataOra`, `Stato`, `IdOfferente`, `IdOggetto`) VALUES
(1, 3.00, '2024-05-27 17:03:19', 0, 12, 12),
(2, 78789.00, '2024-05-27 17:04:30', 0, 11, 11),
(3, 99.00, '2024-05-27 17:26:29', 0, 11, 11),
(4, 60.00, '2024-05-27 17:53:21', 0, 11, 11),
(5, 80.00, '2024-05-27 18:19:40', 0, 12, 12),
(6, 9.00, '2024-05-27 18:31:24', 0, 11, 11),
(7, 9.00, '2024-05-27 18:31:24', 0, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Eta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`ID`, `Nome`, `Cognome`, `Email`, `Password`, `Eta`) VALUES
(2, 'Giovanni', 'Mosca', 'giovamoscardini@gmail.com', 'edf86c8e86461f782f02ddfe965b28a1e97dbfaf3245a76088896793793bc77a', 15),
(3, 'PierGiorgio', 'AAAA', 'FA@gmai.com', '81402b36e3ba4295fbab5d2e7b38d37cc5726f8322bbd37e765c4fa2865bcabd', 15),
(4, 'Nonna', 'Gianna', 'nonna@gmail.com', 'ee26f600e3b851520a80c1bc3e2c8d4d6f270a62bff36f873bd308193c2d97a9', 97),
(5, 'PierGiorgio', 'fggft', 'giovamosc@gmail.com', 'a2242ead55c94c3deb7cf2340bfef9d5bcaca22dfe66e646745ee4371c633fc8', 67),
(10, 'PierGiorgio', 'Gianni', 'pier@gmail.com', '2d807432caec5f3e571cc555c32fe0154cc1d0e64c9345dab04c20bf915c9a61', 12),
(11, 'Serena', 'Latini', 'slatini66@gmail.com', '0050027a54e8a54761e23fe832783037583625907b6b2394e0fffb07b9bd7d4f', 35),
(12, 'Gilberto', 'Nana', 'GilbertNana@a.a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NomeCategoria` (`NomeCategoria`);

--
-- Indexes for table `oggetto`
--
ALTER TABLE `oggetto`
  ADD PRIMARY KEY (`IDogg`),
  ADD KEY `IDCategoria` (`IDCategoria`),
  ADD KEY `IdUtente` (`IdUtente`);

--
-- Indexes for table `proposta`
--
ALTER TABLE `proposta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IdOfferente` (`IdOfferente`),
  ADD KEY `IdOggetto` (`IdOggetto`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oggetto`
--
ALTER TABLE `oggetto`
  MODIFY `IDogg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `proposta`
--
ALTER TABLE `proposta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oggetto`
--
ALTER TABLE `oggetto`
  ADD CONSTRAINT `oggetto_ibfk_1` FOREIGN KEY (`IDCategoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oggetto_ibfk_2` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposta`
--
ALTER TABLE `proposta`
  ADD CONSTRAINT `proposta_ibfk_1` FOREIGN KEY (`IdOfferente`) REFERENCES `utente` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposta_ibfk_2` FOREIGN KEY (`IdOggetto`) REFERENCES `oggetto` (`IDogg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
