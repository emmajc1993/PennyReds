-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 28, 2015 at 11:06 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PennyReds`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
`id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(32) NOT NULL,
  `correct` enum('0','1','','') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `correct`) VALUES
(1, 1, 'True', '1'),
(2, 1, 'False', '0'),
(3, 2, 'Yes', '1'),
(4, 2, 'No', '0'),
(5, 2, 'Maybe', '0'),
(6, 2, 'I don''t care', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
`bookingid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `horsename` text NOT NULL,
  `additionaldetails` text NOT NULL,
  `staffmember` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `lessonid`, `fname`, `lname`, `height`, `weight`, `horsename`, `additionaldetails`, `staffmember`) VALUES
(6, 1, 'Emma', 'Cheney', '5.4', '9.4', 'PennyRed', 'None', 'Kathryn'),
(7, 1, 'Joe ', 'Jackson', '5.4', '9.2', 'Milo', 'None', 'Emma'),
(8, 5, 'Harrison', 'Stevens', '4.3', '6.3', 'Rex', 'None', 'Emma');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
`id` tinyint(4) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Hello', 'This is an example', '2015-04-25 14:29:12', 23);

-- --------------------------------------------------------

--
-- Table structure for table `editinfo`
--

CREATE TABLE `editinfo` (
`textfieldid` int(11) NOT NULL,
  `textfield` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `editinfo`
--

INSERT INTO `editinfo` (`textfieldid`, `textfield`) VALUES
(1, 'Welcome to Penny Red''s Pony Parties! We are a family run business that specialises in parties for children although we do cater for smaller adults.  Penny Red''s will provide pony rides for events such as birthday parties and charity events. Our ponies can be hired for visits to nursing homes and schools to provide therapy. Check out the <a href="about.php">about us</a> page for more information!'),
(2, 'My name is Jessica Miller and I am the creator and owner of Penny Red''s Pony Parties. I have 5 children! We moved from Doncaster to Cornwall after a family bereavement. To help the children deal with this, we bought and cared for ponies and before long had a wonderful collection of adorable ponies! Two years later, things became financially difficult and in order to keep the ponies, they had to become my business. The job centre helped me to start up my business and that''s when we launched!'),
(3, 'This is the main email address'),
(4, 'This is the main phone number'),
(5, '1 hour - Â£26 <br>\r\n2 hours - Â£37 <br>\r\nJumping - Â£30'),
(6, '1 hour - Â£26 <br>\r\n2 hours - Â£37 <br>\r\nJumping - Â£30'),
(7, '1 hour - Â£28 <br>\r\n2 hours - Â£30 <br>\r\nBeach Ride - Â£40'),
(8, 'Pony Days - Â£15 <br>\r\nYard Days - Â£10 <br>\r\nBirthdays - POE');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
`eventid` int(11) NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `eventdescription` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `eventname`, `eventdescription`, `location`, `date`, `time`) VALUES
(2, 'Pet a Pony', 'Come along, meet the horses, learn some valuable skills, have fun!!', 'Carn Brea', '2015-03-18', '10:00:00'),
(3, 'Pony Care Day', 'Learn how to care for a pony with an hours ride at the end.', 'At the stables', '2015-04-28', '10:00:00'),
(4, 'Open Day', 'We are having a reopening at the stables and would like you to join us for food and everything horsey!', 'At the stables', '2015-09-05', '10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `horses`
--

CREATE TABLE `horses` (
`horseid` int(11) NOT NULL,
  `horsename` varchar(32) NOT NULL,
  `height` decimal(3,1) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `horses`
--

INSERT INTO `horses` (`horseid`, `horsename`, `height`, `weight`) VALUES
(13, 'Jackson', 12.0, 178),
(19, 'Milo', 12.0, 174),
(20, 'PennyRed', 13.3, 308),
(22, 'Phoebe', 15.1, 207),
(23, 'Roger', 14.2, 181),
(24, 'Rex', 15.1, 216),
(25, 'horsey horse', 12.0, 170),
(26, 'Giles', 16.0, 210);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
`lessonid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` enum('Group','Private','Hack','Pony Day','Other') NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL,
  `spaces` int(11) NOT NULL,
  `staffmember` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonid`, `name`, `description`, `type`, `time`, `date`, `location`, `spaces`, `staffmember`) VALUES
(1, 'Ella''s Birthday', 'This is Ella''s 10th birthday and she wants to go for a hack.', 'Hack', '13:00:00', '2015-03-19', 'Tehidy Woods', 8, 'Kathryn'),
(2, 'Test Lesson', 'This is a test lesson', 'Group', '12:55:00', '1996-03-08', 'At the stables', 10, ''),
(3, 'Beach Ride', 'Come along for a beach ride', 'Group', '10:30:00', '2015-09-01', 'Gwithian', 19, 'Kathryn'),
(4, 'New lesson', 'This is a new lesson', 'Group', '10:30:00', '1334-08-09', 'mine', 15, 'Kathryn'),
(5, 'Private Lesson', 'This is a private lesson.', 'Private', '10:00:00', '2015-06-29', 'at the school', 0, 'Emma');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
`id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `approved` enum('Yes','Waiting','No','') NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`, `approved`) VALUES
(32, 1, 11, 23, 'This topic has been created for the purpose of the user guide', '2015-03-27 17:56:57', 'Yes'),
(33, 1, 3, 23, 'This is a reply', '2015-04-21 13:15:53', 'Yes'),
(34, 1, 3, 23, 'This is the second reply', '2015-04-25 14:26:38', 'Waiting'),
(35, 1, 3, 23, 'This is the second reply', '2015-04-25 14:28:39', 'No'),
(36, 1, 3, 23, 'This is the second reply', '2015-04-25 14:29:12', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
`id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_id`, `question`, `type`) VALUES
(1, 1, 'My name is Emma', 'tf'),
(2, 2, 'Is this is multiple choice question?', 'mc');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
`id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  `approved` enum('Yes','Waiting','No','') NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_date`, `topic_reply_date`, `topic_views`, `approved`) VALUES
(3, 1, 'This is a topic', 23, '2015-02-10 14:08:01', '2015-04-25 14:29:12', 10, 'Yes'),
(4, 1, 'This is also a topic!', 24, '2015-02-10 14:08:26', '2015-02-10 14:26:37', 64, 'Yes'),
(11, 1, 'This is an example topic', 23, '2015-03-27 17:56:56', '2015-03-27 17:56:56', 0, 'Yes'),
(12, 1, 'What is your horse called?', 23, '2015-04-25 16:26:19', '2015-04-25 16:26:19', 0, 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`userid` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `contactno` text NOT NULL,
  `email_address` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `account_type` enum('Member','Staff','Admin','') NOT NULL,
  `bio` text NOT NULL,
  `profileext` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `dob`, `contactno`, `email_address`, `height`, `weight`, `date_joined`, `username`, `password`, `account_type`, `bio`, `profileext`) VALUES
(23, 'Kathryn', 'Gill', '1992-11-04', '01220218793', 'kgill22@hotmail.com', '5.8', '6.8', '2015-03-13 19:47:35', 'kgill22', 'fc5e038d38a57032085441e7fe7010b0', 'Admin', 'This is my bio', ''),
(24, 'Emma', 'Cheney', '1993-09-06', '01934809483', 'emma.j.cheney@hotmail.com', '5.4', '9.5', '2015-03-27 13:34:51', 'emmajc1993', 'fc5e038d38a57032085441e7fe7010b0', 'Staff', '', ''),
(25, 'Katherine', 'Dagnall', '1963-01-04', '01209 218293', 'kathydagnall@hotmail.co.uk', '5.8', '10.11', '2015-04-03 19:11:53', 'kathy', '99a3d2a07d4764014ea9d06bd59b1ac8', 'Member', 'Hello.', 'png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editinfo`
--
ALTER TABLE `editinfo`
 ADD PRIMARY KEY (`textfieldid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `horses`
--
ALTER TABLE `horses`
 ADD PRIMARY KEY (`horseid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
 ADD PRIMARY KEY (`lessonid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `editinfo`
--
ALTER TABLE `editinfo`
MODIFY `textfieldid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `horses`
--
ALTER TABLE `horses`
MODIFY `horseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
MODIFY `lessonid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;