-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 06:48 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexticks`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `title_salutation` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `group_name` varchar(225) NOT NULL,
  `role_name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `validity` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`title_salutation`, `first_name`, `last_name`, `group_name`, `role_name`, `username`, `password`, `email`, `mobile`, `validity`) VALUES
('Mr ', 'Muhammad ', 'Hafizuddin', 'Bit Group Sdn Bhd ', 'Admin', 'hafizuddin', 'abc@123', 'muhammadhafizuddin@bit.com.my', '0132444640', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `name` varchar(225) NOT NULL,
  `deployment_state` varchar(50) NOT NULL,
  `incident_state` varchar(50) NOT NULL,
  `vendor` varchar(225) NOT NULL,
  `model` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `type` varchar(50) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `serial_number` varchar(225) NOT NULL,
  `operating_system` varchar(225) NOT NULL,
  `CPU` varchar(225) NOT NULL,
  `Ram` varchar(225) NOT NULL,
  `Hard Disk` varchar(225) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `FQDN` varchar(225) NOT NULL,
  `network_adapter` varchar(225) NOT NULL,
  `graphic_adapter` varchar(225) NOT NULL,
  `other_equipment` varchar(225) NOT NULL,
  `warranty_expiration_date` date NOT NULL,
  `install_date` date NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer_type`
--

CREATE TABLE `computer_type` (
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` varchar(225) NOT NULL,
  `customer` varchar(225) NOT NULL,
  `street` varchar(225) NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `valid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

CREATE TABLE `customer_user` (
  `title_salutation` varchar(50) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `customerID` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `street` varchar(225) NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `comment` text NOT NULL,
  `valid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deployment_state`
--

CREATE TABLE `deployment_state` (
  `deployment_state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `name` varchar(225) NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`name`, `validity`, `comment`) VALUES
('Bit Group Sdn Bhd ', 'Valid', 'Network Operation Center ');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `name` varchar(50) NOT NULL,
  `deployment_state` varchar(50) NOT NULL,
  `incident_state` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `waranty_expired_date` varchar(50) NOT NULL,
  `install_date` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hardware_type`
--

CREATE TABLE `hardware_type` (
  `hardware_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incident_state`
--

CREATE TABLE `incident_state` (
  `incident_state` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `name` varchar(50) NOT NULL,
  `deplyoment_state` varchar(50) NOT NULL,
  `incident_state` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `lv_no` varchar(50) NOT NULL,
  `ps_no` varchar(50) NOT NULL,
  `bs_no` varchar(50) NOT NULL,
  `dq_no` varchar(50) NOT NULL,
  `service_number` varchar(50) NOT NULL,
  `networkA\ddress_ps` varchar(50) NOT NULL,
  `networkAddress_bs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network_type`
--

CREATE TABLE `network_type` (
  `network_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `critical_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`critical_type`) VALUES
('high'),
('low '),
('normal'),
('very high\r\n'),
('very low');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `name` varchar(225) NOT NULL,
  `group_name` varchar(225) NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`name`, `group_name`, `validity`, `comment`) VALUES
('Admin', 'Bit Group Sdn Bhd ', 'Valid', ''),
('Agent', 'Bit Group Sdn Bhd ', 'Valid', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `sub_service` varchar(50) NOT NULL,
  `criticalty` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `service_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`service_type`) VALUES
('Back End'),
('Demonstration '),
('Front End'),
('IT Management'),
('IT Operational'),
('Other'),
('Project'),
('Reporting'),
('Training'),
('Underpinning Contract');

-- --------------------------------------------------------

--
-- Table structure for table `sla`
--

CREATE TABLE `sla` (
  `sla` varchar(225) NOT NULL,
  `sla_type` varchar(225) NOT NULL,
  `service` varchar(225) NOT NULL,
  `calendar` date NOT NULL,
  `first_response` time NOT NULL,
  `update_time` time NOT NULL,
  `solution_time` time NOT NULL,
  `min_time_between_incident(minute)` time NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sla_type`
--

CREATE TABLE `sla_type` (
  `sla_type` varchar(225) NOT NULL,
  `validity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sla_type`
--

INSERT INTO `sla_type` (`sla_type`, `validity`) VALUES
('Availability', ''),
('Other ', ''),
('Recovery Time', ''),
('Resolution Rate ', ''),
('Response Time ', ''),
('Transactions', '');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `name` varchar(50) NOT NULL,
  `deployment_state` varchar(50) NOT NULL,
  `incident_state` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `version` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `license_type` varchar(50) NOT NULL,
  `license_key` varchar(50) NOT NULL,
  `media` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software_type`
--

CREATE TABLE `software_type` (
  `software_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `validity_type`
--

CREATE TABLE `validity_type` (
  `validity` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validity_type`
--

INSERT INTO `validity_type` (`validity`) VALUES
(''),
('Valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`first_name`),
  ADD KEY `validity` (`validity`),
  ADD KEY `validity_2` (`validity`),
  ADD KEY `name_group` (`group_name`),
  ADD KEY `role_name` (`role_name`);

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`serial_number`),
  ADD KEY `deployment_state` (`deployment_state`),
  ADD KEY `incident_state` (`incident_state`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `computer_type`
--
ALTER TABLE `computer_type`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `validity_type` (`valid`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`first_name`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `validity_type` (`valid`);

--
-- Indexes for table `deployment_state`
--
ALTER TABLE `deployment_state`
  ADD PRIMARY KEY (`deployment_state`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`name`),
  ADD KEY `validity` (`validity`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`serial_number`),
  ADD KEY `deployment_state` (`deployment_state`),
  ADD KEY `incident_state` (`incident_state`),
  ADD KEY `hardware_type` (`type`) USING BTREE;

--
-- Indexes for table `hardware_type`
--
ALTER TABLE `hardware_type`
  ADD PRIMARY KEY (`hardware_type`);

--
-- Indexes for table `incident_state`
--
ALTER TABLE `incident_state`
  ADD PRIMARY KEY (`incident_state`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`ps_no`),
  ADD KEY `deplyoment_state` (`deplyoment_state`),
  ADD KEY `incident_state` (`incident_state`),
  ADD KEY `network_type` (`type`) USING BTREE;

--
-- Indexes for table `network_type`
--
ALTER TABLE `network_type`
  ADD PRIMARY KEY (`network_type`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`critical_type`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`name`),
  ADD KEY `validity_type` (`validity`),
  ADD KEY `group_name` (`group_name`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service`),
  ADD UNIQUE KEY `service_type` (`service_type`),
  ADD KEY `sub_service` (`sub_service`),
  ADD KEY `critical_type` (`criticalty`),
  ADD KEY `validity_type` (`validity`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`service_type`);

--
-- Indexes for table `sla`
--
ALTER TABLE `sla`
  ADD PRIMARY KEY (`sla`),
  ADD KEY `service` (`service`),
  ADD KEY `type` (`sla_type`),
  ADD KEY `validity` (`validity`(1)),
  ADD KEY `validity_2` (`validity`);

--
-- Indexes for table `sla_type`
--
ALTER TABLE `sla_type`
  ADD PRIMARY KEY (`sla_type`),
  ADD KEY `validity_type` (`validity`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`serial_number`),
  ADD UNIQUE KEY `incident_state` (`incident_state`),
  ADD KEY `deployment_state` (`deployment_state`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `software_type`
--
ALTER TABLE `software_type`
  ADD PRIMARY KEY (`software_type`);

--
-- Indexes for table `validity_type`
--
ALTER TABLE `validity_type`
  ADD PRIMARY KEY (`validity`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`validity`) REFERENCES `validity_type` (`validity`),
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`group_name`) REFERENCES `group` (`name`),
  ADD CONSTRAINT `agent_ibfk_3` FOREIGN KEY (`role_name`) REFERENCES `role` (`name`);

--
-- Constraints for table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `computer_ibfk_1` FOREIGN KEY (`type`) REFERENCES `computer_type` (`type`),
  ADD CONSTRAINT `computer_ibfk_2` FOREIGN KEY (`deployment_state`) REFERENCES `deployment_state` (`deployment_state`),
  ADD CONSTRAINT `computer_ibfk_3` FOREIGN KEY (`incident_state`) REFERENCES `incident_state` (`incident_state`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`valid`) REFERENCES `validity_type` (`validity`);

--
-- Constraints for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD CONSTRAINT `customer_user_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `customer_user_ibfk_2` FOREIGN KEY (`valid`) REFERENCES `validity_type` (`validity`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`validity`) REFERENCES `validity_type` (`validity`);

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`type`) REFERENCES `hardware_type` (`hardware_type`),
  ADD CONSTRAINT `hardware_ibfk_2` FOREIGN KEY (`deployment_state`) REFERENCES `deployment_state` (`deployment_state`),
  ADD CONSTRAINT `hardware_ibfk_3` FOREIGN KEY (`incident_state`) REFERENCES `incident_state` (`incident_state`);

--
-- Constraints for table `network`
--
ALTER TABLE `network`
  ADD CONSTRAINT `network_ibfk_1` FOREIGN KEY (`deplyoment_state`) REFERENCES `deployment_state` (`deployment_state`),
  ADD CONSTRAINT `network_ibfk_2` FOREIGN KEY (`type`) REFERENCES `network_type` (`network_type`),
  ADD CONSTRAINT `network_ibfk_3` FOREIGN KEY (`incident_state`) REFERENCES `incident_state` (`incident_state`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`validity`) REFERENCES `validity_type` (`validity`),
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`group_name`) REFERENCES `group` (`name`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`sub_service`) REFERENCES `service` (`service`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`criticalty`) REFERENCES `priority` (`critical_type`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`validity`) REFERENCES `validity_type` (`validity`),
  ADD CONSTRAINT `service_ibfk_4` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`service_type`);

--
-- Constraints for table `sla`
--
ALTER TABLE `sla`
  ADD CONSTRAINT `sla_ibfk_1` FOREIGN KEY (`validity`) REFERENCES `validity_type` (`validity`),
  ADD CONSTRAINT `sla_ibfk_2` FOREIGN KEY (`sla_type`) REFERENCES `sla_type` (`sla_type`),
  ADD CONSTRAINT `sla_ibfk_3` FOREIGN KEY (`service`) REFERENCES `service` (`service`);

--
-- Constraints for table `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `software_ibfk_1` FOREIGN KEY (`deployment_state`) REFERENCES `deployment_state` (`deployment_state`),
  ADD CONSTRAINT `software_ibfk_2` FOREIGN KEY (`type`) REFERENCES `software_type` (`software_type`),
  ADD CONSTRAINT `software_ibfk_3` FOREIGN KEY (`incident_state`) REFERENCES `incident_state` (`incident_state`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
