<?
$go = $_POST['json_name1'];
//echo json_encode($go);
include ('../db.php');

$array = array(" ", "ordersSkrillPerfectMoney", "ordersSkrillPayza", "ordersSkrillOKPay", "ordersSkrillPayeer", "ordersSkrillMonero", "ordersCocaPaySkrill", "ordersPerfectMoneyPayza", "ordersPerfectMoneyOKPay", "ordersPerfectMoneyPayeer", "ordersPerfectMoneyMonero", "ordersCocaPayPerfectMoney", "ordersPayzaOKPay", "ordersPayzaPayeer", "ordersPayzaMonero", "ordersCocaPayPayza", "ordersOKPayPayeer", "ordersCocaPayOKPay", "ordersCocaPayPayeer", "ordersCocaPayMonero");

$arrayreal = array(" ", "realSkrillPerfectMoney", "realSkrillPayza", "realSkrillOKPay", "realSkrillPayeer", "realSkrillMonero", "realCocaPaySkrill", "realPerfectMoneyPayza", "realPerfectMoneyOKPay", "realPerfectMoneyPayeer", "realPerfectMoneyMonero", "realCocaPayPerfectMoney", "realPayzaOKPay", "realPayzaPayeer", "realPayzaMonero", "realCocaPayPayza", "realOKPayPayeer", "realCocaPayOKPay", "realCocaPayPayeer", "realCocaPayMonero");

$array01 = array(" ", "skrill", "skrill", "skrill", "skrill", "skrill", "cocapay", "perfectmoney", "perfectmoney", "perfectmoney", "perfectmoney", "cocapay", "payza", "payza", "payza", "cocapay", "okpay", "cocapay", "cocapay", "cocapay");

$array02 = array(" ", "perfectmoney", "payza", "okpay", "payeer", "monero", "skrill", "payza", "okpay", "payeer", "monero", "perfectmoney", "okpay", "payeer", "monero", "payza", "payeer", "okpay", "payeer", "monero");



mysql_query("DROP TABLE vbalance", $link); 
	
mysql_query("CREATE TABLE vbalance
(   `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `monero` float(32) NOT NULL DEFAULT '0',
  `okpay` float(32) NOT NULL DEFAULT '0',
  `cocapay` float(32) NOT NULL DEFAULT '0',
  `payeer` float(32) NOT NULL DEFAULT '0',
  `payza` float(32) NOT NULL DEFAULT '0',
  `perfectmoney` float(32) NOT NULL DEFAULT '0',
  `skrill` float(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))", $link); 

mysql_query("INSERT INTO vbalance (skrill) VALUES ('0')", $link);

mysql_query("DROP TABLE balance", $link); 
	
mysql_query("CREATE TABLE balance
(   `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `pair` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `time` datetime NOT NULL,
  `monero` float(32) NOT NULL DEFAULT '0',
  `okpay` float(32) NOT NULL DEFAULT '0',
  `cocapay` float(32) NOT NULL DEFAULT '0',
  `payeer` float(32) NOT NULL DEFAULT '0',
  `payza` float(32) NOT NULL DEFAULT '0',
  `perfectmoney` float(32) NOT NULL DEFAULT '0',
  `skrill` float(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))", $link); 

mysql_query("INSERT INTO balance (skrill) VALUES ('0')", $link);

for ($id=1; $id<20; $id++) {
    //echo $a.'<br>';
    
$resultsave = mysql_query("DROP TABLE $array[$id] ", $link); 
	
$resultsave2 = mysql_query("CREATE TABLE $array[$id]
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `time2` datetime NOT NULL,
  `user` varchar(32) NOT NULL,
  `price` float(32) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `combuy` varchar(32) NOT NULL,
  `totalallbuy` varchar(32) NOT NULL,
  `total` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `fee` varchar(32) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `user2` varchar(32) NOT NULL,
  `amount2` varchar(32) NOT NULL,
  `comsell` varchar(32) NOT NULL,
  `totalallsell` varchar(32) NOT NULL,
  `total2` varchar(32) NOT NULL,
  `type2` varchar(32) NOT NULL,
  `fee2` varchar(32) NOT NULL,
  `number1` varchar(32) NOT NULL,
  `number2` varchar(32) NOT NULL,
  `hours` int(32) NOT NULL,
  `step` int(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);
    
    
mysql_query("DROP TABLE $arrayreal[$id] ", $link); 
	
mysql_query("CREATE TABLE $arrayreal[$id]
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `time2` datetime NOT NULL,
  `user` varchar(32) NOT NULL,
  `price` float(32) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `combuy` varchar(32) NOT NULL,
  `totalallbuy` varchar(32) NOT NULL,
  `total` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `fee` varchar(32) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `user2` varchar(32) NOT NULL,
  `amount2` varchar(32) NOT NULL,
  `comsell` varchar(32) NOT NULL,
  `totalallsell` varchar(32) NOT NULL,
  `total2` varchar(32) NOT NULL,
  `type2` varchar(32) NOT NULL,
  `fee2` varchar(32) NOT NULL,
  `number1` varchar(32) NOT NULL,
  `number2` varchar(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);    

$vusersarr = mysql_query("SELECT COUNT(1) FROM vusers");
$vuser = mysql_fetch_array($vusersarr);
//echo $vuser[0]; // выведет число строк

///////////////////////////////////////////////////////////////////////////

$sql = mysql_query("SELECT * FROM testdata WHERE id='$id' ", $link);
$row = mysql_fetch_array($sql); 

$min = $row['min']; // 0.9
$max = $row['max']; // 1.1
$ordermin = $row['ordermin']; // 1
$ordermax = $row['ordermax']; // 10
$feesell = $row['feesell']; // 0.7
$feebuy = $row['feebuy']; // 0.5
$pair = $row['pair'];

$min = $min*10000; // 9000
$max = $max*10000; // 11000

$feebuy2 = $feebuy*100; // 50
$feesell2 = $feesell*100; // 70

///////////////////////////////////////////////////////////////////////////

$sutki = 1440;
$minussutki = date("i",strtotime("-$sutki minutes")); // час
$sutki = $sutki+$minussutki;    
$time_start = strtotime("-$sutki minutes"); // 24 часа назад
$counter = 0;

for ($i=0; $i<48; $i++){ // цикл на 48 часов
//echo $viewtimes.'<br>';    
$randtype = 0; // рандомим тип ордера    
$colorders = rand($ordermin, $ordermax); //количество ордеров в час (от 1 до 10)
$divmin = 60/$colorders; // количество сделок в час, неокругленно
$stepmin = floor($divmin); // округляем в меньшую сторону
$tempmin = 0;
$z = 0;    
    
///////////////////////////////////////////////////////////////////////////	
	
for ($y=0; $y<$colorders; $y++){ // цикл сделок часовой	
$counter++;
$close = 0;	
$amount = rand(10,50); // создаем количество валюты	

if ($randtype == 0){
	$randtype = 1;
} else {
	$randtype = 0;
}	
$randsec = rand(10,59);
$viewtimes = date("Y-m-d H:i:$randsec",strtotime("+$tempmin minutes", $time_start)); // + шаг в минутах
    
///////////////////////////////////////////////////////////////////////////	
	
if ($randtype == 0) { // если buy
	

		
$randorder = rand($min, $max)/10000; // создаем рандомный курс пары	
$randuser = rand(1, $vuser[0]);
$sql1 = mysql_query("SELECT * FROM vusers WHERE id='$randuser' ", $link);
$row1 = mysql_fetch_array($sql1); 

$loginuser = $row1['login']; // выбираем юзера

	
///////////////////////////////////////////////////////////////////////////	
	
			
$sql2 = mysql_query("SELECT * FROM $array[$id] WHERE price <= $randorder and action = 0 and type = 'sell' ", $link);
$row2 = mysql_fetch_array($sql2); 
$idpair = $row2['id'];
$loginsell = $row2['user'];	
$totalsell = $row2['total'];
$priceusersell = $row2['price'];
$amountsell = $row2['amount'];
$combuysell = $row2['combuy'];    

///////////////////////////////////////////////////////////////////////////	
    
    
$comm1 = $amount*$randorder; // количество второй валюты
$totalbuyfee = $comm1/100*$feebuy; // высчитываем комиссию 
$totalbuy2 = $comm1+$totalbuyfee; // вторая валюта + комиссия 
$totalbuy2 = round($totalbuy2,4);    
	
	
///////////////////////////////////////////////////////////////////////////    
	
if (!$idpair){

$combuy = $amount*$randorder/100*$feebuy;
$totalallbuy = $amount*$randorder;
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	    
    
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginuser','$randorder','$amount','$totalbuy2','buy','$feebuy','0', '1', '$combuy', '$totalallbuy', '$i', '$z')", $link);			
$close = 1;	
	
}

///////////////////////////////////////////////////////////////////////////	    
    
if ($amount == $amountsell and $close == 0){
$combuy = $amount*$priceusersell/100*$feebuy;
$totalallbuy = $amount*$priceusersell;
$totalbuy2 = $totalallbuy + $combuy; 
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	    
$totalbuy2 = round($totalbuy2,4); // округяем в меньшую сторону	  

$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]];
$val2 = $r1[$array02[$id]];
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]];
$val4 = $r2[$array02[$id]];   
    

    
$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $combuy + $combuysell;    
    
mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amount', total2='$totalbuy2', type2='buy', fee2='$feebuy', user2='$loginuser',  number2='2', comsell='$combuy', totalallsell='$totalallbuy', hours='$i', step='$z' WHERE id='$idpair'");	
$close = 1;
$z++;
    
$val2 = $val2 - $totalbuy2;
$val1 = $val1 + $amount;    

$val3 = $val3 - $amount;
$val4 = $val4 + $totalsell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val2' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца 
      
   
    
    
}	
    
///////////////////////////////////////////////////////////////////////////	    
    
	
if ($amount < $amountsell and $close == 0){
	
$amountost1 = $amountsell - $amount; // вычисляем остаток amount
$amountost1 = round($amountost1,4); // округляем в меньшую сторону

$totalbuy3 = $totalbuy1*10000/$priceusersell/10000; // получаем количество второй валюты
$totalbuy3 = round($totalbuy3,4); // округяем в меньшую сторону	
	
$totalost = $amountost1*$priceusersell; // получаем количество второй валюты для нового ордера sell
$sss = $totalost/100*$feesell;
$vtval = $totalost - $sss;
$vtval = round($vtval,4); // округяем в меньшую сторону	
$sss = round($sss,4); // округяем в меньшую сторону	
$totalost = round($totalost,4); // округяем в меньшую сторону
    
$combuy = $amount*$priceusersell/100*$feebuy; // комиссия для buy по курсу селла
$totalallbuy = $amount*$priceusersell; // количество второй валюты по курсу селла
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	
$totalbuy2 = $totalallbuy + $combuy;  // сумма у покупателя во второй валюте + комиссия  
    
$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]];
$val2 = $r1[$array02[$id]];
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]];
$val4 = $r2[$array02[$id]];    



mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amount', total2='$totalbuy2', type2='buy', fee2='$feebuy', user2='$loginuser',  number2='3', comsell='$combuy', totalallsell='$totalallbuy', hours='$i', step='$z' WHERE id='$idpair'");
	
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginsell','$priceusersell','$amountost1','$vtval','sell','$feesell','0', '4', '$sss', '$totalost', '$i', '$z')", $link);	
$close = 1;	
$z++;    

$val2 = $val2 - $totalbuy2;
$val1 = $val1 + $amount;    

$val3 = $val3 - $amount;
$val4 = $val4 + $totalsell;
    
$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $combuy + $combuysell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val2' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца     
    
  
    
    
    
}		
	
///////////////////////////////////////////////////////////////////////////		
	
if ($amount > $amountsell and $close == 0){	
$step = 0;
$count = 0;    
do {	

$ncount = 'x'.$count;    
if ($amount > $amountsell and $idpair){ // если количество первой валюты больше валюты найденного Селла и если он вообще найден
   
// вычитаем валюту Селла из нашего количества
$amount = $amount - $amountsell;    
// делаем пересчет по курсу Селла
$val2 = $amountsell*$priceusersell;    
// вычисляем комиссию
$commis = $val2/100*$feebuy;    
// прибавляем комиссию и обновляем ордер
$totalbuy5 = $val2 + $commis;    
$totalbuy5 = round($totalbuy5,4); // округяем в меньшую сторону	 
    
$commis = round($commis,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	    
$val2 = round($val2,4); // округяем в меньшую сторону	

$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]]; // смотрим количество первой валюты у покупателя
$val21 = $r1[$array02[$id]]; // смотрим количество второй валюты у покупателя
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]]; // смотрим количество первой валюты у продавца
$val4 = $r2[$array02[$id]]; // смотрим количество второй валюты у продавца    
    

   
mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amountsell', total2='$totalbuy5', type2='buy', fee2='$feebuy', user2='$loginuser', number2='$ncount', comsell='$commis', totalallsell='$val2', hours='$i', step='$z' WHERE id='$idpair'");
$z++;
    
$val21 = $val21 - $totalbuy5; // отнимаем вторую валюту у покупателя
$val1 = $val1 + $amountsell; // прибавляем первую валюту покупателю    

$val3 = $val3 - $amountsell; // отнимаем первую валюту у продавца
$val4 = $val4 + $totalsell; // прибавляем вторую валюту продавцу
    
$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $commis + $combuysell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val21' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца     
    

} else { // иначе создаем висячий ордер и выходим из while
    
$sss = $amount/100*$feebuy;
$sss = round($sss,4); // округяем в меньшую сторону	
$totalost = $amount*$randorder+$sss;    
$totalost = round($totalost,4); // округяем в меньшую сторону 

$totalbuy9 = $amount*$randorder;    
$totalbuy9 = round($totalbuy9,4); // округяем в меньшую сторону     
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginuser','$randorder','$amount','$totalost','buy','$feebuy','0', '5', '$sss', '$totalbuy9', '$i', '$z')", $link);	

$close = 1;     
$step = 1;    
}

// ищем Селл и записываем в $amountsell
$sql3 = mysql_query("SELECT * FROM $array[$id] WHERE price <= $randorder and action = 0 and type = 'sell' ", $link);
$row3 = mysql_fetch_array($sql3); 
$idpair = $row3['id'];
$loginsell = $row3['user'];	
$totalsell = $row3['total'];
$priceusersell = $row3['price'];
$amountsell = $row3['amount'];
$combuysell = $row3['combuy'];    
$count++;    
}
while ($step == 0);			
}
	
}
	
/////////////////////////////////////////////////////////////////////////// END BUY	
	
if ($randtype == 1){ // если sell
//$viewtimes = date("Y-m-d H:i:s",strtotime("+$stepmin minutes", $time_start)); // + шаг в минутах
		
$randorder = rand($min, $max)/10000; // создаем рандомный курс пары	
$randuser = rand(1, $vuser[0]);
$sql1 = mysql_query("SELECT * FROM vusers WHERE id='$randuser' ", $link);
$row1 = mysql_fetch_array($sql1); 

$loginuser = $row1['login']; // выбираем юзера
$balanceuser = $row1['skrill']; // смотрим баланс по первой валюте
	
///////////////////////////////////////////////////////////////////////////	

    
$comm1 = $amount*$randorder; // количество второй валюты
$totalbuyfee = $comm1/100*$feesell; // высчитываем комиссию 
$totalbuy2 = $comm1-$totalbuyfee; // вторая валюта + комиссия 
$totalbuy2 = round($totalbuy2,4);    
	
	
///////////////////////////////////////////////////////////////////////////	
			
$sql2 = mysql_query("SELECT * FROM $array[$id] WHERE price >= $randorder and action = 0 and type = 'buy' ", $link);
$row2 = mysql_fetch_array($sql2); 
$idpair = $row2['id'];
$loginsell = $row2['user'];	
$totalsell = $row2['total'];
$priceusersell = $row2['price'];
$amountsell = $row2['amount'];
$combuysell = $row2['combuy']; 

///////////////////////////////////////////////////////////////////////////		
	
if (!$idpair){
    
$combuy = $amount*$randorder/100*$feesell;
$totalallbuy = $amount*$randorder;
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону
    
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginuser','$randorder','$amount','$totalbuy2','sell','$feesell','0', '6', '$combuy', '$totalallbuy', '$i', '$z')", $link);			
$close = 1;	    
    
}

///////////////////////////////////////////////////////////////////////////	    
    
if ($amount == $amountsell and $close == 0){
    
$combuy = $amount*$priceusersell/100*$feesell;
$totalallbuy = $amount*$priceusersell;
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	    
$totalbuy2 = round($totalbuy2,4); // округяем в меньшую сторону    
    
    
$val21 = $amount*$priceusersell;
$co2 = $val21/100*$feesell;
$val21 = $val21 - $co2;
$val21 = round($val21,4); // округяем в меньшую сторону    

$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]];
$val2 = $r1[$array02[$id]];
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]];
$val4 = $r2[$array02[$id]];    
    
  

$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $combuy + $combuysell;    
    
mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amount', total2='$val21', type2='sell', fee2='$feebuy', user2='$loginuser',  number2='7', comsell='$combuy', totalallsell='$totalallbuy', hours='$i', step='$z' WHERE id='$idpair'");	
$close = 1;	
$z++;
    
$val2 = $val2 + $val21;
$val1 = $val1 - $amount;    

$val3 = $val3 + $amount;
$val4 = $val4 - $totalsell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val2' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца     
    

}
///////////////////////////////////////////////////////////////////////////	    
    
	
if ($amount < $amountsell and $close == 0){
	
$amountost1 = $amountsell - $amount; // вычисляем остаток amount
$amountost1 = round($amountost1,4); // округляем в меньшую сторону

$totalbuy3 = $amount*$priceusersell; // получаем количество второй валюты
$co3 = $totalbuy3/100*$feesell;
$totalbuy3 = $totalbuy3 - $co3;    
$totalbuy3 = round($totalbuy3,4); // округяем в меньшую сторону    
    
$totalost = $amountost1*$priceusersell; // получаем количество второй валюты для нового ордера sell
$sss = $totalost/100*$feebuy;
$vtval = $totalost + $sss;
$vtval = round($vtval,4); // округяем в меньшую сторону	
//echo $totalost.'<br>';
//echo $sss.'<br>';
$totalost = round($totalost,4); // округяем в меньшую сторону

$combuy = $amount*$priceusersell/100*$feesell;
$totalallbuy = $amount*$priceusersell;
$combuy = round($combuy,4); // округяем в меньшую сторону	
$totalallbuy = round($totalallbuy,4); // округяем в меньшую сторону	
    
$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]];
$val2 = $r1[$array02[$id]];
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]];
$val4 = $r2[$array02[$id]];    
 
  

$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $combuy + $combuysell;     
    
mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amount', total2='$totalbuy3', type2='sell', fee2='$feesell', user2='$loginuser',  number2='8', comsell='$combuy', totalallsell='$totalallbuy', hours='$i', step='$z' WHERE id='$idpair'");
	
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginsell','$priceusersell','$amountost1','$vtval','buy','$feebuy','0', '9', '$sss', '$totalost', '$i', '$z')", $link);	
$close = 1;	
$z++;  
 
$val21 = $totalallbuy - $combuy;
    
$val2 = $val2 + $val21;
$val1 = $val1 - $amount;    

$val3 = $val3 + $amount;
$val4 = $val4 - $totalsell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val2' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца    
    

}		
	
///////////////////////////////////////////////////////////////////////////		
	
if ($amount > $amountsell and $close == 0){	
$step = 0;
$count = 0;    
do {	
$ncount = 'y'.$count;
if ($amount > $amountsell and $idpair){ // если количество первой валюты больше валюты найденного Селла и если он вообще найден
  
// вычитаем валюту Селла из нашего количества
$amount = $amount - $amountsell;    
// делаем пересчет по курсу Селла
$val22 = $amountsell*$priceusersell;    
// вычисляем комиссию
$commis = $val22/100*$feesell;   
$commis = round($commis,4); // округяем в меньшую сторону	    
// прибавляем комиссию и обновляем ордер
$totalbuy5 = $val22 - $commis;    
$totalbuy5 = round($totalbuy5,4); // округяем в меньшую сторону	 
    
$s1 = mysql_query("SELECT * FROM vusers WHERE login = '$loginuser' ", $link);    
$r1 = mysql_fetch_array($s1);
$val1 = $r1[$array01[$id]];
$val2 = $r1[$array02[$id]];
    
$s2 = mysql_query("SELECT * FROM vusers WHERE login = '$loginsell' ", $link);    
$r2 = mysql_fetch_array($s2);
$val3 = $r2[$array01[$id]];
$val4 = $r2[$array02[$id]];    
    
  
 
$s3 = mysql_query("SELECT  $array02[$id] FROM vbalance WHERE id = '1' ", $link);    
$r3 = mysql_fetch_array($s3);
$val5 = $r3['0']; 
$val5 = $val5 + $commis + $combuysell;    
    
mysql_query("UPDATE $array[$id] SET time2='$viewtimes', action='1', amount2='$amountsell', total2='$totalbuy5', type2='sell', fee2='$feesell', user2='$loginuser', number2='$ncount', comsell='$commis', totalallsell='$val22', hours='$i', step='$z' WHERE id='$idpair'"); 
$z++; 

$val21 = $totalsell - $commis;    
    
$val2 = $val2 + $val21;
$val1 = $val1 - $amountsell;    

$val3 = $val3 + $amountsell;
$val4 = $val4 - $totalsell;    
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val2' WHERE login='$loginuser'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val1' WHERE login='$loginuser'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE vbalance SET $array02[$id] = '$val5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE vusers SET $array02[$id] = '$val4' WHERE login='$loginsell'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE vusers SET $array01[$id] = '$val3' WHERE login='$loginsell'"); // отнимаем первую валюту у продавца     
    
    
} else { // иначе создаем висячий ордер и выходим из while
// остаток amount умножаем на курс и получаем количество второй валюты
$pokursu = $amount*$randorder;
// вычисляем комиссию    
$commis2 = $pokursu/100*$feesell;
$commis2 = round($commis2,4); // округяем в меньшую сторону	    
// прибавляем комиссию и создаем ордер
$totalbuy9 = $pokursu-$commis2;
$totalbuy9 = round($totalbuy9,4); // округяем в меньшую сторону	    
mysql_query("INSERT INTO $array[$id] (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy, hours, step)
VALUES ('$viewtimes','$loginuser','$randorder','$amount','$totalbuy9','sell','$feesell','0', '10', '$commis2', '$pokursu', '$i', '$z')", $link);	

$close = 1;     
$step = 1;    
}

// ищем Селл и записываем в $amountsell
$sql3 = mysql_query("SELECT * FROM $array[$id] WHERE price >= $randorder and action = 0 and type = 'buy' ", $link);
$row3 = mysql_fetch_array($sql3); 
$idpair = $row3['id'];
$loginsell = $row3['user'];	
$totalsell = $row3['total'];
$priceusersell = $row3['price'];
$amountsell = $row3['amount'];
$count++;    
}
while ($step == 0);			
}
    
}
$tempmin = $tempmin + $stepmin;	
}

$time_start = strtotime("+1 hours", $time_start);
	
}

} 

$arrayx = array("ordersSkrillPerfectMoney", "ordersSkrillPayza", "ordersSkrillOKPay", "ordersSkrillPayeer", "ordersSkrillMonero", "ordersCocaPaySkrill", "ordersPerfectMoneyPayza", "ordersPerfectMoneyOKPay", "ordersPerfectMoneyPayeer", "ordersPerfectMoneyMonero", "ordersCocaPayPerfectMoney", "ordersPayzaOKPay", "ordersPayzaPayeer", "ordersPayzaMonero", "ordersCocaPayPayza", "ordersOKPayPayeer", "ordersCocaPayOKPay", "ordersCocaPayPayeer", "ordersCocaPayMonero");

$arrayx2 = array("SkrillPerfectMoney", "SkrillPayza", "SkrillOKPay", "SkrillPayeer", "SkrillMonero", "CocaPaySkrill", "PerfectMoneyPayza", "PerfectMoneyOKPay", "PerfectMoneyPayeer", "PerfectMoneyMonero", "CocaPayPerfectMoney", "PayzaOKPay", "PayzaPayeer", "PayzaMonero", "CocaPayPayza", "OKPayPayeer", "CocaPayOKPay", "CocaPayPayeer", "CocaPayMonero");

$arrayx3 = array("Skrill/PerfectMoney", "Skrill/Payza", "Skrill/OKPay", "Skrill/Payeer", "Skrill/Monero", "CocaPay/Skrill", "PerfectMoney/Payza", "PerfectMoney/OKPay", "PerfectMoney/Payeer", "PerfectMoney/Monero", "CocaPay/PerfectMoney", "Payza/OKPay", "Payza/Payeer", "Payza/Monero", "CocaPay/Payza", "OKPay/Payeer", "CocaPay/OKPay", "CocaPay/Payeer", "CocaPay/Monero");

$results = mysql_query("DROP TABLE active ", $link); 
mysql_query("DROP TABLE HD ", $link); 
	
$results2 = mysql_query("CREATE TABLE active
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `pair` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `col` int(32) NOT NULL,
  PRIMARY KEY (`id`))", $link); 

mysql_query("CREATE TABLE HD
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `pair` varchar(32) NOT NULL,
  `status` int(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);

$results = mysql_query("DROP TABLE active2 ", $link);	
$results2 = mysql_query("CREATE TABLE active2
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `pair` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `col` int(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);


for($k=0;$k<19;$k++){
    
$o = 0;

for($n=24; $n>0; $n--){ 
    
$time_start = strtotime("-$n hours"); // 24 часа назад 
$viewtimes1 = date("Y",strtotime("-$n hours")); // год
$viewtimes2 = date("m",strtotime("-$n hours")); // месяц
$viewtimes3 = date("d",strtotime("-$n hours")); // день
$viewtimes4 = date("H",strtotime("-$n hours")); // час    
 
$c = mysql_query("SELECT * FROM $arrayx[$k] WHERE YEAR(time2) = '$viewtimes1' AND MONTH(time2) = '$viewtimes2' AND DAY(time2) = '$viewtimes3' AND HOUR(time2) = '$viewtimes4' AND action = '1' ", $link);
while ($row3 = mysql_fetch_array($c)){
$o++;     
}     
    
    
}
mysql_query("INSERT INTO active2 (pair, col, name)
VALUES ('$arrayx2[$k]','$o', '$arrayx3[$k]')", $link);    
}

$result = mysql_query("SELECT * FROM active2 ORDER BY col DESC", $link); // сортировка по возрастанию
while ($row = mysql_fetch_array($result)){  
$a = $row['pair']; 
$b = $row['col'];       
$c = $row['name'];
$status = 0;
mysql_query("INSERT INTO active (pair, col, name) VALUES ('$a', '$b', '$c')", $link);       
mysql_query("INSERT INTO HD (pair, status) VALUES ('$a', '$status')", $link);       
} 


$results = mysql_query("DROP TABLE active2 ", $link);

header("location: ../cron/hoursupdate.php");
?>