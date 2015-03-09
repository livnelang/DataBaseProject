-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 06:54 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `positionInsert`(IN `code1` INT, IN `desc1` TEXT, IN `sal1` DOUBLE)
    NO SQL
insert into position
values(code1,desc1,sal1)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `idCustomer` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `family` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `name`, `family`, `phone`) VALUES
(65, 'John', 'Look', '69865235'),
(3546, 'Louie', 'Gresko', '05-2443-232'),
(324322, 'Johrf', 'ge', '24134');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`Date`) VALUES
('2015-01-06'),
('2015-01-08'),
('2015-05-02'),
('2015-08-27'),
('2017-02-20'),
('2018-02-10'),
('2020-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `code` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`code`, `name`, `description`, `picture`) VALUES
(6699, 'Salmon Fish', 'gentle delicate fish', NULL),
(12341, 'Jello Roll', 'a jellow mellow rellow', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `idEmployee` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `family` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `Manager_idManager` int(11) NOT NULL,
  `Position_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idEmployee`, `name`, `family`, `address`, `phone`, `Manager_idManager`, `Position_code`) VALUES
(0, 'Alvin', 'Lee', 'Holon', '4564564', 6456, 324324),
(3, 'Sharon', 'Stoned', 'Gedera', '23453', 6456, 324324),
(233, 'Tzipi', 'Primo', 'Kfar Saba', '05-2443-232', 33, 112298),
(454, 'joe', 'caffe', 'dsdf', '343', 33, 324324),
(2354, 'Louie', 'Gresko', 'Bat Yam', '09-7656-543', 33, 11221);

--
-- Triggers `employee`
--
DELIMITER //
CREATE TRIGGER `Employee_Trg_Upd` AFTER UPDATE ON `employee`
 FOR EACH ROW BEGIN
INSERT INTO mydb.employee_changes(employee_id,old_phone,old_Manager_Id,old_Position)
values(OLD.idEmployee,OLD.phone,OLD.Manager_idManager,OLD.Position_code);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_changes`
--

CREATE TABLE IF NOT EXISTS `employee_changes` (
  `employee_id` int(11) NOT NULL,
  `old_phone` varchar(45) DEFAULT NULL,
  `old_Manager_Id` int(11) DEFAULT NULL,
  `old_Position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eventCode` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventCode`, `name`) VALUES
(23423, 'Wedding'),
(34324, 'Bowling');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
  `code` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`code`, `name`, `capacity`) VALUES
(213, 'dfdf', 12),
(5565, 'Beverly Hills', 300),
(6985, 'EverGreen', 400),
(55878, 'Club Express', 500),
(66545, 'Gan Hapekan', 600),
(35464334, 'JOhn b3ayaA ', 2321);

-- --------------------------------------------------------

--
-- Table structure for table `include`
--

CREATE TABLE IF NOT EXISTS `include` (
  `Menu_code` int(11) NOT NULL,
  `Dish_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `idManager` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `family` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`idManager`, `name`, `family`, `address`, `phone`) VALUES
(33, 'Elvis', 'Presley', 'Memphis', '09-7656-543'),
(6456, 'Jerry', 'Lee Lewis', 'Louisiana', '4648746');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `code` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`code`, `price`) VALUES
(65263, 200),
(65264, 250);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `Hall_code` int(11) NOT NULL,
  `Menu_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`idOrder` int(11) NOT NULL,
  `Event_eventCode` int(11) NOT NULL,
  `Hall_Code` int(11) NOT NULL,
  `Date_date` date NOT NULL,
  `Menu_code` int(11) NOT NULL,
  `Customer_idCustomer` int(11) NOT NULL,
  `Manager_idManager` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`idOrder`, `Event_eventCode`, `Hall_Code`, `Date_date`, `Menu_code`, `Customer_idCustomer`, `Manager_idManager`) VALUES
(1, 23423, 213, '2015-01-06', 65263, 3546, 33),
(2, 34324, 6985, '2015-05-02', 65263, 3546, 33),
(3, 34324, 35464334, '2017-02-20', 65263, 3546, 33),
(4, 34324, 66545, '2018-02-10', 65263, 3546, 33),
(5, 34324, 6985, '2018-02-10', 65264, 65, 33),
(6, 34324, 66545, '2020-03-28', 65264, 324322, 33);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `code` int(11) NOT NULL,
  `description` text,
  `salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`code`, `description`, `salary`) VALUES
(1122, 'Cheff', 7000),
(11221, 'Bartender', 3000),
(23432, 'GrillMan', 4000),
(32424, 'asdffdsa', 432534),
(45674, 'SalatMaker', 5040),
(112298, 'SDFSDF', 8000),
(324324, 'Barista', 3000),
(6765767, 'Staff Man', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tackplacein`
--

CREATE TABLE IF NOT EXISTS `tackplacein` (
  `Hall_code` int(11) NOT NULL,
  `Date_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tackplacein`
--

INSERT INTO `tackplacein` (`Hall_code`, `Date_Date`) VALUES
(213, '2015-01-06'),
(6985, '2015-01-06'),
(66545, '2015-01-06'),
(35464334, '2015-01-06'),
(6985, '2018-02-10'),
(66545, '2020-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `Employee_idEmployee` int(11) NOT NULL,
  `Hall_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`Employee_idEmployee`, `Hall_code`) VALUES
(0, 213),
(233, 213),
(454, 213),
(2354, 213),
(0, 5565),
(454, 6985),
(2354, 6985),
(3, 55878),
(3, 35464334),
(233, 35464334);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
 ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`idEmployee`,`Manager_idManager`), ADD KEY `fk_Employee_Manager1_idx` (`Manager_idManager`), ADD KEY `Position_code` (`Position_code`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`eventCode`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `include`
--
ALTER TABLE `include`
 ADD PRIMARY KEY (`Menu_code`,`Dish_code`), ADD KEY `fk_Dish_has_Menu_Menu1_idx` (`Menu_code`), ADD KEY `fk_Dish_has_Menu_Dish1_idx` (`Dish_code`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`idManager`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
 ADD PRIMARY KEY (`Hall_code`,`Menu_code`), ADD KEY `fk_Hall_has_Menu_Menu1_idx` (`Menu_code`), ADD KEY `fk_Hall_has_Menu_Hall1_idx` (`Hall_code`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`idOrder`), ADD KEY `fk_Order_Customer_idx` (`Customer_idCustomer`), ADD KEY `fk_Order_Manager1_idx` (`Manager_idManager`), ADD KEY `Event_eventCode` (`Event_eventCode`), ADD KEY `Hall_Code` (`Hall_Code`), ADD KEY `Date_date` (`Date_date`), ADD KEY `Menu_code` (`Menu_code`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tackplacein`
--
ALTER TABLE `tackplacein`
 ADD PRIMARY KEY (`Hall_code`,`Date_Date`), ADD KEY `Date_Date` (`Date_Date`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
 ADD PRIMARY KEY (`Employee_idEmployee`,`Hall_code`), ADD KEY `fk_Employee_has_Hall_Hall1_idx` (`Hall_code`), ADD KEY `fk_Employee_has_Hall_Employee1_idx` (`Employee_idEmployee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Position_code`) REFERENCES `position` (`code`),
ADD CONSTRAINT `fk_Employee_Manager1` FOREIGN KEY (`Manager_idManager`) REFERENCES `manager` (`idManager`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `include`
--
ALTER TABLE `include`
ADD CONSTRAINT `fk_Dish_has_Menu_Dish1` FOREIGN KEY (`Dish_code`) REFERENCES `dish` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Dish_has_Menu_Menu1` FOREIGN KEY (`Menu_code`) REFERENCES `menu` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
ADD CONSTRAINT `fk_Hall_has_Menu_Hall1` FOREIGN KEY (`Hall_code`) REFERENCES `hall` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Hall_has_Menu_Menu1` FOREIGN KEY (`Menu_code`) REFERENCES `menu` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `fk_Date_date` FOREIGN KEY (`Date_date`) REFERENCES `date` (`Date`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Event_code` FOREIGN KEY (`Event_eventCode`) REFERENCES `event` (`eventCode`),
ADD CONSTRAINT `fk_Hall_Code` FOREIGN KEY (`Hall_Code`) REFERENCES `hall` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Order_Customer` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Order_Manager1` FOREIGN KEY (`Manager_idManager`) REFERENCES `manager` (`idManager`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_menu` FOREIGN KEY (`Menu_code`) REFERENCES `menu` (`code`);

--
-- Constraints for table `tackplacein`
--
ALTER TABLE `tackplacein`
ADD CONSTRAINT `fk_date` FOREIGN KEY (`Date_Date`) REFERENCES `date` (`Date`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall` FOREIGN KEY (`Hall_code`) REFERENCES `hall` (`code`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
ADD CONSTRAINT `fk_Employee_has_Hall_Employee1` FOREIGN KEY (`Employee_idEmployee`) REFERENCES `employee` (`idEmployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Employee_has_Hall_Hall1` FOREIGN KEY (`Hall_code`) REFERENCES `hall` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
