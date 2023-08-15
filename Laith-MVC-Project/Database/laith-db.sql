-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2023 at 11:34 PM
-- Server version: 5.7.40
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laith-db`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `spGetDashboard`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetDashboard` ()   BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
         
    START TRANSACTION;
    SELECT  USR.Id                                         AS Id
            ,USR.UserName                                 AS UserName
            ,USR.Password								  AS Password
			,CON.Email                                    AS Email
            ,RO.Name                                      AS ROLE
            ,CON.Mobile                                   AS Mobile
            ,PRS.FirstName                                AS FirstName
            ,PRS.LastName                                 AS LastName
            ,PRS.CallSign                                 AS CallSign

    FROM    User AS USR
    INNER JOIN UserPerRole AS UPR
        ON USR.Id = UPR.UserId
    INNER JOIN Role AS RO
        ON UPR.RoleId = RO.Id
    INNER JOIN Person AS PRS
        ON USR.PersonId = PRS.Id
    INNER JOIN Contact AS CON
        ON PRS.Id = CON.PersonId;
    COMMIT;
END$$

DROP PROCEDURE IF EXISTS `spGetDashboardById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetDashboardById` (`Id_User` INT UNSIGNED)   BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
         
		START TRANSACTION;
    SELECT  USR.Id                                         AS Id
            ,USR.UserName                                 AS UserName
            ,USR.Password								  AS Password
			,CON.Email                                    AS Email
            ,RO.Name                                      AS ROLE
            ,CON.Mobile                                   AS Mobile
            ,PRS.FirstName                                AS FirstName
            ,PRS.LastName                                 AS LastName
            ,PRS.CallSign                                 AS CallSign
            ,UPR.RoleId                                   AS RoleId
	
			 FROM    User AS USR
    INNER JOIN UserPerRole AS UPR
        ON USR.Id = UPR.UserId
    INNER JOIN Role AS RO
        ON UPR.RoleId = RO.Id
    INNER JOIN Person AS PRS
        ON USR.PersonId = PRS.Id
    INNER JOIN Contact AS CON
        ON PRS.Id = CON.PersonId
					
			WHERE		USR.Id = Id_User;
			
			COMMIT;	
                
	END$$

DROP PROCEDURE IF EXISTS `spUpdateUserDetails`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUserDetails` (`id` INT UNSIGNED, `UserName` VARCHAR(255), `Password` VARCHAR(255), `Email` VARCHAR(255), `RoleId` INT UNSIGNED, `Mobile` VARCHAR(11), `FirstName` VARCHAR(50), `LastName` VARCHAR(50), `CallSign` VARCHAR(50))   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
    END;

    START TRANSACTION;

    UPDATE User AS USR
    SET    USR.UserName = UserName,
           USR.Password = Password
    WHERE  USR.Id = id;

    UPDATE Contact AS CON
    INNER JOIN Person AS PRS
        ON CON.PersonId = PRS.Id
    SET    CON.Email = Email,
           CON.Mobile = Mobile
    WHERE  PRS.Id = id;

    UPDATE Person AS PRS
    INNER JOIN UserPerRole AS UPR
        ON PRS.Id = UPR.UserId
    INNER JOIN Role AS RO
        ON UPR.RoleId = RO.Id
    SET    PRS.FirstName = FirstName,
           PRS.LastName = LastName,
           PRS.CallSign = CallSign,
           UPR.RoleId = RoleId
    WHERE  PRS.Id = id;

    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PersonId` int(10) UNSIGNED NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `PersonId` (`PersonId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `PersonId`, `Mobile`, `Email`, `IsActive`, `Remark`, `DateCreated`, `DateChanged`) VALUES
(1, 1, '345345', 'new_email@example.com', b'1', 'Contact remark for John Doe', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(2, 2, '9876543210', 'jane@example.com', b'1', 'Contact remark for Jane Smith', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(3, 3, '5555555555', 'mike@example.com', b'0', 'Contact remark for Mike Johnson', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(4, 9, '45635345', 'allaith.work@gmail.com', NULL, NULL, NULL, NULL),
(5, 10, '064564', 'allaith23@gmail.com', NULL, NULL, NULL, NULL),
(6, 11, '0896865', 'a@gmail.com', NULL, NULL, NULL, NULL),
(7, 12, '45635345', 'admin@gmail.com', NULL, NULL, NULL, NULL),
(8, 15, '45635345', 'allaith.work34@gmail.com', NULL, NULL, NULL, NULL),
(9, 16, '45635345', 'allaith.work34@gmail.com', NULL, NULL, NULL, NULL),
(10, 17, '45635345', 'allaith.work34@gmail.com', NULL, NULL, NULL, NULL),
(11, 18, '45635345', 'aladfqewr@gmail.com', NULL, NULL, NULL, NULL),
(12, 19, '45635345', 'aladfqewr@gmail.com', NULL, NULL, NULL, NULL),
(13, 20, '45635345', 'allaith.work44@gmail.com', NULL, NULL, NULL, NULL),
(14, 21, '45635345', 'allaith.work44@gmail.com', NULL, NULL, NULL, NULL),
(15, 22, '45635345', 'allaith.work44@gmail.com', NULL, NULL, NULL, NULL),
(16, 23, '45635345', 'memeber@laith.nl', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TypePersonId` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `CallSign` varchar(50) DEFAULT '0',
  `IsAdult` bit(1) NOT NULL DEFAULT b'0',
  `IsActive` bit(1) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `TypePersonId` (`TypePersonId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Id`, `TypePersonId`, `FirstName`, `LastName`, `CallSign`, `IsAdult`, `IsActive`, `Remark`, `DateCreated`, `DateChanged`) VALUES
(1, 1, '45', 'New Last Name', 'New CallSign', b'1', b'1', 'Remark for John Doe', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(2, 2, 'Jane', 'Smith', 'JS', b'0', b'1', 'Remark for Jane Smith', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(3, 3, 'Mike', 'Johnson', 'MJ', b'1', b'0', 'Remark for Mike Johnson', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(4, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 16:44:39', '2023-05-31 16:44:39'),
(5, 1, 'Allaith', 'Chachou', 'laith', b'0', NULL, NULL, '2023-05-31 16:45:06', '2023-05-31 16:45:06'),
(6, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 16:46:18', '2023-05-31 16:46:18'),
(7, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 16:47:22', '2023-05-31 16:47:22'),
(8, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 16:49:03', '2023-05-31 16:49:03'),
(9, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 16:51:50', '2023-05-31 16:51:50'),
(10, 1, 'Allaith', 'Chachou', 'laith', b'0', NULL, NULL, '2023-05-31 17:02:23', '2023-05-31 17:02:23'),
(11, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-05-31 23:47:10', '2023-05-31 23:47:10'),
(12, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 00:00:00', '2023-06-01 00:00:00'),
(13, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:18:34', '2023-06-01 12:18:34'),
(14, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:19:21', '2023-06-01 12:19:21'),
(15, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:19:53', '2023-06-01 12:19:53'),
(16, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:20:41', '2023-06-01 12:20:41'),
(17, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:21:19', '2023-06-01 12:21:19'),
(18, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:21:34', '2023-06-01 12:21:34'),
(19, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:22:51', '2023-06-01 12:22:51'),
(20, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:23:06', '2023-06-01 12:23:06'),
(21, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:24:10', '2023-06-01 12:24:10'),
(22, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-01 12:24:23', '2023-06-01 12:24:23'),
(23, 1, 'Allaith', 'chachou', 'Allaith', b'0', NULL, NULL, '2023-06-02 01:14:26', '2023-06-02 01:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`, `IsActive`, `Remark`, `DateCreated`, `DateChanged`) VALUES
(1, 'Admin', b'1', 'Administrator role', '2023-05-31 16:44:34', '2023-05-31 16:44:34'),
(2, 'Member', b'1', 'Member role', '2023-05-31 16:44:34', '2023-05-31 16:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `typeperson`
--

DROP TABLE IF EXISTS `typeperson`;
CREATE TABLE IF NOT EXISTS `typeperson` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeperson`
--

INSERT INTO `typeperson` (`Id`, `Name`) VALUES
(1, 'Klant'),
(2, 'Medewerker'),
(3, 'Gast');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PersonId` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `PersonId` (`PersonId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `PersonId`, `UserName`, `Password`, `IsActive`, `Remark`, `DateCreated`, `DateChanged`) VALUES
(1, 1, 'new_username', 'new_password', b'1', 'User remark for John Doe', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(2, 2, 'jane@example.com', 'password2', b'1', 'User remark for Jane Smith', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(3, 3, 'mike@example.com', 'password3', b'0', 'User remark for Mike Johnson', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(4, 9, 'allaith.work@gmail.com', '$2y$10$l/wMJUR.xT.TOH6R7k9Fy.iDDXdj9yirKqIWa/kn/h/ffyxMX6OJK', b'1', NULL, '2023-05-31 16:51:50', '2023-05-31 16:51:50'),
(5, 10, 'allaith23@gmail.com', '$2y$10$oCOgKmFaoyHEkE42hJ13cud2BVA9Fjbg.CHnoEyYU/k0.XCW7tjGK', b'1', NULL, '2023-05-31 17:02:24', '2023-05-31 17:02:24'),
(6, 11, 'a@gmail.com', '$2y$10$XYJhBCF0UjRcxf56zHCryugh6RtImj7nm0TSWNX/0WYZyombP96wK', b'1', NULL, '2023-05-31 23:47:10', '2023-05-31 23:47:10'),
(7, 12, 'admin@gmail.com', '$2y$10$dxHBdpOOHYij3Qgl5CoEM.ZJz3SSlnljOIRSUVfwNM1q6jCpB.MiO', b'1', NULL, '2023-06-01 00:00:00', '2023-06-01 00:00:00'),
(8, 22, 'allaith.work44@gmail.com', '$2y$10$qX9wMJWeegVBSIjkr.sOte7d5jCqRcr/yKCAEMMCEQMqasMgb3mgG', b'1', NULL, '2023-06-01 12:24:23', '2023-06-01 12:24:23'),
(9, 23, 'memeber@laith.nl', '$2y$10$2vdUl3evVrMpaHrRBWNciu1ET9Z3bfSc6Wze.pnlsp3a3tG7NtS.K', b'1', NULL, '2023-06-02 01:14:26', '2023-06-02 01:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `userperrole`
--

DROP TABLE IF EXISTS `userperrole`;
CREATE TABLE IF NOT EXISTS `userperrole` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserId` int(10) UNSIGNED NOT NULL,
  `RoleId` int(10) UNSIGNED NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `RoleId` (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userperrole`
--

INSERT INTO `userperrole` (`Id`, `UserId`, `RoleId`, `IsActive`, `Remark`, `DateCreated`, `DateChanged`) VALUES
(1, 1, 2, b'1', 'UserPerRole remark for John Doe', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(2, 2, 1, b'1', 'UserPerRole remark for Jane Smith', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(3, 3, 2, b'0', 'UserPerRole remark for Mike Johnson', '2023-05-31 16:44:35', '2023-05-31 16:44:35'),
(4, 4, 2, NULL, NULL, NULL, NULL),
(5, 5, 2, NULL, NULL, NULL, NULL),
(6, 6, 2, NULL, NULL, NULL, NULL),
(7, 7, 1, NULL, NULL, NULL, NULL),
(8, 8, 2, NULL, NULL, NULL, NULL),
(9, 9, 2, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`PersonId`) REFERENCES `person` (`Id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`TypePersonId`) REFERENCES `typeperson` (`Id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`PersonId`) REFERENCES `person` (`Id`);

--
-- Constraints for table `userperrole`
--
ALTER TABLE `userperrole`
  ADD CONSTRAINT `userperrole_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `userperrole_ibfk_2` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
