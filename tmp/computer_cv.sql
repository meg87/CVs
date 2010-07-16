-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2010 at 01:04 PM
-- Server version: 5.0.91
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `computer_cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
  `certification_owner` int(11) NOT NULL,
  `certification_name` varchar(255) NOT NULL,
  `certification_date` int(11) default NULL,
  UNIQUE KEY `certification_id` (`certification_owner`,`certification_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_owner` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  UNIQUE KEY `course_id` (`course_owner`,`course_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_owner`, `course_name`) VALUES
(1, 'Database'),
(3, 'Computer Programming'),
(4, 'Computer Network'),
(4, 'Computer Programming'),
(4, 'Database'),
(4, 'Internet Application'),
(4, 'Network Security'),
(4, 'Software Engneering'),
(4, 'ØªÙˆØµÙŠÙ Ø§Ù„Ø¨ÙŠØ§Ù†Ø§Øª'),
(4, 'ØªØµÙ…ÙŠÙ… Ø§Ù„Ù…ÙˆØ§Ù‚Ø¹'),
(5, ''),
(5, 'Computer Network'),
(5, 'Computer Programming'),
(5, 'Database'),
(5, 'Internet Application'),
(5, 'Network Security'),
(5, 'Software Engneering'),
(6, 'Computer Network'),
(6, 'Computer Programming'),
(6, 'Database'),
(6, 'Internet Application'),
(6, 'Network Security'),
(6, 'Software Engneering'),
(7, 'Computer Network'),
(7, 'Computer Programming'),
(7, 'Database'),
(7, 'Internet Application'),
(7, 'Network Security'),
(7, 'Software Engneering'),
(8, 'Computer Network'),
(8, 'Computer Programming'),
(8, 'Database'),
(8, 'Internet Application'),
(8, 'Network Security'),
(8, 'Software Engneering'),
(9, 'Computer Network'),
(9, 'Computer Programming'),
(9, 'Database'),
(9, 'Internet Application'),
(9, 'Network Security'),
(9, 'Software Engneering'),
(10, 'Computer Network'),
(10, 'Computer Programming'),
(10, 'Database'),
(10, 'Internet Application'),
(10, 'Network Security'),
(10, 'Software Engneering');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `education_owner` int(11) NOT NULL,
  `education_major` varchar(255) NOT NULL,
  `education_degree` varchar(255) NOT NULL,
  `education_university` varchar(255) default NULL,
  `education_level` varchar(255) default NULL,
  `education_location` varchar(255) default NULL,
  `education_start` int(11) default NULL,
  `education_end` int(11) default NULL,
  UNIQUE KEY `education_id` (`education_owner`,`education_major`,`education_degree`,`education_university`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`education_owner`, `education_major`, `education_degree`, `education_university`, `education_level`, `education_location`, `education_start`, `education_end`) VALUES
(3, 'Computer Science', 'Bachelor', 'Imam University', '5th level', 'Riyadh', 2007, 2012),
(1, 'Ø¹Ù„ÙˆÙ… Ø§Ù„Ø­Ø§Ø³Ø¨', 'Bachelor', 'Ø¬Ø§Ù…Ø¹Ø© Ø§Ù„Ø§Ù…Ø§Ù… ', '5th level', 'Riyadh', 0, 0),
(2, '', 'Bachelor', '', '', 'Riyadh', 0, 0),
(4, 'Ø¯Ø±Ø§Ø³Ø§Øª Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª', 'Bachelor', 'Ø¬Ø§Ù…Ø¹Ø© Ø§Ù„Ø¥Ù…Ø§Ù… Ù…Ø­Ù…Ø¯ Ø¨Ù† Ø³Ø¹ÙˆØ¯ Ø§Ù„Ø¥Ø³Ù„Ø§Ù…ÙŠÙ‡', '5th level', 'Riyadh', 1428, 0),
(5, 'Ø­Ø§Ø³Ø¨ Ø§Ù„ÙŠ ', 'Bachelor', 'Ø¬Ø§Ù…Ø¹Ø© Ø§Ù„Ø§Ù…Ø§Ù…', 'graduated', 'Riyadh', 1426, 1431);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_owner` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text,
  `job_company` varchar(255) default NULL,
  `job_start` int(11) default NULL,
  `job_end` int(11) default NULL,
  UNIQUE KEY `job_id` (`job_owner`,`job_title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_owner`, `job_title`, `job_description`, `job_company`, `job_start`, `job_end`) VALUES
(5, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language_owner` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_reading` int(11) default NULL,
  `language_writing` int(11) default NULL,
  `language_speaking` int(11) default NULL,
  `language_native` int(11) default NULL,
  UNIQUE KEY `language_id` (`language_owner`,`language_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_owner`, `language_name`, `language_reading`, `language_writing`, `language_speaking`, `language_native`) VALUES
(1, 'Arabic', NULL, NULL, NULL, 1),
(1, 'English', 2, 2, 1, 0),
(2, 'Arabic', NULL, NULL, NULL, 1),
(2, 'English', 2, 2, 1, 0),
(3, 'Arabic', NULL, NULL, NULL, 1),
(3, 'English', 2, 2, 1, 0),
(4, 'Arabic', NULL, NULL, NULL, 1),
(4, 'English', 2, 2, 1, 0),
(5, 'Arabic', NULL, NULL, NULL, 1),
(5, 'English', 2, 2, 1, 0),
(6, 'Arabic', NULL, NULL, NULL, 1),
(6, 'English', 2, 2, 1, 0),
(7, 'Arabic', NULL, NULL, NULL, 1),
(7, 'English', 2, 2, 1, 0),
(8, 'Arabic', NULL, NULL, NULL, 1),
(8, 'English', 2, 2, 1, 0),
(9, 'Arabic', NULL, NULL, NULL, 1),
(9, 'English', 2, 2, 1, 0),
(10, 'Arabic', NULL, NULL, NULL, 1),
(10, 'English', 2, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `person_id` int(11) NOT NULL auto_increment,
  `person_name` varchar(255) NOT NULL,
  `person_gender` enum('Male','Female') default NULL,
  `person_email` varchar(255) NOT NULL,
  `person_website` varchar(255) default NULL,
  `person_code` varchar(255) default NULL,
  PRIMARY KEY  (`person_id`),
  UNIQUE KEY `person_email` (`person_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`person_id`, `person_name`, `person_gender`, `person_email`, `person_website`, `person_code`) VALUES
(1, 'areej ', NULL, 'pen_start@hotmail.com', 'twitter.com/zaief', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, '', NULL, '', '', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Hassan Alamri', NULL, 'weter_alqlo0op@hotmail.com', '1429', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'ÙØ±Ø§Ø´Ø© Ø§Ù„Ù…Ù†ØªØ¯Ù‰', NULL, 'breathlights@gmail.com', 'Ù„Ø§ ÙŠÙˆØ¬Ø¯', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Ù…Ø´Ø§Ø¹Ù„ ', NULL, 'sh3ilah@hotmail.com', 'ssssss', 'e4da3b7fbbce2345d7772b0674a318d5');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_owner` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_description` text,
  `project_technologies` text,
  `project_date` int(11) default NULL,
  UNIQUE KEY `project_id` (`project_owner`,`project_title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_owner`, `project_title`, `project_description`, `project_technologies`, `project_date`) VALUES
(3, 'Arabic Contacts Manager ', 'like that found in the cell phones', 'OOP By C++ language', 1431),
(5, 'Ø£Ù†Ø´Ø§Ø¡ Ù‚Ø§Ø¹Ø¯Ø© Ø¨ÙŠØ§Ù†Ø§Øª ', 'Ù‚Ø§Ø¹Ø¯Ø© Ø¨ÙŠØ§Ù†Ø§Øª Ù„Ù…Ø¤Ø³Ø³Ø© Ø®ÙŠØ±ÙŠØ© ', 'Ø§ÙƒØ³Ø³ + ÙÙŠØ¬ÙˆÙ„ Ø¨ÙŠØ³Ùƒ ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skill_owner` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_description` text,
  `skill_level` int(11) default NULL,
  `skill_type` enum('language','technologies','tool') default NULL,
  `skill_field` enum('programming','webdev','database','platform','other') default NULL,
  UNIQUE KEY `skill_id` (`skill_owner`,`skill_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_owner`, `skill_name`, `skill_description`, `skill_level`, `skill_type`, `skill_field`) VALUES
(1, 'HTML', NULL, 2, NULL, NULL),
(1, 'CSS', NULL, 1, NULL, NULL),
(1, 'JavaScript', NULL, 1, NULL, NULL),
(1, 'PHP', NULL, 2, NULL, NULL),
(1, 'MySQL', NULL, 2, NULL, NULL),
(1, 'FTP', NULL, 1, NULL, NULL),
(1, 'UML', NULL, 1, NULL, NULL),
(1, 'Linux', NULL, 1, NULL, NULL),
(2, 'HTML', NULL, 2, NULL, NULL),
(2, 'CSS', NULL, 1, NULL, NULL),
(2, 'JavaScript', NULL, 1, NULL, NULL),
(2, 'PHP', NULL, 2, NULL, NULL),
(2, 'MySQL', NULL, 2, NULL, NULL),
(2, 'FTP', NULL, 1, NULL, NULL),
(2, 'UML', NULL, 1, NULL, NULL),
(2, 'Linux', NULL, 1, NULL, NULL),
(3, 'HTML', NULL, 2, NULL, NULL),
(3, 'CSS', NULL, 1, NULL, NULL),
(3, 'JavaScript', NULL, 1, NULL, NULL),
(3, 'PHP', NULL, 2, NULL, NULL),
(3, 'MySQL', NULL, 2, NULL, NULL),
(3, 'FTP', NULL, 1, NULL, NULL),
(3, 'UML', NULL, 1, NULL, NULL),
(3, 'Linux', NULL, 1, NULL, NULL),
(4, 'HTML', NULL, 2, NULL, NULL),
(4, 'CSS', NULL, 1, NULL, NULL),
(4, 'JavaScript', NULL, 1, NULL, NULL),
(4, 'PHP', NULL, 2, NULL, NULL),
(4, 'MySQL', NULL, 2, NULL, NULL),
(4, 'FTP', NULL, 1, NULL, NULL),
(4, 'UML', NULL, 1, NULL, NULL),
(4, 'Linux', NULL, 1, NULL, NULL),
(5, 'HTML', NULL, 2, NULL, NULL),
(5, 'CSS', NULL, 1, NULL, NULL),
(5, 'JavaScript', NULL, 1, NULL, NULL),
(5, 'PHP', NULL, 2, NULL, NULL),
(5, 'MySQL', NULL, 2, NULL, NULL),
(5, 'FTP', NULL, 1, NULL, NULL),
(5, 'UML', NULL, 1, NULL, NULL),
(5, 'Linux', NULL, 1, NULL, NULL),
(6, 'HTML', NULL, 2, NULL, NULL),
(6, 'CSS', NULL, 1, NULL, NULL),
(6, 'JavaScript', NULL, 1, NULL, NULL),
(6, 'PHP', NULL, 2, NULL, NULL),
(6, 'MySQL', NULL, 2, NULL, NULL),
(6, 'FTP', NULL, 1, NULL, NULL),
(6, 'UML', NULL, 1, NULL, NULL),
(6, 'Linux', NULL, 1, NULL, NULL),
(7, 'HTML', NULL, 2, NULL, NULL),
(7, 'CSS', NULL, 1, NULL, NULL),
(7, 'JavaScript', NULL, 1, NULL, NULL),
(7, 'PHP', NULL, 2, NULL, NULL),
(7, 'MySQL', NULL, 2, NULL, NULL),
(7, 'FTP', NULL, 1, NULL, NULL),
(7, 'UML', NULL, 1, NULL, NULL),
(7, 'Linux', NULL, 1, NULL, NULL),
(8, 'HTML', NULL, 2, NULL, NULL),
(8, 'CSS', NULL, 1, NULL, NULL),
(8, 'JavaScript', NULL, 1, NULL, NULL),
(8, 'PHP', NULL, 2, NULL, NULL),
(8, 'MySQL', NULL, 2, NULL, NULL),
(8, 'FTP', NULL, 1, NULL, NULL),
(8, 'UML', NULL, 1, NULL, NULL),
(8, 'Linux', NULL, 1, NULL, NULL),
(9, 'HTML', NULL, 2, NULL, NULL),
(9, 'CSS', NULL, 1, NULL, NULL),
(9, 'JavaScript', NULL, 1, NULL, NULL),
(9, 'PHP', NULL, 2, NULL, NULL),
(9, 'MySQL', NULL, 2, NULL, NULL),
(9, 'FTP', NULL, 1, NULL, NULL),
(9, 'UML', NULL, 1, NULL, NULL),
(9, 'Linux', NULL, 1, NULL, NULL),
(10, 'HTML', NULL, 2, NULL, NULL),
(10, 'CSS', NULL, 1, NULL, NULL),
(10, 'JavaScript', NULL, 1, NULL, NULL),
(10, 'PHP', NULL, 2, NULL, NULL),
(10, 'MySQL', NULL, 2, NULL, NULL),
(10, 'FTP', NULL, 1, NULL, NULL),
(10, 'UML', NULL, 1, NULL, NULL),
(10, 'Linux', NULL, 1, NULL, NULL),
(3, 'C++ programmer', NULL, NULL, NULL, NULL),
(3, 'Beginner in Qt Creator', NULL, NULL, NULL, NULL),
(4, 'XML', NULL, 1, NULL, NULL);
