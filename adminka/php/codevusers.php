<?
include('../db.php');

$sql = mysql_query("SELECT * FROM testdata WHERE id='1' ", $link);
$row = mysql_fetch_array($sql); 

$col  = $row['col'];
$login = '';
$pass = '1111';
$email = '';
$status = 1;
$pass = md5($pass);	
$balance = 10000000;

mysql_query("DROP TABLE vusers", $link); 
	
mysql_query("CREATE TABLE vusers
(   `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `randcode` varchar(64) NOT NULL,
  `temp` int(2) NOT NULL DEFAULT '0',
  `monero` float(32) NOT NULL DEFAULT '0',
  `okpay` float(32) NOT NULL DEFAULT '0',
  `cocapay` float(32) NOT NULL DEFAULT '0',
  `payeer` float(32) NOT NULL DEFAULT '0',
  `payza` float(32) NOT NULL DEFAULT '0',
  `perfectmoney` float(32) NOT NULL DEFAULT '0',
  `skrill` float(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))", $link); 
	
mysql_query("DROP TABLE users", $link); 
	
mysql_query("CREATE TABLE users
(   `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `randcode` varchar(64) NOT NULL,
  `temp` int(2) NOT NULL DEFAULT '0',
  `monero` float(32) NOT NULL DEFAULT '100000',
  `okpay` float(32) NOT NULL DEFAULT '100000',
  `cocapay` float(32) NOT NULL DEFAULT '100000',
  `payeer` float(32) NOT NULL DEFAULT '100000',
  `payza` float(32) NOT NULL DEFAULT '100000',
  `perfectmoney` float(32) NOT NULL DEFAULT '100000',
  `skrill` float(32) NOT NULL DEFAULT '100000',
  PRIMARY KEY (`id`))", $link);


	
for ($x=0; $x<$col; $x++) 
{
$randlogin = rand(100000,300000);
$randemail = rand(10,30000).'@'.'mail.mn';

mysql_query("INSERT INTO vusers (login, pass, email, status, monero, okpay, cocapay, payeer, payza, perfectmoney, skrill)
VALUES ('$randlogin','$pass','$randemail','$status','$balance','$balance','$balance','$balance','$balance','$balance','$balance')", $link);	
}
	
header("location: 30daybars.php");

?>