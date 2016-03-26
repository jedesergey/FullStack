<?
include('../db.php');

$array = array("ordersSkrillPerfectMoney", "ordersSkrillPayza", "ordersSkrillOKPay", "ordersSkrillPayeer", "ordersSkrillMonero", "ordersCocaPaySkrill", "ordersPerfectMoneyPayza", "ordersPerfectMoneyOKPay", "ordersPerfectMoneyPayeer", "ordersPerfectMoneyMonero", "ordersCocaPayPerfectMoney", "ordersPayzaOKPay", "ordersPayzaPayeer", "ordersPayzaMonero", "ordersCocaPayPayza", "ordersOKPayPayeer", "ordersCocaPayOKPay", "ordersCocaPayPayeer", "ordersCocaPayMonero");

for ($w=0;$w<4;$w++){

mysql_query("DROP TABLE barshoursfull ", $link);    
mysql_query("DROP TABLE barshourssort ", $link);    
mysql_query("DROP TABLE barshours ", $link);

   
    
mysql_query("CREATE TABLE barshours
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `hi` float(32) NOT NULL,
  `low` float(32) NOT NULL,
  `open` float(32) NOT NULL,
  `close` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link); 

for($n=24; $n>0; $n--){  
    
mysql_query("CREATE TABLE barshoursfull
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `price` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);
    
mysql_query("CREATE TABLE barshourssort
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `price` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);     
    
$time_start = strtotime("-$n hours"); // 24 часа назад 
$viewtimes1 = date("Y",strtotime("-$n hours")); // год
$viewtimes2 = date("m",strtotime("-$n hours")); // месяц
$viewtimes3 = date("d",strtotime("-$n hours")); // день
$viewtimes4 = date("H",strtotime("-$n hours")); // час
 
$f = mysql_query("SELECT * FROM $array[$w] WHERE YEAR(time2) = '$viewtimes1' AND MONTH(time2) = '$viewtimes2' AND DAY(time2) = '$viewtimes3' AND HOUR(time2) = '$viewtimes4' AND action = '1' ", $link);
$row8 = mysql_fetch_array($f);

if ($row8){    
    
    
$c = mysql_query("SELECT * FROM $array[$w] WHERE YEAR(time2) = '$viewtimes1' AND MONTH(time2) = '$viewtimes2' AND DAY(time2) = '$viewtimes3' AND HOUR(time2) = '$viewtimes4' AND action = '1' ", $link);
while ($row3 = mysql_fetch_array($c)){
$price = $row3['price'];
$time = $row3['time2'];
$ss = mysql_query("INSERT INTO barshoursfull (time, price) VALUES ('$time', '$price')", $link);     
} 


    
$result5 = mysql_query("SELECT * FROM barshoursfull WHERE id='1'", $link); // Open
while ($row2 = mysql_fetch_array($result5)){  
$time6 = $row2['time'];
$u = '00';
$time_start1 = strtotime("$time6"); // 24 часа назад
$time6 = date("Y-m-d H:$u:$u", $time_start1); // + шаг в минутах    
$open = $row2['price'];              
}   

$pos1 = mysql_query("SELECT COUNT(1) FROM barshoursfull"); // считаем количество
$posbar1 = mysql_fetch_array($pos1);
$posbarcount1 = $posbar1[0]; // выведет число строк
    
$result7 = mysql_query("SELECT * FROM barshoursfull WHERE id='$posbarcount1'", $link); // Close
while ($row7 = mysql_fetch_array($result7)){  
$time7 = $row7['time']; 
$close = $row7['price'];              
}     
    
    
    
$result = mysql_query("SELECT * FROM barshoursfull ORDER BY price ASC", $link); // сортировка по возрастанию
while ($row = mysql_fetch_array($result)){  
$a = $row['time']; 
$b = $row['price'];       
mysql_query("INSERT INTO barshourssort (time, price) VALUES ('$a', '$b')", $link);       
}  
    
$result2 = mysql_query("SELECT * FROM barshourssort WHERE id='1'", $link); // LOW
while ($row2 = mysql_fetch_array($result2)){  
$low = $row2['price'];              
}   

$pos = mysql_query("SELECT COUNT(1) FROM barshourssort"); // считаем количество
$posbar = mysql_fetch_array($pos);
$posbarcount = $posbar[0]; // выведет число строк
    
$result3 = mysql_query("SELECT * FROM barshourssort WHERE id='$posbarcount'", $link); // Hi
while ($row3 = mysql_fetch_array($result3)){  
$hi = $row3['price'];              
}     
    
mysql_query("INSERT INTO barshours(time, hi, low, open, close) VALUES ('$time6', '$hi', '$low', '$open', '$close')", $link); 
    
mysql_query("DROP TABLE barshoursfull ", $link);    
mysql_query("DROP TABLE barshourssort ", $link);    
}    
}

$sql = mysql_query("SELECT * FROM barshours ", $link);
$i=1;
$stringfile[0] = 'ohlc'.$array[$w].' = [';
while($row = mysql_fetch_array($sql)) {

$row1 = $row['time'];
$row2 = $row['hi'];	
$row3 = $row['open'];
$row4 = $row['close'];
$row5 = $row['low'];

	
$stringfile[$i] = '["'.$row1.'", '.$row3.', '.$row2.', '.$row5.', '.$row4.' ],  ' . "\n";
$i++;	
	
}
$i++;
$stringfile[$i] = '];';    
file_put_contents($array[$w].'.js', $stringfile);
}    
    
?>