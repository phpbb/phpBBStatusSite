-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2013 at 08:42 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cleanstatussite`
--

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

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
(1, 1, 'HTTPS', 'The secure connection to the main phpBB.com webserver', 'HTTPS', 1, 'Up', '2013-08-12 18:17:13', 690721, 1041),
(2, 1, 'PING', 'The response time to the main phpBB.com webserver', 'ping', 1, 'Up', '2013-08-12 18:17:36', 735557, 79),
(3, 2, 'PING', 'The response time for the area51 website', 'PING', 1, 'Up', '2013-08-12 18:17:42', 735572, 75),
(4, 2, 'HTTP', 'The area51 website', 'http', 1, 'Up', '2013-08-12 18:17:37', 735573, 636),
(5, 2, 'HTTPS', 'The area51 website over a secure connection', 'HTTPS', 1, 'Up', '2013-08-12 18:17:54', 735574, 1481),
(6, 3, 'HTTP', 'HTTP for services on MISC.', 'HTTP', 1, 'Up', '2013-08-12 18:17:25', 735583, 3075),
(7, 3, 'HTTPS', 'HTTPS for the misc services', 'HTTPS', 1, 'Up', '2013-08-12 18:18:05', 735584, 1057),
(9, 1, 'HTTP', 'The main phpBB.com webserver via HTTP', 'HTTP', 1, 'Up', '2013-08-12 18:17:33', 735604, 444),
(10, 3, 'PING', 'The misc response time', 'PING', 1, 'Up', '2013-08-12 18:17:55', 735585, 75),
(13, 4, 'PING', 'Download response time', 'PING', 1, 'Up', '2013-08-12 18:17:30', 735594, 35),
(14, 4, 'HTTP', 'Download webserver', 'HTTP', 1, 'Up', '2013-08-12 18:18:07', 735593, 564),
(16, 6, 'PING', 'Lists response time', 'PING', 1, 'Up', '2013-08-12 18:17:56', 735596, 35),
(17, 7, 'PING', 'Database response time', 'PING', 1, 'Up', '2013-08-12 18:17:19', 735597, 35),
(18, 8, 'PING', 'Camo response time', 'PING', 1, 'Up', '2013-08-12 18:17:27', 735605, 35),
(19, 8, 'HTTPS', 'Camo secure webserver', 'HTTPS', 1, 'Up', '2013-08-12 18:17:21', 735606, 190),
(20, 9, 'PING', 'Try-phpbb.com ping time', 'PING', 1, 'Up', '2013-08-12 18:18:07', 735600, 76),
(21, 9, 'HTTP', 'Try-phpbb.com website', 'HTTP', 1, 'Up', '2013-08-12 18:17:53', 735599, 700),
(22, 10, 'PING', 'ping results for the continuous intergration server', 'PING', 1, 'Up', '2013-08-12 18:17:24', 735602, 35),
(23, 10, 'HTTP', 'http status for the continuous intergration server', 'HTTP', 1, 'Up', '2013-08-12 18:17:52', 735601, 468),
(24, 11, 'PING', 'Mail.phpbb.com response time', 'PING', 1, 'Up', '2013-08-12 18:18:01', 735610, 35),
(25, 12, 'PING', 'Titania search response time', 'PING', 1, 'Up', '2013-08-12 18:17:32', 735613, 71),
(26, 10, 'HTTPS', 'https status for the Continuous intergration server.', 'codehttps', 1, 'Up', '2013-08-12 18:18:08', 795029, 1510),
(27, 1, 'Load Balancer PING', 'The response time to the loadbalancer for the main website.', 'lbping', 1, 'Up', '2013-08-12 18:17:01', 811210, 93),
(28, 1, 'Load Balancer HTTP', 'The HTTP connection to the loadbalancer for the main phpBB.com server.', 'lbhttp', 1, 'Up', '2013-08-12 18:17:52', 811212, 835),
(29, 1, 'Load balancer HTTPS', 'The HTTPs connection to the loadbalancer for the main phpBB.com server.', 'lbhttps', 1, 'Up', '2013-08-12 18:17:43', 811213, 615),
(30, 2, 'Tracker HTTP', 'The phpBB bugtracker over HTTP', 'trackerhttp', 1, 'Up', '2013-08-12 18:17:18', 811328, 1491),
(31, 2, 'Tracker HTTPS', 'The phpBB bugtracker over a secure connection.', 'trackerhttps', 1, 'Up', '2013-08-12 18:18:06', 811333, 2308),
(33, 1, 'Cloudfare ping', 'The response time to the cloudfare server', 'cfping', 1, 'Up', '2013-08-12 18:17:20', 856280, 174),
(34, 1, 'Cloudfare HTTPS', 'The secure HTTP connection to cloudflare.', 'cfhttp', 1, 'Up', '2013-08-12 18:17:19', 856279, 1164),
(35, 1, 'Cloudflare HTTP', 'The HTTP connection to cloudflare for phpBB.com', 'cfhttp', 1, 'Up', '2013-08-12 18:17:09', 856278, 1412);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(10, 'testuser', 'testuser', 'test@example.com', 'test@example.com', 1, 'tcee8io85ogw44c0cso484oss0c8skg', '5sTiBY1m3QsV+HsH2IHaP+eDcOsh48QDYKgYiBXAfB1GLd8s04iZNS4rVGh3P4ItujEY1suKo1oeypwYSpSgHw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

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
(2, 'Area51 & Version Check', 'The area51 website, forum, the bugtracker and the version.phpBB.com page (the phpBB version checker) ,', 'area51', 'http://area51.phpbb.com', 1, 'Up', 0, 1, 0),
(3, 'Wiki and blog', 'Several smaller services like wiki.phpBB.com and blog.phpBB.com', 'miscphpbbcom', 'http://misc.phpbb.com', 1, 'Up', 0, 1, 0),
(4, 'Downloads', 'Access to downloads of phpBB and official tools', 'downloadphpbbcom', 'http://download.phpbb.com', 1, 'Up', 1, 1, 0),
(6, 'Mailing Lists', 'The phpBB.com mailing lists', 'listsphpbbcom', 'http://list.phpbb.com', 1, 'Up', 0, 1, 0),
(7, 'Database', 'The main phpBB.com database, used by the main website and several subsites.', 'db1phpbbcom', 'http://db1.phpbb.com', 1, 'Up', 1, 1, 0),
(8, 'Secure Image Serving', 'The server used to serve offsite images from the main website and area51 via SSL.', 'camophpbbcom', 'http://camo.phpbb.com', 1, 'Up', 0, 1, 0),
(9, 'phpBB Demo', 'The try-phpbb.com site', 'tryphpbbcom', 'http://www.try-phpbb.com', 1, 'Up', 1, 1, 0),
(10, 'Continuous Integration', 'The bamboo.phpbb.com and related services.', 'codephpbbcom', 'http://bamboo.phpbb.com', 1, 'Up', 0, 1, 0),
(11, 'Mail', 'The phpBB.com mailserver', 'mailphpbbcom', 'http://www.phpbb.com', 1, 'Up', 0, 1, 0),
(12, 'Titania Search', 'The titania search functionality', 'titaniasearch', 'http://www.phpbb.com/customise/', 1, 'Up', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`name`, `value`) VALUES
('last', '1376331512'),
('major', '0'),
('overall', '0'),
('planned', '0');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

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
(1, 'Network Maintenance on Monday August 20th', 'Hello all,\r\n<br /> <br />\r\nWe have been informed that our network provider will be performing some important maintenance on Monday between 11:00 and 14:00 UTC, resulting in some downtime.\r\n<br /> <br />\r\n<a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Scheduled+Maintenance+August+20th%2C+2012&iso=20120820T03&p1=202&ah=3">View the time in cities around the world</a>\r\n<br /> <br />\r\nSorry for any inconveniences caused', '2012-08-17 20:50:00', 10),
(2, 'Database Maintenance', 'Hello everyone,\r\n<br /><br />\r\nWe are performing some maintenance on the database that may cause some intermittent loss of connectivity. There is no reason to be alarmed; the servers are most definitely not on fire.\r\n<br /><br />\r\nIf you notice something on the site isn''t working as intended, please feel free to let us know at website/AT/phpbb.com\r\n<br /><br />\r\nThanks,\r\n<br /><br />\r\nThe phpBB Team', '2013-01-28 20:11:57', 10),
(3, 'Recent downtime', 'Hello everyone,\r\n<br /><br />\r\nYou may have noticed some downtime and other peculiar oddities while visiting today. We were deploying a load balancer, which should have only taken a few minutes which is why it wasn''t announced. Unfortunately, DNS records were mixed up during the process and we were redirected to a different OSU load balancer. This caused an error page to be returned instead of our site. Additionally, it had its own SSL certificate, which means you may have seen a warning from your browser about an identity problem.\r\n<br /><br />\r\nThis was just an administrative error, our servers were not compromised. We apologize for any inconveniences this may have caused.', '2013-04-08 21:14:48', 10),
(4, 'Current Downtime', 'We are currently in the process of mitigating an attack against our main site, blog and wiki. <br /> <br /> We hope to provide more updates shortly. <br /> <br /> Thank you for your patience. <br /> <br /> UPDATE: Please see latest update above.', '2013-05-28 16:15:38', 10),
(5, 'Recent Downtime', 'Recently we experienced a DDoS attack which caused our main site, blog and wiki to suffer intermittent downtime and slowness for a period of roughly 3 hours. We have now taken actions which have now stopped the attack and we have added prevention methods in order to avoid such downtime in the future.\r\n\r\n<br /><br /> At this time some users may still be unable to access our sites due to certain new measures that were taken but this will hopefully resolve itself in the next 24 hours. If you still cannot access the site after that time, please contact us using the <a href="http://status.phpbb.com/contact">contact form</a>.\r\n\r\n<br /><br /> Thanks <br /> The phpBB Team', '2013-05-29 03:44:10', 10),
(6, 'Small Maintenance', 'We are just performing some small maintenance to prevent future DDoS attacks. This should not result in anything more than a few minutes downtime. <br /><br /> Thank you for your patience', '2013-05-29 15:56:13', 10),
(7, 'Fully Operational', 'We have now completed all the maintenance in order to help prevent & mitigate future DDoS attacks whilst also improving site performance.<br /><br />\r\n\r\nYou should now be able to access all the websites on our network. If you experience any problems with sites or services on our network (i.e. errors, slowness or timeouts) please contact us using the <a href="http://status.phpbb.com/contact">contact form</a>. <br /><br />\r\n\r\nThanks<br />\r\nThe phpBB Team', '2013-05-29 17:12:25', 10),
(8, 'Titania Search Downtime', 'We are currently experiencing a issue with the search functionality for titania, we are working on getting the service back up.\r\n<br /><br />\r\nUpdate: The titania search should be working again.', '2013-06-13 06:35:00', 10),
(9, 'Undergoing maintenance', 'Hi all,\r\n<br />\r\nWe are currently performing maintenance on phpBB.com. During this maintenance phpBB.com might be unavailable.\r\n<br /><br />\r\nThanks,<br />\r\nThe phpBB team.', '2013-07-12 10:08:55', 10),
(10, 'Maintenance Complete', 'Unfortunately some routine maintenance which was not due to cause any downtime caused some unexpected and unforeseeable issues with phpBB.com.\r\n<br /><br />\r\nWe have now resolved these issues and if you are experiencing any problems with the website you should contact us using the contact form.\r\n<br /><br />\r\nThanks\r\n<br />\r\nThe phpBB Team', '2013-07-12 10:53:16', 10),
(11, 'CDB Issues', 'We are experiencing some issues with the Customisation Database and are currently resolving these issues. <br /> <br />Thank you for your patience. <br /><br />Thanks,<br />The phpBB Team\r\n<br /><br />\r\nUPDATE: These issues should now be resolved. If you continue to experience problems please contact us using the contact form.', '2013-07-12 11:39:00', 10),
(13, 'MPV issues', 'We are currently experiencing issues with the MOD pre-validator. There might be issues with submitting and testing MODs due to these problems.<br />We are working on this issue to get it fixed as soon as possible. <br /><br />Thanks,<br />The phpBB.com Team<br /><br />Update: All issues with MPV are fixed.', '2013-07-29 06:29:16', 10),
(14, 'Current downtime', 'We are currently experiencing some downtime on phpBB.com but our other sites should site remain operational. We are currently working to restore the site.\r\n<br /><br/>\r\nSorry for any inconvenience caused,\r\n<br />\r\nThe phpBB Team\r\n<br /><br />\r\nUPDATE: This should now be resolved. If you are still experiencing any issues please contact us using the contact form on this site.', '2013-08-06 00:20:00', 10);

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
