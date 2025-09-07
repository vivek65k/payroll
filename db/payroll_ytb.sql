-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2025 at 07:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_ytb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Sueradmin', 'superadmin', 'admin@admin.com', 'fcea920f7412b5da7be0cf42b8c93759', '1', 'Active', '2024-08-17 12:42:27'),
(22, 'admin', 'admin', 'admin1@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'Active', '2024-08-24 16:59:45'),
(26, 'Mahesh kumar', 'admin1', 'mirzaranu@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '3', 'Active', '2024-08-25 11:12:41'),
(30, 'Mahesh Siridhar', 'admin123', 'admin2@admin.com', '', '1', 'Active', '2024-09-08 12:18:22'),
(31, 'member', 'member', 'member@gmail.com', '', '2', 'Active', '2025-04-27 10:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `matrial_status` int(50) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `job_title` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `employment_type` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `reporting_manager` int(11) NOT NULL,
  `work_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `menu`, `module`, `label`, `icon`, `sort`, `status`) VALUES
(1, 'Talent Admin Work', 'attendance', 'Monitor Attendance', 'fa-user', 1, 'Active'),
(2, 'Manage WorkPlace', 'cs', 'Workplace', 'fa-user', 2, 'Active'),
(3, 'Visual Management', 'dashboard', 'Visibility Wall', 'fa-tachometer', 1, 'Active'),
(4, 'Talent Admin Work', 'employees', 'Talent Directory', 'fa-tachometer	', 2, 'Active'),
(5, 'System', 'modules', 'Manage Modules', 'fa-cog', 2, 'Active'),
(6, 'Talent Admin Work', 'payroll', 'Payroll', 'fa-tachometer', 2, 'Active'),
(7, 'System', 'permissions', 'Manage Deployment', 'fa-cogs', 2, 'Active'),
(8, 'Work Management', 'projects', 'Manage Projects', 'fa-bars', 2, 'Active'),
(9, 'Talent Admin Work', 'salary', 'Salary & Benefits', '', 2, 'Active'),
(10, 'System', 'users', 'Users & Parameters', '', 2, 'Active'),
(11, 'Work Management', 'attendance', 'Attendance', '', 2, 'Active'),
(12, 'Work Management', 'time_sheets', 'Time Sheets', '', 2, 'Active'),
(13, 'Talent Admin Work', 'leaves', 'Leave Settings', '', 2, 'Active'),
(14, 'Talent Admin Work', 'shift', 'Manage Shifts', '', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `other_details`
--

CREATE TABLE `other_details` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emergency_contact_number` varchar(255) NOT NULL,
  `health_condition` varchar(255) DEFAULT NULL,
  `pervious_employer_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `module_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`module_id`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'null', '2025-04-27 10:25:43', '2025-04-27 10:25:43'),
(2, 'Manager', '[\"2\",\"3\"]', '2025-04-27 10:27:48', '2025-04-27 10:27:48'),
(3, 'User', '[\"1\",\"4\",\"5\",\"6\",\"9\"]', '2025-04-27 10:27:56', '2025-04-27 10:27:56'),
(6, 'user2', '[\"1\",\"2\",\"6\"]', '2025-05-03 06:53:17', '2025-05-03 06:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `hra` varchar(255) NOT NULL,
  `allowance` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pan_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabmenu`
--

CREATE TABLE `tabmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `satus` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabmenu`
--

INSERT INTO `tabmenu` (`id`, `name`, `label`, `satus`, `module_id`) VALUES
(1, '', 'Users', 'Active', 10),
(2, 'roles', 'Roles', 'Active', 10),
(3, 'screen_permission', 'Screen Permission', 'Active', 10),
(4, '', 'Employees', 'Active', 4),
(5, 'contact', 'Contact', 'Active', 4),
(6, 'job_details', 'Job Details', 'Active', 4),
(7, 'documents', 'Documents', 'Active', 4),
(8, 'other_details', 'Other Details', 'Active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_details`
--
ALTER TABLE `other_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabmenu`
--
ALTER TABLE `tabmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `other_details`
--
ALTER TABLE `other_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabmenu`
--
ALTER TABLE `tabmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
