-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2017 at 12:55 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besofty-desk`
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
(20, 'List Permissions', 'View list of Permissions', 'permissions_lists'),
(21, 'List Roles', 'View list of roles', 'roles_lists'),
(22, 'Update Profile', 'Update Profile', 'profile_update'),
(23, 'settings', 'settings', 'office-settings');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `user_id`, `name`, `slug`, `description`, `created`, `modified`, `is_locked`) VALUES
(1, 'd5ec932d-3555-4dc1-bdd2-514993b4e89b', 1, 'General User', 'general-user', 'General User', '2017-09-22 04:10:57', '2017-09-23 08:54:28', 1),
(2, 'e8ec82c5-a6a4-4f83-84b4-57b254d83c6n', 0, 'Administrator', 'administrator', 'Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(3, 'e8ec82c5-a6a4-4f88-84c4-57b253f8367d', 0, 'Super Administrator', 'super-administrator', 'Super Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(4, 'e8fc82c5-a6a4-2f83-84b4-57b253f83c31', 0, 'Account Manager', 'account-manager', 'Account manager for individual user or client', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(5, 'e8fw82a5-a6a4-2f62-84b4-57b253f83c50', 0, 'Billing Manager', 'billing-manager', 'Billing manager to manage billing', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(7, 'f8fw82c5-a6a4-2f62-84b4-57b253f12c91', 0, 'Sales Manager', 'sales-manager', 'Sales Executive', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(8, 'e43dca48-42da-4cbe-8b0f-a6d1bf8c9eba', 1, 'Support Manager', 'support-manager', 'Support Manager', '2017-07-17 13:27:34', '2017-09-22 04:25:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`) VALUES
(20, 3, '1'),
(21, 3, '2'),
(22, 3, '3'),
(23, 3, '4'),
(24, 3, '5'),
(25, 3, '6'),
(26, 3, '7'),
(27, 3, '8'),
(28, 3, '9'),
(29, 3, '10'),
(30, 3, '11'),
(31, 3, '12'),
(32, 3, '13'),
(33, 3, '14'),
(34, 3, '15'),
(35, 3, '16'),
(36, 3, '17'),
(37, 3, '18'),
(38, 3, '19'),
(39, 3, '20'),
(40, 3, '21'),
(41, 3, '22'),
(53, 3, '23');

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
(1, '1122334455667788', 'admin@besofty.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'admin@besofty.com', 0, NULL, NULL, NULL, 1, 1, NULL, '2017-09-23 10:13:48');

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
(1, 1, 'Besofty', 'Software Limited', 'Info', 'Info', 'Ms', 'female', NULL, '0000-00-00', 'UTC', 'en_US', NULL, NULL, NULL, NULL, NULL, '2017-09-23 10:13:48');

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
(1, 1, 3, 1, NULL, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
