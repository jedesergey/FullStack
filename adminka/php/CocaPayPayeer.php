<?
include('../db.php');

$sql = mysql_query("SELECT * FROM testdata WHERE id='18' ", $link);
$row = mysql_fetch_array($sql); 

$bars  = $row['bars'];
$p1min  = $row['min'];
$p1max  = $row['max'];

$mes = (int)($bars/19);

$min = $p1min*10000;
$max = $p1max*10000;

$result = mysql_query("DROP TABLE CocaPayPayeer", $link); 
	
$result2 = mysql_query("CREATE TABLE CocaPayPayeer
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `hi` varchar(32) NOT NULL,
  `open` varchar(32) NOT NULL,
  `close` varchar(32) NOT NULL,
  `low` varchar(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

for ($x=$mes; $x!=0; $x--)
{
$time_d = date("Y-m-d",strtotime("-$x days"));

mysql_query("CREATE TABLE mesbars
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `bars` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);
    
for($a=0;$a<4;$a++){
$bar = rand($min, $max);
$bar = $bar/10000;    
mysql_query("INSERT INTO mesbars (bars) VALUES ('$bar')", $link);    
}    
    
$sql = mysql_query("SELECT * FROM mesbars WHERE id='1' ", $link);
$row = mysql_fetch_array($sql); 
$open  = $row['bars'];

$sql = mysql_query("SELECT * FROM mesbars WHERE id='4' ", $link);
$row = mysql_fetch_array($sql); 
$close  = $row['bars'];
    
$sql = mysql_query("SELECT * FROM mesbars  ORDER BY bars DESC ", $link);
$row = mysql_fetch_array($sql); 
$hi  = $row['bars'];
    
$sql = mysql_query("SELECT * FROM mesbars  ORDER BY bars ASC ", $link);
$row = mysql_fetch_array($sql); 
$low  = $row['bars']; 

mysql_query("DROP TABLE mesbars", $link);

mysql_query("INSERT INTO CocaPayPayeer (data, open, hi, low, close)
VALUES ('$time_d', '$open', '$hi', '$low', '$close')", $link);	
}	

$sql = mysql_query("SELECT * FROM CocaPayPayeer ", $link);
$i=1;
$stringfile3[0] = 'CocaPayPayeer = [';
while($row = mysql_fetch_array($sql)) {

$row1 = $row['data'];
$row2 = $row['hi'];	
$row3 = $row['open'];
$row4 = $row['close'];
$row5 = $row['low'];
//$d = ('["'.$row1.'", '.$row2.', '.$row3.', '.$row4.', '.$row5.' ],  '.'<br>');
//file_put_contents('olch.js', $d);
	
$stringfile3[$i] = '["'.$row1.'", '.$row3.', '.$row2.', '.$row5.', '.$row4.' ],  ' . "\n";
$i++;	
	
}
$i++;
$stringfile3[$i] = '];';
file_put_contents("../ohlc/CocaPayPayeer.js", $stringfile3);	
?>