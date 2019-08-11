-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 12:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bodaichecksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_admin`
--

CREATE TABLE `acc_admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `AccountType` varchar(29) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Status` enum('approved','pending','','') NOT NULL DEFAULT 'pending',
  `Date` date NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_admin`
--

INSERT INTO `acc_admin` (`id`, `Name`, `AccountType`, `username`, `Password`, `Status`, `Date`, `login_time`) VALUES
(1, 'lenny lori', 'Administrator', 'admin', 'admin', 'approved', '2019-01-21', '2019-08-11 10:07:57'),
(2, 'Lori Jenny', 'Administrator', 'user', 'user', 'pending', '2019-01-21', '2019-02-06 13:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `bodaaccountstatus`
--

CREATE TABLE `bodaaccountstatus` (
  `Count_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `entrydate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bodaaccountstatus`
--

INSERT INTO `bodaaccountstatus` (`Count_id`, `status`, `entrydate`) VALUES
(1, 'Active', '2019-04-08 21:23:49'),
(2, 'Inactive', '2019-04-08 21:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `client_personal_acc`
--

CREATE TABLE `client_personal_acc` (
  `id` int(100) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `Phone_number` int(20) NOT NULL,
  `National_id` int(20) DEFAULT NULL,
  `Gender` varchar(60) DEFAULT NULL,
  `County` varchar(100) DEFAULT NULL,
  `Hometown` varchar(100) DEFAULT NULL,
  `date_of_birth` varchar(70) DEFAULT NULL,
  `email_address` varchar(70) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Account_status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `notification` varchar(100) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter_table`
--

CREATE TABLE `counter_table` (
  `Last_Num_count` int(200) NOT NULL,
  `Date` date NOT NULL,
  `Id` int(100) NOT NULL,
  `Id2` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_table`
--

INSERT INTO `counter_table` (`Last_Num_count`, `Date`, `Id`, `Id2`) VALUES
(414, '2019-02-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `Count_id` int(100) NOT NULL,
  `County` varchar(20) NOT NULL,
  `County_Num` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`Count_id`, `County`, `County_Num`, `entry_date`) VALUES
(1, 'Mombasa', 1, '2019-02-07 08:38:36'),
(2, 'Kwale', 2, '2019-02-08 13:41:23'),
(3, 'Kilifi', 3, '2019-02-08 13:41:23'),
(4, 'TanaRiver', 4, '2019-02-08 13:41:23'),
(5, 'Lamu', 5, '2019-02-08 13:41:23'),
(6, 'TaitaTaveta', 6, '2019-02-08 13:41:23'),
(7, 'Garissa', 7, '2019-02-08 13:41:23'),
(8, 'Wajir', 8, '2019-02-08 13:41:23'),
(9, 'Mandera', 9, '2019-02-08 13:41:23'),
(10, 'Marsabit', 10, '2019-02-08 13:41:23'),
(11, 'Isiolo', 11, '2019-02-08 13:41:23'),
(12, 'Meru', 12, '2019-02-08 13:41:23'),
(13, 'TharakaNithi', 13, '2019-02-08 13:41:23'),
(14, 'Embu', 14, '2019-02-08 13:41:23'),
(15, 'Kitui', 15, '2019-02-08 13:41:23'),
(16, 'Machakos', 16, '2019-02-08 13:41:23'),
(17, 'Makueni', 17, '2019-02-08 13:41:23'),
(18, 'Nyandarua', 18, '2019-02-08 13:41:23'),
(19, 'Nyeri', 19, '2019-02-08 13:41:23'),
(20, 'Kirinyaga', 20, '2019-02-08 13:41:23'),
(21, 'Muranga', 21, '2019-02-08 13:41:23'),
(22, 'Kiambu', 22, '2019-02-08 13:41:23'),
(23, 'Turkana', 23, '2019-02-08 13:41:23'),
(24, 'WestPokot', 24, '2019-02-08 13:41:23'),
(25, 'Samburu', 25, '2019-02-08 13:41:23'),
(26, 'UasinGishu', 26, '2019-02-08 13:41:23'),
(27, 'TransNzoia', 27, '2019-02-08 13:41:23'),
(28, 'ElgeyoMarakwet', 28, '2019-02-08 13:41:23'),
(29, 'Nandi', 29, '2019-02-08 13:41:23'),
(30, 'Baringo', 30, '2019-02-08 13:41:23'),
(31, 'Laikipia', 31, '2019-02-08 13:41:23'),
(32, 'Nakuru', 32, '2019-02-08 13:41:23'),
(33, 'Narok', 33, '2019-02-08 13:41:23'),
(34, 'Kajiado', 34, '2019-02-08 13:41:23'),
(35, 'Kericho', 35, '2019-02-08 13:41:23'),
(36, 'Bomet', 36, '2019-02-08 13:41:23'),
(37, 'Kakamega', 37, '2019-02-08 13:41:23'),
(38, 'Vihiga', 38, '2019-02-08 13:41:23'),
(39, 'Bungoma', 39, '2019-02-08 13:41:23'),
(40, 'Busia', 40, '2019-02-08 13:41:23'),
(41, 'Siaya', 41, '2019-02-08 13:41:23'),
(42, 'Kisumu', 42, '2019-02-08 13:43:36'),
(43, 'HomaBay', 43, '2019-02-08 13:43:36'),
(44, 'Migori', 44, '2019-02-08 13:43:36'),
(45, 'Kisii', 45, '2019-02-08 13:43:36'),
(46, 'Nyamira', 46, '2019-02-08 13:43:36'),
(47, 'Nairobi', 47, '2019-02-08 13:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `crimecategories`
--

CREATE TABLE `crimecategories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimecategories`
--

INSERT INTO `crimecategories` (`Id`, `Name`) VALUES
(1, 'Robery'),
(2, 'Murder'),
(3, 'Kid napping'),
(4, 'Corruption'),
(5, 'Assault'),
(6, 'Fraud'),
(7, 'Terror');

-- --------------------------------------------------------

--
-- Table structure for table `crimemonitor`
--

CREATE TABLE `crimemonitor` (
  `id` int(11) NOT NULL,
  `AobNumber` int(11) NOT NULL,
  `FileNumber` varchar(30) NOT NULL,
  `MostwantedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimemonitor`
--

INSERT INTO `crimemonitor` (`id`, `AobNumber`, `FileNumber`, `MostwantedID`) VALUES
(1, 29, '4', 9);

-- --------------------------------------------------------

--
-- Table structure for table `crimereporting`
--

CREATE TABLE `crimereporting` (
  `id` int(11) NOT NULL,
  `AOBNumber` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `CrimeNature` varchar(50) NOT NULL,
  `DateofCrime` varchar(20) NOT NULL,
  `ReportedBy` varchar(50) NOT NULL,
  `ParpetratorName` varchar(50) NOT NULL,
  `CrimeStatus` varchar(50) NOT NULL,
  `Victims` varchar(50) NOT NULL,
  `CrimeDescription` varchar(2000) NOT NULL,
  `National_id` varchar(13) NOT NULL,
  `Fullnames_clientvictim` varchar(33) NOT NULL,
  `CrimeLocation` varchar(33) NOT NULL,
  `CrimeTime` varchar(10) NOT NULL,
  `WeaponsInvolved` varchar(50) NOT NULL,
  `ParpetratorDescription` varchar(100) NOT NULL,
  `CaseStatus` varchar(25) NOT NULL DEFAULT 'Not Yet Released'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `Count_id` int(100) NOT NULL,
  `Sex` varchar(200) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`Count_id`, `Sex`, `entry_date`) VALUES
(1, 'Male', '2019-02-08 15:49:33'),
(2, 'Female', '2019-02-08 15:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE `messagein` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messagelog`
--

CREATE TABLE `messagelog` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(500) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(80) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE `messageout` (
  `Id` int(11) NOT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT 0,
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operators_personal_acc`
--

CREATE TABLE `operators_personal_acc` (
  `Count_id` int(100) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Phonenumber` int(20) NOT NULL,
  `Emergency_number` int(20) DEFAULT NULL,
  `National_Id` int(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Place_of_birth` varchar(50) NOT NULL,
  `operation_route` varchar(100) NOT NULL,
  `Hometown` varchar(100) NOT NULL,
  `County` varchar(60) NOT NULL,
  `Nationa_id_image` varchar(200) NOT NULL,
  `Insuarance_cover` varchar(200) DEFAULT NULL,
  `Driving_licence` varchar(200) NOT NULL,
  `Boda_ownwership_certificate` varchar(200) NOT NULL,
  `Passport_picture` varchar(200) NOT NULL,
  `Operators_reference_id` varchar(200) NOT NULL,
  `Boda_plate_number` varchar(100) NOT NULL,
  `Email_Address` varchar(100) NOT NULL,
  `Account_status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `Count_id` int(100) NOT NULL,
  `Boda_plateNumber` varchar(100) NOT NULL,
  `operator_fullname` varchar(20) NOT NULL,
  `operator_Telephone_number` varchar(100) NOT NULL,
  `Operator_county` varchar(50) NOT NULL,
  `client_phonenumber` varchar(100) NOT NULL,
  `rate_counter` varchar(100) NOT NULL,
  `Account_status` enum('green','orange','yellow','red') NOT NULL DEFAULT 'green',
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `save_ride`
--

CREATE TABLE `save_ride` (
  `Count_id` int(100) NOT NULL,
  `Client_mobilenumber` varchar(100) NOT NULL,
  `Savedby` varchar(11) NOT NULL,
  `boda_operatorName` varchar(20) NOT NULL,
  `boda_plate_Number` varchar(30) NOT NULL,
  `operation_route` varchar(100) NOT NULL,
  `County` varchar(30) NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Profile_pic` varchar(200) NOT NULL,
  `notification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_admin`
--
ALTER TABLE `acc_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bodaaccountstatus`
--
ALTER TABLE `bodaaccountstatus`
  ADD PRIMARY KEY (`Count_id`);

--
-- Indexes for table `client_personal_acc`
--
ALTER TABLE `client_personal_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_table`
--
ALTER TABLE `counter_table`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`County_Num`);

--
-- Indexes for table `crimecategories`
--
ALTER TABLE `crimecategories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crimemonitor`
--
ALTER TABLE `crimemonitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimereporting`
--
ALTER TABLE `crimereporting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AOBNumber` (`AOBNumber`);

--
-- Indexes for table `messagein`
--
ALTER TABLE `messagein`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `messagelog`
--
ALTER TABLE `messagelog`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_MessageId` (`MessageId`,`SendTime`);

--
-- Indexes for table `messageout`
--
ALTER TABLE `messageout`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_IsRead` (`IsRead`);

--
-- Indexes for table `operators_personal_acc`
--
ALTER TABLE `operators_personal_acc`
  ADD PRIMARY KEY (`Count_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`Count_id`);

--
-- Indexes for table `save_ride`
--
ALTER TABLE `save_ride`
  ADD PRIMARY KEY (`Count_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_admin`
--
ALTER TABLE `acc_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_personal_acc`
--
ALTER TABLE `client_personal_acc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crimecategories`
--
ALTER TABLE `crimecategories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crimemonitor`
--
ALTER TABLE `crimemonitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crimereporting`
--
ALTER TABLE `crimereporting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagein`
--
ALTER TABLE `messagein`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagelog`
--
ALTER TABLE `messagelog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messageout`
--
ALTER TABLE `messageout`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operators_personal_acc`
--
ALTER TABLE `operators_personal_acc`
  MODIFY `Count_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `Count_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `save_ride`
--
ALTER TABLE `save_ride`
  MODIFY `Count_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
