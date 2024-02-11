-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2023 at 12:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `createTime` datetime DEFAULT current_timestamp(),
  `updateTime` datetime DEFAULT current_timestamp(),
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `content`, `createTime`, `updateTime`, `type`) VALUES
(1, 'Liverpool through as Europa League group winners after dismantling Lask                                                                                ', 'Andy Hunter at Anfield', 'A perfect 10 for Liverpool and the perfect night for Jürgen Klopp. His team won Group E with a game to spare to avoid the playoff route into the last 16 of the Europa League and release any pressure from the group finale away at Union Saint-Gilloise. A clean sheet for Caoimhín Kelleher, the 199th goal of Mohamed Salah’s Liverpool career, no injuries and two goals for Cody Gakpo, flourishing on his return to the forward line, ticked the rest of the boxes for a grateful Liverpool manager.\r\n\r\nLiverpool’s superiority over their Europa League opponents has not been in doubt, an off-night in Toulouse notwithstanding, and was underlined throughout a comfortable defeat of Lask. A 10th successive victory at Anfield in all competitions this season represents the club’s best start to a home campaign since the double-winning season of 1985-86. Combined with Toulouse’s failure to beat Union SG in France, it secured Liverpool first place in the group with something to spare. Victory looked assured from the moment Luis Díaz headed home in the 12th minute.\r\n\r\n                                                                                ', '2023-11-30 00:00:00', '2023-12-01 19:47:52', 'sport'),
(24, 'Gwyneth Paltrow: is her life a work of performance art?', 'Zoe Williams', 'Ripping to shreds Gwyneth Paltrow’s Goop gift list has been a media preoccupation for years now, to the point that the website even titles it, “The ridiculous but awesome gift guide”. Still, even those not driven by well-documented animus towards Paltrow (there should be a healing crystal for this, it’s so intense) have objected to the $15,000 vibrator sheathed in 24-carat gold. I’ve spent ages down a rabbit hole, trying to work out what kind of person might require a gold vibrator, and the closest thing I can come up with is someone whose kink is being obscenely rich. But no way is that anyone’s kink.\r\n\r\nOthers have objected to the idiosyncrasies: a gong-fascination that includes not just a $2,000 gong, but also gong workshops with a personal gong trainer. A nearly $400 parmesan looks like a standard out-of-touch slap in the face to pauperised normies everywhere. The most expensive gift, nearly $40,000 for a single night at a Fijian eco resort, hit all the buttons of Great Gatsby profligacy and a high net worth culture so untethered to state or nation that place becomes backdrop, locals mere extras. It’s Marie Antoinette’s mock village rebooted: the eco resort.\r\n\r\n', '2023-11-30 21:34:22', '2023-12-01 18:44:31', 'lifestyle'),
(25, '10,000 naps a day: how chinstrap penguins survive on microsleeps                                ', 'Phoebe Weston                                                                                ', 'Spending your nights sleeping for just four seconds at a time might sound like a form of torture, but not for chinstrap penguins, which fall asleep thousands of times a day, new research finds.\r\n\r\nScientists studying the birds on King George Island in Antarctica found they nod off more than 10,000 times a day, allowing them to keep a constant eye on their nests, protecting eggs and chicks from predators. In total, the birds manage 11 hours of snoozing a day – without ever slipping into uninterrupted sleep.\r\n\r\n“Humans cannot sustain this state, but penguins can,” said lead researcher Paul-Antoine Libourel from Lyon Neuroscience Research Centre. “Sleep is much more complex in its diversity than what we read about in most textbooks.”                                                                                                ', '2023-11-30 21:39:57', '2023-12-03 12:15:42', 'lifestyle'),
(26, 'Latin America remembers Kissinger’s ‘profound moral wretchedness’', 'John Bartlett', 'Henry Kissinger’s death has brought out some bitter epitaphs from Latin America where the legacy of US intervention helped saddle the region with some of the most brutal military regimes of the 20th century.\r\n\r\nNowhere has been the reaction been more damning than in Chile, where Kissinger was instrumental in the 1973 coup that led to the death of a democratically elected socialist president, Salvador Allende and the installation of a dictator, Gen Augusto Pinochet, and his military junta.\r\n\r\n', '2023-11-30 22:20:21', '2023-12-01 17:08:04', 'culture'),
(27, 'Social media post', 'A. Douglas Kinghorn                                ', 'Many people believe that because plants are natural, they represent better treatment options than prescription drugs. This isn’t true. Just like drugs, herbs carry certain risks, including the risk of potentially serious side effects. But in contrast to prescription drugs, natural products aren’t required to demonstrate their safety and efficacy in clinical trials. Therefore, such products cannot replace medical treatment.                                ', '2023-12-01 13:07:36', '2023-12-02 12:43:54', 'culture'),
(28, 'Wall Street Journal article questions decades of scientific evidence demonstrating elevated atmospheric-CO2 causes global warming', 'Stephen Bell', 'In the Wall Street Journal (WSJ), opinion columnist Holman W. Jenkins claims we do not know if carbon dioxide (CO2) is the cause of global warming. Jenkins bases his November 3rd article “The Earth Is Warming, but Is CO2 the Cause?” largely on a recent report from the national statistics agency of Norway. Dozens of other outlets and blogs similarly covered that report. The claim that we do not know if CO2 is the cause of global warming is inaccurate based on a comprehensive body of scientific work, diverse methodologies and data sources, and fundamental physics, as we explain below.\r\n\r\nA consensus of scientific evidence confirms CO2 from human emissions causes global warming\r\nIt takes more than the claims of one report to overturn decades of evidence and the international scientific consensus that CO2 causes global warming. There is a long and straightforward history of how we have reached the consensus on anthropogenic climate change, or that CO2 and other greenhouse gas emissions from humans are causing global warming.\r\n\r\nNearly all scientists agree humans are causing global warming through greenhouse gas emissions. Among scientists with the most climate-related expertise, the consensus reaches 100%[1]. A recent peer-reviewed scientific study analyzing thousands of other peer-reviewed scientific studies found that 99% of the scientific literature confirms human greenhouse gas emissions cause global warming[2].                                ', '2023-12-01 13:21:32', '2023-12-01 21:46:46', 'news'),
(29, 'Last one', 'YYY', 'This is the last article', '2023-12-02 12:48:32', '2023-12-02 12:48:32', 'news'),
(35, 'test301', 'e', 'test333', '2023-12-02 17:36:45', '2023-12-02 17:36:45', 'news'),
(36, 'A', 'a', 'a', '2023-12-02 17:37:47', '2023-12-02 17:38:20', 'culture'),
(37, 'Toone downs Dutch in epic England win to keep Team GB’s Olympics dream alive', 'Suzanne Wrack ', 'Down and not out, just. England’s stunning second-half fightback from a two-goal deficit against the Netherlands to win ensured they have a chance of progressing from their Nations League group and earning a place for Team GB at the Olympics.\r\n\r\nElla Toone was the hero, returned to the super-sub role she occupied during the Euros, firing in from a tight angle in added time to secure the victory and maintain the Lionesses’s unbeaten run at Wembley.\r\n\r\nThere are several small positives to the England contingent possibly avoiding Great Britain duty at Paris 2024 and having a summer off after back-to-back tournaments three years in a row, but they are the smallest of silver linings on the darkest of clouds and not ones Sarina Wiegman’s players want to contemplate.\r\n\r\nEngland not progressing to the latter stage of the Nations League and securing the entry of Team GB at the Olympics, which would only be achieved by finishing as one of the top two teams, would be a disaster for a side with the ambition they have and the expectation on them.\r\n\r\n', '2023-12-02 20:54:54', '2023-12-02 22:30:55', 'sport'),
(38, 'News 123', 'nnn', 'Hello news', '2023-12-02 22:24:16', '2023-12-02 22:24:16', 'news'),
(39, 'Culture 12345', 'c', 'this is the culture article', '2023-12-02 22:24:54', '2023-12-02 22:24:54', 'culture'),
(40, 'Test222', 'e', 'hhhhhhhhhh', '2023-12-03 01:18:51', '2023-12-03 01:18:51', 'sport'),
(41, 'Test333', 'AAA', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', '2023-12-03 12:10:05', '2023-12-03 12:10:05', 'culture');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `comment_text`, `time`) VALUES
(1, 1, 'this is the first comment', '2023-12-02 15:07:34'),
(2, 1, 'this is the second comment', '2023-12-02 15:07:34'),
(5, 1, 'fourth', '2023-12-02 15:07:34'),
(6, 1, 'five', '2023-12-02 15:07:34'),
(7, 1, 'six', '2023-12-02 15:07:34'),
(8, 1, 'seven', '2023-12-02 15:07:34'),
(9, 1, 'eight', '2023-12-02 15:07:34'),
(10, 28, 'first comment', '2023-12-02 15:07:34'),
(11, 28, 'hello', '2023-12-02 15:07:34'),
(12, 28, 'hi', '2023-12-02 15:07:34'),
(13, 1, 'nine', '2023-12-02 15:07:34'),
(14, 25, 'this is the first', '2023-12-02 15:07:34'),
(17, 25, 'fourth', '2023-12-02 15:07:34'),
(19, 25, 'hi five', '2023-12-02 15:09:19'),
(20, 25, 'six', '2023-12-02 15:16:30'),
(21, 25, 'seven comment', '2023-12-02 15:23:12'),
(22, 27, 'hello world', '2023-12-02 15:27:47'),
(23, 25, 'Hello eight', '2023-12-02 15:41:01'),
(25, 26, 'comment 1', '2023-12-02 15:50:00'),
(37, 36, '', '2023-12-02 17:38:09'),
(38, 27, 'Hi', '2023-12-02 17:44:38'),
(40, 27, '22222', '2023-12-02 17:44:46'),
(41, 24, '3333', '2023-12-02 17:45:41'),
(42, 38, 'hi', '2023-12-02 22:25:51'),
(43, 37, '1111111', '2023-12-02 22:31:17'),
(45, 37, '33333', '2023-12-02 22:31:24'),
(46, 37, '444', '2023-12-02 22:53:38'),
(47, 39, '122', '2023-12-03 01:17:44'),
(48, 1, '5555', '2023-12-03 07:36:47'),
(49, 28, 'wwww', '2023-12-03 11:54:49'),
(50, 41, 'wwww', '2023-12-03 12:10:14'),
(51, 25, '🐼🐱🦆🐶', '2023-12-03 12:12:04'),
(52, 24, 'hhhhhhh🐣🦄🦉', '2023-12-03 12:13:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
