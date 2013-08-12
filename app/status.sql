--
-- Database: `status`
--

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

DROP TABLE IF EXISTS `checks`;
CREATE TABLE IF NOT EXISTS `checks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_code` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_time` datetime DEFAULT NULL,
  `pingdom_id` int(11) DEFAULT NULL,
  `lastresponse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9F8C0079F6BD1646` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`id`, `site_id`, `name`, `description`, `slug`, `status_code`, `status`, `check_time`, `pingdom_id`, `lastresponse`) VALUES
(1, 1, 'HTTPS', 'The secure connection to the main phpBB.com webserver', 'HTTPS', 1, 'Up', '2013-08-12 11:39:13', 690721, 1027),
(2, 1, 'PING', 'The response time to the main phpBB.com webserver', 'ping', 1, 'Up', '2013-08-12 11:39:36', 735557, 78),
(3, 2, 'PING', 'The response time for the area51 website', 'PING', 1, 'Up', '2013-08-12 11:39:42', 735572, 157),
(4, 2, 'HTTP', 'The area51 website', 'http', 1, 'Up', '2013-08-12 11:39:37', 735573, 1190),
(5, 2, 'HTTPS', 'The area51 website over a secure connection', 'HTTPS', 1, 'Up', '2013-08-12 11:39:54', 735574, 2704);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `config_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_name`, `config_value`) VALUES
('downtimeReadMoreLink', 'status.phpbb.com'),
('downtimeWarningActive', '1'),
('downtimeWarningContent', 'This is just a test'),
('downtimeWarningName', 'initalTest');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_user`
--

DROP TABLE IF EXISTS `fos_user_user`;
CREATE TABLE IF NOT EXISTS `fos_user_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20121001151649'),
('20121006213507'),
('20121006213713'),
('20121006214427'),
('20121007093508'),
('20121007093912'),
('20121007190759'),
('20121109114000'),
('20121109135347'),
('20121109145212'),
('20121109152510'),
('20121109152858'),
('20121109154627'),
('20121109155551'),
('20121109162432'),
('20121109162723'),
('20121109163252'),
('20121109163540'),
('20121109163827'),
('20121109163847'),
('20121109164330'),
('20121109164411'),
('20121109165235'),
('20121110103234'),
('20121110103751'),
('20121111105712'),
('20121111132136'),
('20130112141825'),
('20130112141952'),
('20130112142352'),
('20130112144822'),
('20130112145144'),
('20130112145239'),
('20130112214020'),
('20130112214139'),
('20130113140952'),
('20130113141305'),
('20130113171257'),
('20130113191407'),
('20130330194956'),
('20130713173500');

-- --------------------------------------------------------

--
-- Table structure for table `overides`
--

DROP TABLE IF EXISTS `overides`;
CREATE TABLE IF NOT EXISTS `overides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `up_down` tinyint(1) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `finished` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E00CC138F6BD1646` (`site_id`),
  KEY `IDX_E00CC138D596EAB1` (`update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `front_page` tinyint(1) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major` tinyint(1) NOT NULL,
  `statusCode` tinyint(1) DEFAULT NULL,
  `team` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `description`, `slug`, `url`, `front_page`, `status`, `major`, `statusCode`, `team`) VALUES
(1, 'phpBB.com', 'The main phpBB.com website and loadbalancer.', 'wwwphpbbcom', 'https://www.phpbb.com/', 1, 'Up', 1, 1, 0),
(2, 'Area51 & Version Check', 'The area51 website, forum, the bugtracker and the version.phpBB.com page (the phpBB version checker) ,', 'area51', 'http://area51.phpbb.com', 1, 'Up', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`name`, `value`) VALUES
('last', '1376307631'),
('major', '0'),
('overall', '0'),
('planned', '0');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

DROP TABLE IF EXISTS `updates`;
CREATE TABLE IF NOT EXISTS `updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_45481330A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `name`, `description`, `post_time`, `user_id`) VALUES
(1, 'Network Maintenance on Monday August 20th', 'Hello all,\r\n<br /> <br />\r\nWe have been informed that our network provider will be performing some important maintenance on Monday between 11:00 and 14:00 UTC, resulting in some downtime.\r\n<br /> <br />\r\n<a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Scheduled+Maintenance+August+20th%2C+2012&iso=20120820T03&p1=202&ah=3">View the time in cities around the world</a>\r\n<br /> <br />\r\nSorry for any inconveniences caused', '2012-08-17 20:50:00', 2),
(2, 'Database Maintenance', 'Hello everyone,\r\n<br /><br />\r\nWe are performing some maintenance on the database that may cause some intermittent loss of connectivity. There is no reason to be alarmed; the servers are most definitely not on fire.\r\n<br /><br />\r\nIf you notice something on the site isn''t working as intended, please feel free to let us know at website/AT/phpbb.com\r\n<br /><br />\r\nThanks,\r\n<br /><br />\r\nThe phpBB Team', '2013-01-28 20:11:57', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `FK_9F8C0079F6BD1646` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `overides`
--
ALTER TABLE `overides`
  ADD CONSTRAINT `FK_E00CC138D596EAB1` FOREIGN KEY (`update_id`) REFERENCES `updates` (`id`),
  ADD CONSTRAINT `FK_E00CC138F6BD1646` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `FK_45481330A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
