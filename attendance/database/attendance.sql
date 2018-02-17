SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `empID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bdate` date NOT NULL,
  `joining` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `information` VALUES(1, 'admin', 'Male', '1995-09-14', '1995-09-14', 'Lecturer');
INSERT INTO `information` VALUES(2, 'Teacher 1', 'Male', '1990-06-04', '2010-06-04', 'Professor');

DROP TABLE IF EXISTS `office_date`;
CREATE TABLE IF NOT EXISTS `office_date` (
  `odate` date NOT NULL,
  `month` char(2) NOT NULL,
  `year` int(4) NOT NULL,
  `generate` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `office_date` VALUES('2013-09-22', '09', 2013, 1);

DROP TABLE IF EXISTS `punchio`;
CREATE TABLE IF NOT EXISTS `punchio` (
  `empID` int(11) NOT NULL,
  `date` date NOT NULL,
  `in` varchar(8) DEFAULT NULL,
  `incomment` varchar(255) DEFAULT NULL,
  `out` varchar(8) DEFAULT NULL,
  `outcomment` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `punchio` VALUES(1, '2013-09-22', '22:18:05', 'test', '22:18:30', 'test');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `empID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `users` VALUES(2, 'test', '098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
