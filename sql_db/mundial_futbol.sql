-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: bd-mysql
-- Generation Time: May 11, 2020 at 07:27 PM
-- Server version: 10.4.12-MariaDB-1:10.4.12+maria~bionic-log
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mundial_futbol`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `idClub` int(11) NOT NULL,
  `Ciudad` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`idClub`, `Ciudad`, `Nombre`) VALUES
(1, 'Ciudad Autónoma de Buenos Aires', 'Club Atlético River Plate'),
(2, 'Ciudad Autónoma de Buenos Aires', 'Club Atlético Boca Juniors'),
(3, 'Cipolletti', 'Club Cipolletti'),
(4, 'Roma', 'Associazione Sportiva Roma'),
(5, 'Milán', 'Inter de Milán'),
(6, 'Milán', 'Associazione Calcio Milan'),
(7, 'Barcelona', 'Fútbol Club Barcelona'),
(8, 'Madrid', 'Real Madrid Club de Fútbol'),
(9, 'Montevideo', 'Club Atlético Peñarol');

-- --------------------------------------------------------

--
-- Table structure for table `jugador`
--

CREATE TABLE `jugador` (
  `idJugador` int(11) NOT NULL,
  `idPais` int(11) NOT NULL,
  `idClub` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha` date NOT NULL,
  `Posicion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jugador`
--

INSERT INTO `jugador` (`idJugador`, `idPais`, `idClub`, `Nombre`, `Fecha`, `Posicion`) VALUES
(1, 1, 3, 'Facundo Crespo', '2018-04-11', 'Arquero'),
(2, 1, 3, 'Alan Aldalla', '2018-04-11', 'Arquero'),
(3, 1, 3, 'Matias Carrera', '2018-04-11', 'Defensor'),
(4, 1, 3, 'Damián Jara', '2018-04-11', 'Defensor'),
(5, 1, 3, 'Maximiliano Tormann', '2018-04-11', 'Defensor'),
(6, 1, 3, 'Jonatan Morales', '2018-04-11', 'Defensor'),
(7, 1, 3, 'Manuel Berra', '2018-04-11', 'Mediocampista'),
(8, 1, 3, 'Matias Sarraute', '2018-04-11', 'Mediocampista'),
(9, 1, 3, 'Gonzalo Barez', '2018-04-11', 'Mediocampista'),
(10, 1, 3, 'Cristian Fornillo', '2018-04-11', 'Mediocampista'),
(11, 1, 3, 'Diego Aguirre', '2018-04-11', 'Mediocampista'),
(12, 1, 3, 'Enzo Romero', '2018-04-11', 'Delantero'),
(13, 1, 3, 'Nicolas Trecco', '2018-04-11', 'Delantero'),
(14, 1, 3, 'Hernan Altolaguirre', '2018-04-11', 'Delantero'),
(15, 1, 1, 'Franco Armani', '2019-11-13', 'Arquero'),
(16, 1, 1, 'Bruno Zuculini', '2019-09-04', 'Mediocampista'),
(17, 1, 1, 'Ignacio Scocco', '2020-04-03', 'Delantero'),
(18, 1, 1, 'Lucas Pratto', '2018-04-11', 'Delantero'),
(19, 1, 1, 'Matias Suarez', '2020-03-15', 'Delantero'),
(20, 1, 1, 'Leonardo Ponzio', '2018-04-11', 'Mediocampista'),
(21, 1, 1, 'Enzo Perez', '2020-01-02', 'Mediocampista'),
(22, 11, 1, 'Juan Fernando Quintero', '2018-04-11', 'Mediocampista'),
(23, 1, 1, 'Santiago Sosa', '2018-04-11', 'Mediocampista'),
(24, 1, 1, 'Milton Casco', '2020-04-04', 'Defensor'),
(25, 1, 1, 'Javier Pinola', '2020-01-01', 'Defensor'),
(26, 5, 1, 'Paulo Diaz', '2018-04-11', 'Defensor'),
(27, 1, 1, 'Gonzalo Montiel', '2020-05-01', 'Defensor'),
(28, 1, 2, 'Esteban Andrada', '2019-02-22', 'Arquero'),
(29, 1, 2, 'Emanuel Mas', '2019-05-03', 'Defensor'),
(30, 1, 2, 'Julio Buffarini', '2018-04-11', 'Defensor'),
(31, 12, 2, 'Junior Alonso', '2018-04-11', 'Defensor'),
(32, 1, 2, 'Leonardo Jara', '2019-11-16', 'Defensor'),
(33, 1, 2, 'Ivan Marcone', '2018-04-11', 'Mediocampista'),
(34, 1, 2, 'Nicolas Capaldo', '2018-04-11', 'Mediocampista'),
(35, 1, 2, 'Emanuel Reynoso', '2018-04-11', 'Mediocampista'),
(36, 1, 2, 'Agustin Almendra', '2020-02-29', 'Mediocampista'),
(37, 1, 2, 'Carlos Tevez', '2019-08-00', 'Delantero'),
(38, 1, 2, 'Ramon Abila', '2020-01-20', 'Delantero'),
(39, 1, 2, 'Mauro Zarate', '2019-08-09', 'Delantero'),
(40, 3, 9, 'Thiago Cardozo', '2020-05-05', 'Arquero'),
(41, 3, 9, 'Kevin Dawson', '2020-03-05', 'Arquero'),
(42, 3, 9, 'Fabricio Formiliano', '2020-03-05', 'Defensor'),
(43, 3, 9, 'Enzo Martinez', '2020-03-02', 'Defensor'),
(44, 3, 9, 'Juan Acosta', '2020-03-20', 'Defensor'),
(45, 3, 9, 'Marcel Novick', '2019-12-01', 'Mediocampista'),
(46, 3, 9, 'Cristian Rodriguez', '2020-03-07', 'Mediocampista'),
(47, 2, 9, 'Xisco Jimenez', '2020-02-06', 'Delantero'),
(48, 3, 9, 'Fabian Estoyanoff', '2020-01-21', 'Delantero'),
(49, 3, 9, 'Joaquin Piquerez', '2020-01-09', 'Mediocampista'),
(50, 3, 9, 'Facundo Pellistri', '2020-01-09', 'Delantero'),
(51, 3, 9, 'Martin Correa', '2020-03-11', 'Arquero'),
(52, 3, 9, 'Guzman Pereira', '2020-02-05', 'Mediocampista'),
(53, 3, 9, 'Jesus Trindade', '2020-02-05', 'Defensor'),
(54, 8, 7, 'Marc-Andre ter Stegen', '2020-02-03', 'Arquero'),
(55, 7, 7, 'Neto', '2020-02-05', 'Arquero'),
(56, 13, 7, 'Nelson Semedo', '2020-03-20', 'Defensor'),
(57, 2, 7, 'Gerard Pique', '2020-01-07', 'Defensor'),
(58, 2, 7, 'Sergi Roberto', '2020-02-04', 'Defensor'),
(59, 6, 7, 'Samuel Umtiti', '2020-01-08', 'Defensor'),
(60, 2, 7, 'Jordi Alba', '2019-06-11', 'Defensor'),
(61, 2, 7, 'Sergio Busquets', '2019-08-06', 'Mediocampista'),
(62, 9, 7, 'Ivan Rakitic', '2019-08-16', 'Mediocampista'),
(63, 5, 7, 'Arturo Vidal', '2019-07-09', 'Mediocampista'),
(64, 1, 7, 'Lionel Messi', '2019-07-02', 'Delantero'),
(65, 3, 7, 'Luis Suarez', '2019-12-17', 'Delantero'),
(66, 6, 7, 'Ousmane Dembele', '2019-08-19', 'Delantero'),
(67, 6, 7, 'Antoine Griezman', '2019-07-07', 'Delantero'),
(68, 14, 8, 'Thibaut Courtois', '2019-12-02', 'Arquero'),
(69, 6, 8, 'Alphonse Areola', '2019-12-03', 'Arquero'),
(70, 2, 8, 'Sergio Ramos', '2019-09-16', 'Defensor'),
(71, 2, 8, 'Daniel Carvajal', '2019-12-12', 'Defensor'),
(72, 2, 8, 'Nacho', '2020-01-04', 'Defensor'),
(73, 7, 8, 'Marcelo', '2019-10-08', 'Defensor'),
(74, 8, 8, 'Toni Kroos', '2020-01-21', 'Mediocampista'),
(75, 9, 8, 'Luka Modric', '2019-10-15', 'Mediocampista'),
(76, 7, 8, 'Casemiro', '2019-10-05', 'Mediocampista'),
(77, 10, 8, 'James Rodriguez', '2019-09-06', 'Mediocampista'),
(78, 2, 8, 'Isco', '2019-09-03', 'Mediocampista'),
(79, 14, 8, 'Eden Hazard', '2019-09-10', 'Delantero'),
(80, 6, 8, 'Karim Benzema', '2019-08-19', 'Delantero'),
(81, 15, 8, 'Gareth Bale', '2019-07-30', 'Delantero'),
(82, 2, 8, 'Asensio', '2019-10-01', 'Delantero'),
(83, 2, 8, 'Lucas Vazquez', '2019-06-30', 'Delantero'),
(84, 2, 4, 'Pau Lopez', '2019-11-05', 'Arquero'),
(85, 4, 4, 'Antonio Mirante', '2019-08-11', 'Arquero'),
(86, 4, 4, 'Gianluca Mancini', '2019-10-02', 'Defensor'),
(87, 7, 4, 'Juan Jesus', '2020-01-20', 'Defensor'),
(88, 1, 4, 'Federico Fazio', '2019-11-07', 'Defensor'),
(89, 7, 4, 'Roger Ibañez', '2020-02-17', 'Defensor'),
(90, 4, 4, 'Leonardo Spinazzola', '2020-01-19', 'Defensor'),
(91, 4, 4, 'Lorenzo Pellegrini', '2019-12-08', 'Mediocampista'),
(92, 2, 4, 'Gonzalo Villar', '2019-12-16', 'Mediocampista'),
(93, 4, 4, 'Bryan Cristante', '2019-12-11', 'Mediocampista'),
(94, 6, 4, 'Jordan Veretout', '2019-11-01', 'Mediocampista'),
(95, 16, 4, 'Henrikh Mkhitaryan', '2020-01-06', 'Mediocampista'),
(96, 1, 4, 'Diego Perotti', '2019-12-05', 'Delantero'),
(97, 2, 4, 'Carles Perez', '2019-10-28', 'Delantero'),
(98, 17, 4, 'Edin Dzeko', '2019-03-04', 'Delantero'),
(99, 9, 4, 'Nikola Kalinic', '2019-05-27', 'Delantero'),
(100, 4, 5, 'Tommaso Berni', '2019-08-06', 'Arquero'),
(101, 4, 5, 'Daniele Padelli', '2019-10-20', 'Arquero'),
(102, 4, 5, 'Alessandro Bastoni', '2019-11-17', 'Defensor'),
(103, 4, 5, 'Stefan de Vrij', '2019-12-30', 'Defensor'),
(104, 3, 5, 'Diego Godin', '2019-11-28', 'Defensor'),
(105, 4, 5, 'Andrea Ranocchia', '2019-09-16', 'Defensor'),
(106, 4, 5, 'Danilo D\'Ambrosio', '2020-01-05', 'Defensor'),
(107, 6, 5, 'Lucien Agoumé', '2020-02-11', 'Mediocampista'),
(108, 2, 5, 'Borja Valero', '2019-12-01', 'Mediocampista'),
(109, 4, 5, 'Nicolo Barella', '2019-10-15', 'Mediocampista'),
(110, 4, 5, 'Japoco Gianelli', '2019-11-05', 'Mediocampista'),
(111, 4, 5, 'Roberto Gagliardini', '2019-11-05', 'Mediocampista'),
(112, 4, 5, 'Sebastiano Esposito', '2020-01-06', 'Delantero'),
(113, 5, 5, 'Alexis Sanchez', '2019-11-11', 'Delantero'),
(114, 4, 5, 'Edoardo Vergani', '2020-01-23', 'Delantero'),
(115, 1, 5, 'Lautaro Martinez', '2019-12-24', 'Delantero'),
(116, 4, 6, 'Antonio Donnarumma', '2019-12-19', 'Arquero'),
(117, 4, 6, 'Matteo Soncin', '2020-02-09', 'Arquero'),
(118, 4, 6, 'Davide Calabria', '2019-11-24', 'Defensor'),
(119, 4, 6, 'Andrea Conti', '2020-04-12', 'Defensor'),
(120, 1, 6, 'Mateo Musacchio', '2020-03-16', 'Defensor'),
(121, 3, 6, 'Diego Laxalt', '2020-02-06', 'Defensor'),
(122, 6, 6, 'Theo Hernández', '2020-02-24', 'Defensor'),
(123, 1, 6, 'Lucas Biglia', '2020-02-13', 'Mediocampista'),
(124, 7, 6, 'Lucas Paquetá', '2020-02-16', 'Mediocampista'),
(125, 4, 6, 'Marco Brescianini', '2020-05-07', 'Mediocampista'),
(126, 4, 6, 'Giacomo Bonaventura', '2020-03-23', 'Mediocampista'),
(127, 14, 6, 'Alexis Saelemaekers', '2020-01-20', 'Mediocampista'),
(128, 4, 6, 'Daniel Maldini', '2020-02-23', 'Delantero'),
(129, 2, 6, 'Samu Castillejo', '2019-12-29', 'Delantero'),
(130, 9, 6, 'Ante Rebić', '2019-08-25', 'Delantero');

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`idPais`, `Nombre`) VALUES
(1, 'Argentina'),
(2, 'España'),
(3, 'Uruguay'),
(4, 'Italia'),
(5, 'Chile'),
(6, 'Francia'),
(7, 'Brasil'),
(8, 'Alemania'),
(9, 'Croacia'),
(10, 'Colombia'),
(11, 'Ecuador'),
(12, 'Paraguay'),
(13, 'Portugal'),
(14, 'Belgica'),
(15, 'Gales'),
(16, 'Armenia'),
(17, 'Boznia y Herzegovina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`idClub`);

--
-- Indexes for table `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idPais` (`idPais`),
  ADD KEY `idClub` (`idClub`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `idClub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jugador`
--
ALTER TABLE `jugador`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`),
  ADD CONSTRAINT `jugador_ibfk_2` FOREIGN KEY (`idClub`) REFERENCES `club` (`idClub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
