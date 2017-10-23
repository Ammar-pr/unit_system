-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 10:59 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`) VALUES
(5, 'assssssss'),
(8, 'ssd'),
(9, 'sdfgvsdfgbsd');

-- --------------------------------------------------------

--
-- Table structure for table `colleges_departments`
--

CREATE TABLE `colleges_departments` (
  `id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `department_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unitfiletype`
--

CREATE TABLE `unitfiletype` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `extension` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `units_requests`
--

CREATE TABLE `units_requests` (
  `id` int(11) NOT NULL,
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

--
-- Dumping data for table `units_requests`
--

INSERT INTO `units_requests` (`id`, `id_requester`, `id_responder`, `request_date`, `response_date`, `status_id`, `unit_id`, `attachment_request_link`, `attachment_response_link`, `file_hash_response`, `file_hash_request`, `title`) VALUES
(1, 11, 232, '2017-10-25 04:12:15', '2017-10-25 04:12:15', 11, 13, 'sdfsdfsdfdsfsd', 'sdfdsfsdfsdfd', 'sdfsdfsdfsdfd', 'sdfdsfsdfsdfsdfsdfsd', 'sdfdsfsdf'),
(2, 1, 2, '2017-10-24 00:06:16', '2017-10-02 00:23:21', 1, 22, 'asd', 'asd', 'asdasd', 'asdasdsa', 'asdsads');

-- --------------------------------------------------------

--
-- Table structure for table `unit_service_type`
--

CREATE TABLE `unit_service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_service_type`
--

INSERT INTO `unit_service_type` (`id`, `name`, `description`) VALUES
(1, 'وحدة التحليل الاحصائي ', 'الاستشارة في أنواع البحث الكمي المختلفة والتحليل الاحصائي والمعالجة في الاوراق العلمية المقدمة للنشر، والإرشاد لاختيار الطرق المناسبة.'),
(2, 'وحدة التدقيق اللغوي العربي', 'توفير خدمة التدقيق اللغوي لملخصات الأوراق العلمية الأكاديمية باللغة العربية (لا تزيد عن ٥٠٠ كلمة)'),
(3, 'وحدة التدقيق اللغوي الانجليزي', 'توفير خدمة التدقيق اللغوي لملخصات الاوراق العلميه الاكاديميه باللغه الانجليزيه (لا تزيد عن ٥٠٠ كلمه)'),
(6, 'test', 'test'),
(7, 'ccc', '2344354'),
(9, 'dfgfdg', 'sfdsfsdfsd'),
(10, 'sdf', 'sdfds');

-- --------------------------------------------------------

--
-- Table structure for table `unit_status`
--

CREATE TABLE `unit_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL,
  `status_code` varchar(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_status`
--

INSERT INTO `unit_status` (`id`, `status_name`, `status_code`, `description`) VALUES
(7, 'ff', '55', 'sfdsfd'),
(8, 'ffss', '5s5', 'sfssdsfd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_job_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phonenumber_number` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_job_number`, `role_id`, `department_id`, `name`, `password`, `phonenumber_number`, `user_name`) VALUES
(1, 232, 22, 224, 'sdfsdf', 'sdfsdfesrg', '0503448951', 'qhc@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_number` int(11) UNSIGNED DEFAULT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_number`, `role_name`) VALUES
(2, NULL, 'asdfsdf'),
(80, 23, 'asdsa'),
(93, 12, 'asdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_name` (`department_name`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `unitfiletype`
--
ALTER TABLE `unitfiletype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `units_requests`
--
ALTER TABLE `units_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_id` (`unit_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id_requester` (`id_requester`),
  ADD KEY `id_responder` (`id_responder`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `id_requester_2` (`id_requester`);

--
-- Indexes for table `unit_service_type`
--
ALTER TABLE `unit_service_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `unit_status`
--
ALTER TABLE `unit_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_job_number` (`user_job_number`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `phonenumber_number` (`phonenumber_number`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `unitfiletype`
--
ALTER TABLE `unitfiletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `units_requests`
--
ALTER TABLE `units_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit_service_type`
--
ALTER TABLE `unit_service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `unit_status`
--
ALTER TABLE `unit_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges_departments`
--
ALTER TABLE `colleges_departments`
  ADD CONSTRAINT `colleges_departments_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

--
-- Constraints for table `unitfiletype`
--
ALTER TABLE `unitfiletype`
  ADD CONSTRAINT `unitfiletype_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit_service_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
