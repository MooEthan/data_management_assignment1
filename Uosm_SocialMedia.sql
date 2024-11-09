-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2024 at 07:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Uosm_SocialMedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `Hashtag`
--

CREATE TABLE `Hashtag` (
  `HashtagID` int(50) NOT NULL,
  `HashtagName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hashtag`
--

INSERT INTO `Hashtag` (`HashtagID`, `HashtagName`) VALUES
(1, '#exam'),
(2, '#event'),
(3, '#project'),
(4, '#sports'),
(5, '#schooltrip');

-- --------------------------------------------------------

--
-- Table structure for table `Mentions`
--

CREATE TABLE `Mentions` (
  `MentionID` int(50) NOT NULL,
  `UserID` int(50) NOT NULL,
  `PostID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Mentions`
--

INSERT INTO `Mentions` (`MentionID`, `UserID`, `PostID`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostText` varchar(255) NOT NULL,
  `ImageURL` varchar(255) NOT NULL,
  `VideoURL` varchar(255) NOT NULL,
  `PostDate` date NOT NULL,
  `HashtagID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`PostID`, `UserID`, `PostText`, `ImageURL`, `VideoURL`, `PostDate`, `HashtagID`) VALUES
(1, 1, 'Excited for the upcoming exam!', 'NULL', 'NULL', '2024-02-01', 1),
(2, 2, 'Had a great time at the school event today!', 'event.jpg', 'NULL', '2024-02-02', 2),
(3, 3, 'Finally submitted my project. Feeling relieved.#project', 'project.jpg', 'NULL', '2024-02-03', 3),
(4, 4, 'Practicing for the upcoming sports tournament.', 'sports.jpg', 'sports.mp4', '2024-02-04', 4),
(5, 5, 'Enjoyed the school trip to the museum today.', 'museum.jpg', 'sports.mp4', '2024-02-05', 5),
(6, 2, 'I am posting another Post', 'myImage.jpg', 'noVideo', '2024-04-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(50) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `FirstName`, `LastName`, `Email`, `BirthDate`, `Gender`) VALUES
(1, 'John', 'Doe', 'john@example.com', '1998-05-15', 'Male'),
(2, 'Jane', 'Smith', 'jane@example.com', '1999-09-25', '1999-09-25'),
(3, 'Alice', 'Lee', 'alice@example.com', '1997-03-10', 'Female'),
(4, 'Bob', 'Tan', 'bob@example.com', '1996-11-18', 'Male'),
(5, 'Emily', 'Wong', 'emily@example.com', '2000-07-03', 'Female'),
(6, 'Zeeshan', 'Bhatit', 'zeeshan@gmail.com', '2024-02-02', 'male'),
(7, 'new USer', 'New ', 'newUSer@gmail.com', '2024-11-09', 'Male'),
(8, 'USer UPdated', 'new user Update', 'newuser2@gmail.com', '2024-11-10', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `User_Post`
--

CREATE TABLE `User_Post` (
  `UserPostID` int(50) NOT NULL,
  `UserID` int(50) NOT NULL,
  `PostID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User_Post`
--

INSERT INTO `User_Post` (`UserPostID`, `UserID`, `PostID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hashtag`
--
ALTER TABLE `Hashtag`
  ADD PRIMARY KEY (`HashtagID`);

--
-- Indexes for table `Mentions`
--
ALTER TABLE `Mentions`
  ADD PRIMARY KEY (`MentionID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `HashtagID` (`HashtagID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `User_Post`
--
ALTER TABLE `User_Post`
  ADD PRIMARY KEY (`UserPostID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PostID` (`PostID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Hashtag`
--
ALTER TABLE `Hashtag`
  MODIFY `HashtagID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Mentions`
--
ALTER TABLE `Mentions`
  MODIFY `MentionID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `User_Post`
--
ALTER TABLE `User_Post`
  MODIFY `UserPostID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Mentions`
--
ALTER TABLE `Mentions`
  ADD CONSTRAINT `mentions_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `Posts` (`PostID`),
  ADD CONSTRAINT `mentions_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`HashtagID`) REFERENCES `Hashtag` (`HashtagID`);

--
-- Constraints for table `User_Post`
--
ALTER TABLE `User_Post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `user_post_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `Posts` (`PostID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
