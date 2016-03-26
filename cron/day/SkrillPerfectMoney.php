<?
include('../../db.php');

$lastmass = mysql_query("SELECT COUNT(1) FROM SkrillPerfectMoney");
$last = mysql_fetch_array($lastmass);
$last[0]; // выведет число строк

$stringfile19[0] = 'SkrillPerfectMoney = [';
$i=1;

$b = $last[0] - 29;
$c = $b + 30;

for($a=$b; $a<$c; $a++){

$sql = mysql_query("SELECT * FROM SkrillPerfectMoney WHERE id='$a'", $link);
$row = mysql_fetch_array($sql); 

$row1 = $row['data'];
$row2 = $row['hi'];	
$row3 = $row['open'];
$row4 = $row['close'];
$row5 = $row['low'];
	
$stringfile19[$i] = '["'.$row1.'", '.$row3.', '.$row2.', '.$row5.', '.$row4.' ],  ' . "\n";
$i++;	
}	

$i++;
$stringfile19[$i] = '];';
file_put_contents("../../adminka/ohlc/SkrillPerfectMoney.js", $stringfile19);

?>