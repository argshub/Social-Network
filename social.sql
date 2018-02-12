-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 01:43 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, '2016-01-13 08:06:23', '0000-00-00 00:00:00'),
(2, 3, 7, 1, '2016-01-19 21:57:34', '0000-00-00 00:00:00'),
(3, 3, 8, 1, '2016-01-13 08:24:02', '0000-00-00 00:00:00'),
(4, 9, 3, 0, '2016-01-19 20:46:52', '0000-00-00 00:00:00'),
(5, 3, 5, 1, '2016-01-23 08:57:51', '0000-00-00 00:00:00'),
(6, 4, 3, 1, '2016-01-20 18:29:51', '0000-00-00 00:00:00'),
(7, 6, 3, 1, '2016-01-20 11:23:08', '0000-00-00 00:00:00'),
(8, 3, 15, 0, '2016-01-20 18:32:01', '0000-00-00 00:00:00'),
(11, 17, 10, 1, '2016-01-27 10:58:01', '0000-00-00 00:00:00'),
(12, 6, 17, 0, '2016-01-21 13:48:33', '0000-00-00 00:00:00'),
(13, 3, 17, 1, '2016-01-21 13:50:29', '0000-00-00 00:00:00'),
(14, 17, 4, 0, '2016-01-21 13:50:07', '0000-00-00 00:00:00'),
(15, 7, 17, 1, '2016-01-21 13:51:09', '0000-00-00 00:00:00'),
(16, 8, 17, 0, '2016-01-21 13:52:05', '0000-00-00 00:00:00'),
(17, 8, 17, 0, '2016-01-21 13:52:06', '0000-00-00 00:00:00'),
(18, 10, 3, 0, '2016-01-25 09:40:15', '0000-00-00 00:00:00'),
(19, 5, 17, 0, '2016-01-27 10:57:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `likeable`
--

CREATE TABLE `likeable` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likeable`
--

INSERT INTO `likeable` (`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(6, 17, 7, 'App\\Models\\Status', '2016-01-22 10:52:07', '2016-01-22 04:52:07'),
(7, 17, 4, 'App\\Models\\Status', '2016-01-22 10:54:06', '2016-01-22 04:54:06'),
(8, 17, 3, 'App\\Models\\Status', '2016-01-22 10:55:26', '2016-01-22 04:55:26'),
(9, 17, 10, 'App\\Models\\Status', '2016-01-22 10:58:19', '2016-01-22 04:58:19'),
(10, 3, 12, 'App\\Models\\Status', '2016-01-22 11:44:19', '2016-01-22 05:44:19'),
(11, 3, 6, 'App\\Models\\Status', '2016-01-22 11:44:33', '2016-01-22 05:44:33'),
(12, 3, 5, 'App\\Models\\Status', '2016-01-22 11:44:44', '2016-01-22 05:44:44'),
(13, 3, 4, 'App\\Models\\Status', '2016-01-22 11:44:56', '2016-01-22 05:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_09_085234_create_users_table', 1),
('2015_12_10_102952_create_users_table', 2),
('2016_01_04_024156_create_statuses_table', 3),
('2016_01_05_151845_create_statuses_table', 4),
('2016_01_07_152516_create_likeable_table', 5),
('2016_01_13_080311_create_friends_table', 6),
('2016_01_20_020343_create_statuses_table', 7),
('2016_01_21_141922_create_likeable_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
(2, 7, NULL, 'I know Nothing Accept the Fact of Ignorance.By - Socrates.', '2016-01-20 05:11:04', '2016-01-20 05:11:04'),
(3, 7, NULL, 'Man i s by nature a political Animal.  By- Aristotle', '2016-01-20 05:12:20', '2016-01-20 05:12:20'),
(4, 7, NULL, 'We Make War that we May live In Peace. By - Aristotle', '2016-01-20 05:12:49', '2016-01-20 05:12:49'),
(5, 6, NULL, 'Fools rush in where Giant fears to tread. by - Alexander Pope', '2016-01-20 05:14:13', '2016-01-20 05:14:13'),
(6, 6, NULL, 'To err is Human to Forgive is Devine. By -Alexander Pope', '2016-01-20 05:14:54', '2016-01-20 05:14:54'),
(7, 3, NULL, 'Good fences make good Neighbours. By- Jean-Jacques Rosseau', '2016-01-21 00:46:55', '2016-01-21 00:46:55'),
(9, 3, 7, 'what so funny', '2016-01-21 10:30:36', '2016-01-21 04:30:36'),
(10, 3, 7, 'giiiii', '2016-01-21 10:50:34', '2016-01-21 04:50:34'),
(11, 3, 6, 'jjdjjjjj', '2016-01-21 10:55:49', '2016-01-21 04:55:49'),
(12, 17, NULL, 'I to die and you to live, who is the best , only god knows it. by- Socrates', '2016-01-21 08:12:17', '2016-01-21 08:12:17'),
(13, 3, NULL, 'whats up', '2016-01-25 03:40:08', '2016-01-25 03:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `location`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Masum', 'Billah', 'masum', '$2y$10$4Iywv/Z5U.g7tPHQwOPuwO/6T8TDhMvNozX7hcSQx7DPtPzW0yKj.', 'masum@gmail.com', 'Dinajpur,BD', '1ZiDuQkSq6OYI23jtbf6iAfe7tnhpDG5CwgO5OsINE01WWrXLnVhJ9NqAhLG', '2015-12-09 04:21:43', '2016-01-22 05:40:21'),
(4, 'Asik', 'Hossain', 'asik.dev', '$2y$10$2GXn92w5S73ATd/vxt2n1eifBllxGC7x.tvC/Bgx39xL7CCK.GkVa', 'asik@gmail.com', 'Thakurgaon,BD', '68cUDF7sC0cY8CziLYPUr28F3JaDaWrwVLOkmpQbaT10AWnWUe3XzrLsO5TT', '2015-12-09 04:22:26', '2016-01-20 12:30:08'),
(5, 'Krisna', 'Ghosh', 'Krisna', '$2y$10$RAL/z.Z2La1pfZUsY5g1jev8WCAsnovC89sUanhVTT/6I.BbglAwu', 'krisna@gmail.com', 'Madaripur,BD', '', '2015-12-09 04:23:10', '2015-12-09 04:23:10'),
(6, 'Ahsan', 'Khan', 'ahsan', '$2y$10$WTl1GqftTiNXVJQVbU8tPe2mxXdhLUpkGzA4fyYak6.AT8nbJDDVO', 'ahsan@gmail.com', 'Dinajpur,BD', 'U6ynMCqnbKLO2j1K3afA2EEOy4zb0xZFEAbSgi4iddH9wZzLOrL2oa3ieKsE', '2015-12-09 04:23:52', '2016-01-20 12:29:33'),
(7, 'Rasel', 'Hossain', 'rasel', '$2y$10$1uRdi7RXyiWL5DeDYlX/qu.DBvqqDTfBNdAnVfT9sP0PgB8Vdrzb6', 'rasel@gmail.com', 'Sherpur,BD', 'Oidd1PI5HfmFazJAUY9pgmJtAVB450rExrB5uSVt4uamZsa5509g6m1BQvMB', '2015-12-09 04:24:33', '2016-01-20 05:12:55'),
(8, 'Naim', 'Mondol', 'naim', '$2y$10$aUycLCYM4DG2Nht1fsz8cuFn5LDOnMMM4Pabjz5qq/2iwxXVqkpIa', 'nami@gmail.com', 'Dhaka,BD', '', '2015-12-23 01:10:57', '2015-12-23 01:10:57'),
(9, 'Shagor', 'Shake', 'shagor', '$2y$10$8IPLeqlKc/GroJb3R0QeNeABYHKHR3YeY8RFTrtT2hcyXx9KV3yee', 'sagor@gmail.com', 'Dhaka,BD', '', '2015-12-23 01:11:33', '2015-12-23 01:11:33'),
(10, 'Naim', 'Mondol', 'niam', '$2y$10$93TCvnSFZQmmzeT.FWUWwewCB2VpY/pdjdaCM.w8bfcE0J2Z9UlSi', 'niam@gmail.com', 'Natore,BD', '', '2015-12-23 01:13:14', '2015-12-23 01:13:14'),
(12, 'Labu', 'Mondol', 'labu', '$2y$10$Dcwh/mFyeNlzAfkki4FNe.XuH0To.qflZtwpO7AKuYaq6tlkmhSni', 'labu@gmail.com', 'Joypurhat,BD', '', '2016-01-12 12:47:09', '2016-01-12 12:47:09'),
(13, 'Hasan', 'Khan', 'hasan', '$2y$10$L1JBPLsPIOaBzZ.se/pj/.fmrBkNVFq.OG6sNBTtfc/Rsg.Q3WAFq', 'hasan@gmail.com', 'Joypurhat,BD', '', '2016-01-12 12:48:29', '2016-01-12 12:48:29'),
(14, 'Jahangir', 'Alam', 'jahangir', '$2y$10$V9GQ5HiKZ0ocMaNKywUnLOos19IHo5K3/7e.lpSGUUG1a1DC3oAC.', 'jahangir@gmail.com', 'Rangpur,BD', '', '2016-01-12 12:49:50', '2016-01-12 12:49:50'),
(15, 'Alamgir', 'Hossain', 'alamgir', '$2y$10$WKLHZLqF5I65m4MIIvs0T.iz0y3i26U4OmtOFyaG3.nW4cbRtp7qy', 'alamgir@gmail.com', 'Rangpur,BD', 'sfP1Q7E51lYstxz44ELS5zKowiwb8MJ8uAiPDuBZm5i7fxw1hySHulrfbcoR', '2016-01-12 12:52:19', '2016-01-20 12:32:10'),
(16, 'Hasan', 'Alam', 'alamgirs', '$2y$10$xnUuX7mq45dQTpcZtqy.Ae33EXB6tu4sVQI5e0UKpb.nqjkWEwZBW', 'alamgiar@gmail.com', 'Rajshahi,BD', '', '2016-01-12 12:53:52', '2016-01-12 12:53:52'),
(17, 'Shazzad', 'Hossain', 'shazzad', '$2y$10$r.8UGDmUj4UFLF/GeXKDGO44FF2PFstkYmw1uGY5dtI9lyNqFB/gG', 'shazzad@gmail.com', 'Joypurhat,BD', 'P5uJN5YZXaljbhRkbNpXRsDKJiQleuAwKUDT62bffi4RHo4h4EXDwlBlAjrv', '2016-01-21 07:47:53', '2016-01-21 07:48:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likeable`
--
ALTER TABLE `likeable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `likeable`
--
ALTER TABLE `likeable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
