-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 12:23 AM
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
-- Database: `rpe_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `exerciseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exerciseID`, `categoryID`, `exerciseName`) VALUES
(1, 1, 'Squat'),
(2, 2, 'Bench'),
(3, 3, 'Deadlift'),
(4, 1, 'Leg Extension'),
(5, 1, 'Seated Leg Curl'),
(6, 1, 'Calf Raise'),
(7, 2, 'Incline Dumbbell Press'),
(8, 2, 'Incline Bench Press'),
(9, 2, 'Flat Dumbbell Press'),
(10, 2, 'Cable Chest Fly'),
(11, 2, 'Machine Chest Fly'),
(12, 3, 'Barbell Row'),
(13, 3, ' Single Arm Dumbbell Row'),
(14, 3, 'Cable Row'),
(15, 2, 'Tricep Pushdown'),
(16, 3, 'Single Arm  Cable Row'),
(17, 3, 'Pull Down Machine'),
(18, 3, 'Cable Pull Down'),
(19, 1, 'Barbell RDL'),
(20, 2, 'Tricep Pushdown Machine'),
(21, 2, 'E-Z Bar SkullCrusher'),
(22, 2, 'Dumbbell SkullCrusher'),
(23, 2, 'Dips'),
(24, 3, 'Pull-ups');

-- --------------------------------------------------------

--
-- Table structure for table `max`
--

CREATE TABLE `max` (
  `maxID` int(11) NOT NULL,
  `RPE` int(11) NOT NULL,
  `exerciseName` varchar(255) NOT NULL,
  `reps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sbd`
--

CREATE TABLE `sbd` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sbd`
--

INSERT INTO `sbd` (`categoryID`, `categoryName`) VALUES
(1, 'Squat'),
(2, 'Bench'),
(3, 'Deadlift');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workoutID` int(11) NOT NULL,
  `workoutDate` datetime NOT NULL,
  `categoryID` int(11) NOT NULL,
  `exerciseName` varchar(255) NOT NULL,
  `set` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `RPE` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`workoutID`, `workoutDate`, `categoryID`, `exerciseName`, `set`, `reps`, `RPE`, `weight`) VALUES
(1, '2024-01-30 13:58:18', 1, 'Squat', 4, 9, 9, 255),
(2, '2024-01-30 13:58:50', 1, 'Squat', 4, 6, 6, 353),
(3, '2024-01-30 13:59:18', 1, 'Squat', 4, 8, 2, 255),
(4, '2024-01-30 22:02:26', 2, 'Incline Dumbbell Press', 1, 1, 6, 1),
(5, '2024-01-30 22:02:26', 2, 'Bench', 2, 1, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exerciseID`),
  ADD UNIQUE KEY `exerciseName` (`exerciseName`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `exerciseName_2` (`exerciseName`);

--
-- Indexes for table `max`
--
ALTER TABLE `max`
  ADD PRIMARY KEY (`maxID`);

--
-- Indexes for table `sbd`
--
ALTER TABLE `sbd`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`workoutID`),
  ADD UNIQUE KEY `workoutID` (`workoutID`),
  ADD KEY `workoutID_2` (`workoutID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `exercise_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `sbd` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
