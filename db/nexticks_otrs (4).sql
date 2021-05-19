-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 09:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexticks_otrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `validity` varchar(225) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `env` varchar(255) NOT NULL,
  `user_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent_info`
--

CREATE TABLE `agent_info` (
  `ticket_owner` varchar(50) NOT NULL,
  `responsible` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create` datetime NOT NULL,
  `changed_by` varchar(50) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent_module`
--

CREATE TABLE `agent_module` (
  `id` int(11) NOT NULL,
  `group_agent` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email`
--

CREATE TABLE `auto_email` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `backup_type`
--

CREATE TABLE `backup_type` (
  `name` varchar(225) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_calendar` varchar(255) NOT NULL,
  `end_calendar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `caused_of_fault`
--

CREATE TABLE `caused_of_fault` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmdb_link_location`
--

CREATE TABLE `cmdb_link_location` (
  `RegisterID` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Location_ID` varchar(255) NOT NULL,
  `Row_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmdb_link_location_itsm`
--

CREATE TABLE `cmdb_link_location_itsm` (
  `id` int(11) NOT NULL,
  `CAT` varchar(255) NOT NULL,
  `Link_ID` varchar(255) NOT NULL,
  `Location_ID` varchar(255) NOT NULL,
  `Validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmdb_register_link`
--

CREATE TABLE `cmdb_register_link` (
  `CustomerID` varchar(255) NOT NULL,
  `Service` varchar(255) NOT NULL,
  `SLA` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Created` varchar(255) NOT NULL,
  `RegisterID` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Changed` varchar(255) NOT NULL,
  `CAT` varchar(255) NOT NULL,
  `UpdateBy` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `name` varchar(225) NOT NULL,
  `deployment_state` varchar(50) DEFAULT NULL,
  `incident_state` varchar(50) DEFAULT NULL,
  `vendor` varchar(225) DEFAULT NULL,
  `model` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `owner` varchar(225) DEFAULT NULL,
  `serial_number` varchar(225) DEFAULT NULL,
  `operating_system` varchar(225) DEFAULT NULL,
  `CPU` varchar(225) DEFAULT NULL,
  `Ram` varchar(225) DEFAULT NULL,
  `HardDisk` varchar(225) DEFAULT NULL,
  `capacity` varchar(50) DEFAULT NULL,
  `FQDN` varchar(225) DEFAULT NULL,
  `network_adapter` varchar(225) DEFAULT NULL,
  `graphic_adapter` varchar(225) DEFAULT NULL,
  `other_equipment` varchar(225) DEFAULT NULL,
  `warranty_expiration_date` varchar(255) DEFAULT NULL,
  `install_date` varchar(255) DEFAULT NULL,
  `validity` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `note` text,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `config_id` varchar(255) DEFAULT NULL,
  `network_port` varchar(255) DEFAULT NULL,
  `cpu_model` varchar(255) DEFAULT NULL,
  `cpu_serial_no` varchar(255) DEFAULT NULL,
  `processor_type` varchar(255) DEFAULT NULL,
  `monitor_brand` varchar(255) DEFAULT NULL,
  `monitor_model` varchar(255) DEFAULT NULL,
  `monitor_serial_no` varchar(255) DEFAULT NULL,
  `ups_brand` varchar(255) DEFAULT NULL,
  `ups_model` varchar(255) DEFAULT NULL,
  `ups_serial_no` varchar(255) DEFAULT NULL
  `mac_address` varchar(255) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer_type`
--

CREATE TABLE `computer_type` (
  `computer_type` varchar(50) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criticality_type`
--

CREATE TABLE `criticality_type` (
  `Criticality` varchar(50) NOT NULL,
  `created` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` varchar(225) NOT NULL,
  `customer` varchar(225) DEFAULT NULL,
  `street` varchar(225) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `country` varchar(225) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  `comment` text,
  `valid` varchar(50) DEFAULT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customeruser_location`
--

CREATE TABLE `customeruser_location` (
  `id` int(11) NOT NULL,
  `CustomerUser` varchar(255) NOT NULL,
  `location_id` varchar(255) NOT NULL,
  `Validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `ticket_no` longblob NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `sla` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `customer_user` varchar(50) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `itsm_category` varchar(50) NOT NULL,
  `cc` varchar(50) NOT NULL,
  `bc` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `changed_by` varchar(50) NOT NULL,
  `changed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` int(11) NOT NULL,
  `CustomerID` varchar(255) NOT NULL,
  `ServiceID` varchar(255) NOT NULL,
  `Validity` varchar(255) NOT NULL
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
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `street` varchar(225) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `city` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `comment` text NOT NULL,
  `valid` varchar(50) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo_account_request`
--

CREATE TABLE `demo_account_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deployment_state`
--

CREATE TABLE `deployment_state` (
  `deployment_state` varchar(50) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_address`
--

CREATE TABLE `email_address` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faulty_category_portion`
--

CREATE TABLE `faulty_category_portion` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faulty_category_type`
--

CREATE TABLE `faulty_category_type` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fault_itsm_category`
--

CREATE TABLE `fault_itsm_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `changed` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `name` varchar(225) NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `Changed` varchar(255) NOT NULL,
  `Created` varchar(255) NOT NULL,
  `id_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_chat_activities`
--

CREATE TABLE `group_chat_activities` (
  `id` int(11) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `chat` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_chat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_chat_register`
--

CREATE TABLE `group_chat_register` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_key` varchar(255) NOT NULL,
  `id_chat` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `public_key` varchar(255) DEFAULT NULL,
  `close` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `id_chat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `name` varchar(50) NOT NULL,
  `deployment_state` varchar(50) DEFAULT NULL,
  `incident_state` varchar(50) DEFAULT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `description` text,
  `type` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `warranty_expiration_date` varchar(50) DEFAULT NULL,
  `install_date` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `valid` varchar(255) DEFAULT NULL,
  `changed` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `validity` varchar(50) DEFAULT NULL,
  `other_id` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `config_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `network_port` varchar(255) DEFAULT NULL,
  `firmware_version` varchar(255) DEFAULT NULL
  `mac_address` varchar(255) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hardware_type`
--

CREATE TABLE `hardware_type` (
  `hardware_type` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `other_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incident_state`
--

CREATE TABLE `incident_state` (
  `incident_state` varchar(225) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `knowledbased_access`
--

CREATE TABLE `knowledbased_access` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebase`
--

CREATE TABLE `knowledgebase` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `topic` text,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `id_kb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `name` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `deployment_state` varchar(255) NOT NULL,
  `incident_state` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_type`
--

CREATE TABLE `location_type` (
  `location_type` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `other_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(11) NOT NULL,
  `type_activities` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_department`
--

CREATE TABLE `lookup_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `department_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_level`
--

CREATE TABLE `lookup_level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `level_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_account`
--

CREATE TABLE `mail_account` (
  `type` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `host` varchar(50) NOT NULL,
  `imap` varchar(50) NOT NULL,
  `queue` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_line_status`
--

CREATE TABLE `main_line_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_child_note`
--

CREATE TABLE `ms_child_note` (
  `id` int(11) NOT NULL,
  `id_ticket_master` varchar(255) NOT NULL,
  `text_editor` mediumtext NOT NULL,
  `type_note` varchar(255) NOT NULL,
  `type_state` varchar(255) NOT NULL,
  `id_noted` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `pending_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_link_ticket`
--

CREATE TABLE `ms_link_ticket` (
  `id` int(11) NOT NULL,
  `id_ticket_master` varchar(255) NOT NULL,
  `id_ticket_single` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_register_ticket`
--

CREATE TABLE `ms_register_ticket` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `provider_ref` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `queu` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `responsibilty` varchar(255) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `status_ticket` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `current_state` varchar(255) NOT NULL,
  `pending_date` varchar(255) NOT NULL,
  `id_noted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_ticket_closed`
--

CREATE TABLE `ms_ticket_closed` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `responsibility` varchar(255) NOT NULL,
  `tt_no` varchar(255) NOT NULL,
  `vtt_no` varchar(255) NOT NULL,
  `cause_of_fault` varchar(255) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `close_type` varchar(255) NOT NULL,
  `text_editor` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `Problem` varchar(255) NOT NULL,
  `Portion` varchar(255) NOT NULL,
  `Fault_Type` varchar(255) NOT NULL,
  `total_time_closed` varchar(255) NOT NULL,
  `pending_time_closed` varchar(255) NOT NULL,
  `working_time_closed` varchar(255) NOT NULL,
  `Ticket_Validation_Outage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `name` varchar(50) NOT NULL,
  `deployment_state` varchar(50) DEFAULT NULL,
  `incident_state` varchar(50) DEFAULT NULL,
  `description` text,
  `type` varchar(50) DEFAULT NULL,
  `lv_no` varchar(50) DEFAULT NULL,
  `ps_no` varchar(50) DEFAULT NULL,
  `bs_no` varchar(50) DEFAULT NULL,
  `dq_no` varchar(50) DEFAULT NULL,
  `service_number` varchar(50) DEFAULT NULL,
  `networkAddress_ps` varchar(50) DEFAULT NULL,
  `networkAddress_bs` varchar(50) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `changed` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `other_id` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `network_id` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `config_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network_customer_user`
--

CREATE TABLE `network_customer_user` (
  `id` int(11) NOT NULL,
  `network_id` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network_type`
--

CREATE TABLE `network_type` (
  `network_type` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `other_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `net_send`
--

CREATE TABLE `net_send` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` longtext NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `updateBy` varchar(255) NOT NULL,
  `generated_id` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `net_send_reschedule`
--

CREATE TABLE `net_send_reschedule` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateBy` varchar(255) DEFAULT NULL,
  `generated_id` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `date_schedule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `net_send_user`
--

CREATE TABLE `net_send_user` (
  `id` int(11) NOT NULL,
  `id_note` varchar(255) NOT NULL,
  `computer_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm2_activity`
--

CREATE TABLE `ppm2_activity` (
  `id` int(11) NOT NULL,
  `activitiy_name` text,
  `description_activity` text,
  `type_ppm` text,
  `start_date` text,
  `end_date` text,
  `created_by` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rand_id` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_comment`
--

CREATE TABLE `ppm_comment` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_computer_checklist`
--

CREATE TABLE `ppm_computer_checklist` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `checklist_1` varchar(255) DEFAULT NULL,
  `checklist_2` varchar(255) DEFAULT NULL,
  `checklist_3` varchar(255) DEFAULT NULL,
  `checklist_4` varchar(255) DEFAULT NULL,
  `checklist_5` varchar(255) DEFAULT NULL,
  `checklist_6` varchar(255) DEFAULT NULL,
  `checklist_7` varchar(255) DEFAULT NULL,
  `checklist_8` varchar(255) DEFAULT NULL,
  `checklist_9` varchar(255) DEFAULT NULL,
  `physical_1` varchar(255) DEFAULT NULL,
  `physical_2` varchar(255) DEFAULT NULL,
  `physical_3` varchar(255) DEFAULT NULL,
  `physical_4` varchar(255) DEFAULT NULL,
  `physical_5` varchar(255) DEFAULT NULL,
  `physical_6` varchar(255) DEFAULT NULL,
  `physical_7` varchar(255) DEFAULT NULL,
  `physical_8` varchar(255) DEFAULT NULL,
  `defrag_1` varchar(255) DEFAULT NULL,
  `defrag_2` varchar(255) DEFAULT NULL,
  `defrag_3` varchar(255) DEFAULT NULL,
  `defrag_4` varchar(255) DEFAULT NULL,
  `defrag_5` varchar(255) DEFAULT NULL,
  `defrag_6` varchar(255) DEFAULT NULL,
  `analysis` varchar(255) DEFAULT NULL,
  `type_defrag` varchar(255) DEFAULT NULL,
  `win_update` varchar(255) DEFAULT NULL,
  `check_antivirus` varchar(255) DEFAULT NULL,
  `perform_antivirus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_computer_device`
--

CREATE TABLE `ppm_computer_device` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `ppm_type` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `cpu_brand` varchar(255) DEFAULT NULL,
  `cpu_level` varchar(255) DEFAULT NULL,
  `cpu_serial_number` varchar(255) DEFAULT NULL,
  `cpu_processor_type` varchar(255) DEFAULT NULL,
  `cpu_ram` varchar(255) DEFAULT NULL,
  `cpu_model` varchar(255) DEFAULT NULL,
  `monitor_brand` varchar(255) DEFAULT NULL,
  `monitor_model` varchar(255) DEFAULT NULL,
  `monitor_serial_number` varchar(255) DEFAULT NULL,
  `ups_brand` varchar(255) DEFAULT NULL,
  `ups_model` varchar(255) DEFAULT NULL,
  `ups_serial_number` varchar(255) DEFAULT NULL,
  `network_port` varchar(255) DEFAULT NULL,
  `network_type` varchar(255) DEFAULT NULL,
  `network_ip` varchar(255) DEFAULT NULL,
  `tagging_device` varchar(255) DEFAULT NULL,
  `tagging_date` varchar(255) DEFAULT NULL,
  `tagging_replace` varchar(255) DEFAULT NULL,
  `tagging_tag` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_hardware_checklist`
--

CREATE TABLE `ppm_hardware_checklist` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `physical_1` varchar(255) DEFAULT NULL,
  `physical_2` varchar(255) DEFAULT NULL,
  `physical_3` varchar(255) DEFAULT NULL,
  `physical_4` varchar(255) DEFAULT NULL,
  `physical_5` varchar(255) DEFAULT NULL,
  `physical_6` varchar(255) DEFAULT NULL,
  `physical_7` varchar(255) DEFAULT NULL,
  `physical_8` varchar(255) DEFAULT NULL,
  `physical_9` varchar(255) DEFAULT NULL,
  `physical_10` varchar(255) DEFAULT NULL,
  `physical_11` varchar(255) DEFAULT NULL,
  `physical_12` varchar(255) DEFAULT NULL,
  `physical_13` varchar(255) DEFAULT NULL,
  `physical_14` varchar(255) DEFAULT NULL,
  `setting_1` varchar(255) DEFAULT NULL,
  `setting_2` varchar(255) DEFAULT NULL,
  `setting_3` varchar(255) DEFAULT NULL,
  `setting_4` varchar(255) DEFAULT NULL,
  `setting_5` varchar(255) DEFAULT NULL,
  `setting_6` varchar(255) DEFAULT NULL,
  `setting_7` varchar(255) DEFAULT NULL,
  `setting_8` varchar(255) DEFAULT NULL,
  `setting_9` varchar(255) DEFAULT NULL,
  `setting_10` varchar(255) DEFAULT NULL,
  `load_balance_1` varchar(255) DEFAULT NULL,
  `load_balance_2` varchar(255) DEFAULT NULL,
  `load_balance_3` varchar(255) DEFAULT NULL,
  `firewall_1` varchar(255) DEFAULT NULL,
  `firewall_2` varchar(255) DEFAULT NULL,
  `firewall_3` varchar(255) DEFAULT NULL,
  `firewall_4` varchar(255) DEFAULT NULL,
  `firewall_5` varchar(255) DEFAULT NULL,
  `firewall_6` varchar(255) DEFAULT NULL,
  `firewall_7` varchar(255) DEFAULT NULL,
  `firewall_8` varchar(255) DEFAULT NULL,
  `firewall_9` varchar(255) DEFAULT NULL,
  `firewall_10` varchar(255) DEFAULT NULL,
  `firewall_11` varchar(255) DEFAULT NULL,
  `firewall_12` varchar(255) DEFAULT NULL,
  `firewall_13` varchar(255) DEFAULT NULL,
  `firewall_14` varchar(255) DEFAULT NULL,
  `firewall_15` varchar(255) DEFAULT NULL,
  `firewall_16` varchar(255) DEFAULT NULL,
  `firewall_17` varchar(255) DEFAULT NULL,
  `firewall_18` varchar(255) DEFAULT NULL,
  `firewall_19` varchar(255) DEFAULT NULL,
  `firewall_20` varchar(255) DEFAULT NULL,
  `firewall_21` varchar(255) DEFAULT NULL,
  `firewall_22` varchar(255) DEFAULT NULL,
  `firewall_23` varchar(255) DEFAULT NULL,
  `ups_1` varchar(255) DEFAULT NULL,
  `ups_2` varchar(255) DEFAULT NULL,
  `ups_3` varchar(255) DEFAULT NULL,
  `ups_4` varchar(255) DEFAULT NULL,
  `ups_5` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `memory` varchar(255) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `snmp_string` varchar(255) DEFAULT NULL,
  `unit_management_ip` varchar(255) DEFAULT NULL,
  `percentage_connection` varchar(255) DEFAULT NULL,
  `system_uptime` varchar(255) DEFAULT NULL,
  `snmp_string_firewall` varchar(255) DEFAULT NULL,
  `unique_firewall` varchar(255) DEFAULT NULL,
  `data_ol` varchar(255) DEFAULT NULL,
  `data_bc` varchar(255) DEFAULT NULL,
  `data_bt` varchar(255) DEFAULT NULL,
  `data_rt` varchar(255) DEFAULT NULL,
  `hard_disk_usage` varchar(255) DEFAULT NULL,
  `firewall_24` varchar(255) DEFAULT NULL,
  `firewall_25` varchar(255) DEFAULT NULL,
  `firewall_26` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_hardware_device`
--

CREATE TABLE `ppm_hardware_device` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `type_ppm` varchar(255) DEFAULT NULL,
  `type_device` varchar(255) DEFAULT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `manufacture` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `firmware` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_printer_checklist`
--

CREATE TABLE `ppm_printer_checklist` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `checklist_1` varchar(255) DEFAULT NULL,
  `checklist_2` varchar(255) DEFAULT NULL,
  `checklist_3` varchar(255) DEFAULT NULL,
  `checklist_4` varchar(255) DEFAULT NULL,
  `checklist_5` varchar(255) DEFAULT NULL,
  `checklist_6` varchar(255) DEFAULT NULL,
  `checklist_7` varchar(255) DEFAULT NULL,
  `checklist_8` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_printer_device`
--

CREATE TABLE `ppm_printer_device` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `ppm_type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `manufacture` varchar(255) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `network_ip` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `device_tag` varchar(255) DEFAULT NULL,
  `need_replacement` varchar(255) DEFAULT NULL,
  `date_replacement` varchar(255) DEFAULT NULL,
  `ppm_tag` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_register`
--

CREATE TABLE `ppm_register` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `changed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ppm_type` varchar(255) DEFAULT NULL,
  `ppm_device` varchar(255) DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `acknowledge` varchar(255) DEFAULT NULL,
  `endorse` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_reference` varchar(255) DEFAULT NULL,
  `code_reference` varchar(255) DEFAULT NULL,
  `reject_ppm_task` varchar(255) DEFAULT NULL,
  `reason_reject` varchar(255) DEFAULT NULL,
  `date_verify` varchar(255) DEFAULT NULL,
  `date_endorse` varchar(255) DEFAULT NULL,
  `date_reject` varchar(255) DEFAULT NULL,
  `type_ppm_activity` text COMMENT '// refer ppm2_activity id ',
  `status_ppm` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_server_checklist`
--

CREATE TABLE `ppm_server_checklist` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `physical_1` varchar(255) DEFAULT NULL,
  `physical_2` varchar(255) DEFAULT NULL,
  `physical_3` varchar(255) DEFAULT NULL,
  `physical_4` varchar(255) DEFAULT NULL,
  `physical_5` varchar(255) DEFAULT NULL,
  `physical_6` varchar(255) DEFAULT NULL,
  `physical_7` varchar(255) DEFAULT NULL,
  `physical_8` varchar(255) DEFAULT NULL,
  `physical_9` varchar(255) DEFAULT NULL,
  `physical_10` varchar(255) DEFAULT NULL,
  `physical_11` varchar(255) DEFAULT NULL,
  `physical_12` varchar(255) DEFAULT NULL,
  `physical_13` varchar(255) DEFAULT NULL,
  `physical_14` varchar(255) DEFAULT NULL,
  `physical_15` varchar(255) DEFAULT NULL,
  `physical_16` varchar(255) DEFAULT NULL,
  `physical_17` varchar(255) DEFAULT NULL,
  `physical_18` varchar(255) DEFAULT NULL,
  `physical_19` varchar(255) DEFAULT NULL,
  `physical_20` varchar(255) DEFAULT NULL,
  `physical_21` varchar(255) DEFAULT NULL,
  `physical_22` varchar(255) DEFAULT NULL,
  `physical_23` varchar(255) DEFAULT NULL,
  `physical_24` varchar(255) DEFAULT NULL,
  `physical_25` varchar(255) DEFAULT NULL,
  `physical_26` varchar(255) DEFAULT NULL,
  `physical_27` varchar(255) DEFAULT NULL,
  `setting_1` varchar(255) DEFAULT NULL,
  `setting_2` varchar(255) DEFAULT NULL,
  `setting_3` varchar(255) DEFAULT NULL,
  `setting_4` varchar(255) DEFAULT NULL,
  `setting_5` varchar(255) DEFAULT NULL,
  `setting_6` varchar(255) DEFAULT NULL,
  `setting_7` varchar(255) DEFAULT NULL,
  `setting_8` varchar(255) DEFAULT NULL,
  `setting_9` varchar(255) DEFAULT NULL,
  `setting_10` varchar(255) DEFAULT NULL,
  `setting_11` varchar(255) DEFAULT NULL,
  `setting_12` varchar(255) DEFAULT NULL,
  `setting_13` varchar(255) DEFAULT NULL,
  `setting_14` varchar(255) DEFAULT NULL,
  `setting_15` varchar(255) DEFAULT NULL,
  `setting_16` varchar(255) DEFAULT NULL,
  `setting_17` varchar(255) DEFAULT NULL,
  `setting_18` varchar(255) DEFAULT NULL,
  `setting_19` varchar(255) DEFAULT NULL,
  `setting_20` varchar(255) DEFAULT NULL,
  `setting_21` varchar(255) DEFAULT NULL,
  `setting_22` varchar(255) DEFAULT NULL,
  `setting_23` varchar(255) DEFAULT NULL,
  `house_keeping_1` varchar(255) DEFAULT NULL,
  `house_keeping_2` varchar(255) DEFAULT NULL,
  `house_keeping_3` varchar(255) DEFAULT NULL,
  `house_keeping_4` varchar(255) DEFAULT NULL,
  `house_keeping_5` varchar(255) DEFAULT NULL,
  `house_keeping_6` varchar(255) DEFAULT NULL,
  `house_keeping_7` varchar(255) DEFAULT NULL,
  `security_1` varchar(255) DEFAULT NULL,
  `security_2` varchar(255) DEFAULT NULL,
  `security_3` varchar(255) DEFAULT NULL,
  `security_4` varchar(255) DEFAULT NULL,
  `security_5` varchar(255) DEFAULT NULL,
  `security_6` varchar(255) DEFAULT NULL,
  `security_7` varchar(255) DEFAULT NULL,
  `security_8` varchar(255) DEFAULT NULL,
  `security_9` varchar(255) DEFAULT NULL,
  `security_10` varchar(255) DEFAULT NULL,
  `security_11` varchar(255) DEFAULT NULL,
  `security_12` varchar(255) DEFAULT NULL,
  `cpu_speed` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `sn_kvm` varchar(255) DEFAULT NULL,
  `sn_tape` varchar(255) DEFAULT NULL,
  `service_pack` varchar(255) DEFAULT NULL,
  `need_replacement_houskeeping` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppm_worksation_asset`
--

CREATE TABLE `ppm_worksation_asset` (
  `name` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `critical_type` varchar(225) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problem_description`
--

CREATE TABLE `problem_description` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `name` varchar(50) NOT NULL,
  `group` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remote_activity`
--

CREATE TABLE `remote_activity` (
  `id` int(11) NOT NULL,
  `name_remote` varchar(255) NOT NULL,
  `ip_remote` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_canvas`
--

CREATE TABLE `report_canvas` (
  `id` int(11) NOT NULL,
  `Report_ID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_data_column`
--

CREATE TABLE `report_data_column` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_table` varchar(255) NOT NULL,
  `name_column` varchar(255) NOT NULL,
  `name_report_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_group`
--

CREATE TABLE `report_group` (
  `id` int(11) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `report_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_register`
--

CREATE TABLE `report_register` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_location` varchar(255) NOT NULL,
  `report_ticket_id` varchar(255) NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `report_description` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_set_column`
--

CREATE TABLE `report_set_column` (
  `id` int(11) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `report_column_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `name` varchar(225) NOT NULL,
  `group_name` varchar(225) NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` text NOT NULL,
  `created` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `id_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service` varchar(50) NOT NULL,
  `sub_service` varchar(50) NOT NULL,
  `criticalty` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `service_generated_id` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_sla`
--

CREATE TABLE `service_sla` (
  `id` int(11) NOT NULL,
  `sla_id` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `Validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `service_type` varchar(225) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `service_type_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE `severity` (
  `id` int(11) NOT NULL,
  `sev_name` varchar(255) NOT NULL,
  `sev_time` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `updateBy` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sla`
--

CREATE TABLE `sla` (
  `sla` varchar(225) NOT NULL,
  `calendar` varchar(255) NOT NULL,
  `first_response` varchar(255) NOT NULL,
  `update_time` varchar(255) NOT NULL,
  `solution_time` varchar(255) NOT NULL,
  `min_time_between_incident` varchar(255) NOT NULL,
  `validity` varchar(225) NOT NULL,
  `comment` text NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `sla_id` varchar(255) NOT NULL,
  `sla_type` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `sla_breach` varchar(255) NOT NULL,
  `severity` varchar(255) NOT NULL,
  `type_of_sla` varchar(255) NOT NULL,
  `sla_generated_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sla_severity`
--

CREATE TABLE `sla_severity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `minute` varchar(255) NOT NULL,
  `sla_generated_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sla_type`
--

CREATE TABLE `sla_type` (
  `sla_type` varchar(225) NOT NULL,
  `validity` varchar(10) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `socket_chat`
--

CREATE TABLE `socket_chat` (
  `id` int(11) NOT NULL,
  `text_msg` longtext NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `name` varchar(50) NOT NULL,
  `deployment_state` varchar(50) DEFAULT NULL,
  `incident_state` varchar(50) DEFAULT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `description` text,
  `type` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `license_type` varchar(50) DEFAULT NULL,
  `license_key` varchar(50) DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `changed` varchar(255) DEFAULT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `config_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software_type`
--

CREATE TABLE `software_type` (
  `software_type` varchar(50) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `other_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_child_attachment`
--

CREATE TABLE `td_child_attachment` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `id_noted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_child_custuser`
--

CREATE TABLE `td_child_custuser` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `custUser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_child_note`
--

CREATE TABLE `td_child_note` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `text_editor` longtext NOT NULL,
  `type_note` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `id_noted` varchar(255) NOT NULL,
  `type_state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_count_pending`
--

CREATE TABLE `td_count_pending` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_parent_note`
--

CREATE TABLE `td_parent_note` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `queu` varchar(255) NOT NULL,
  `text_editor` longtext NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `id_noted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_pending_ticket`
--

CREATE TABLE `td_pending_ticket` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `text_editor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_register_ticket`
--

CREATE TABLE `td_register_ticket` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `sla` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `custID` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pending_date` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `main_status` varchar(255) NOT NULL,
  `backup_type` varchar(255) NOT NULL,
  `backup_status` varchar(255) NOT NULL,
  `ticket_owner` varchar(255) NOT NULL,
  `ticket_responsibilty` varchar(255) NOT NULL,
  `type_ticket` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `status_ticket` varchar(255) NOT NULL,
  `itsm_category` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `provider_ref` varchar(255) NOT NULL,
  `current_state` varchar(255) NOT NULL,
  `type_enviroment` varchar(255) NOT NULL,
  `faultCategory` varchar(255) NOT NULL,
  `severity` varchar(255) NOT NULL,
  `fault_itsm_category` varchar(255) DEFAULT NULL,
  `problem_desc_itsm` varchar(255) DEFAULT NULL,
  `extension_no` varchar(255) DEFAULT NULL,
  `status_lock` int(11) NOT NULL,
  `lock_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_ticket_closed`
--

CREATE TABLE `td_ticket_closed` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `responsibility` varchar(255) NOT NULL,
  `tt_no` varchar(255) NOT NULL,
  `vtt_no` varchar(255) NOT NULL,
  `cause_of_fault` varchar(255) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `close_type` varchar(255) NOT NULL,
  `text_editor` longtext NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `Problem` varchar(255) NOT NULL,
  `Portion` varchar(255) NOT NULL,
  `Fault_Type` varchar(255) NOT NULL,
  `total_time_closed` varchar(255) NOT NULL,
  `pending_time_closed` varchar(255) NOT NULL,
  `working_time_closed` varchar(255) NOT NULL,
  `Ticket_Validation_Outage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_total_pending`
--

CREATE TABLE `td_total_pending` (
  `id` int(11) NOT NULL,
  `id_ticket` varchar(255) NOT NULL,
  `total_minutes` varchar(255) NOT NULL,
  `diff_day` varchar(255) NOT NULL,
  `diff_hour` varchar(255) NOT NULL,
  `diff_minutes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_graph`
--

CREATE TABLE `test_graph` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `ticket_type` varchar(50) NOT NULL,
  `ticket_queue` varchar(50) NOT NULL,
  `title_subject` varchar(255) NOT NULL,
  `option` varchar(50) NOT NULL,
  `ticket_text` text NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `pending_date` datetime NOT NULL,
  `impact` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `mainline_status` varchar(50) NOT NULL,
  `backup_type` varchar(50) NOT NULL,
  `backup_status` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `changed_by` varchar(50) NOT NULL,
  `changed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_lock_activities`
--

CREATE TABLE `ticket_lock_activities` (
  `id` int(11) NOT NULL,
  `status_lock` int(11) NOT NULL,
  `lock_by` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_mobile`
--

CREATE TABLE `ticket_mobile` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `type_asset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_state`
--

CREATE TABLE `ticket_state` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `state_type` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_state_type`
--

CREATE TABLE `ticket_state_type` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status_email`
--

CREATE TABLE `ticket_status_email` (
  `id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_text`
--

CREATE TABLE `ticket_text` (
  `ticket_text_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `time_unit` int(11) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `change_by` varchar(50) NOT NULL,
  `change_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `name` varchar(50) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `changed` varchar(50) NOT NULL,
  `default_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `validity_type`
--

CREATE TABLE `validity_type` (
  `validity` varchar(225) NOT NULL,
  `created` varchar(255) NOT NULL,
  `changed` varchar(255) NOT NULL,
  `default_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ticket`
-- (See below for the actual view)
--
CREATE TABLE `view_ticket` (
`id_ticket` varchar(255)
,`current_state` varchar(255)
,`category` varchar(255)
,`fault_itsm_category` varchar(255)
,`problem_desc_itsm` varchar(255)
,`start_date` varchar(255)
,`created_ticket_by` varchar(255)
,`ticket_responsibilty` varchar(255)
,`ticket_owner` varchar(255)
,`location` varchar(255)
,`sla` varchar(255)
,`title` varchar(255)
,`type` varchar(255)
,`queu` varchar(255)
,`parent_editor` longtext
,`note_editor` longtext
,`type_state` varchar(255)
,`date_note` varchar(255)
,`created_note_by` varchar(255)
,`responsibility` varchar(255)
,`action_taken` varchar(255)
,`note_closed` longtext
,`Problem` varchar(255)
,`Fault_Type` varchar(255)
,`total_time_closed` varchar(255)
,`working_time_closed` varchar(255)
,`closed_by` varchar(255)
,`closed_date` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_ticket`
--
DROP TABLE IF EXISTS `view_ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ticket`  AS  select `a`.`id_ticket` AS `id_ticket`,`a`.`current_state` AS `current_state`,`a`.`category` AS `category`,`a`.`fault_itsm_category` AS `fault_itsm_category`,`a`.`problem_desc_itsm` AS `problem_desc_itsm`,`a`.`created_date` AS `start_date`,`a`.`created_by` AS `created_ticket_by`,`a`.`ticket_responsibilty` AS `ticket_responsibilty`,`a`.`ticket_owner` AS `ticket_owner`,`a`.`location` AS `location`,`a`.`sla` AS `sla`,`b`.`title` AS `title`,`b`.`type` AS `type`,`b`.`queu` AS `queu`,`b`.`text_editor` AS `parent_editor`,`c`.`text_editor` AS `note_editor`,`c`.`type_state` AS `type_state`,`c`.`created_date` AS `date_note`,`c`.`created_by` AS `created_note_by`,`d`.`responsibility` AS `responsibility`,`d`.`action_taken` AS `action_taken`,`d`.`text_editor` AS `note_closed`,`d`.`Problem` AS `Problem`,`d`.`Fault_Type` AS `Fault_Type`,`d`.`total_time_closed` AS `total_time_closed`,`d`.`working_time_closed` AS `working_time_closed`,`d`.`created_by` AS `closed_by`,`d`.`created_date` AS `closed_date` from (((`td_register_ticket` `a` left join `td_parent_note` `b` on((`a`.`id_ticket` = `b`.`id_ticket`))) left join `td_child_note` `c` on((`c`.`id_ticket` = `b`.`id_ticket`))) left join `td_ticket_closed` `d` on((`d`.`id_ticket` = `a`.`id_ticket`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD UNIQUE KEY `idx_agent_id` (`userid`),
  ADD KEY `idx_agent` (`first_name`,`group_name`,`role_name`,`username`,`password`,`email`,`mobile`,`validity`,`env`);

--
-- Indexes for table `agent_module`
--
ALTER TABLE `agent_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_email`
--
ALTER TABLE `auto_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_type`
--
ALTER TABLE `backup_type`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmdb_link_location_itsm`
--
ALTER TABLE `cmdb_link_location_itsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmdb_register_link`
--
ALTER TABLE `cmdb_register_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD KEY `idx_computer` (`name`,`deployment_state`,`incident_state`,`model`,`type`,`serial_number`,`validity`,`location`,`ip`,`other_id`);

--
-- Indexes for table `customeruser_location`
--
ALTER TABLE `customeruser_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD KEY `idx_customer_user` (`first_name`,`last_name`,`username`,`password`,`email`,`mobile`,`valid`,`other_id`);

--
-- Indexes for table `demo_account_request`
--
ALTER TABLE `demo_account_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_address`
--
ALTER TABLE `email_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fault_itsm_category`
--
ALTER TABLE `fault_itsm_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat_activities`
--
ALTER TABLE `group_chat_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat_register`
--
ALTER TABLE `group_chat_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD KEY `idx_hardware` (`name`,`deployment_state`,`incident_state`,`serial_number`,`validity`,`location`,`other_id`);

--
-- Indexes for table `knowledbased_access`
--
ALTER TABLE `knowledbased_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledgebase`
--
ALTER TABLE `knowledgebase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location` ADD FULLTEXT KEY `idx_location` (`name`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_login_user` (`username`,`password`,`role`,`userid`,`status`,`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_department`
--
ALTER TABLE `lookup_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_level`
--
ALTER TABLE `lookup_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_line_status`
--
ALTER TABLE `main_line_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_child_note`
--
ALTER TABLE `ms_child_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_link_ticket`
--
ALTER TABLE `ms_link_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_register_ticket`
--
ALTER TABLE `ms_register_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_ticket_closed`
--
ALTER TABLE `ms_ticket_closed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD KEY `idx_network` (`name`,`deployment_state`,`incident_state`,`model`,`type`,`service_number`,`lv_no`,`ps_no`,`bs_no`,`dq_no`,`validity`,`location`,`ip`,`other_id`);

--
-- Indexes for table `network_customer_user`
--
ALTER TABLE `network_customer_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `net_send`
--
ALTER TABLE `net_send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `net_send_reschedule`
--
ALTER TABLE `net_send_reschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `net_send_user`
--
ALTER TABLE `net_send_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm2_activity`
--
ALTER TABLE `ppm2_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_comment`
--
ALTER TABLE `ppm_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_computer_checklist`
--
ALTER TABLE `ppm_computer_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_computer_device`
--
ALTER TABLE `ppm_computer_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_hardware_checklist`
--
ALTER TABLE `ppm_hardware_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_hardware_device`
--
ALTER TABLE `ppm_hardware_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_printer_checklist`
--
ALTER TABLE `ppm_printer_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_printer_device`
--
ALTER TABLE `ppm_printer_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_register`
--
ALTER TABLE `ppm_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppm_server_checklist`
--
ALTER TABLE `ppm_server_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_description`
--
ALTER TABLE `problem_description` ADD FULLTEXT KEY `idx_problem_description` (`name`);

--
-- Indexes for table `remote_activity`
--
ALTER TABLE `remote_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_canvas`
--
ALTER TABLE `report_canvas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_data_column`
--
ALTER TABLE `report_data_column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_group`
--
ALTER TABLE `report_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_register`
--
ALTER TABLE `report_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_set_column`
--
ALTER TABLE `report_set_column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sla`
--
ALTER TABLE `service_sla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sla`
--
ALTER TABLE `sla`
  ADD KEY `idx_sla` (`sla`,`sla_generated_id`);

--
-- Indexes for table `sla_severity`
--
ALTER TABLE `sla_severity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sla_severity` (`title`,`minute`,`sla_generated_id`,`id`);

--
-- Indexes for table `socket_chat`
--
ALTER TABLE `socket_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software` ADD FULLTEXT KEY `idx_software` (`name`);

--
-- Indexes for table `td_child_attachment`
--
ALTER TABLE `td_child_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_child_custuser`
--
ALTER TABLE `td_child_custuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_child_note`
--
ALTER TABLE `td_child_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_child_note` (`id_ticket`,`type_note`,`type_state`);

--
-- Indexes for table `td_count_pending`
--
ALTER TABLE `td_count_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_parent_note`
--
ALTER TABLE `td_parent_note`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_id_ticket_parent_note` (`id_ticket`);
ALTER TABLE `td_parent_note` ADD FULLTEXT KEY `idx_title_parent_note` (`title`);
ALTER TABLE `td_parent_note` ADD FULLTEXT KEY `idx_text_editor_parent_note` (`text_editor`);
ALTER TABLE `td_parent_note` ADD FULLTEXT KEY `idx_title_parent_note_text_editor` (`text_editor`);

--
-- Indexes for table `td_pending_ticket`
--
ALTER TABLE `td_pending_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_register_ticket`
--
ALTER TABLE `td_register_ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_id_ticket` (`id_ticket`),
  ADD KEY `idx_td_register_ticket` (`ticket_responsibilty`,`problem_desc_itsm`,`location`,`status_ticket`,`fault_itsm_category`,`current_state`);

--
-- Indexes for table `td_ticket_closed`
--
ALTER TABLE `td_ticket_closed`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_id_ticket_closed` (`id_ticket`),
  ADD KEY `idx_td_ticket_closed` (`responsibility`,`close_type`,`Fault_Type`);
ALTER TABLE `td_ticket_closed` ADD FULLTEXT KEY `idx_td_ticket_closed_fulltext` (`action_taken`,`text_editor`,`Problem`);

--
-- Indexes for table `td_total_pending`
--
ALTER TABLE `td_total_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_graph`
--
ALTER TABLE `test_graph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_lock_activities`
--
ALTER TABLE `ticket_lock_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_mobile`
--
ALTER TABLE `ticket_mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_state`
--
ALTER TABLE `ticket_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_status_email`
--
ALTER TABLE `ticket_status_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_module`
--
ALTER TABLE `agent_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `auto_email`
--
ALTER TABLE `auto_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cmdb_link_location_itsm`
--
ALTER TABLE `cmdb_link_location_itsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8757;

--
-- AUTO_INCREMENT for table `cmdb_register_link`
--
ALTER TABLE `cmdb_register_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customeruser_location`
--
ALTER TABLE `customeruser_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `demo_account_request`
--
ALTER TABLE `demo_account_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_address`
--
ALTER TABLE `email_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fault_itsm_category`
--
ALTER TABLE `fault_itsm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_chat_activities`
--
ALTER TABLE `group_chat_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `group_chat_register`
--
ALTER TABLE `group_chat_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `knowledbased_access`
--
ALTER TABLE `knowledbased_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `knowledgebase`
--
ALTER TABLE `knowledgebase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24392;

--
-- AUTO_INCREMENT for table `lookup_department`
--
ALTER TABLE `lookup_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lookup_level`
--
ALTER TABLE `lookup_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_line_status`
--
ALTER TABLE `main_line_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_child_note`
--
ALTER TABLE `ms_child_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_link_ticket`
--
ALTER TABLE `ms_link_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ms_register_ticket`
--
ALTER TABLE `ms_register_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_ticket_closed`
--
ALTER TABLE `ms_ticket_closed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network_customer_user`
--
ALTER TABLE `network_customer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `net_send`
--
ALTER TABLE `net_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `net_send_reschedule`
--
ALTER TABLE `net_send_reschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `net_send_user`
--
ALTER TABLE `net_send_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ppm2_activity`
--
ALTER TABLE `ppm2_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ppm_comment`
--
ALTER TABLE `ppm_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ppm_computer_checklist`
--
ALTER TABLE `ppm_computer_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ppm_computer_device`
--
ALTER TABLE `ppm_computer_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ppm_hardware_checklist`
--
ALTER TABLE `ppm_hardware_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppm_hardware_device`
--
ALTER TABLE `ppm_hardware_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppm_printer_checklist`
--
ALTER TABLE `ppm_printer_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ppm_printer_device`
--
ALTER TABLE `ppm_printer_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ppm_register`
--
ALTER TABLE `ppm_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ppm_server_checklist`
--
ALTER TABLE `ppm_server_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remote_activity`
--
ALTER TABLE `remote_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `report_canvas`
--
ALTER TABLE `report_canvas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_data_column`
--
ALTER TABLE `report_data_column`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_group`
--
ALTER TABLE `report_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_register`
--
ALTER TABLE `report_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_set_column`
--
ALTER TABLE `report_set_column`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_sla`
--
ALTER TABLE `service_sla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `severity`
--
ALTER TABLE `severity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sla_severity`
--
ALTER TABLE `sla_severity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `socket_chat`
--
ALTER TABLE `socket_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `td_child_attachment`
--
ALTER TABLE `td_child_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `td_child_custuser`
--
ALTER TABLE `td_child_custuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5804;

--
-- AUTO_INCREMENT for table `td_child_note`
--
ALTER TABLE `td_child_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20946;

--
-- AUTO_INCREMENT for table `td_count_pending`
--
ALTER TABLE `td_count_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `td_parent_note`
--
ALTER TABLE `td_parent_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5919;

--
-- AUTO_INCREMENT for table `td_pending_ticket`
--
ALTER TABLE `td_pending_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_register_ticket`
--
ALTER TABLE `td_register_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5950;

--
-- AUTO_INCREMENT for table `td_ticket_closed`
--
ALTER TABLE `td_ticket_closed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6198;

--
-- AUTO_INCREMENT for table `td_total_pending`
--
ALTER TABLE `td_total_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_lock_activities`
--
ALTER TABLE `ticket_lock_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ticket_status_email`
--
ALTER TABLE `ticket_status_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
