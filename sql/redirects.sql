--
-- Table structure for table `redirects`
--
CREATE TABLE IF NOT EXISTS `redirects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `browser_agent` text,
  `url_string` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
