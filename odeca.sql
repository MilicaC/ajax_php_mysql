-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 09:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odeca`
--

-- --------------------------------------------------------

--
-- Table structure for table `boja`
--

CREATE TABLE `boja` (
  `bojaID` int(11) NOT NULL,
  `boja` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boja`
--

INSERT INTO `boja` (`bojaID`, `boja`) VALUES
(1, 'crna'),
(2, 'sarena'),
(3, 'bela'),
(4, 'zuta'),
(5, 'plava'),
(6, 'zelena');

-- --------------------------------------------------------

--
-- Table structure for table `materijal`
--

CREATE TABLE `materijal` (
  `materijalID` int(11) NOT NULL,
  `nazivMaterijala` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materijal`
--

INSERT INTO `materijal` (`materijalID`, `nazivMaterijala`) VALUES
(1, 'Pamuk'),
(2, 'Frotir'),
(3, 'Kasmir'),
(4, 'Saten'),
(5, 'Svila');

-- --------------------------------------------------------

--
-- Table structure for table `odeca`
--

CREATE TABLE `odeca` (
  `odecaID` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bojaID` int(11) NOT NULL,
  `materijalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odeca`
--

INSERT INTO `odeca` (`odecaID`, `naziv`, `opis`, `cena`, `slika`, `bojaID`, `materijalID`) VALUES
(1, 'Plava haljina', 'Plava vecernja haljina', 320, 'plavaHaljina.jpg', 5, 1),
(2, 'Zelena haljina', 'Zelena haljina za proslave i izlazak', 270, 'zelenaHaljina.jpg', 6, 1),
(3, 'Svecana crna haljina', 'Haljina koja ide uz svaku kombinaciju cipela', 150, 'crnaHaljina.jpg', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boja`
--
ALTER TABLE `boja`
  ADD PRIMARY KEY (`bojaID`);

--
-- Indexes for table `materijal`
--
ALTER TABLE `materijal`
  ADD PRIMARY KEY (`materijalID`);

--
-- Indexes for table `odeca`
--
ALTER TABLE `odeca`
  ADD PRIMARY KEY (`odecaID`),
  ADD KEY `bojaID` (`bojaID`),
  ADD KEY `materijalID` (`materijalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boja`
--
ALTER TABLE `boja`
  MODIFY `bojaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materijal`
--
ALTER TABLE `materijal`
  MODIFY `materijalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odeca`
--
ALTER TABLE `odeca`
  MODIFY `odecaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `odeca`
--
ALTER TABLE `odeca`
  ADD CONSTRAINT `odeca_ibfk_1` FOREIGN KEY (`bojaID`) REFERENCES `boja` (`bojaID`),
  ADD CONSTRAINT `odeca_ibfk_2` FOREIGN KEY (`materijalID`) REFERENCES `materijal` (`materijalID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
