-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2012 at 03:34 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biomes`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES('Afghanistan');
INSERT INTO `countries` VALUES('Albania');
INSERT INTO `countries` VALUES('Algeria');
INSERT INTO `countries` VALUES('American Samoa');
INSERT INTO `countries` VALUES('Andorra');
INSERT INTO `countries` VALUES('Angola');
INSERT INTO `countries` VALUES('Anguilla');
INSERT INTO `countries` VALUES('Antarctica');
INSERT INTO `countries` VALUES('Antigua and Barbuda');
INSERT INTO `countries` VALUES('Argentina');
INSERT INTO `countries` VALUES('Armenia');
INSERT INTO `countries` VALUES('Aruba');
INSERT INTO `countries` VALUES('Australia');
INSERT INTO `countries` VALUES('Austria');
INSERT INTO `countries` VALUES('Azerbaijan');
INSERT INTO `countries` VALUES('Bahamas');
INSERT INTO `countries` VALUES('Bahrain');
INSERT INTO `countries` VALUES('Bangladesh');
INSERT INTO `countries` VALUES('Barbados');
INSERT INTO `countries` VALUES('Belarus');
INSERT INTO `countries` VALUES('Belgium');
INSERT INTO `countries` VALUES('Belize');
INSERT INTO `countries` VALUES('Benin');
INSERT INTO `countries` VALUES('Bermuda');
INSERT INTO `countries` VALUES('Bhutan');
INSERT INTO `countries` VALUES('Bolivia');
INSERT INTO `countries` VALUES('Bosnia and Herzegowina');
INSERT INTO `countries` VALUES('Botswana');
INSERT INTO `countries` VALUES('Bouvet Island');
INSERT INTO `countries` VALUES('Brazil');
INSERT INTO `countries` VALUES('British Indian Ocean Territory');
INSERT INTO `countries` VALUES('Brunei Darussalam');
INSERT INTO `countries` VALUES('Bulgaria');
INSERT INTO `countries` VALUES('Burkina Faso');
INSERT INTO `countries` VALUES('Burundi');
INSERT INTO `countries` VALUES('Cambodia');
INSERT INTO `countries` VALUES('Cameroon');
INSERT INTO `countries` VALUES('Cape Verde');
INSERT INTO `countries` VALUES('Cayman Islands');
INSERT INTO `countries` VALUES('Central African Republic');
INSERT INTO `countries` VALUES('Chad');
INSERT INTO `countries` VALUES('Chile');
INSERT INTO `countries` VALUES('China');
INSERT INTO `countries` VALUES('Christmas Island');
INSERT INTO `countries` VALUES('Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES('Colombia');
INSERT INTO `countries` VALUES('Comoros');
INSERT INTO `countries` VALUES('Congo');
INSERT INTO `countries` VALUES('Cook Islands');
INSERT INTO `countries` VALUES('Costa Rica');
INSERT INTO `countries` VALUES('Cote D''Ivoire');
INSERT INTO `countries` VALUES('Croatia (Local Name: Hrvatska)');
INSERT INTO `countries` VALUES('Cuba');
INSERT INTO `countries` VALUES('Cyprus');
INSERT INTO `countries` VALUES('Czech Republic');
INSERT INTO `countries` VALUES('Denmark');
INSERT INTO `countries` VALUES('Djibouti');
INSERT INTO `countries` VALUES('Dominica');
INSERT INTO `countries` VALUES('Dominican Republic');
INSERT INTO `countries` VALUES('East Timor');
INSERT INTO `countries` VALUES('Ecuador');
INSERT INTO `countries` VALUES('Egypt');
INSERT INTO `countries` VALUES('El Salvador');
INSERT INTO `countries` VALUES('Equatorial Guinea');
INSERT INTO `countries` VALUES('Eritrea');
INSERT INTO `countries` VALUES('Estonia');
INSERT INTO `countries` VALUES('Ethiopia');
INSERT INTO `countries` VALUES('Falkland Islands (Malvinas)');
INSERT INTO `countries` VALUES('Faroe Islands');
INSERT INTO `countries` VALUES('Fiji');
INSERT INTO `countries` VALUES('Finland');
INSERT INTO `countries` VALUES('France');
INSERT INTO `countries` VALUES('French Guiana');
INSERT INTO `countries` VALUES('French Polynesia');
INSERT INTO `countries` VALUES('French Southern Territories');
INSERT INTO `countries` VALUES('Gabon');
INSERT INTO `countries` VALUES('Gambia');
INSERT INTO `countries` VALUES('Georgia');
INSERT INTO `countries` VALUES('Germany');
INSERT INTO `countries` VALUES('Ghana');
INSERT INTO `countries` VALUES('Gibraltar');
INSERT INTO `countries` VALUES('Greece');
INSERT INTO `countries` VALUES('Greenland');
INSERT INTO `countries` VALUES('Grenada');
INSERT INTO `countries` VALUES('Guadeloupe');
INSERT INTO `countries` VALUES('Guam');
INSERT INTO `countries` VALUES('Guatemala');
INSERT INTO `countries` VALUES('Guinea');
INSERT INTO `countries` VALUES('Guinea-Bissau');
INSERT INTO `countries` VALUES('Guyana');
INSERT INTO `countries` VALUES('Haiti');
INSERT INTO `countries` VALUES('Heard and Mc Donald Islands');
INSERT INTO `countries` VALUES('Honduras');
INSERT INTO `countries` VALUES('Hong Kong');
INSERT INTO `countries` VALUES('Hungary');
INSERT INTO `countries` VALUES('Iceland');
INSERT INTO `countries` VALUES('India');
INSERT INTO `countries` VALUES('Indonesia');
INSERT INTO `countries` VALUES('Iran (Islamic Republic of)');
INSERT INTO `countries` VALUES('Iraq');
INSERT INTO `countries` VALUES('Ireland');
INSERT INTO `countries` VALUES('Israel');
INSERT INTO `countries` VALUES('Italy');
INSERT INTO `countries` VALUES('Jamaica');
INSERT INTO `countries` VALUES('Japan');
INSERT INTO `countries` VALUES('Jordan');
INSERT INTO `countries` VALUES('Kazakhstan');
INSERT INTO `countries` VALUES('Kenya');
INSERT INTO `countries` VALUES('Kiribati');
INSERT INTO `countries` VALUES('Korea');
INSERT INTO `countries` VALUES('Korea');
INSERT INTO `countries` VALUES('Kuwait');
INSERT INTO `countries` VALUES('Kyrgyzstan');
INSERT INTO `countries` VALUES('Lao People''s Democratic Republic');
INSERT INTO `countries` VALUES('Latvia');
INSERT INTO `countries` VALUES('Lebanon');
INSERT INTO `countries` VALUES('Lesotho');
INSERT INTO `countries` VALUES('Liberia');
INSERT INTO `countries` VALUES('Libyan Arab Jamahiriya');
INSERT INTO `countries` VALUES('Liechtenstein');
INSERT INTO `countries` VALUES('Lithuania');
INSERT INTO `countries` VALUES('Luxembourg');
INSERT INTO `countries` VALUES('Macau');
INSERT INTO `countries` VALUES('Macedonia');
INSERT INTO `countries` VALUES('Madagascar');
INSERT INTO `countries` VALUES('Malawi');
INSERT INTO `countries` VALUES('Malaysia');
INSERT INTO `countries` VALUES('Maldives');
INSERT INTO `countries` VALUES('Mali');
INSERT INTO `countries` VALUES('Malta');
INSERT INTO `countries` VALUES('Marshall Islands');
INSERT INTO `countries` VALUES('Martinique');
INSERT INTO `countries` VALUES('Mauritania');
INSERT INTO `countries` VALUES('Mauritius');
INSERT INTO `countries` VALUES('Mayotte');
INSERT INTO `countries` VALUES('Mexico');
INSERT INTO `countries` VALUES('Micronesia');
INSERT INTO `countries` VALUES('Moldova');
INSERT INTO `countries` VALUES('Monaco');
INSERT INTO `countries` VALUES('Mongolia');
INSERT INTO `countries` VALUES('Montserrat');
INSERT INTO `countries` VALUES('Morocco');
INSERT INTO `countries` VALUES('Mozambique');
INSERT INTO `countries` VALUES('Myanmar');
INSERT INTO `countries` VALUES('Namibia');
INSERT INTO `countries` VALUES('Nauru');
INSERT INTO `countries` VALUES('Nepal');
INSERT INTO `countries` VALUES('Netherlands');
INSERT INTO `countries` VALUES('Netherlands Antilles');
INSERT INTO `countries` VALUES('New Caledonia');
INSERT INTO `countries` VALUES('New Zealand');
INSERT INTO `countries` VALUES('Nicaragua');
INSERT INTO `countries` VALUES('Niger');
INSERT INTO `countries` VALUES('Nigeria');
INSERT INTO `countries` VALUES('Niue');
INSERT INTO `countries` VALUES('Norfolk Island');
INSERT INTO `countries` VALUES('Northern Mariana Islands');
INSERT INTO `countries` VALUES('Norway');
INSERT INTO `countries` VALUES('Oman');
INSERT INTO `countries` VALUES('Pakistan');
INSERT INTO `countries` VALUES('Palau');
INSERT INTO `countries` VALUES('Panama');
INSERT INTO `countries` VALUES('Papua New Guinea');
INSERT INTO `countries` VALUES('Paraguay');
INSERT INTO `countries` VALUES('Peru');
INSERT INTO `countries` VALUES('Philippines');
INSERT INTO `countries` VALUES('Pitcairn');
INSERT INTO `countries` VALUES('Poland');
INSERT INTO `countries` VALUES('Portugal');
INSERT INTO `countries` VALUES('Puerto Rico');
INSERT INTO `countries` VALUES('Qatar');
INSERT INTO `countries` VALUES('Reunion');
INSERT INTO `countries` VALUES('Romania');
INSERT INTO `countries` VALUES('Russian Federation');
INSERT INTO `countries` VALUES('Rwanda');
INSERT INTO `countries` VALUES('Saint Kitts and Nevis');
INSERT INTO `countries` VALUES('Saint Lucia');
INSERT INTO `countries` VALUES('Saint Vincent and The Grenadines');
INSERT INTO `countries` VALUES('Samoa');
INSERT INTO `countries` VALUES('San Marino');
INSERT INTO `countries` VALUES('Sao Tome and Principe');
INSERT INTO `countries` VALUES('Saudi Arabia');
INSERT INTO `countries` VALUES('Senegal');
INSERT INTO `countries` VALUES('Seychelles');
INSERT INTO `countries` VALUES('Sierra Leone');
INSERT INTO `countries` VALUES('Singapore');
INSERT INTO `countries` VALUES('Slovakia (Slovak Republic)');
INSERT INTO `countries` VALUES('Slovenia');
INSERT INTO `countries` VALUES('Solomon Islands');
INSERT INTO `countries` VALUES('Somalia');
INSERT INTO `countries` VALUES('South Africa');
INSERT INTO `countries` VALUES('South Georgia and The S.Sandwich Is.');
INSERT INTO `countries` VALUES('Spain');
INSERT INTO `countries` VALUES('Sri Lanka');
INSERT INTO `countries` VALUES('St. Helena');
INSERT INTO `countries` VALUES('St. Pierre and Miquelon');
INSERT INTO `countries` VALUES('Sudan');
INSERT INTO `countries` VALUES('Suriname');
INSERT INTO `countries` VALUES('Svalbard and Jan Mayen Islands');
INSERT INTO `countries` VALUES('Swaziland');
INSERT INTO `countries` VALUES('Sweden');
INSERT INTO `countries` VALUES('Switzerland');
INSERT INTO `countries` VALUES('Syrian Arab Republic');
INSERT INTO `countries` VALUES('Taiwan');
INSERT INTO `countries` VALUES('Tajikistan');
INSERT INTO `countries` VALUES('Tanzania');
INSERT INTO `countries` VALUES('Thailand');
INSERT INTO `countries` VALUES('Togo');
INSERT INTO `countries` VALUES('Tokelau');
INSERT INTO `countries` VALUES('Tonga');
INSERT INTO `countries` VALUES('Trinidad and Tobago');
INSERT INTO `countries` VALUES('Tunisia');
INSERT INTO `countries` VALUES('Turkey');
INSERT INTO `countries` VALUES('Turkmenistan');
INSERT INTO `countries` VALUES('Turks and Caicos Islands');
INSERT INTO `countries` VALUES('Tuvalu');
INSERT INTO `countries` VALUES('Uganda');
INSERT INTO `countries` VALUES('Ukraine');
INSERT INTO `countries` VALUES('United Arab Emirates');
INSERT INTO `countries` VALUES('United Kingdom');
INSERT INTO `countries` VALUES('United States Minor Outlying Islands');
INSERT INTO `countries` VALUES('United States of America');
INSERT INTO `countries` VALUES('Uruguay');
INSERT INTO `countries` VALUES('Uzbekistan');
INSERT INTO `countries` VALUES('Vanuatu');
INSERT INTO `countries` VALUES('Vatican City State (Holy See)');
INSERT INTO `countries` VALUES('Venezuela');
INSERT INTO `countries` VALUES('Viet Nam');
INSERT INTO `countries` VALUES('Virgin Islands (British)');
INSERT INTO `countries` VALUES('Virgin Islands (U.S.)');
INSERT INTO `countries` VALUES('Wallis and Futuna Islands');
INSERT INTO `countries` VALUES('Western Sahara');
INSERT INTO `countries` VALUES('Yemen');
INSERT INTO `countries` VALUES('Yugoslavia');
INSERT INTO `countries` VALUES('Zaire');
INSERT INTO `countries` VALUES('Zambia');
INSERT INTO `countries` VALUES('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `UserID` smallint(6) NOT NULL,
  `UserName` varchar(35) NOT NULL,
  `LoginDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-08 14:15:40');
INSERT INTO `logins` VALUES(5, 'teacher', '2011-11-08 14:16:08');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-08 14:40:49');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-08 14:44:36');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-08 15:12:42');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-10 12:33:31');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-16 12:20:32');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-22 14:03:55');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-24 12:25:50');
INSERT INTO `logins` VALUES(4, 'akhoslaa', '2011-11-28 09:45:02');
INSERT INTO `logins` VALUES(5, 'teacher', '2011-12-14 14:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `Survey`
--

CREATE TABLE `Survey` (
  `SurveyID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Country` varchar(40) DEFAULT NULL,
  `EmailAddress` varchar(30) DEFAULT NULL,
  `Comments` text,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SurveyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `Survey`
--

INSERT INTO `Survey` VALUES(2, 'calvin', 'hobbs', 7, 'm', 'random', 'kenya', 'random', 'fdgsdfg', '2011-09-08 13:45:00');
INSERT INTO `Survey` VALUES(5, 'super', 'joe', 1, 'f', 'seattle', 'USA', 'notsure', 'idk', '2011-09-14 12:45:36');
INSERT INTO `Survey` VALUES(6, 'one', 'two', 99, 'f', 'johannesburg', 'South Africa', 'saj', 'hurray!', '2011-09-14 12:46:28');
INSERT INTO `Survey` VALUES(15, 'i', 'hope', 25, 'F', 'Nairobi', 'Kenya', 'idk ', 'klkjlkhjk', '2011-09-22 13:15:25');
INSERT INTO `Survey` VALUES(17, 'puri', 'iba', 6, 'F', 'New Delhi', 'India', 'atindia.com', 'comment', '2011-09-22 13:17:11');
INSERT INTO `Survey` VALUES(25, 'test', 'test', 10, 'M', 'test', 'Albania', 'test', 'test', '2011-09-26 11:00:58');
INSERT INTO `Survey` VALUES(27, 'asdfasd', 'asdfasf', 5, 'F', 'asdfas', 'Albania', 'asdfaf@something.com', 'fghdgfhxxxxxxxxx', '2011-10-11 15:36:07');
INSERT INTO `Survey` VALUES(28, 'asdfads', 'sadfasdf', 5, NULL, 'asdf', 'Albania', 'sadfafs@something.com', 'adsfasd', '2011-10-12 12:20:10');
INSERT INTO `Survey` VALUES(30, 'A TEST', 'TEST', 11, 'M', 'TEST', 'Afghanistan', NULL, 'TEST', '2011-10-13 12:24:11');
INSERT INTO `Survey` VALUES(31, 'sdafads', 'sadfasf', 6, 'M', 'adsfadsf', 'Afghanistan', 'adfasdf@five.com', 'sdfsa', '2011-10-31 10:02:52');
INSERT INTO `Survey` VALUES(32, 'asdfasdf', 'sdfasda', NULL, 'F', NULL, 'Algeria', NULL, NULL, '2011-11-16 12:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` smallint(6) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(35) NOT NULL,
  `Password` varchar(35) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'adfasdf', 'adsfasdf');
INSERT INTO `users` VALUES(2, 'fdghdfgh', 'fghdfgh');
INSERT INTO `users` VALUES(4, 'akhoslaa', 'idk');
INSERT INTO `users` VALUES(5, 'teacher', 'aa');
