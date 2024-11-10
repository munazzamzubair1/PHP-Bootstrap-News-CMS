-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 11:25 AM
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
-- Database: `news-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Business', 2),
(2, 'Entertainments', 3),
(3, 'Sports', 2),
(4, 'Politics', 2),
(5, 'Education', 5),
(6, 'Health', 6);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'Prioritizing Your Health: A Journey to Wellness', 'Your health is your most valuable asset, and taking small steps each day can lead to a big impact on your overall well-being. Whether it&#039;s staying active, eating nutritious foods, or simply taking time for self-care, every choice you make counts. Remember, a healthy body supports a healthy mind, and both are essential for living your best life. Start prioritizing your health today&mdash;your future self will thank you!', '6', '20 Oct, 2024', 1, 'blood-pressure-1584223_64020-10-2024-10-11-11.jpg'),
(2, 'Health is wealth', 'Lorem ipsum dolor sit amet consectetur adipiscing elit vel auctor metus, morbi nec luctus class sagittis dapibus ridiculus cras nibh in, mattis felis commodo suscipit lobortis cum tempor venenatis ultrices. Class vulputate at nullam odio montes mauris feugiat imperdiet nisi sociis commodo sagittis habitant erat magnis, curae nostra vestibulum hac phasellus cras orci ullamcorper ornare velit viverra tortor hendrerit. Accumsan turpis ac lobortis libero congue curabitur mattis viverra mauris laoreet, eget sollicitudin bibendum diam et tempus netus aliquam porttitor augue, dignissim orci praesent velit malesuada dictumst parturient donec potenti. Est quis nibh montes primis tincidunt elementum sollicitudin donec, netus velit auctor massa habitasse leo a nostra orci, vel semper aliquam augue mus ante scelerisque. Non praesent iaculis torquent suspendisse libero magnis per cursus, nisi condimentum ligula in penatibus lectus placerat rutrum feugiat, diam scelerisque magna orci nulla molestie pellentesque. Pharetra mus lacinia phasellus libero id per imperdiet facilisi quisque a, tempor vitae suspendisse vehicula', '6', '25 Oct, 2024', 2, 'hypertension-867855_64024-10-2024-08-22-48.jpg'),
(15, 'Doloribus voluptatibus est dolores consequatur in', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamcorper, tempor arcu dui sapien ad vitae iaculis. Sem varius scelerisq', '6', '25 Oct, 2024', 3, 'apple-5183288_64025-10-2024-09-30-20.jpg'),
(3, 'Businees is essential for wellfare', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse', '1', '25 Oct, 2024', 1, 'job-5382501_64024-10-2024-08-42-19.jpg'),
(4, 'Sport is good', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies.', '3', '25 Oct, 2024', 1, 'ferrari-1211253_64024-10-2024-08-42-47.jpg'),
(5, 'Culpa eum dolorem l', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies.', '6', '25 Oct, 2024', 1, 'blood-pressure-1584223_64024-10-2024-08-45-06.jpg'),
(16, 'Entertainment is essential', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamcorper, tempor arcu dui sapien ad vitae iaculis. Sem varius scelerisque proin diam congue parturient eu, lacus morbi magna volutpat egestas dis hendrerit consequat', '2', '25 Oct, 2024', 3, 'amusement-park-4392606_64025-10-2024-09-30-50.jpg'),
(6, 'Omnis ratione eum et molestias enim cum provident', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies. Mattis rhoncus pretium eros magna pharetra vitae venenatis mauris', '4', '25 Oct, 2024', 2, 'encounter-3288133_64024-10-2024-08-46-44.jpg'),
(7, 'Qui ut consequatur Sint maiores voluptas', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc', '5', '25 Oct, 2024', 2, 'glasses-4704055_64024-10-2024-08-47-07.jpg'),
(8, 'Business is good', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est', '1', '25 Oct, 2024', 2, 'people-1979261_64024-10-2024-08-47-27.jpg'),
(14, 'In doloremque provident similique nulla deserunt', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamuat', '4', '25 Oct, 2024', 3, 'encounter-3288133_64025-10-2024-09-30-01.jpg'),
(9, 'Beatae blanditiis vitae eum sint explicabo Volupt', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies.', '2', '25 Oct, 2024', 3, 'sportsman-5055367_64024-10-2024-08-48-21.jpg'),
(10, 'Harum dolor mollitia fuga Proident laboris maior', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nu', '3', '25 Oct, 2024', 3, 'running-track-1201014_64024-10-2024-08-48-47.jpg'),
(11, 'Dolorem quia enim autem molestiae quia quo consequ', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies. Mattis rhoncus pretium eros magna pharetra vitae venenatis mauris,', '2', '25 Oct, 2024', 3, 'people-2575608_64024-10-2024-08-49-08.jpg'),
(12, 'Rem anim nostrud ullam vel adipisci sit laborum ad', 'Lorem ipsum dolor sit amet consectetur adipiscing elit varius, condimentum vitae tincidunt euismod netus nec fusce turpis, ante cursus litora et inceptos vel facilisi. Felis ut iaculis rutrum penatibus id suspendisse, lacus pretium litora consequat pellentesque, sollicitudin semper habitasse platea imperdiet. Sapien nullam eros per bibendum fames euismod, aliquam condimentum id volutpat montes. Justo massa himenaeos mattis diam elementum ornare porta ut parturient, potenti semper convallis nec ac per est nunc, suspendisse accumsan fusce congue pellentesque interdum dis ultricies.', '5', '25 Oct, 2024', 3, 'startup-3267505_64024-10-2024-08-50-13.jpg'),
(13, 'Qui aut commodo at dolorem dolor laborum ut pariat', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamcorper, tempor arcu dui sapien ad vitae iaculis. Sem varius scelerisque proin diam congue parturient eu, lacus morbi magna volutpat egestas dis hendrerit consequat', '6', '25 Oct, 2024', 3, 'blood-pressure-1584223_64025-10-2024-09-29-42.jpg'),
(17, 'Education is important for success', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamcorper, tempor arcu dui sapien ad vitae iaculis. Sem varius scelerisque', '5', '25 Oct, 2024', 3, 'desk-3139127_64025-10-2024-09-31-23.jpg'),
(18, 'Education builds yourths', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in', '5', '25 Oct, 2024', 3, 'child-865116_64025-10-2024-09-32-16.jpg'),
(19, 'Health is useful', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugiat ullamcorper, tempor arcu dui sapien ad vitae iaculis. Sem varius scelerisque', '6', '25 Oct, 2024', 3, 'apple-5183288_64025-10-2024-09-32-47.jpg'),
(20, 'Education emphasis is essential', 'Words\r\nBytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit cum hendrerit nam, sem massa magnis ac imperdiet interdum dignissim blandit parturient, feugiat condimentum rutrum ante egestas himenaeos urna in libero. Magnis donec odio quis pellentesque in vehicula nec dictum, duis quam curae dictumst ultricies malesuada feugia', '5', '25 Oct, 2024', 3, 'glasses-4704055_64025-10-2024-09-33-20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Munazzam', 'Zubair', 'munazzam', '$2y$10$u64C72DcDNwcINF7iFXose0i4E8PXJYkQ0IduACOiGAduH7ULJBVa', 1),
(2, 'Saddar', 'Ramzan', 'saddar', '$2y$10$vOol2BHwa/w.4uF2IVEE8Oc1MklhZOLliFU4ybv3xIayksU/BmlUa', 0),
(3, 'Shamas', 'Haq', 'shamas', '$2y$10$.AmLuSLcyuOXu8lcelju/uZCeex4GIHGdTLl8tzXNXtqZQtZlMUPu', 1),
(4, 'Zain', 'Qamar', 'zain', '$2y$10$kx4aj8n/OGqGfnKXvHOSpuTlf77OZw4Z.f4hBlEF1bWedAwXJf/C2', 0),
(5, 'Iftikhar', 'Khan', 'iftikhar', '$2y$10$irX2bUBdkeAupv1gvmrtm.pbQU2oyE38VOmfDdrqHC3SQTMA4piIS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
