-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2017 at 08:56 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unit`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `colleges_departments`
--

CREATE TABLE `colleges_departments` (
  `dept_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `department_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `units_requests`
--

CREATE TABLE `units_requests` (
  `id_request` int(11) NOT NULL,
  `id_requester` int(11) NOT NULL,
  `id_responder` int(11) DEFAULT NULL,
  `request_date` datetime NOT NULL,
  `response_date` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `attachment_request_link` varchar(256) NOT NULL,
  `attachment_response_link` varchar(256) DEFAULT NULL,
  `file_hash_response` varchar(256) DEFAULT NULL,
  `file_hash_request` varchar(256) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit_file_types`
--

CREATE TABLE `unit_file_types` (
  `type_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `extension` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit_service_type`
--

CREATE TABLE `unit_service_type` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_service_type`
--

INSERT INTO `unit_service_type` (`unit_id`, `name`, `description`) VALUES
(1, 'وحدة التحليل الاحصائي ', 'الاستشارة في أنواع البحث الكمي المختلفة والتحليل الاحصائي والمعالجة في الاوراق العلمية المقدمة للنشر، والإرشاد لاختيار الطرق المناسبة.'),
(2, 'وحدة التدقيق اللغوي العربي', 'توفير خدمة التدقيق اللغوي لملخصات الأوراق العلمية الأكاديمية باللغة العربية (لا تزيد عن ٥٠٠ كلمة)'),
(3, 'وحدة التدقيق اللغوي الانجليزي', 'توفير خدمة التدقيق اللغوي لملخصات الاوراق العلميه الاكاديميه باللغه الانجليزيه (لا تزيد عن ٥٠٠ كلمه)');

-- --------------------------------------------------------

--
-- Table structure for table `unit_status`
--

CREATE TABLE `unit_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL,
  `status_code` varchar(6) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_job_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phonenumber_number` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `role_id` int(11) NOT NULL,
  `role_number` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `units_requests`
--
ALTER TABLE `units_requests`
  ADD PRIMARY KEY (`id_request`),
  ADD UNIQUE KEY `id_user` (`id_requester`),
  ADD KEY `id_responder` (`id_responder`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `unid_id_index` (`unit_id`);

--
-- Indexes for table `unit_file_types`
--
ALTER TABLE `unit_file_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `unit_id_index_unit_service_type` (`unit_id`);

--
-- Indexes for table `unit_service_type`
--
ALTER TABLE `unit_service_type`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `unit_status`
--
ALTER TABLE `unit_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_index` (`status_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_job_number` (`user_job_number`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units_requests`
--
ALTER TABLE `units_requests`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_file_types`
--
ALTER TABLE `unit_file_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_service_type`
--
ALTER TABLE `unit_service_type`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `unit_status`
--
ALTER TABLE `unit_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  ADD CONSTRAINT `colleges_departments_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`);

--
-- Constraints for table `units_requests`
--
ALTER TABLE `units_requests`
  ADD CONSTRAINT `id_requester_linked_users` FOREIGN KEY (`id_requester`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `id_responder_linked_usres` FOREIGN KEY (`id_responder`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `statis_id_linked_unit_status` FOREIGN KEY (`status_id`) REFERENCES `unit_status` (`status_id`),
  ADD CONSTRAINT `unit_id_linked_unit_service_type` FOREIGN KEY (`unit_id`) REFERENCES `unit_service_type` (`unit_id`);

--
-- Constraints for table `unit_file_types`
--
ALTER TABLE `unit_file_types`
  ADD CONSTRAINT `unit_file_types_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit_service_type` (`unit_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `colleges_departments` (`dept_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `users_roles` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
