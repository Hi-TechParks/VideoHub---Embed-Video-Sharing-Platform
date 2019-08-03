-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 07:46 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` text COLLATE utf8mb4_unicode_ci,
  `sidebar1` text COLLATE utf8mb4_unicode_ci,
  `sidebar2` text COLLATE utf8mb4_unicode_ci,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `onclick` text COLLATE utf8mb4_unicode_ci,
  `popup` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `header`, `sidebar1`, `sidebar2`, `footer`, `onclick`, `popup`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2019-08-01 04:46:12', '2019-08-01 04:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_id`, `user_id`, `name`, `email`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 20, NULL, 'Habib R', 'admin@mail.com', 'Sri lanka improvement going well.', 1, NULL, NULL, '2019-08-01 11:01:19', '2019-08-01 11:01:19'),
(2, 18, NULL, 'HR Rahman', 'admin@demo.com', 'Wow. amazing movie', 1, NULL, NULL, '2019-08-01 11:01:49', '2019-08-01 11:01:49'),
(3, 16, NULL, 'Ridoy', 'admin@coffeetheme.com', 'Supper Hit Bangla Song', 1, NULL, NULL, '2019-08-01 11:02:30', '2019-08-01 11:02:30'),
(4, 12, NULL, 'Marufa', 'reviewer@mail.com', 'Politics going to negative day by day', 1, NULL, NULL, '2019-08-01 11:03:22', '2019-08-01 11:03:22'),
(5, 7, NULL, 'H Rahman', 'test@mail.com', 'What a animation', 1, NULL, NULL, '2019-08-01 11:04:00', '2019-08-01 11:04:00'),
(6, 5, NULL, 'Author', 'admin@demo.com', 'Ha ha ha so funny', 1, NULL, NULL, '2019-08-01 11:04:34', '2019-08-01 11:04:34'),
(7, 3, NULL, 'Ridoy', 'reviewer@mail.com', 'I love this CID show', 1, NULL, NULL, '2019-08-01 11:05:08', '2019-08-01 11:05:08'),
(8, 1, NULL, 'Marufa', 'habibcse335@gmail.com', 'So funny Show', 1, NULL, NULL, '2019-08-01 11:05:46', '2019-08-01 11:05:46'),
(9, 4, NULL, 'Super Admin', 'admin@demo.com', 'What an addition', 1, NULL, NULL, '2019-08-01 11:07:37', '2019-08-01 11:07:37'),
(10, 4, NULL, 'Marufa', 'author@mail.com', 'Supper Talent', 1, NULL, NULL, '2019-08-01 11:08:07', '2019-08-01 11:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `file_uploads`
--

CREATE TABLE `file_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_uploads`
--

INSERT INTO `file_uploads` (`id`, `title`, `file_path`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Propellerads ad installation verification file', 'ba30e16f3bdb81c35f2ea349ed4940cf.html', 1, 1, '2019-08-01 03:25:22', '2019-08-01 03:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_23_125726_create_settings_table', 1),
(4, '2019_07_10_065233_create_socials_table', 1),
(5, '2019_07_23_061928_create_video_categories_table', 1),
(6, '2019_07_23_062038_create_tags_table', 1),
(7, '2019_07_23_062104_create_ads_table', 1),
(8, '2019_07_23_064934_create_videos_table', 1),
(9, '2019_07_23_073100_create_comments_table', 1),
(10, '2019_07_23_092827_create_video_tags_table', 1),
(11, '2019_07_30_142217_create_file_uploads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `logo_path` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_path` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_one` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_two` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci,
  `contact_mail` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `logo_path`, `favicon_path`, `phone_one`, `phone_two`, `email_one`, `email_two`, `contact_address`, `contact_mail`, `footer_text`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Hi Tech Parks', NULL, NULL, 'logo.png', 'favicon.png', '+8801740473189', '+8801917054053', 'hitechparks@gmail.com', 'softtechhabib@gmail.com', 'House # 12/3, Shaheed Minar Road, Kallyanpur', 'hitechparks@gmail.com', '2019 - Video Hub', 1, 1, 1, '2019-08-01 03:17:45', '2019-08-01 11:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `user_id`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `skype`, `youtube`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'https://www.facebook.com/HiTechParks/', 'https://twitter.com/hitechparks', 'https://www.linkedin.com/company/hi-techparks/', NULL, NULL, NULL, 'https://www.youtube.com/channel/UCmou5E9-YtIw3aj1gVm0RXg', 1, 1, NULL, '2019-08-01 03:20:48', '2019-08-01 03:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `views`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Hot', 'hot', 1, 1, 1, NULL, '2019-08-01 03:27:35', '2019-08-01 06:48:51'),
(2, 'New', 'new', 0, 1, 1, NULL, '2019-08-01 03:27:42', '2019-08-01 03:27:42'),
(3, 'Best', 'best', 0, 1, 1, NULL, '2019-08-01 03:27:47', '2019-08-01 03:27:47'),
(4, 'Cool', 'cool', 0, 1, 1, NULL, '2019-08-01 03:27:53', '2019-08-01 03:27:53'),
(5, 'Movie', 'movie', 0, 1, 1, NULL, '2019-08-01 03:28:06', '2019-08-01 03:28:06'),
(6, 'Song', 'song', 0, 1, 1, NULL, '2019-08-01 03:28:11', '2019-08-01 03:28:11'),
(7, 'Show', 'show', 0, 1, 1, NULL, '2019-08-01 03:28:28', '2019-08-01 03:28:28'),
(8, 'Cartoon', 'cartoon', 0, 1, 1, NULL, '2019-08-01 03:28:50', '2019-08-01 03:28:50'),
(9, 'Helth', 'helth', 0, 0, 1, 1, '2019-08-01 03:29:08', '2019-08-01 03:31:42'),
(10, 'Tips', 'tips', 0, 1, 1, NULL, '2019-08-01 03:29:25', '2019-08-01 03:29:25'),
(11, 'Tutorial', 'tutorial', 0, 1, 1, NULL, '2019-08-01 03:30:52', '2019-08-01 03:30:52'),
(12, 'News', 'news', 0, 1, 1, NULL, '2019-08-01 03:30:57', '2019-08-01 03:30:57'),
(13, 'Comedy', 'comedy', 0, 1, 1, NULL, '2019-08-01 03:32:27', '2019-08-01 03:32:27'),
(14, 'Action', 'action', 0, 1, 1, NULL, '2019-08-01 03:32:33', '2019-08-01 03:32:33'),
(15, 'Sports', 'sports', 0, 1, 1, NULL, '2019-08-01 05:13:01', '2019-08-01 05:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@mail.com', NULL, '$2y$10$v/nPzEebLEr4QbhHvZQsO.tGoMngr/WEl/KR.2YSicX1eAunmgKm6', NULL, '2019-08-01 03:15:31', '2019-08-01 03:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` int(11) DEFAULT NULL,
  `video_path` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `like` bigint(20) NOT NULL DEFAULT '0',
  `dislike` bigint(20) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `quality` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `category_id`, `title`, `description`, `image_path`, `video_type`, `video_path`, `video_id`, `duration`, `views`, `like`, `dislike`, `date`, `featured`, `quality`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, 'Sarla Is Sick Of Kapil - The Kapil Sharma Show', '<p>Cast : Kapil Sharma, Navjot Singh Sidhu, Sunil Grover, Ali Asgar, \r\nChandan Prabhakar, Kiku Sharda, Sumona Chakravarti, Rochelle Rao, \r\nSugandha Mishra, Kartikey Raj, Suresh Menon, Manju Sharma, Upasana Singh</p>', '1_1564652542.JPG', 2, NULL, 'sosljVNKfgQ', '21:17', 1, 1, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 03:42:23', '2019-08-01 11:06:00'),
(2, 10, 'Tom und Jerry | Vogelbad-Blues | Boomerang', '<p>Willkommen beim offiziellen YouTube-Kanal von Boomerang Deutschland. \r\nHier findest du lustige Videos von Tom und Jerry, Looney Tunes, \r\nScooby-Doo, Bunnicula und vielen, vielen mehr! Mach dich auf jede Menge \r\nSpaß gefasst und abonniere den Kanal!</p>', '2_1564652786.JPG', 2, NULL, 'KN89MYaqNho', '4:55', 0, 0, 0, NULL, 1, 0, 1, 1, NULL, '2019-08-01 03:46:26', '2019-08-01 03:46:26'),
(3, 9, 'CID - Ep 1466 - Serial Killer', '<p>A few women across the city are confined by a unknown assailant. The CID\r\n team learns about this incident after one of the victims is found dead.\r\n The victim, Diya’s friend Sameer is called for questioning but this \r\ndoes not help the CID in the investigation. The CID team suspects that a\r\n serial killer is involved. Will the CID team be able to nab the killer?\r\n Watch this episode to find out.\r\n</p>', '3_1564652971.JPG', 2, NULL, '7s7uyvaehnQ', '41:20', 2, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 03:49:31', '2019-08-01 11:04:40'),
(4, 9, 'Female Malambo Group Revolution Plays Drums With FIRE! - America\'s Got Talent 2019', '<p>Creator and Executive Producer Simon Cowell returns to the judges\' panel\r\n along with Howie Mandel. Also joining the panel this year are two fresh\r\n faces - award-winning actress, author and producer Gabrielle Union and \r\nEmmy Award-winning choreographer, actress, singer and dancer Julianne \r\nHough. Terry Crews, who made a big splash as the host of the inaugural \r\nseries \"America\'s Got Talent: The Champions\" earlier this year, joins as\r\n host for \"America\'s Got Talent.\" With the show open to acts of all \r\nages, \"America\'s Got Talent\" continues to celebrate the variety format \r\nlike no other show on television. Year after year, \"America\'s Got \r\nTalent\" features a colorful array of singers, dancers, comedians, \r\ncontortionists, impressionists, magicians, ventriloquists and hopeful \r\nstars, all vying to win America\'s hearts and a $1 million prize.</p>', '4_1564653330.JPG', 2, NULL, 'BkS5OF6_PCA', '2:44', 2, 2, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 03:55:30', '2019-08-01 11:09:05'),
(5, 4, 'Welcome | Full Movie | Akshay Kumar, Katrina Kaif, Anil Kapoor, Nana Patekar', '<p>SYNOPSIS: Uday Shetty (Nana Patekar), Majnu (Anil Kapoor) and their \r\nboss, Sikander (Feroz Khan), three Hong Kong-based serio-comic Dons, are\r\n keen to get their sister Sanjana (Katrina Kaif) married into a \r\nrespectable family. Uday, upon a chance meeting with a handsome \r\nbachelor, Rajiv (Akshay Kumar), is convinced that the latter would be an\r\n appropriate match for Sanjana. The same series is followed by the rest \r\nof the brothers who like the same guy. Meanwhile, Sanjana, unaware of \r\nher brothers` contrivances, meets Rajiv on a cruise and the two falls in\r\n love. She has the acceptance of Dr. Ghunghroo (Paresh Rawal) who is \r\nRajiv`s uncle doesn`t realize that she is the sister of the Mafia.This \r\nfall-down funny comedy takes another turn when a stunning bomb (Mallika \r\nSherawat) who claims to be Rajiv`s fiancee shows up on the scene and \r\nadds to the commotion and mayhem adding up to the laughing out your guts\r\n factor.</p>', '5_1564653454.JPG', 2, NULL, 'bOqFGkFO3Lo', '2:29:57', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 03:57:34', '2019-08-01 11:04:08'),
(6, 9, 'DOOR ON THE LEFT', '<p>Directed by Kati Skelton and Harrison Atkins<br>\r\nWritten by Kati Skelton<br>\r\nProduced by Rachel Birnbaum and Kati Skelton<br>\r\nStarring: Dana Kaplan-Angle, Claire Neumann, Branson Reese, Marie Semla, Kati Skelton, and Sarah Grace Welbourn<br>\r\nDP: Harrison Atkins<br>\r\nProduction Design: Phil Sieverding<br>\r\nSound Recordist: Allistair Johnson<br>\r\nEditing and Sound Mix by Daniel Johnson<br>\r\nCamera Op and Gaffer: Gideon De Villiers<br>\r\nComposites by Alejandro Ovalle<br>\r\nAdditional GFX by Elana Mugdan<br>\r\nColor by Nate Seymour</p>', '6_1564655456.JPG', 3, NULL, '102958291', '5:28', 0, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:30:56', '2019-08-01 04:30:56'),
(7, 10, 'The Present', '<p>The Present” is a graduation short from the Institute of Animation, \r\nVisual Effects and Digital Postproduction at the Filmakademie \r\nBaden-Wuerttemberg in Ludwigsburg, Germany.<br>\r\nWe really hope you enjoy the result of our hard work. Thanks to everyone\r\n who help creating this film and everyone who supported us during the \r\nfestivals. Thanks a lot for making this such an incredible journey.</p>', '7_1564655709.JPG', 3, NULL, '152985022', '1:38', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:35:09', '2019-08-01 11:03:35'),
(8, 10, 'Silence', '<p>Au retour du printemps, c\'est la saison des amours : les grenouilles de \r\nla mare se mettent à coasser. Ce n\'est pas pour plaire à Monsieur le \r\nVoisin. Réalisé par Isis LETERRIER © EMCA-2019</p>', '8_1564655863.JPG', 3, NULL, '326824980', '9:50', 0, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:37:44', '2019-08-01 04:37:44'),
(9, 8, 'San Francisco Babymoon October 2016', '<p>My Wife &amp; I enjoy a lovely vacation (Babymoon) in San Francisco. \r\nBeautiful place to visit and great for Photography &amp; Video.<br>\r\nThis Video was recorded with the Panasonic GH4.<br>\r\nMetabones Speedbooster Canon EF Lens to Micro Four Thirds T Speed Booster ULTRA 0.71x<br>\r\nRokinon 35mm T1.5 Cine DS Lens for EF Mount &amp; Panasonic\'s Lumix G X Vario 12-35mm f/2.8 Asph. Lens for Micro 4/3 <br>\r\nwith Cokin 58mm PURE Harmonie Circular Polarizer Filter.<br>\r\nPicture Profile Style - Cine D<br>\r\nEdit Software : Davinci Resolve &amp; Final Cut<br>\r\nMusic: Audio Jungle- Driving Indie Anthem, uplifting-rock_by_studio89 &amp; Final Cut Music Library</p>', '9_1564656103.JPG', 3, NULL, '191295065', '6:36', 0, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:41:44', '2019-08-01 04:41:44'),
(10, 8, 'Scenes from OMGLA2016', '<p>I volunteered at a camp for kids run by the coolest vimeo filmmakers and\r\n directors. These are just a few scenes of the special couple days I \r\nspent with the kids in LA. Can\'t wait to spend the full week at the New \r\nYork camp!</p>', '10_1564656261.JPG', 3, NULL, '178074593', '1:42', 0, 0, 0, NULL, 0, 1, 1, 1, NULL, '2019-08-01 04:44:21', '2019-08-01 04:44:21'),
(11, 5, 'Vaaste Song: Dhvani Bhanushali, Tanishk Bagchi | Nikhil D | Bhushan Kumar | Radhika Rao, Vinay Sapru', '<p>Gulshan Kumar Presents latest Hindi Video Song of 2019 Bhushan Kumar\'s \"\r\n Vaaste\" In the voice of \" Dhvani Bhanushali &amp; Nikhil D’Souza\", \r\ncomposed by \" Tanishk Bagchi \" and the lyrics of this new song are \r\npenned by \" Arafat Mehmood\".  The Video Directed By Radhika Rao &amp; \r\nVinay Sapru.</p>', '11_1564656602.JPG', 2, NULL, 'BBAyRBTfsOU', '4:26', 0, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:50:02', '2019-08-01 04:50:02'),
(12, 3, 'Sen Gillibrand does not regret calling for former Senator Al Franken\'s resignation.', '<p>Sen Gillibrand questions the validity of the new Al Franken report in \r\nthe New Yorker which explored the accusations against the former senator\r\n more closely. #MIC2020</p>', '12_1564656727.JPG', 1, NULL, '<iframe frameborder=\"0\" width=\"480\" height=\"270\" src=\"https://www.dailymotion.com/embed/video/x7e55ki\" allowfullscreen allow=\"autoplay\"></iframe>', '1:31', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:52:07', '2019-08-01 11:02:39'),
(13, 3, 'Tulsi Gabbard Sues Google For $50 Million', '<p>After the first Democratic Debate, Tulsi Gabbard’s campaign’s ad account\r\n with Google was suspended.  She is now taking them to court.<br><br>Ana Kasparian, Cenk Uygur, and Ramesh Srinivasan discuss on The Young </p>', '13_1564656854.JPG', 1, NULL, '<iframe frameborder=\"0\" width=\"480\" height=\"270\" src=\"https://www.dailymotion.com/embed/video/x7ef3mf\" allowfullscreen allow=\"autoplay\"></iframe>', '17:57', 0, 0, 0, NULL, 0, 1, 1, 1, NULL, '2019-08-01 04:54:14', '2019-08-01 04:54:14'),
(14, 3, 'Joe Biden and Kamala Harris Expected to Face Off in Night Two of Democratic Debate', '<p>With night one of the second 2020 Democratic debates in the books, the \r\nfocus shifts to night two in Detroit where two of the other leading \r\ncandidates take center stage. Veuer’s Justin Kircher has more.</p>', '14_1564656973.JPG', 1, NULL, '<iframe frameborder=\"0\" width=\"480\" height=\"270\" src=\"https://www.dailymotion.com/embed/video/x7evj3i\" allowfullscreen allow=\"autoplay\"></iframe>', '4:18', 0, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 04:56:13', '2019-08-01 04:56:13'),
(15, 1, 'Pirates-Reds Tension Explodes in Another Benches-Clearing Brawl', '<p>Back in April, Cincinnati Reds slugger Derek Dietrich admired his home \r\nruns, leading to retaliation from the Pittsburgh Pirates and a \r\nbench-clearing brawl. Fast forward to Tuesday: Pirates hurler Keone Kela\r\n unleashed some chin music at Dietrich in th</p>', '15_1564657087.JPG', 1, NULL, '<iframe frameborder=\"0\" width=\"480\" height=\"270\" src=\"https://www.dailymotion.com/embed/video/x7euilm\" allowfullscreen allow=\"autoplay\"></iframe>', '1:44', 0, 0, 0, NULL, 0, 1, 1, 1, NULL, '2019-08-01 04:58:07', '2019-08-01 04:58:07'),
(16, 5, 'Master-D - Tumi Jaio Na ft. Mumzy Stranger', '<p>Don’t go from my heart girl,\r\nYou know me loving you from the start girl,\r\nSee your pretty face from a far girl, \r\nNobody better than you, you’re a star girl,\r\nThe way you push it and you push it and you whine,\r\nGirl your body is a vibe we can take it thru the night girl,\r\nGirl, me never wanna ever leave your side, \r\n(Leave your side, leave your side).\r\nYou know me love you long time girl, \r\nThe way you look into my eyes girl,\r\nMe no ever wanna see you walk away,\r\nCause me wanna give you loving every day (eh eh eh)\r\nDon’t leave me now in heartbreak girl, make you feel alright and okay girl,\r\nTumi jaiona, me a never gonna leave you’re side baby</p>', '16_1564657407.JPG', 2, NULL, 'ZQ5RCASdpuE', '3:24', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 05:03:27', '2019-08-01 11:01:58'),
(17, 5, 'Slow Motion | Bharat | Salman Khan,Disha Patani | Vishal &Shekhar Feat.Nakash A,Shreya G', '<p>Bharat’ starring Salman Khan and Katrina Kaif releases this Eid, on 5th \r\nof June, 2019. The film also stars Tabu, Jackie Shroff, Sunil Grover, \r\nAasif Sheikh, Sonali Kulkarni and Nora Fatehi in supporting roles.\r\n\r\nGulshan Kumar and T-Series Presents, Salman Khan Films and Reel Life \r\nProduction Pvt. Ltd. Film - \'BHARAT\' directed by Ali Abbas Zafar. \r\nProduced by Atul Agnihotri, Alvira Khan Agnihotri, Bhushan Kumar &amp; \r\nKrishan Kumar.&nbsp;Co-produced by Nikhil Namit. <br></p>', '17_1564657555.JPG', 2, NULL, '8AedZtuoVSg', '4:32', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 05:05:55', '2019-08-01 06:45:19'),
(18, 4, 'Hollywood Sci Fi Scary Movie In Hindi Dubbed', '<p>Bhut sara comments read krliya aab movie dekhni hii padegi 😂\r\nKiya aap bhii ysse krte ho</p>', '18_1564657740.JPG', 2, NULL, 'YLiNiztGT_E', '1:32:23', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 05:09:00', '2019-08-01 11:01:27'),
(19, 1, 'Mind-Blowing Skills That Impressed The World in Football', '<p>🔔TURN ON NOTIFICATIONS TO NEVER MISS AN UPLOAD!🔔\r\nTitle: Mind-Blowing Skills That Impressed The World in Football\r\nCheck out my latest music upload:</p>', '19_1564657971.JPG', 2, NULL, 'BbbJEvU0SxU', '5:47', 1, 1, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 05:12:51', '2019-08-01 06:47:08'),
(20, 1, 'Highlights Sri Lanka vs Bangladesh | 3rd ODI | ODI Series | Bangladesh tour of Sri Lanka 2019', '<p>Highlights Sri Lanka vs Bangladesh | 3rd ODI | ODI Series | Bangladesh tour of Sri Lanka 2019\r\n\r\nSeries : Bangladesh tour of Sri Lanka 2019.\r\nMatch Date : July 28, Sunday 2019.\r\n\r\nYou Can Watch Live Action and Cricket Highlights on Rabbithole Sports Channel from the LINK </p>', '20_1564658159.JPG', 2, NULL, 'T9Sx4fzo9Ho', '28:04', 1, 0, 0, NULL, 1, 1, 1, 1, NULL, '2019-08-01 05:15:59', '2019-08-01 11:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `home_flag` int(11) DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `title`, `slug`, `description`, `meta_keyword`, `meta_desc`, `home_flag`, `views`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Sports', 'sports', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, 1, '2019-08-01 03:33:12', '2019-08-01 03:34:00'),
(2, 'Helth Tips', 'helth-tips', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', NULL, 0, 1, 1, NULL, '2019-08-01 03:34:12', '2019-08-01 03:34:12'),
(3, 'News', 'news', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, NULL, '2019-08-01 03:34:24', '2019-08-01 03:34:24'),
(4, 'Movie', 'movie', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, NULL, '2019-08-01 03:34:33', '2019-08-01 03:34:33'),
(5, 'Music', 'music', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, NULL, '2019-08-01 03:34:45', '2019-08-01 03:34:45'),
(6, 'Songs', 'songs', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', NULL, 0, 0, 1, 1, '2019-08-01 03:35:01', '2019-08-01 03:38:18'),
(7, 'Tutorial', 'tutorial', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', NULL, 0, 1, 1, 1, '2019-08-01 03:35:28', '2019-08-01 03:35:35'),
(8, 'Private', 'private', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', NULL, 0, 1, 1, NULL, '2019-08-01 03:36:00', '2019-08-01 03:36:00'),
(9, 'Show', 'show', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, NULL, '2019-08-01 03:41:39', '2019-08-01 03:41:39'),
(10, 'Cartoon', 'cartoon', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, 0, 1, 1, NULL, '2019-08-01 03:45:10', '2019-08-01 03:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `video_tags`
--

CREATE TABLE `video_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_tags`
--

INSERT INTO `video_tags` (`id`, `video_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 13, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 1, 7, NULL, NULL),
(5, 2, 8, NULL, NULL),
(6, 2, 13, NULL, NULL),
(7, 2, 1, NULL, NULL),
(8, 2, 7, NULL, NULL),
(9, 3, 14, NULL, NULL),
(10, 3, 1, NULL, NULL),
(11, 3, 7, NULL, NULL),
(12, 3, 10, NULL, NULL),
(13, 4, 3, NULL, NULL),
(14, 4, 1, NULL, NULL),
(15, 4, 7, NULL, NULL),
(16, 4, 6, NULL, NULL),
(17, 5, 13, NULL, NULL),
(18, 5, 4, NULL, NULL),
(19, 5, 5, NULL, NULL),
(20, 5, 6, NULL, NULL),
(21, 6, 13, NULL, NULL),
(22, 6, 1, NULL, NULL),
(23, 6, 7, NULL, NULL),
(24, 6, 10, NULL, NULL),
(25, 7, 8, NULL, NULL),
(26, 7, 4, NULL, NULL),
(27, 7, 10, NULL, NULL),
(28, 8, 3, NULL, NULL),
(29, 8, 8, NULL, NULL),
(30, 8, 1, NULL, NULL),
(31, 8, 2, NULL, NULL),
(32, 9, 1, NULL, NULL),
(33, 9, 2, NULL, NULL),
(34, 9, 6, NULL, NULL),
(35, 9, 10, NULL, NULL),
(36, 10, 3, NULL, NULL),
(37, 10, 4, NULL, NULL),
(38, 10, 1, NULL, NULL),
(39, 10, 2, NULL, NULL),
(40, 10, 6, NULL, NULL),
(41, 11, 3, NULL, NULL),
(42, 11, 1, NULL, NULL),
(43, 11, 5, NULL, NULL),
(44, 11, 6, NULL, NULL),
(45, 12, 2, NULL, NULL),
(46, 12, 12, NULL, NULL),
(47, 12, 10, NULL, NULL),
(48, 13, 2, NULL, NULL),
(49, 13, 12, NULL, NULL),
(50, 13, 10, NULL, NULL),
(51, 14, 14, NULL, NULL),
(52, 14, 12, NULL, NULL),
(53, 14, 7, NULL, NULL),
(54, 14, 10, NULL, NULL),
(55, 15, 14, NULL, NULL),
(56, 15, 1, NULL, NULL),
(57, 15, 12, NULL, NULL),
(58, 15, 10, NULL, NULL),
(59, 16, 4, NULL, NULL),
(60, 16, 1, NULL, NULL),
(61, 16, 2, NULL, NULL),
(62, 16, 6, NULL, NULL),
(63, 17, 14, NULL, NULL),
(64, 17, 3, NULL, NULL),
(65, 17, 1, NULL, NULL),
(66, 17, 6, NULL, NULL),
(67, 18, 14, NULL, NULL),
(68, 18, 13, NULL, NULL),
(69, 18, 5, NULL, NULL),
(70, 18, 6, NULL, NULL),
(71, 19, 4, NULL, NULL),
(72, 19, 2, NULL, NULL),
(73, 19, 11, NULL, NULL),
(74, 20, 3, NULL, NULL),
(75, 20, 4, NULL, NULL),
(76, 20, 12, NULL, NULL),
(77, 20, 15, NULL, NULL),
(78, 20, 10, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_video_id_foreign` (`video_id`);

--
-- Indexes for table `file_uploads`
--
ALTER TABLE `file_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_title_unique` (`title`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_categories_title_unique` (`title`),
  ADD UNIQUE KEY `video_categories_slug_unique` (`slug`);

--
-- Indexes for table `video_tags`
--
ALTER TABLE `video_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_tags_video_id_foreign` (`video_id`),
  ADD KEY `video_tags_tag_id_foreign` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `file_uploads`
--
ALTER TABLE `file_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video_tags`
--
ALTER TABLE `video_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `video_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_tags`
--
ALTER TABLE `video_tags`
  ADD CONSTRAINT `video_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_tags_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
