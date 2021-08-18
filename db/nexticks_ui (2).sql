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
-- Database: `nexticks_ui`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom_create_topic`
--

CREATE TABLE `classroom_create_topic` (
  `id` int(11) NOT NULL,
  `id_topic` varchar(255) NOT NULL,
  `title_topic` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classroom_listsubject`
--

CREATE TABLE `classroom_listsubject` (
  `id` int(11) NOT NULL,
  `id_topic` varchar(255) NOT NULL,
  `type_file` varchar(255) NOT NULL,
  `describe_subject` mediumtext NOT NULL,
  `title_subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_fielddatables`
--

CREATE TABLE `list_fielddatables` (
  `id` int(11) NOT NULL,
  `id_view` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_formfield`
--

CREATE TABLE `list_formfield` (
  `id` int(11) NOT NULL,
  `id_view` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name_field` varchar(255) NOT NULL,
  `id_field` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_function_in_module`
--

CREATE TABLE `register_function_in_module` (
  `id` int(11) NOT NULL,
  `nama_module` varchar(255) NOT NULL,
  `nama_function` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_module`
--

CREATE TABLE `register_module` (
  `id` int(11) NOT NULL,
  `name_register` varchar(255) NOT NULL,
  `name_model` varchar(255) NOT NULL,
  `fa_fa_icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_view`
--

CREATE TABLE `register_view` (
  `id` int(11) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `title_form` varchar(255) NOT NULL,
  `id_view` varchar(255) NOT NULL,
  `status_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_interface_text`
--

CREATE TABLE `user_interface_text` (
  `id` int(11) NOT NULL,
  `full_text_header` varchar(255) NOT NULL,
  `short_text_header` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom_create_topic`
--
ALTER TABLE `classroom_create_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_listsubject`
--
ALTER TABLE `classroom_listsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_fielddatables`
--
ALTER TABLE `list_fielddatables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_formfield`
--
ALTER TABLE `list_formfield`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_function_in_module`
--
ALTER TABLE `register_function_in_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_module`
--
ALTER TABLE `register_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_view`
--
ALTER TABLE `register_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interface_text`
--
ALTER TABLE `user_interface_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom_create_topic`
--
ALTER TABLE `classroom_create_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classroom_listsubject`
--
ALTER TABLE `classroom_listsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `list_fielddatables`
--
ALTER TABLE `list_fielddatables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `list_formfield`
--
ALTER TABLE `list_formfield`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `register_function_in_module`
--
ALTER TABLE `register_function_in_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_module`
--
ALTER TABLE `register_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register_view`
--
ALTER TABLE `register_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `user_interface_text`
--
ALTER TABLE `user_interface_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
