/* Create this table in the database 'miniaturemvc' */

CREATE TABLE `vendors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `sales` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `vendors` (`id`, `firstName`, `lastName`, `sales`) VALUES
(1, 'John', 'Knight', 2),
(2, 'Robert', 'Malto', 4);