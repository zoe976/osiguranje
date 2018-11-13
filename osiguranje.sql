-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 08:35 PM
-- Server version: 5.7.14
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osiguranje`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `telefon` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datum_rodjenja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `telefon`, `email`, `datum_rodjenja`) VALUES
(52, 'Petar', 'Petrovic', '324423', 'petar@gmail.com', '1978-11-02'),
(53, 'Jovana', 'Markovic', '21212', 'jovana@ejf.dsfds', '1998-02-01'),
(54, 'Marko', 'Mitic', NULL, 'marko@gmail.com', '2007-03-31'),
(55, 'Nikola', 'Mikolic', '55465363', 'nikola@gmail.com', '1976-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici_polise`
--

CREATE TABLE `korisnici_polise` (
  `id` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_polisa` int(11) NOT NULL,
  `nosilac` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici_polise`
--

INSERT INTO `korisnici_polise` (`id`, `id_korisnik`, `id_polisa`, `nosilac`) VALUES
(42, 52, 57, 1),
(43, 53, 58, 1),
(44, 54, 58, 0),
(45, 55, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `polise`
--

CREATE TABLE `polise` (
  `id` int(11) NOT NULL,
  `vrsta` int(11) DEFAULT NULL,
  `pocetak_putovanja` date DEFAULT NULL,
  `kraj_putovanja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polise`
--

INSERT INTO `polise` (`id`, `vrsta`, `pocetak_putovanja`, `kraj_putovanja`) VALUES
(57, 1, '2018-11-15', '2018-11-22'),
(58, 1, '2018-11-15', '2018-11-22'),
(59, 0, '2018-11-14', '2018-11-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici_polise`
--
ALTER TABLE `korisnici_polise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_polisa` (`id_polisa`);

--
-- Indexes for table `polise`
--
ALTER TABLE `polise`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `korisnici_polise`
--
ALTER TABLE `korisnici_polise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `polise`
--
ALTER TABLE `polise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici_polise`
--
ALTER TABLE `korisnici_polise`
  ADD CONSTRAINT `korisnici_polise_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `korisnici_polise_ibfk_2` FOREIGN KEY (`id_polisa`) REFERENCES `polise` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
