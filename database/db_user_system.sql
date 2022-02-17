-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-12-24 08:34:30'),
(2, 'emran', 'aaf935d9a06a9f2b00f69cee8905ed9deeae3f6a', '2021-12-30 03:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replied` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `uid`, `subject`, `feedback`, `created_at`, `replied`) VALUES
(1, 3, 'About this project', 'User management system and admin panel', '2021-12-21 09:39:25', 0),
(2, 1, 'Test Feedback', 'Notification test feedback', '2021-12-21 10:36:18', 1),
(3, 3, 'kmon achen', 'please contact me', '2021-12-28 15:43:41', 1),
(4, 8, 'User Management System', 'This site is very nice', '2021-12-30 04:03:24', 1),
(6, 8, 'User Management System', 'This site is very nice', '2021-12-30 04:56:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `uid`, `title`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, 'Full stack developer', 'A Full Stack Developer is someone who works with the Back End — or server side — of the application as well as the Front End, or client side. Full Stack Developers have to have some skills in a wide variety of coding niches, from databases to graphic design and UI/UX management in order to do their job well.', '2021-12-17 03:09:25', '2021-12-17 03:09:25'),
(2, 3, 'Web design', 'Web design refers to the design of websites that are displayed on the internet. It usually refers to the user experience aspects of website development rather than software development. ... A web designer works on the appearance, layout, and, in some cases, content of a website.', '2021-12-17 03:14:23', '2021-12-17 03:14:23'),
(3, 3, 'Web Developer', 'Web developers create and maintain websites. They are also responsible for the site\'s technical aspects, such as its performance and capacity, which are measures of a website\'s speed and how much traffic the site can handle. ... They are responsible for the look and functionality of the website or interface.', '2021-12-17 03:16:12', '2021-12-17 03:16:12'),
(4, 3, 'PHP Developer', 'Bachelor\'s degree in computer science or a similar field. Knowledge of PHP web frameworks including Yii, Laravel, and CodeIgniter. Knowledge of front-end technologies including CSS3, JavaScript, and HTML5. Understanding of object-oriented PHP programming.', '2021-12-17 03:17:25', '2021-12-17 03:17:25'),
(6, 3, 'Hello World', 'Bangladesh is our beautiful country', '2021-12-17 03:20:19', '2021-12-30 03:11:03'),
(12, 3, 'Bangladesh', 'Bangladesh is a small country', '2021-12-17 03:33:52', '2021-12-19 10:15:06'),
(13, 3, 'Hello emran hasan', 'emran hasan 70778', '2021-12-17 05:06:28', '2021-12-19 10:14:03'),
(16, 1, 'CSE', 'Computer Science &amp; Engineering', '2021-12-20 02:22:36', '2021-12-20 02:22:36'),
(18, 3, 'Camera', 'Digital CCTV Camera', '2021-12-21 10:30:50', '2021-12-21 10:31:30'),
(19, 2, 'Hello All Admin', 'Thannk you everyone', '2021-12-29 02:46:16', '2021-12-29 02:46:16'),
(20, 8, 'PHP Developer', 'Bachelor\'s degree in computer science or a similar field. Knowledge of PHP web frameworks including Yii, Laravel, and CodeIgniter. Knowledge of front-end technologies including CSS3, JavaScript, and HTML5. Understanding of object-oriented PHP programming.', '2021-12-30 05:02:42', '2021-12-30 05:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `uid`, `type`, `message`, `created_at`) VALUES
(8, 1, 'user', 'Welcome To My Website', '2021-12-22 14:29:53'),
(9, 3, 'user', 'thank you for your feedback!', '2021-12-22 15:41:24'),
(18, 3, 'user', 'yes tell me', '2021-12-28 15:44:10'),
(21, 2, 'Admin', 'Note Added', '2021-12-29 02:46:16'),
(22, 3, 'Admin', 'Note Updated', '2021-12-30 03:11:03'),
(23, 8, 'Admin', 'Profile Updated', '2021-12-30 03:55:30'),
(24, 8, 'Admin', 'Password Changed', '2021-12-30 04:00:38'),
(25, 8, 'Admin', 'Password Changed', '2021-12-30 04:01:22'),
(26, 8, 'Admin', 'Feedback written', '2021-12-30 04:03:25'),
(28, 8, 'Admin', 'Feedback written', '2021-12-30 04:52:41'),
(29, 8, 'Admin', 'Feedback written', '2021-12-30 04:56:07'),
(31, 8, 'Admin', 'Feedback written', '2021-12-30 04:57:02'),
(32, 8, 'Admin', 'Note Added', '2021-12-30 05:02:42'),
(33, 8, 'Admin', 'Note Added', '2021-12-30 05:03:17'),
(34, 8, 'Admin', 'Note Added', '2021-12-30 05:03:41'),
(35, 8, 'Admin', 'Note Deleted', '2021-12-30 05:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `token`, `token_expire`, `created_at`, `verified`, `deleted`) VALUES
(1, 'Md. Emran Hasan', 'emran5018@gmail.com', '$2y$10$ST2O/79OQMVAFI4aHVrmXudob.J5SNiJ8YsyBSkP0VuVrgCziBim6', '01766989707', 'Male', '1998-03-11', 'uploads/2021_12_20_10_32_24_IMG_20180115_152926.jpg', '', '2021-12-28 14:07:57', '2021-12-11 14:24:00', 1, 1),
(2, 'Emran', 'admin@blog.com', '$2y$10$M3sbngceZh8V7X7Mp8SF0.dcjZT9FmZf6z.F8DGFCZWsd1KPf3f4S', '', 'Female', '', '', '', '2021-12-30 03:26:45', '2021-12-12 12:29:50', 0, 1),
(3, 'Emran Hasan', 'admin@user-system.com', '$2y$10$EgIcZBV6Irwp1eL.efX23eZivTrCLmioT3uGusyf1uNY.edg6DZme', '01703747458', 'Male', '1998-09-07', '', '', '2021-12-28 14:07:09', '2021-12-13 14:10:59', 1, 1),
(4, 'Admin', 'emran7358@gmail.com', '$2y$10$7G.PxBfy147xAINKIkUoTefiWP8XrWVg3OTggfsEod9ZOlAIPG7Nu', '', '', '', '', '', '2021-12-28 12:40:49', '2021-12-21 03:58:53', 1, 1),
(8, 'Check Account', 'sharminsumi09@gmail.com', '$2y$10$1MhEK2.SGB5iV1Vh9cKDI.txYU8C/QHiI/Bdo78eBQ768iJYSUpea', '+8809685487691', 'Male', '2000-01-01', 'uploads/2021_12_30_04_55_30_IMG_20201024_095646.jpg', '', '2021-12-30 05:17:34', '2021-12-30 03:49:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(2) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `hits`) VALUES
(0, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
