-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2016 at 01:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FootballHere`
--

-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE `Games` (
  `user` varchar(50) NOT NULL,
  `location` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `players_needed` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `kickoff` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Games`
--

INSERT INTO `Games` (`user`, `location`, `date`, `players_needed`, `difficulty`, `game_id`, `lat`, `lng`, `kickoff`) VALUES
('elliotjr', 'Queensland, Brisbane, Corinda, 26 Dart St', '2016-05-14', 2, 1, 26, -27.5446, 152.978, '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `UserGame`
--

CREATE TABLE `UserGame` (
  `user` varchar(50) NOT NULL,
  `gameid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserGame`
--

INSERT INTO `UserGame` (`user`, `gameid`) VALUES
('eliiotisdbes', 26),
('elliotjr', 26);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Skill` int(11) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Password`, `FirstName`, `LastName`, `Skill`, `Age`) VALUES
('eliiotisdbes', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Richard', 'Face', 3, 29),
('elliot', 'a8526567eb6a272506066ca56a9e6171', 'Elliot', 'Randall', 3, 45),
('elliotjr', 'a8526567eb6a272506066ca56a9e6171', 'Elliot', 'Randall', 3, 20),
('Iamtepoop', '785b86fdd4104723b2b72a268314612a', 'Poop', 'Lord', 1, 0),
('sjamos', '9df1be412480249fcd8c752247b50f4c', 'sarah', 'amos', 100, 21),
('winston', 'fc5e038d38a57032085441e7fe7010b0', 'Winston', 'Fang', 3, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `UserGame`
--
ALTER TABLE `UserGame`
  ADD PRIMARY KEY (`user`,`gameid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Games`
--
ALTER TABLE `Games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
