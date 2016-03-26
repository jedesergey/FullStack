<?
// генератор дневных свечей с записью в таблицы. Пишется одна строка для показа проходящего дня. Запускать скрипт в 23:55 ежедневно
include('../../db.php');

$array = array("SkrillPerfectMoney", "SkrillPayza", "SkrillOKPay", "SkrillPayeer", "SkrillMonero", "CocaPaySkrill", "PerfectMoneyPayza", "PerfectMoneyOKPay", "PerfectMoneyPayeer", "PerfectMoneyMonero", "CocaPayPerfectMoney", "PayzaOKPay", "PayzaPayeer", "PayzaMonero", "CocaPayPayza", "OKPayPayeer", "CocaPayOKPay", "CocaPayPayeer", "CocaPayMonero");

$array2 = array("realSkrillPerfectMoney", "realSkrillPayza", "realSkrillOKPay", "realSkrillPayeer", "realSkrillMonero", "realCocaPaySkrill", "realPerfectMoneyPayza", "realPerfectMoneyOKPay", "realPerfectMoneyPayeer", "realPerfectMoneyMonero", "realCocaPayPerfectMoney", "realPayzaOKPay", "realPayzaPayeer", "realPayzaMonero", "realCocaPayPayza", "realOKPayPayeer", "realCocaPayOKPay", "realCocaPayPayeer", "realCocaPayMonero");

$array3 = array("ordersSkrillPerfectMoney", "ordersSkrillPayza", "ordersSkrillOKPay", "ordersSkrillPayeer", "ordersSkrillMonero", "ordersCocaPaySkrill", "ordersPerfectMoneyPayza", "ordersPerfectMoneyOKPay", "ordersPerfectMoneyPayeer", "ordersPerfectMoneyMonero", "ordersCocaPayPerfectMoney", "ordersPayzaOKPay", "ordersPayzaPayeer", "ordersPayzaMonero", "ordersCocaPayPayza", "ordersOKPayPayeer", "ordersCocaPayOKPay", "ordersCocaPayPayeer", "ordersCocaPayMonero");

for ($i=0;$i<19;$i++){

mysql_query("DROP TABLE temp1", $link); 
	
mysql_query("CREATE TABLE temp1
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `price` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

mysql_query("DROP TABLE temp2", $link); 
	
mysql_query("CREATE TABLE temp2
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `price` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

$sql = mysql_query("SELECT * FROM $array[$i] order by id desc limit 1 ", $link);
$row = mysql_fetch_array($sql); 
$data = $row['data'];
$time_start = strtotime("$data");

$viewtimes1 = date("Y",strtotime("+1 days", $time_start)); // год
$viewtimes2 = date("m",strtotime("+1 days", $time_start)); // месяц
$viewtimes3 = date("d",strtotime("+1 days", $time_start)); // день

$f = mysql_query("SELECT * FROM $array3[$i] WHERE YEAR(time2) = '$viewtimes1' AND MONTH(time2) = '$viewtimes2' AND DAY(time2) = '$viewtimes3' AND action = '1' ", $link);
while ($row3 = mysql_fetch_array($f)){
    
$time = $row3['time2'];
$price = $row3['price'];
    
mysql_query("INSERT INTO temp1 (data, price) VALUES ('$time','$price')", $link);    
}


$f = mysql_query("SELECT * FROM $array2[$i] WHERE YEAR(time2) = '$viewtimes1' AND MONTH(time2) = '$viewtimes2' AND DAY(time2) = '$viewtimes3' AND action = '1' ", $link);
while ($row3 = mysql_fetch_array($f)){
$time = $row3['time2'];
$price = $row3['price'];
    
mysql_query("INSERT INTO temp1 (data, price) VALUES ('$time','$price')", $link);     
}

$sql = mysql_query("SELECT * FROM temp1 order by data ASC ", $link);
while ($row3 = mysql_fetch_array($sql)){ 
$data = $row3['data'];
$price = $row3['price'];
mysql_query("INSERT INTO temp2 (data, price) VALUES ('$data','$price')", $link); 
}

$lastmass = mysql_query("SELECT COUNT(1) FROM temp2");
$mass = mysql_fetch_array($lastmass);
$last = $mass[0]; // выведет число строк

$sql = mysql_query("SELECT * FROM temp2 WHERE id='1' ", $link);
$row = mysql_fetch_array($sql); 
$open1 = $row['data'];
$open2 = $row['price'];

$sql = mysql_query("SELECT * FROM temp2 WHERE id='$last' ", $link);
$row = mysql_fetch_array($sql); 
$close1 = $row['data'];
$close2 = $row['price'];

mysql_query("DROP TABLE temp2", $link); 
	
mysql_query("CREATE TABLE temp2
( `id` int(32) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `price` float(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

$sql = mysql_query("SELECT * FROM temp1 order by price ASC ", $link);
while ($row3 = mysql_fetch_array($sql)){ 
$data = $row3['data'];
$price = $row3['price'];
mysql_query("INSERT INTO temp2 (data, price) VALUES ('$data','$price')", $link); 
}

$lastmass = mysql_query("SELECT COUNT(1) FROM temp2");
$mass = mysql_fetch_array($lastmass);
$last = $mass[0]; // выведет число строк

$sql = mysql_query("SELECT * FROM temp2 WHERE id='1' ", $link);
$row = mysql_fetch_array($sql); 
$low1 = $row['data'];
$low2 = $row['price'];

$sql = mysql_query("SELECT * FROM temp2 WHERE id='$last' ", $link);
$row = mysql_fetch_array($sql); 
$hi1 = $row['data'];
$hi2 = $row['price'];

//$data = date("Y-m-d",strtotime("-$x days"));
$data = date("Y-m-d",strtotime("+1 days", $time_start)); // дата

mysql_query("INSERT INTO $array[$i] (data, hi, low, open, close) VALUES ('$data','$hi2','$low2','$open2','$close2')", $link);
mysql_query("DROP TABLE temp1", $link); 
mysql_query("DROP TABLE temp2", $link); 

}

// после того как строки пропишутся в базу запускаем 19 скриптов по очереди для записи в файлы.


?>