-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 04:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmv`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adminId` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'admin',
  `lastLogin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminId`, `email`, `password`, `role`, `lastLogin`) VALUES
('1', 'admin@gmail.com', '$2y$10$LlJC2yj5vv18mpEQm5vr2OIskqqssQSYaSKdJcjEHVk9M3B83JZVm', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_id` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `Message` longtext NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_id`, `Name`, `Email`, `subject`, `Message`, `Date`) VALUES
('25f95245bda6be58fe67b2cc33f7e8d39c7b126e', 'asudhsa', 's@gmail.com', '', 'anfmasnmf', '2023-08-02 13:02:24'),
('4488c574297e689e3d76522499ca3f649905c13f', 'ajsdnjsajkn', 'ss@gmail.com', '', 'askjndkjasn', '2023-08-02 13:06:18'),
('95ffc65c30246ad077f8243190d809414d609a06', 'ksdjdgnj', 's@gmail.comqq', '', 'dkjfnkjn', '2023-08-01 04:30:29'),
('9a3926ef11587cda8e63b3233c42efc2224308b1', 'hdbbhjavsdjh', 's@gmail.com', '', 'asndln', '2023-08-02 13:04:55'),
('b3902311042bb977fbdb3b30978baa10415e910f', 'zscbdhsab', 's@gmail.com', '', 'SKJbdhbsh', '2023-08-02 12:56:50'),
('c6f939bc1635912deabcf4955f6780295d183230', 'skjandkajs', 's@gmail.com', '', 'djbfkjsdbjk', '2023-08-02 11:55:25'),
('d8b2d848ffc2f0abacc92e3b50a355f45a4d6e9f', 'zdkjfsbaj', 'w@gmail.com', '', 'nasbdnmsdnjm', '2023-07-28 16:34:36'),
('dca38186b6b5b20cafb92ab0f09168162b823043', 'mnfkjsdb', 's@gmail.com', 'sdnfksdbm', 'dsmfksnndf', '2023-08-02 15:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `image`) VALUES
('b982766c13a5302a1faee906e18104c27929fce5', 'gallery/makeUp.jpg'),
('55a076896360ee6d81cbfca16155735b29f84e11', 'gallery/semco.jpg'),
('193722fa117a38a93f878ccdcf716f6d49166c95', 'gallery/FoodShareNepal.jpg'),
('9e82db90431b84a185e704bf7777ed4065c20d7e', 'gallery/back.jpg'),
('8d01861904bf14fb45d984e21479701d48740955', 'gallery/character.jpg'),
('14cce93c55b30a996485577ffee0a9aad20a41e7', 'gallery/sign.jpg'),
('67cfa7e14d8693221d3cce84e260fffc7b41decb', 'gallery/madhesi.jpg'),
('9cc5335024857875034ca910027e07b6118d64bb', 'gallery/transcript.jpg'),
('cf118e16644aad3ad8c532c324f4ca82026f05bc', 'gallery/front.jpg'),
('f7c08c16c8c5094d9d66255f8f15bdd531affcaf', 'gallery/warning.png'),
('5986f4ddca1229f9d724b37db05ddac03b16595d', 'gallery/xavier-hss.png'),
('abcd9df35a98e7b845366b44cd599d7942c3303f', 'gallery/Picsart_23-03-28_19-41-03-525.png'),
('0d377864531095784f1aca204ba611eaf383d91f', 'gallery/334875920_1148883212470255_537628201993748'),
('bfe0608b81af154b066b6d2038e71fa0b9df388e', 'gallery/static route(0)-2.png'),
('efd5442ba1656b7ab02a7976bc00e3ae8d8a4fa9', 'gallery/static route(0)-1.png'),
('5f75fe19e5a3c33586b93e687088882849ddf433', 'gallery/static route(1)-1.png'),
('19bfd485d480b0992715903a54ba910db6404692', 'gallery/static route(1)-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `majorhighlights`
--

CREATE TABLE `majorhighlights` (
  `packageId` varchar(255) NOT NULL,
  `packageMajorHighlights` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majorhighlights`
--

INSERT INTO `majorhighlights` (`packageId`, `packageMajorHighlights`) VALUES
('c344707ce14796b9012f323cfa77e9d047a045b5', 'zjskcbHB'),
('c344707ce14796b9012f323cfa77e9d047a045b5', 'sjsahjdh'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'ADSBHbhjbd'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'sbHSBHB'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'BSABH'),
('c15e61df181e3d688c470409856b020a1218363d', 'djsfhjabsbh'),
('c15e61df181e3d688c470409856b020a1218363d', 'hiasfbhu'),
('c15e61df181e3d688c470409856b020a1218363d', 'dhabsdhv'),
('c15e61df181e3d688c470409856b020a1218363d', 'dhsbf'),
('c15e61df181e3d688c470409856b020a1218363d', 'bdhsbfh'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'zkdvnaknd'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'mkasnfckj'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'sddnavk'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'zxmdnfjabj'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'ndbkjfbkawjb'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'asnkjfbjaksb'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'jkabsi'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'mnsanbfkb'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'asnkjfbjaksb'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'jkabsi'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'mnsanbfkb');

-- --------------------------------------------------------

--
-- Table structure for table `packageimages`
--

CREATE TABLE `packageimages` (
  `packageId` varchar(255) NOT NULL,
  `packageImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packageimages`
--

INSERT INTO `packageimages` (`packageId`, `packageImage`) VALUES
('c344707ce14796b9012f323cfa77e9d047a045b5', 'packageImages/semco.jpg'),
('c344707ce14796b9012f323cfa77e9d047a045b5', 'packageImages/FoodShareNepal.jpg'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'packageImages/N (1).png'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'packageImages/N.png'),
('c15e61df181e3d688c470409856b020a1218363d', 'packageImages/makeUp.jpg'),
('c15e61df181e3d688c470409856b020a1218363d', 'packageImages/semco.jpg'),
('c15e61df181e3d688c470409856b020a1218363d', 'packageImages/FoodShareNepal.jpg'),
('09863cb41d94dfc5038ea48274c0a095ac66d73a', 'packageImages/makeUp.jpg'),
('09863cb41d94dfc5038ea48274c0a095ac66d73a', 'packageImages/semco.jpg'),
('09863cb41d94dfc5038ea48274c0a095ac66d73a', 'packageImages/FoodShareNepal.jpg'),
('09863cb41d94dfc5038ea48274c0a095ac66d73a', 'packageImages/N.png'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'packageImages/warning.png'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'packageImages/xavier-hss.png'),
('4cc3092878763ca8966dce237278b43e1745cbd0', 'packageImages/makeUp.jpg'),
('4cc3092878763ca8966dce237278b43e1745cbd0', 'packageImages/semco.jpg'),
('4cc3092878763ca8966dce237278b43e1745cbd0', 'packageImages/FoodShareNepal.jpg'),
('142eca9573238f0e0cf04ed27b36c14ecca8733c', 'packageImages/makeUp.jpg'),
('142eca9573238f0e0cf04ed27b36c14ecca8733c', 'packageImages/semco.jpg'),
('142eca9573238f0e0cf04ed27b36c14ecca8733c', 'packageImages/FoodShareNepal.jpg'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'packageImages/makeUp.jpg'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'packageImages/semco.jpg'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'packageImages/FoodShareNepal.jpg'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'packageImages/makeUp.jpg'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'packageImages/semco.jpg'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'packageImages/FoodShareNepal.jpg'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'packageImages/makeUp.jpg'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'packageImages/semco.jpg'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'packageImages/FoodShareNepal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packageitineararys`
--

CREATE TABLE `packageitineararys` (
  `packageId` varchar(255) NOT NULL,
  `packageItinearary` varchar(500) NOT NULL,
  `itineararyDescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packageitineararys`
--

INSERT INTO `packageitineararys` (`packageId`, `packageItinearary`, `itineararyDescription`) VALUES
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'aksbdkb', 'nksabhfb'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'jwakjbskjfb', 'mnjalasnjfn'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'mskjdabf ', 'msnjask'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'aksbdkb', 'nksabhfb'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'jwakjbskjfb', 'mnjalasnjfn'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'mskjdabf ', 'msnjask');

-- --------------------------------------------------------

--
-- Table structure for table `packagelist`
--

CREATE TABLE `packagelist` (
  `packageId` varchar(255) NOT NULL,
  `packageTitle` varchar(255) NOT NULL,
  `packageDescription` longtext NOT NULL,
  `accommodation` longtext NOT NULL,
  `mealsAvailable` longtext NOT NULL,
  `bestTimeForVisit` varchar(255) NOT NULL,
  `difficultyLevel` varchar(255) NOT NULL,
  `difficultyLevelPercentage` int(3) NOT NULL,
  `packageThumbnailImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagelist`
--

INSERT INTO `packagelist` (`packageId`, `packageTitle`, `packageDescription`, `accommodation`, `mealsAvailable`, `bestTimeForVisit`, `difficultyLevel`, `difficultyLevelPercentage`, `packageThumbnailImage`) VALUES
('c344707ce14796b9012f323cfa77e9d047a045b5', 'S ANhbdhcjB', '', 'SDBASHH', 'SABHKBFK', 'SSAHBHKJ', 'SNBDKJADBKJ', 96, 'packageImages/makeUp.jpg'),
('3c7b0e059e3a97752e0977a0e7a6292aa5cb7ee9', 'uasdhiuhs', '', 'sajbdhb', 'sndjabdj', 'sjbSBDI', 'SJBSAAHBCH', 97, 'packageImages/makeUp.jpg'),
('c15e61df181e3d688c470409856b020a1218363d', 'lama', '', 'askhdb', 'wndwsbd', 'jdnsjbd', 'ksakbf', 94, 'packageImages/makeUp.jpg'),
('09863cb41d94dfc5038ea48274c0a095ac66d73a', 'aksdfnjkasb', '', 'ajnfskbsh', 'ssnajkbfvkjnsdnsj', 'asjfnjb', 'dnjskfjkn', 0, 'packageImages/FoodShareNepal.jpg'),
('27a8b713597315237f8d8b60620a3c620e07a507', 'asmkjfcakjvdb', 'scjknacj absjnc', 'dsn fcvjs', 'nsak cnk ', 'ms skn cnk ', 'm csz cksn ', 11, 'packageImages/semco.jpg'),
('7d92f34955459320c7be0a94b9d9213b052c3c0b', '', '', '', '', '', '', 0, 'packageImages/'),
('4cc3092878763ca8966dce237278b43e1745cbd0', 'dcfmndsbh', 'xndskfbsb', 'nsdbfk', 'ndsbfkdsbkj', 'ndjdbsnhbh', 'msndbskjf', 17, 'packageImages/semco.jpg'),
('142eca9573238f0e0cf04ed27b36c14ecca8733c', 'dcfmndsbh', 'xndskfbsb', 'nsdbfk', 'ndsbfkdsbkj', 'ndjdbsnhbh', 'msndbskjf', 17, 'packageImages/semco.jpg'),
('75f937d17fcab56d840daa041f882df16c6a7745', 'slandkajbn', 'snjsanfln', 'dknadjnafln', 'snaslnfln', 'sndkjldnlkqdnszlnflk', 'mndlnlgsk', 18, 'packageImages/semco.jpg'),
('ae4bd33bbc578788459939a5dbc14c2dac40ba92', 'abasjbh', 'ajkbkfahkjb', 'abfsabj', 'bnjabffvh', 'jbdbhfbva', 'jbabshf', 4, 'packageImages/makeUp.jpg'),
('aee0ef1914cec5e1a07f9be9fe68a4a770e954b1', 'abasjbh', 'ajkbkfahkjb', 'abfsabj', 'bnjabffvh', 'jbdbhfbva', 'jbabshf', 4, 'packageImages/makeUp.jpg'),
('32bffa62a16cfe9de99166448083b445c64fe2ed', '', '', '', '', '', '', 0, 'packageImages/');

-- --------------------------------------------------------

--
-- Table structure for table `popularlocations`
--

CREATE TABLE `popularlocations` (
  `locationId` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
