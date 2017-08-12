-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2017 at 09:08 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `slug`) VALUES
(1, 'Add User', 'Add new user', 'users_add'),
(2, 'Search users', 'Search all user', 'users_search'),
(3, 'List users', 'View list of users', 'users_lists'),
(4, 'Modify user profile', 'Modify user profile', 'users_profile_modify'),
(5, 'Delete user', 'Delete specifc user', 'users_delete'),
(6, 'Assign role to user', 'Assign user role', 'users_role_assign'),
(7, 'Remove user role', 'Remove role from user', 'users_role_remove'),
(8, 'Create role', 'Create role', 'roles_create'),
(9, 'Delete role', 'Delete role', 'roles_delete'),
(10, 'Update role', 'Update role', 'roles_update'),
(11, 'Role permission change', 'Role permission change', 'roles_permission_change'),
(12, 'Chanage Username', 'Change username', 'users_username_change'),
(13, 'Change Email Address', 'Change email address', 'users_email_change'),
(14, 'Change User\'s Security Questions', 'Change security questions of an user', 'users_security_question_changed'),
(15, 'Change User\'s Security Answers', 'Change security answers of an user', 'users_security_answer_changed'),
(16, 'Change User\'s Password', 'Change password of an user', 'users_password_changed'),
(17, 'Add Permission', 'Add new Permission', 'permissions_add'),
(18, 'Update Permission', 'Update Permission', 'permissions_update'),
(19, 'Delete Permission', 'Delete Permission', 'permissions_delete'),
(20, 'List Permissions', 'View list of Permissions', 'permissions_lists');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(80) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `slug`, `descriptions`, `created`, `modified`, `is_locked`) VALUES
(1, 'e8ec82c5-a6a4-4f83-84b4-57b253f83c6d', 'General User', 'general-user', 'General User', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(2, 'e8ec82c5-a6a4-4f83-84b4-57b254d83c6n', 'Administrator', 'administrator', 'Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(3, 'e8ec82c5-a6a4-4f88-84c4-57b253f8367d', 'Super Administrator', 'super-administrator', 'Super Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(4, 'e8fc82c5-a6a4-2f83-84b4-57b253f83c31', 'Account Manager', 'account-manager', 'Account manager for individual user or client', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(5, 'e8fw82a5-a6a4-2f62-84b4-57b253f83c50', 'Billing Manager', 'billing-manager', 'Billing manager to manage billing', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(6, 'f8fw82c5-a6a4-2f62-84b4-57b253rf3c38', 'DevOPS Engineer', 'devops-engineer', 'DevOPS engineer to manage all platform backend architecture', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(7, 'f8fw82c5-a6a4-2f62-84b4-57b253f12c91', 'Sales Manager', 'sales-manager', 'Sales Executive', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(8, 'f8fw82c5-a6a4-2f62-66b4-57b222f02d91', 'Support Manager', 'support-manager', 'Support Manager', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carrera`
--

CREATE TABLE `tbl_carrera` (
  `carr_id` int(11) NOT NULL,
  `carr_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `tbl_carrera`
--

INSERT INTO `tbl_carrera` (`carr_id`, `carr_nombre`) VALUES
(1, 'System engineering'),
(2, 'Sociology'),
(3, 'Accounting'),
(4, 'Arquitect'),
(5, 'Nurse'),
(6, 'Medical Doctor'),
(7, 'Policeman'),
(8, 'Bussinessman'),
(9, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estudiante`
--

CREATE TABLE `tbl_estudiante` (
  `estu_id` int(11) NOT NULL,
  `estu_nombre` varchar(45) NOT NULL,
  `estu_apellido` varchar(45) NOT NULL,
  `estu_cedula` int(11) NOT NULL,
  `carr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `tbl_estudiante`
--

INSERT INTO `tbl_estudiante` (`estu_id`, `estu_nombre`, `estu_apellido`, `estu_cedula`, `carr_id`) VALUES
(4, 'Esteban', 'Leon', 19201202, 2),
(7, 'Carlos', 'Gonzalez', 123456, 3),
(9, 'Ysmael', 'Blanco', 12000311, 3),
(10, 'Carlos', 'Ramos', 18292111, 2),
(12, 'Cecilio', 'Jimenez', 16987234, 1),
(13, 'Pedro', 'Perez', 15030322, 2),
(14, 'Ruben', 'Mejias', 20929112, 2),
(15, 'Erick', 'Perez', 18782999, 3),
(17, 'Silvio', 'Bustamante', 23001922, 3),
(20, 'Carlos', 'Farias', 123445, 8),
(22, 'Claudio', 'Saraza', 43434343, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` char(36) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_hash` varchar(120) DEFAULT NULL,
  `password_token` varchar(120) DEFAULT NULL,
  `password_last_modified` datetime DEFAULT NULL,
  `password_last_modified_ip` varchar(24) DEFAULT NULL,
  `email_address` varchar(120) NOT NULL,
  `email_address_verified` tinyint(1) NOT NULL DEFAULT '0',
  `last_seen` datetime DEFAULT NULL,
  `last_seen_ip` varchar(24) DEFAULT NULL,
  `last_loggedin` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `username`, `password`, `password_hash`, `password_token`, `password_last_modified`, `password_last_modified_ip`, `email_address`, `email_address_verified`, `last_seen`, `last_seen_ip`, `last_loggedin`, `status`, `is_visible`, `created`, `modified`) VALUES
(1, '1122334455667788', 'info@besofty.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'info@besofty.com', 0, NULL, NULL, NULL, 1, 1, NULL, NULL),
(2, '1acd2gbj5fdcv', 'shantaex81@besofty.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'shantaex81@besofty.com', 0, NULL, NULL, NULL, 1, 1, NULL, NULL),
(39, '7d83b187-4d2f-4bde-9fbc-c66da814de88', 'sasyragoha@yahoo.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'sasyragoha@yahoo.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-06 11:34:49', '2017-08-11 02:52:23'),
(40, 'c7a6f28f-c913-49d9-ad9d-e2f3e87b8bc0', 'duragory@yahoo.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'duragory@yahoo.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-06 11:34:58', NULL),
(41, '4a46942c-73ea-4fcb-933f-ad4f5e61a762', 'vahipumu@hotmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'vahipumu@hotmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-06 11:35:05', NULL),
(42, '0b4718c1-dbaa-40c0-886a-6b277c953f63', 'tecow@hotmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'tecow@hotmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-06 11:35:11', NULL),
(43, 'e6bb65ae-94b8-40d7-b98e-e4a39b94687e', 'xapaxydigy@yahoo.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'xapaxydigy@yahoo.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-06 11:35:18', NULL),
(44, '50b31797-dbb7-4876-85b8-bea7cf0ce898', 'sypivivo@hotmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'sypivivo@hotmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-07 01:26:43', NULL),
(45, '701439ec-84b5-4ef3-82ad-070f39ce6727', 'jehezuxiw@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'jehezuxiw@gmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-07 02:29:57', NULL),
(46, 'a40924bb-1561-47ac-9dac-5fdca1bcf774', 'fowepe@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'fowepe@gmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-07 02:30:03', NULL),
(47, '243a8ccf-e22c-44fa-98ff-67038fa6fa94', 'cavo@yahoo.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'cavo@yahoo.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-07 02:30:08', NULL),
(48, '320a7533-d7e7-4811-98f9-e1e42de25fd0', 'dekymufem@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'dekymufem@gmail.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-10 11:58:51', NULL),
(49, '7f80ef87-273f-403d-bf93-e6cd43b8fb6d', 'bilyfohof@yahoo.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, NULL, NULL, NULL, 'bilyfohof@yahoo.com', 0, NULL, NULL, NULL, 1, 1, '2017-08-11 12:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_addresses`
--

CREATE TABLE `users_addresses` (
  `id` int(11) NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(80) DEFAULT NULL,
  `street_secondary` varchar(80) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `state` varchar(80) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `country` varchar(80) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'primary',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_addresses`
--

INSERT INTO `users_addresses` (`id`, `uuid`, `user_id`, `street`, `street_secondary`, `city`, `state`, `postal_code`, `country`, `phone`, `fax`, `type`, `created`, `modified`) VALUES
(1, '2w4r5t6y7uqs1180', 1, '17/3, Mirpur Road, Dhaka', NULL, 'Dhaka', NULL, 1205, 'Bangladesh', NULL, NULL, 'primary', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `family_name` varchar(80) DEFAULT NULL,
  `nick_name` varchar(80) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `picture` varchar(120) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `timezone` varchar(40) DEFAULT 'UTC',
  `language` varchar(10) DEFAULT 'en_US',
  `security_questions_one` varchar(80) DEFAULT NULL,
  `security_questions_one_answer` varchar(80) DEFAULT NULL,
  `security_questions_two` varchar(80) DEFAULT NULL,
  `security_questions_two_answer` varchar(80) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `family_name`, `nick_name`, `title`, `gender`, `picture`, `date_of_birth`, `timezone`, `language`, `security_questions_one`, `security_questions_one_answer`, `security_questions_two`, `security_questions_two_answer`, `created`, `modified`) VALUES
(1, 1, 'Besofty', 'Software Limited', 'Info', 'Company', 'Ms', 'female', NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Shanta', 'Shanta', 'Sharu', 'Sharu', 'Ms', 'male', NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 39, 'Sharmin', 'Akter', 'Sharu', 'Sharu', 'Ms', 'female', NULL, '2016-11-03', 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-06 11:34:50', '2017-08-11 02:52:23'),
(38, 40, 'Freya', 'Snow', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-06 11:34:58', NULL),
(39, 41, 'Nero', 'Hawkins', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-06 11:35:05', NULL),
(40, 42, 'Driscoll', 'Walsh', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-06 11:35:11', NULL),
(41, 43, 'Jackson', 'Peterson', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-06 11:35:19', NULL),
(42, 44, 'Hayden', 'Woodward', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-07 01:26:44', NULL),
(43, 45, 'Zachery', 'Macias', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-07 02:29:57', NULL),
(44, 46, 'Emma', 'Terrell', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-07 02:30:03', NULL),
(45, 47, 'Jade', 'Harding', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-07 02:30:08', NULL),
(46, 48, 'Rafael', 'Hammond', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-10 11:58:51', NULL),
(47, 49, 'Zelda', 'Kelly', NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en_US', NULL, NULL, NULL, NULL, '2017-08-11 12:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `is_active`, `created`, `modified`) VALUES
(1, 1, 3, 1, NULL, NULL),
(2, 2, 1, 1, NULL, NULL),
(37, 39, 4, 1, '2017-08-06 11:34:50', NULL),
(38, 40, 7, 1, '2017-08-06 11:34:58', NULL),
(39, 41, 1, 1, '2017-08-06 11:35:05', NULL),
(40, 42, 4, 1, '2017-08-06 11:35:12', NULL),
(41, 43, 1, 1, '2017-08-06 11:35:19', NULL),
(42, 44, 1, 1, '2017-08-07 01:26:44', NULL),
(43, 45, 2, 1, '2017-08-07 02:29:58', NULL),
(44, 46, 6, 1, '2017-08-07 02:30:03', NULL),
(45, 47, 1, 1, '2017-08-07 02:30:09', NULL),
(46, 48, 1, 1, '2017-08-10 11:58:51', NULL),
(47, 49, 1, 1, '2017-08-11 12:59:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carrera`
--
ALTER TABLE `tbl_carrera`
  ADD PRIMARY KEY (`carr_id`);

--
-- Indexes for table `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  ADD PRIMARY KEY (`estu_id`),
  ADD KEY `carr_id` (`carr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_carrera`
--
ALTER TABLE `tbl_carrera`
  MODIFY `carr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  MODIFY `estu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  ADD CONSTRAINT `tbl_estudiante_ibfk_1` FOREIGN KEY (`carr_id`) REFERENCES `tbl_carrera` (`carr_id`);

--
-- Constraints for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
