-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2025 at 12:56 PM
-- Server version: 9.1.0
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_description` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_description`, `created_date`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2025-08-08 12:21:57'),
(2, 'PHP', 'PHP, which stands for \"PHP: Hypertext Preprocessor,\" is a widely-used, open-source scripting language primarily designed for web development.', '2025-08-08 12:22:32'),
(3, 'Javascript', 'JavaScript is a programming language and core technology of the World Wide Web, alongside HTML and CSS', '2025-08-19 13:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comm_id` int NOT NULL AUTO_INCREMENT,
  `comm_desc` text NOT NULL,
  `ques_id` int NOT NULL,
  `comm_user_id` int NOT NULL,
  `comm_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comm_id`, `comm_desc`, `ques_id`, `comm_user_id`, `comm_time`) VALUES
(1, 'testing the comments', 1, 1, '2025-08-12 15:07:31'),
(2, 'In Python, you import a library (also called a module or package) using the import statement.\nHere’s the breakdown:\n\n1. Basic import\npython\nCopy\nEdit\nimport math\nprint(math.sqrt(16))\nHere, you’re importing the entire math module, and then using its sqrt() function.', 15, 2, '2025-08-12 15:14:01'),
(3, 'python comment', 15, 3, '2025-08-12 15:14:32'),
(4, 'tesitng comment', 15, 4, '2025-08-12 15:15:42'),
(10, 'testnewfinal', 0, 3, '2025-08-18 16:56:03'),
(11, 'testing fixed', 27, 3, '2025-08-18 16:59:15'),
(12, 'final test', 27, 3, '2025-08-18 16:59:26'),
(13, '&lt;script&gt;alert(&#039;do you want popu?&#039;)&lt;/script&gt;', 27, 3, '2025-08-18 17:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_messsage` text NOT NULL,
  `contact_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_messsage`, `contact_date`) VALUES
(1, 'Avdhut Tukaram Vidhate', 'avadhutvidhate11@gmail.com', 'Unable to login my account', 'testing form', '2025-08-19 13:18:50'),
(2, 'Avdhut Tukaram Vidhate', 'avadhutvidhate11@gmail.com', 'Unable to login my account', 'testing', '2025-08-19 13:20:52'),
(3, 'Avdhut Tukaram Vidhate', 'avadhutvidhate11@gmail.com', 'web', 'test', '2025-08-19 13:21:50'),
(4, 'Avdhut Tukaram Vidhate', 'avadhutvidhate11@gmail.com', 'web', 'mesaage', '2025-08-19 13:23:58'),
(5, 'Avdhut Tukaram Vidhate', 'avadhutvidhate11@gmail.com', 'Unable to login my account', 'testing', '2025-08-19 13:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `ques_id` int NOT NULL AUTO_INCREMENT,
  `ques_title` varchar(255) NOT NULL,
  `ques_desc` text NOT NULL,
  `ques_cat_id` int NOT NULL,
  `ques_user_id` int NOT NULL,
  `ques_cr_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ques_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `ques_title`, `ques_desc`, `ques_cat_id`, `ques_user_id`, `ques_cr_time`) VALUES
(24, 'testing thread', 'rasd', 0, 0, '2025-08-18 16:37:56'),
(27, 'testing thread', 'tase', 1, 3, '2025-08-18 16:44:30'),
(28, 'php is not installing', 'what are thhe php basic syntax', 2, 3, '2025-08-19 12:12:19'),
(29, 'php testing', 'php testing for search reuslt', 2, 3, '2025-08-19 12:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `srno` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`srno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `username`, `email`, `password`, `created_date`) VALUES
(1, 'testing', 'avadhutvidhate11@gmail.com', '$2y$12$tho6EIXgHXd0SPsBMR4gZuvLnTxX8r9j6bLisrBohR1SI0fIDXARK', '2025-08-12 15:50:38'),
(2, 'technew', 'technew@gmail.com', '$2y$12$TASfT3oTWn/uwRR/qsKzZuBEXtOO2ZHrgeQ65nYohoeV6uluOeacu', '2025-08-12 15:59:44'),
(3, 'test', 'test@gmail.com', '$2y$12$tkBdAXL3g5xopmVWg8O8bePE4idk3JNKY6VeET5zx38ij/4AtSB52', '2025-08-12 17:02:47'),
(4, 'newuser', 'newuser@gmail.com', '$2y$12$R6ZgM39Y8BVMi0NdS1sy0eKKO8rYH46AVAFuZIeDb3RHUf0aRVLKK', '2025-08-12 17:23:41'),
(5, 'new', 'new@gmail.com', '$2y$12$FOGQ2mk2VUUggxbFhe9PrO3lEXMCiT6Bnrr081Qobzq7N/RNfvPei', '2025-08-19 13:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions` ADD FULLTEXT KEY `ques_title` (`ques_title`,`ques_desc`);
ALTER TABLE `questions` ADD FULLTEXT KEY `ques_title_2` (`ques_title`,`ques_desc`);
ALTER TABLE `questions` ADD FULLTEXT KEY `ques_title_3` (`ques_title`,`ques_desc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
