-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 09:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_users_blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Commenter_Id` int(11) NOT NULL,
  `Commenter_Name` varchar(100) NOT NULL,
  `Comment` varchar(32768) NOT NULL,
  `C_Likes` int(11) NOT NULL,
  `C_Replys` int(11) NOT NULL,
  `Timee` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_Id`, `Post_Id`, `Commenter_Id`, `Commenter_Name`, `Comment`, `C_Likes`, `C_Replys`, `Timee`) VALUES
(68, 18, 7, 'anyuser@gmail.com', 'abc\n', 0, 1, '2020-08-27 17:12:05'),
(69, 18, 7, 'anyuser@gmail.com', 'another comment', 1, 0, '2020-08-27 17:12:16'),
(70, 19, 7, 'anyuser@gmail.com', 'another comment', 0, 0, '2020-08-27 17:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments_likes`
--

CREATE TABLE `comments_likes` (
  `Like_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Comment_Id` int(11) NOT NULL,
  `Liker_Id` int(11) NOT NULL,
  `Liker_Email` varchar(150) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_likes`
--

INSERT INTO `comments_likes` (`Like_Id`, `Post_Id`, `Comment_Id`, `Liker_Id`, `Liker_Email`, `Time`) VALUES
(5, 18, 69, 7, 'anyuser@gmail.com', '2020-08-27 17:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_Id` int(11) NOT NULL,
  `P_Title` varchar(250) NOT NULL,
  `Author_Id` int(100) NOT NULL,
  `Author_Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `T_Comments` int(50) NOT NULL,
  `Post_Likes` int(100) NOT NULL,
  `P_Thumbnail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_Id`, `P_Title`, `Author_Id`, `Author_Name`, `Description`, `Time`, `T_Comments`, `Post_Likes`, `P_Thumbnail`) VALUES
(18, 'Refresh System Environment Variables for all processes without Logout/ Restart in C++', 7, 'anyuser@gmail.com', '<p>So this is how we refreh system environment variables in C+</p>\r\n\r\n<blockquote>\r\n<pre>\r\n<code>LPCTSTR keyPath = TEXT(&quot;Environment&quot;);\r\nSendMessageTimeout(HWND_BROADCAST, WM_SETTINGCHANGE, 0, (LPARAM)keyPath, SMTO_BLOCK, 100, NULL);</code></pre>\r\n</blockquote>\r\n\r\n<p>Hope it helps someone out...Thanks&nbsp;</p>\r\n', '2020-08-27 17:11:43', 0, 1, '1303534810490465109img_1.jpg'),
(19, 'A new Post', 7, 'anyuser@gmail.com', '<p>This is another post</p>\r\n', '2020-08-27 17:12:56', 0, 1, '693185884img_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE `posts_likes` (
  `Like_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Liker_Id` int(11) NOT NULL,
  `Liker_Email` varchar(150) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_likes`
--

INSERT INTO `posts_likes` (`Like_Id`, `Post_Id`, `Liker_Id`, `Liker_Email`, `Time`) VALUES
(1, 18, 7, 'anyuser@gmail.com', '2020-08-27 17:11:43'),
(2, 19, 7, 'anyuser@gmail.com', '2020-08-27 17:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `Reply_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Comment_Id` int(11) NOT NULL,
  `Repliers_Id` int(11) NOT NULL,
  `Repliers_Email` varchar(150) NOT NULL,
  `Reply` varchar(32768) NOT NULL,
  `R_Likes` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replys`
--

INSERT INTO `replys` (`Reply_Id`, `Post_Id`, `Comment_Id`, `Repliers_Id`, `Repliers_Email`, `Reply`, `R_Likes`, `Time`) VALUES
(35, 18, 68, 7, 'anyuser@gmail.com', 'def', 0, '2020-08-27 17:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `replys_likes`
--

CREATE TABLE `replys_likes` (
  `Like_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Comment_Id` int(11) NOT NULL,
  `Reply_Id` int(11) NOT NULL,
  `Liker_Id` int(11) NOT NULL,
  `Liker_Email` varchar(150) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `UserType` varchar(100) NOT NULL,
  `Image_Name` varchar(500) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Password`, `UserType`, `Image_Name`, `Status`) VALUES
(7, 'anyuser', 'anyuser@gmail.com', 'anyuser', 'General', '1498324110983359990person_1.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_Id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD PRIMARY KEY (`Like_Id`),
  ADD KEY `Comment_Id` (`Comment_Id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_Id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`Like_Id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`Reply_Id`),
  ADD KEY `Comment_Id` (`Comment_Id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `replys_likes`
--
ALTER TABLE `replys_likes`
  ADD PRIMARY KEY (`Like_Id`),
  ADD KEY `Comment_Id` (`Comment_Id`),
  ADD KEY `Post_Id` (`Post_Id`),
  ADD KEY `Reply_Id` (`Reply_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `comments_likes`
--
ALTER TABLE `comments_likes`
  MODIFY `Like_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `Like_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `Reply_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `replys_likes`
--
ALTER TABLE `replys_likes`
  MODIFY `Like_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD CONSTRAINT `comments_likes_ibfk_1` FOREIGN KEY (`Comment_Id`) REFERENCES `comments` (`Comment_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_likes_ibfk_2` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD CONSTRAINT `posts_likes_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replys`
--
ALTER TABLE `replys`
  ADD CONSTRAINT `replys_ibfk_1` FOREIGN KEY (`Comment_Id`) REFERENCES `comments` (`Comment_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replys_ibfk_2` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replys_likes`
--
ALTER TABLE `replys_likes`
  ADD CONSTRAINT `replys_likes_ibfk_1` FOREIGN KEY (`Comment_Id`) REFERENCES `comments` (`Comment_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replys_likes_ibfk_2` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replys_likes_ibfk_3` FOREIGN KEY (`Reply_Id`) REFERENCES `replys` (`Reply_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
