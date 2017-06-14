-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 12:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_karaoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lyrics` text COLLATE utf8_unicode_ci NOT NULL,
  `karaoke` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `description`, `duration`, `sis`, `alias`, `lyrics`, `karaoke`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Đắp Mộ Cuộc Tình - Đạt Võ', 'Đắp Mộ Cuộc Tình - Đạt Võ\r\n♫Hãy Subscribe kênh Sky Music Bolero: https://goo.gl/f2CeP6\r\n♫Google+: https://goo.gl/dWReb6\r\n♫Facebook: https://www.facebook.com/SkyMusicChannel\r\nSKY MUSIC BOLERO là kênh giải trí âm nhạc với những bài nhạc trữ tình bolero, nhạc sến, nhạc vàng, nhạc dân ca quê hương, nhạc trẻ, vpop,... được cập nhật liên tục mới nhất hiện nay, với những ca sĩ trẻ triển vọng.... \r\nChúc các bạn nghe nhạc vui vẻ!', '00:5:2', '83nbc11jbq0=8ggbhzsc', 'dap-mo-cuoc-tinh-dat-vo', '[{"line":"Xây giấc mộng ban đầu", "start":"0", "stop":"5"},{"line":"Yêu người thưởi mới đôi mươi", "start":"5", "stop":"11"}]', NULL, 1, '2017-06-14 07:01:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `provider` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'youtube',
  `youtube_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube_url` text COLLATE utf8_unicode_ci NOT NULL,
  `vimeo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vimeo_url` text COLLATE utf8_unicode_ci NOT NULL,
  `mp3_url` text COLLATE utf8_unicode_ci NOT NULL,
  `resource` text COLLATE utf8_unicode_ci NOT NULL,
  `provider_source` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'video'),
(2, 'mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
