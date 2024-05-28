-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 06:58 AM
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
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
