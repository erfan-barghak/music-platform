-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 11:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `link`) VALUES
(1, 'بنر تبلیغاتی', 'https://parcian.com/files/uploads/Parcian.com-banner-template-123.jpg', 'https://pop-music.ir/page/85'),
(2, 'بنر تبلیغی', 'https://parcian.com/files/uploads/Parcian.com-banner-template-179.jpg', 'https://www.youtube.com/@night_blend'),
(3, 'بنر', 'https://payondesign.com/images/vlafmp3w9tgy1oqjze47xhdsi8nr2k5u6cb.jpg', 'https://www.threads.net/@hastihs_11/post/C8kbPPcI9Mi/?xmt=AQGz-9Dq5_hB9aUj1iAWZ-v-TKqwnhYD9qFLdrIB_nMV7Q');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(2, 'راک', 'دسته بندی راک', '2024-09-06 23:01:16'),
(3, 'پاپ', 'دسته بندی پاپ', '2024-09-06 23:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `featured_music`
--

CREATE TABLE `featured_music` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `type` varchar(100) DEFAULT 'regular',
  `play_date` datetime DEFAULT current_timestamp(),
  `add_date` datetime DEFAULT current_timestamp(),
  `download_url` varchar(255) DEFAULT NULL,
  `poets_text` varchar(255) DEFAULT NULL,
  `category_music` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `user_id`, `title`, `image`, `artist`, `album`, `release_date`, `created_at`, `type`, `play_date`, `add_date`, `download_url`, `poets_text`, `category_music`, `category_id`) VALUES
(1, 1, 'موزیک بی احساس شادمهر', 'https://musicimehr.com/wp-content/uploads/2023/08/Shadmehr-Aghili-Bi-Ehsas.jpg', 'شادمهر عقیلی', 'تک موزیک', '2024-09-06', '2024-09-06 12:04:10', 'پاپ', '2024-09-06 00:00:00', '2024-09-06 00:00:00', 'https://mehrdl.musicmelnet.com/Music/A/D/ShadmehrFull/Shadmehr%20Aghili%20-%20Bi%20Ehsas.mp3', '', 'پاپ', '2'),
(2, 1, 'وقتی که بد میشم', 'https://melusic.ir/wp-content/uploads/shadmehr_aghili_vaghti_ke%20bad%20misham.jpg', 'شادمهر عقیلی', 'تک موزیک', '2024-09-06', '2024-09-06 12:50:24', 'پاپ', '2024-09-06 00:00:00', '2024-09-06 00:00:00', 'https://dl.melusic.ir/music/Shadmehr%20Aghili/shadmehr_aghili_vaghti_ke%20bad%20misham.mp3', 'وقتی که اینجایی وقتی که میخندی\r\nوقتی که بد میشم چشماتو میبندی\r\nوقتی که دنیارو تنها با من میخوای\r\nاز هر طرف برم بازم باهام میای\r\n\r\nجز عاشقت شدن چه کاری میشه کرد\r\nمیخوامت خواستنت توو دلم ریشه کرد\r\nوقتی که دنیارو تنها با من میخوای\r\nاز هر طرف برم بازم باهام م', 'پاپ', '2'),
(3, 1, 'غم نگاه آخرت', 'https://musicimehr.com/wp-content/uploads/2024/01/0fff0af0-689e-11ee-95a6-b975eac6a582-edited.jpg', 'شادمهر عقیلی', 'تک موزیک', '2024-09-07', '2024-09-07 21:22:50', NULL, '2024-09-07 00:00:00', '2024-09-07 00:00:00', 'https://mehrdl.musicmelnet.com/Music/A/H/New/Shadmehr%20Aghili%20-%20Ghame%20Negah%20Akharet.mp3', 'غم نگاه آخرت تو لحظه ی خدافظی\r\nگریه بی وقفه من تو اون روزای کاغذی …\r\nقول داده بودیم ما به هم که تن ندیم به روزگار\r\nچه بی دووم بود قول ما جدا شدیم آخر کار …\r\nتو حسرت نبودنت من با خیالتم خوشم\r\nبا رفتنم از این دیار آرزوهامو میکشم …\r\nکوله بارم پُر حسرتِ تو دل', NULL, '3'),
(4, 1, 'خداحافظ', 'https://musicimehr.com/wp-content/uploads/2024/01/%D8%B4%D8%A7%D8%AF%D9%85%D9%87%D8%B1%D8%B9%D9%82%DB%8C%D9%84%DB%8C-edited.jpg', 'شادمهر عقیلی', 'تک موزیک', '2024-09-07', '2024-09-07 21:24:29', NULL, '2024-09-07 00:00:00', '2024-09-07 00:00:00', 'https://mehrdl.musicmelnet.com/Music/A/H/New/Shadmehr%20Aghili%20-%20Khodahafez%20(Ai)%20Slow.mp3', 'در سکوت شب خانه زد فریاد اما تو نشنیدی\r\nدل به پایت افتاد آرزو کردم بعد از تو عاقل نشوم\r\nآشنای من من غریبم بی تو با خیابان ها من رفیقم بی تو\r\nبعد تو عمرا من دگر عاشق نشوم\r\nتو رفتی دگر ماه و آیینه خداحافظ بغض تو سینه خداحافظ\r\nگم شد در قلبت عشق بی ثمرم …\r\nعش', NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `newly_added_music`
--

CREATE TABLE `newly_added_music` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recently_played_music`
--

CREATE TABLE `recently_played_music` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `play_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `link_type` enum('page','music','category') NOT NULL,
  `link_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `link_type`, `link_id`, `banner_image`, `title`, `description`, `created_at`) VALUES
(1, 'music', 0, 'https://images.clipsho.com/images/th_u-2-1680542812303.webp', 'موزیک وقتی که بد میشم', 'موزیک وقتی که بد میشم منتشر شد', '2024-09-06 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `referral_code`, `referred_by`, `email`, `role`, `created_at`, `profile_picture`) VALUES
(1, 'professor', '$2y$10$LabwEgfZQPuRcTRkoGRt4eXNTJpqCZPnqpN5zGxYkn5yQtfYoYZOS', 'admin', NULL, 'barerf1232@gmail.com', 'admin', '2024-09-04 05:27:50', 'Screenshot_2024-08-02_020852.png'),
(2, 'mrgoatapps', '$2y$10$DoUZYCX4tjmD6KP7nToPnuinr5ZSGDdknALveYmalSsHZyEn1yBWm', '3bb3a0b344', '1', 'mrgoatapps@mail.ir', 'user', '2024-09-04 16:38:40', 'OIG1_(4).jpg'),
(4, 'huntnet', '$2y$10$bln/8BvWgpTtU84i8m7FDejmakIFR1hTUSo9LUNx8e4gZ5/1aE7j.', '268670', '1', 'huntnet.ir@gmail.com', 'user', '2024-09-06 02:45:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_music`
--
ALTER TABLE `featured_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newly_added_music`
--
ALTER TABLE `newly_added_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_played_music`
--
ALTER TABLE `recently_played_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured_music`
--
ALTER TABLE `featured_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newly_added_music`
--
ALTER TABLE `newly_added_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recently_played_music`
--
ALTER TABLE `recently_played_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
