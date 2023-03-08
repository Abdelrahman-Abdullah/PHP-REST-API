-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 07:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(1, 'Reels', '2023-03-16 20:21:03'),
(2, 'Countdown ', '2023-03-20 20:21:03'),
(3, 'Cat2', '2023-03-27 20:22:26'),
(4, 'Cat4', '2023-03-07 20:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_body` text NOT NULL,
  `post_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_body`, `post_category`, `created_at`) VALUES
(1, 'The Cheesecake Factory: Use humor and great photos', 'The Cheesecake Factory is an American chain of restaurants, localized around the world. If you’re not familiar with it, you may recognize the name from the hit series The Big Bang Theory. They have a large following on Facebook and regularly post about food that’s on their menu. These posts get a lot of engagement, due to the great images used and the funny text accompanying them.', 2, '2023-03-07 20:25:11'),
(2, 'Google: Share interesting customer stories\r\n', 'Google Maps is one of those things that doesn’t need much explaining. Most people know what it does, it helps you get from A to B. It can even find you a faster route when there’s loads of traffic up ahead. But a few days back, Google shared an interesting customer story on Twitter. Apparently, marine biologist Johnny Gaskell and a team of researchers, use Google Maps to explore ocean life. You know, way down there. Something that would have taken a lot more time if they haven’t had access to Maps. Quite a unique customer story and a cool way to look at a service that has become so normal in our day-to-day life.', 3, '2023-03-07 20:25:11'),
(3, 'Tony’s Chocolonely: Show people what’s happening', 'Tony Chocolonely is a Dutch company that sells chocolate. Their chocolate bars are quite popular and their mission is to make chocolate 100% slave-free. As they are opinionated, which fits their mission, they often get a lot of engagement on their social posts. A year ago they opened a Chocolate Bar in Amsterdam and announced this news on LinkedIn:', 3, '2023-03-07 20:25:11'),
(4, 'The Clay Creative Co: Increase followers with giveaways', 'Now, this is an online store you’ve probably not heard of, as it’s a small business from the UK that sells its earrings through Etsy. But this post on Instagram is a great example of how a small online business can grow its number of followers. By doing a simple giveaway! This online store (and Instagram account) is run by one person, who also makes these earrings herself. And to celebrate that her account now has 1000 followers she decided to do another giveaway. Mind you, this may be a smaller business, but her Instagram account is only four months old and she already had 500 followers after the first month.', 4, '2023-03-07 20:25:11'),
(6, 'Social Work', 'Social Work is the premiere journal of the social work profession. Widely read by practitioners, faculty, and students, it is the official journal of NASW and is provided to all members as a membership benefit. Social Work is dedicated to improving practice and advancing knowledge in social work and social welfare.', 1, '2023-03-08 15:18:28'),
(8, 'Social Work Research', 'Social Work Research publishes exemplary research to advance the development of knowledge and inform social work practice. Widely regarded as the outstanding journal in the field, it includes analytic reviews of research, theoretical articles pertaining to social work research, evaluation studies, and diverse research studies that contribute to knowledge about social work issues and problems.', 2, '2023-03-08 15:24:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `Post_Cat_FK` (`post_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Post_Cat_FK` FOREIGN KEY (`post_category`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
