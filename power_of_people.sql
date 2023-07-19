-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 10:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `power_of_people`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `headline` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `uploadFile` varchar(150) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `headline`, `description`, `category`, `uploadFile`, `status`, `added_on`) VALUES
(1, 'Ut qui distinctio I', '<p>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptate beatae quam maiores similique ipsum tempore aspernatur ipsa omnis perspiciatis, sit vel repudiandae doloremque possimus incidunt autem ducimus distinctio. Quia labore repellendus veritatis, officia vel recusandae laboriosam vitae laborum fuga reprehenderit minus quis, tempora autem error. Porro laboriosam enim architecto debitis quasi eaque perspiciatis maxime numquam voluptatum consequatur odit obcaecati repellendus adipisci vitae natus voluptatibus, ab autem quae ipsa vero velit reprehenderit rem cumque earum. Magnam explicabo sit reiciendis, distinctio ratione necessitatibus adipisci dolor accusantium! Numquam ducimus rem repudiandae alias in fuga, quidem ipsum corporis assumenda quam saepe, eius explicabo.</p>\r\n', 'Bussiness', NULL, '1', '2023-07-18 11:57:40.626935'),
(2, 'The standard Lorem Ipsum passage, used since the 50', '<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n\r\n<h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>\r\n\r\n<h3>Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>\r\n', 'Health', NULL, '1', '2023-07-19 11:12:36.478950');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `video_link` varchar(200) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `uploadThumbnail` varchar(150) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `video_link`, `details`, `description`, `category`, `uploadThumbnail`, `status`, `upload_date`) VALUES
(1, 'https://www.youtube.com/embed/Ff_M1g_e5T0', 'प्रसाद आणि नम्रताच्या मध्ये कबाब मे हड्डी बनला ओंकार | महाराष्ट्राची हास्य जत्रा | जोड़ी कमाल', 'About The Show:\r\n---------------------------\r\nThe best performing show is back with its new season. The best comedy talent of Maharashtra will perform hilarious skits and will compete against each other to win the season title. The performers will be judged by veteran actors like Prasad Oak and Sai Tamhankar.', NULL, NULL, '1', '2023-07-17 10:52:58'),
(2, 'https://www.youtube.com/embed/69pPYkGiEAQ', 'Kisi Ki Muskurahaton Pe Ho Nisar | Raj Kapoor | Anari | Mukesh | Evergreen Hindi Songs HD', '<p>Movie: Anari (1959) Song: Kisi Ki Muskurahaton Pe Ho Nisar Starcast: Raj Kapoor, Nutan, Nazir Hussain, Lalita Pawar, Motilal, Shubha Khote, Mukri and Helen Singer: Mukesh Music Director: Shankar Jaikishan Lyricist: Shailendra</p>\r\n', 'Lifestyle', NULL, '1', '2023-07-17 11:01:38'),
(3, 'https://www.youtube.com/embed/A04WawrDblo', 'Saree Ke Fall Sa| Full (Video) - R...Rajkumar|Pritam|Shahid & Sonakshi|Antara & Nakash', '<p>asasasASasAasdasdas</p>\r\n', 'Lifestyle', NULL, '1', '2023-07-18 07:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `position` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `uploadFile` varchar(150) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `tags` varchar(150) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `addes_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `addes_on`) VALUES
(1, 'Elit sed est enim q', '<p>asdasdasdas</p>\r\n', NULL, 'Power Of Charity', 'Health', NULL, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
