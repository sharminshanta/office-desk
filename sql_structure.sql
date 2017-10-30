-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 01:33 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total_hour` time NOT NULL,
  `working_hour` time DEFAULT NULL,
  `leisure_time` time NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = Regular, 2 = Late,  3 = absent, 4 = Leave',
  `office_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `working_hour` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(10) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(21, 'List roles', 'View list of roles', 'roles_lists'),
(22, 'Office Settings', 'Office Settings', 'office-settings'),
(23, 'Update Profile', 'Update Profile', 'profile_update');

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
(1, 'e8ec82c5-a6a4-4f83-84b4-57b253f83c6d', 0, 'General User', 'general-user', 'General User', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(2, 'e8ec82c5-a6a4-4f83-84b4-57b254d83c6n', 0, 'Administrator', 'administrator', 'Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(3, 'e8ec82c5-a6a4-4f88-84c4-57b253f8367d', 0, 'Super Administrator', 'super-administrator', 'Super Administrator', '2017-07-09 11:43:01', '2017-07-09 11:43:01', 1),
(4, 'e8fc82c5-a6a4-2f83-84b4-57b253f83c31', 0, 'Account Manager', 'account-manager', 'Account manager for individual user or client', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(5, 'e8fw82a5-a6a4-2f62-84b4-57b253f83c50', 0, 'Billing Manager', 'billing-manager', 'Billing manager to manage billing', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(6, 'f8fw82c5-a6a4-2f62-84b4-57b253rf3c38', 0, 'DevOPS Engineer', 'devops-engineer', 'DevOPS engineer to manage all platform backend architecture', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(7, 'f8fw82c5-a6a4-2f62-84b4-57b253f12c91', 0, 'Sales Manager', 'sales-manager', 'Sales Executive', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1),
(8, 'f8fw82c5-a6a4-2f62-66b4-57b222f02d91', 0, 'Support Manager', 'support-manager', 'Support Manager', '2017-07-17 13:27:34', '2017-07-17 13:27:34', 1);

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
(1, 3, '1'),
(2, 3, '2'),
(3, 3, '3'),
(4, 3, '4'),
(5, 3, '5'),
(6, 3, '6'),
(7, 3, '7'),
(8, 3, '8'),
(9, 3, '9'),
(10, 3, '10'),
(11, 3, '11'),
(12, 3, '12'),
(13, 3, '13'),
(14, 3, '14'),
(15, 3, '15'),
(16, 3, '16'),
(17, 3, '17'),
(18, 3, '18'),
(19, 3, '19'),
(20, 3, '20'),
(21, 3, '21'),
(22, 3, '22'),
(23, 3, '23'),

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
(1, '1122334455667788', 'info@besofty.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 'info@besofty.com', 0, NULL, NULL, NULL, 1, 1, NULL, NULL);
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
(1, 1, 'Besofty', 'Software Limited', 'Info', 'Info', 'Miss', 'female', NULL, '0000-00-00', 'UTC', 'en_US', NULL, NULL, NULL, NULL, NULL, '2017-08-08 11:49:18');
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
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id` (`id`);

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
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `permission_id_2` (`permission_id`);

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;