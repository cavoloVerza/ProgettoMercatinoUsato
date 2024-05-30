-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2024 alle 01:39
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

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
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `NomeCategoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`ID`, `NomeCategoria`) VALUES
(3, 'Elettronica'),
(2, 'Oggetti per la casa'),
(4, 'Sport'),
(1, 'Vestiti');

-- --------------------------------------------------------

--
-- Struttura della tabella `oggetto`
--

CREATE TABLE `oggetto` (
  `IDogg` int(11) NOT NULL,
  `NomeOggetto` varchar(50) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL,
  `IdUtente` int(11) DEFAULT NULL,
  `StatoOggetto` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `oggetto`
--

INSERT INTO `oggetto` (`IDogg`, `NomeOggetto`, `Foto`, `Descrizione`, `IDCategoria`, `IdUtente`, `StatoOggetto`) VALUES
(9, 'Nike AF1', 'images/scarpe.jpeg', 'Nike Air Force 1 Rosse e Bianche', 2, 4, 0),
(10, 'maglia nike', 'images/maglia.jpeg', 'maglietta bianca nike', 2, 4, 1),
(11, 'Giacca in pelle', 'images/giacca.jpg', 'Giacca x moto Dainese (vera pelle) usata', 2, 11, 0),
(12, 'Cappellino Gucci', 'images/cappellino.jpg', 'Cappellino bianco Gucci', 1, 12, 0),
(14, 'pantaloni', 'images/pantaloni.jpeg', 'pantaloni levis con fantasia', 2, 4, 0),
(19, 'dinosauro', 'images/download.jpeg', 'dinosauro', 2, 2, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `proposta`
--

CREATE TABLE `proposta` (
  `IDpro` int(11) NOT NULL,
  `Cifra` decimal(10,2) NOT NULL,
  `DataOra` datetime DEFAULT NULL,
  `StatoOfferta` tinyint(1) DEFAULT NULL,
  `IdOfferente` int(11) DEFAULT NULL,
  `IdOggetto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `proposta`
--

INSERT INTO `proposta` (`IDpro`, `Cifra`, `DataOra`, `StatoOfferta`, `IdOfferente`, `IdOggetto`) VALUES
(12, 10.00, '2024-05-30 23:15:24', 2, 2, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
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
-- Dump dei dati per la tabella `utente`
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
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NomeCategoria` (`NomeCategoria`);

--
-- Indici per le tabelle `oggetto`
--
ALTER TABLE `oggetto`
  ADD PRIMARY KEY (`IDogg`),
  ADD KEY `IDCategoria` (`IDCategoria`),
  ADD KEY `IdUtente` (`IdUtente`);

--
-- Indici per le tabelle `proposta`
--
ALTER TABLE `proposta`
  ADD PRIMARY KEY (`IDpro`),
  ADD KEY `IdOfferente` (`IdOfferente`),
  ADD KEY `IdOggetto` (`IdOggetto`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `oggetto`
--
ALTER TABLE `oggetto`
  MODIFY `IDogg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `proposta`
--
ALTER TABLE `proposta`
  MODIFY `IDpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `oggetto`
--
ALTER TABLE `oggetto`
  ADD CONSTRAINT `oggetto_ibfk_1` FOREIGN KEY (`IDCategoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oggetto_ibfk_2` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `proposta`
--
ALTER TABLE `proposta`
  ADD CONSTRAINT `proposta_ibfk_1` FOREIGN KEY (`IdOfferente`) REFERENCES `utente` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposta_ibfk_2` FOREIGN KEY (`IdOggetto`) REFERENCES `oggetto` (`IDogg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
