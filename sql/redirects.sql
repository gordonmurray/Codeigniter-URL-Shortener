CREATE TABLE `redirects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `ip_address` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `browser_agent` text CHARACTER SET utf8,
  `url_string` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;