CREATE TABLE `f_education` (
  `Id` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `f_help` (
  `Id` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `f_jobfunction` (
  `Id` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `f_language` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `f_location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `assembly` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `constituency` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cstate` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cconst` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4135 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `m_user` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `alternative_mobile_number` int(10) NOT NULL,
  `date_of_birth` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `document_path` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cud` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `m_id` int(6) NOT NULL,
  `verifier_mid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `m_volunteer` (
  `volunteer_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `longi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lati` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cud` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `t_help_request` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `helpId` int(11) DEFAULT NULL,
  `Message` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Createddate` datetime DEFAULT NULL,
  `Requesteddate` datetime DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `Duration` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

