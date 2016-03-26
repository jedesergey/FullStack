<?

$min = $p1min*100;
$max = $p1max*100;

$result = mysql_query("DROP TABLE BTCEUR", $link); 
	
$result2 = mysql_query("CREATE TABLE BTCEUR
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `data` varchar(32) NOT NULL,
  `hi` varchar(32) NOT NULL,
  `open` varchar(32) NOT NULL,
  `close` varchar(32) NOT NULL,
  `low` varchar(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

for ($x=$mes; $x!=0; $x--)
{
$time_d = date("m-d-Y",strtotime("-$x days"));

$ax = rand($min, $max);
$bx = rand($min, $max);
$cx = rand($min, $max);
$dx = rand($min, $max);
$bar = array(0, 0, 0, 0);
$s = 0;

   $a2 = array($ax, $bx, $cx, $dx);
   usort($a2, "cmp");
   while (list($key, $value) = each($a2)) {
      //echo " $value";
	   
	   $bar[$s] = $value;	   
	   //echo $bar[$s].'<br>';
	   $s++;
   }
$low = $bar[0];
$hi = $bar[3];

$ol = rand(0,1);

if ($ol == 1){
	$open = $bar[2];
	$close = $bar[1];
} else{
	$open = $bar[1];
	$close = $bar[2];
}

$hi = $hi/100;
$open = $open/100;
$close = $close/100;
$low = $low/100;

mysql_query("INSERT INTO BTCEUR (data, open, hi, low, close)
VALUES ('$time_d', '$open', '$hi', '$low', '$close')", $link);	
	


}	









?>