<?
include('../db.php');

mysql_query("DROP TABLE testdata", $link); 
	
mysql_query("CREATE TABLE testdata
(   
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `min` float(32) NOT NULL,
  `max` float(32) NOT NULL,
  `ordermin` float(32) NOT NULL,
  `ordermax` float(32) NOT NULL,
  `feesell` float(32) NOT NULL,
  `feebuy` float(32) NOT NULL,
  `pair` varchar(200) NOT NULL,
  `col` float(32) NOT NULL,
  `bars` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

mysql_query("DROP TABLE feedback", $link); 
	
mysql_query("CREATE TABLE feedback
(   
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `data` datetime NOT NULL,
  `telo` varchar(20000) NOT NULL,
  `datashort` date NOT NULL,
  PRIMARY KEY (`id`))", $link);

mysql_query("DROP TABLE newsdata", $link); 
	
mysql_query("CREATE TABLE newsdata
(   
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `data` datetime NOT NULL,
  `telo` varchar(20000) NOT NULL,
  `datashort` date NOT NULL,
  PRIMARY KEY (`id`))", $link);
?>