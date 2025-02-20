-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 08:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'Wild Life', 'Wild life description'),
(4, 'Travel', 'Travel Description'),
(5, 'Art', 'Art Description'),
(6, 'Uncategorized', 'This is the description for the uncategorized category'),
(8, 'Food', 'Food description');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(3, 'The Hidden Wonders of the Amazon Rainforest', 'The Amazon Rainforest, often called the &quot;lungs of the Earth,&quot; is home to millions of species, many still undiscovered. From the vibrant macaws flying overhead to the mysterious jaguar lurking in the shadows, every corner holds a story waiting to be told. Join me on a journey through its dense canopies and winding rivers as we explore the wild heart of South America.', '1740055352image_2025-02-20_144231161.png', '2025-02-20 12:42:32', 3, 8, 0),
(4, 'The Silent Language of Abstract Art', 'Abstract art challenges us to see beyond the obvious. With splashes of color, chaotic lines, and undefined forms, it speaks directly to emotion, bypassing logic. In this post, we dive into the history of abstract expressionism and how artists like Kandinsky and Rothko transformed simple strokes into powerful messages.', '1740055434image_2025-02-20_144345329.png', '2025-02-20 12:43:54', 5, 8, 0),
(5, 'Backpacking Across the Italian Coast', 'From the colorful villages of Cinque Terre to the sun-kissed Amalfi Coast, Italy&rsquo;s coastline offers an unforgettable adventure. I share my week-long backpacking journey, filled with breathtaking views, delicious seafood, and the kindness of locals. Whether you&#039;re an avid traveler or dreaming of your next escape, this guide has something for you.', '1740055582image_2025-02-20_144621760.png', '2025-02-20 12:46:22', 4, 10, 0),
(6, 'Mastering the Art of Homemade Pasta', 'There&rsquo;s something magical about crafting pasta from scratch. The texture, the flavor, and the sheer satisfaction of turning flour and eggs into a delicious dish is unmatched. In this blog post, I walk you through my go-to recipe for silky tagliatelle and the secrets to a perfect tomato-basil sauce.', '1740074726image_2025-02-20_200525815.png', '2025-02-20 12:47:00', 3, 10, 0),
(9, 'My title', 'Body', '1740074992image_2025-02-20_200951868.png', '2025-02-20 18:09:52', 4, 9, 0),
(10, 'awdawd', 'wdadawd', '1740075074image_2025-02-20_201113754.png', '2025-02-20 18:11:14', 6, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(8, 'Ali', 'Jaber', 'ajaber', 'ajaber@gmail.com', '$2y$10$9bD6.1iZQ4vk5LvUKtlaquexpbX2X6kVCnikklzn7DKf4GIXPFEpq', '1740055192image_2025-02-20_143951615.png', 1),
(9, 'Karim', 'Ramadan', 'kramadan', 'kramadan@gmail.com', '$2y$10$DvYHIunhHXZ30Rumb8JDEOI/EBfSVxO76RdGnSRESJ0lUil61msTu', '1740055268image_2025-02-20_144107998.png', 0),
(10, 'Mohammad', 'Hussein', 'mhussein', 'mhussein@gmail.com', '$2y$10$9DBcWPV90iMpA/hUJu/b0.zS2yZG9kxHFVHTXdpZ3pY0EBB2KNYCW', '1740055545image_2025-02-20_144544108.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
