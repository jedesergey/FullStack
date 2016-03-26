<?

$array = array("ordersSkrillPerfectMoney", "ordersSkrillPayza", "ordersSkrillOKPay", "ordersSkrillPayeer", "ordersSkrillMonero", "ordersCocaPaySkrill", "ordersPerfectMoneyPayza", "ordersPerfectMoneyOKPay", "ordersPerfectMoneyPayeer", "ordersPerfectMoneyMonero", "ordersCocaPayPerfectMoney", "ordersPayzaOKPay", "ordersPayzaPayeer", "ordersPayzaMonero", "ordersCocaPayPayza", "ordersOKPayPayeer", "ordersCocaPayOKPay", "ordersCocaPayPayeer", "ordersCocaPayMonero");

$arrayfee = array("php/SkrillPerfectMoney.php", "php/SkrillPayza.php", "php/SkrillOKPay.php", "php/SkrillPayeer.php", "php/SkrillMonero.php", "php/CocaPaySkrill.php", "php/PerfectMoneyPayza.php", "php/PerfectMoneyOKPay.php", "php/PerfectMoneyPayeer.php", "php/PerfectMoneyMonero.php", "php/CocaPayPerfectMoney.php", "php/PayzaOKPay.php", "php/PayzaPayeer.php", "php/PayzaMonero.php", "php/CocaPayPayza.php", "php/OKPayPayeer.php", "php/CocaPayOKPay.php", "php/CocaPayPayeer.php", "php/CocaPayMonero.php");

$arrayreal = array("realSkrillPerfectMoney", "realSkrillPayza", "realSkrillOKPay", "realSkrillPayeer", "realSkrillMonero", "realCocaPaySkrill", "realPerfectMoneyPayza", "realPerfectMoneyOKPay", "realPerfectMoneyPayeer", "realPerfectMoneyMonero", "realCocaPayPerfectMoney", "realPayzaOKPay", "realPayzaPayeer", "realPayzaMonero", "realCocaPayPayza", "realOKPayPayeer", "realCocaPayOKPay", "realCocaPayPayeer", "realCocaPayMonero");

$array01 = array("skrill", "skrill", "skrill", "skrill", "skrill", "cocapay", "perfectmoney", "perfectmoney", "perfectmoney", "perfectmoney", "cocapay", "payza", "payza", "payza", "cocapay", "okpay", "cocapay", "cocapay", "cocapay");

$array02 = array("perfectmoney", "payza", "okpay", "payeer", "monero", "skrill", "payza", "okpay", "payeer", "monero", "perfectmoney", "okpay", "payeer", "monero", "payza", "payeer", "okpay", "payeer", "monero");

$array03 = array("s1", "s2", "s3", "s4", "s5", "s6", "s7", "s8", "s9", "s10", "s11", "s12", "s13", "s14", "s15", "s16", "s17", "s18", "s19");

sleep(2);

include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$amount  = $_POST['amount'];
$price  = $_POST['price'];
$all  = $_POST['all'];
$totalplus  = $_POST['totalplus'];
$fee  = $_POST['fee'];
$fid  = $_POST['f'];
$all = (float)$all;    
}
$lastpricebuy = $price;
//$amount  = 1;
//$price  = 1.0155;
//$all  = 1.14892;
//$fee  = 0.00572;
//$fid  = 's1';


$key1 = array_search("$fid", $array03); 

$val1 = $array01[$key1];
$val2 = $array02[$key1];
$pair = $arrayreal[$key1];
$lastprice = $array[$key1];

$close = 0;

session_start(); 

if (isset($_SESSION['user'])) {
   
$user = $_SESSION['user'];
$sql = mysql_query("SELECT * FROM users WHERE login='$user' ", $link);
$row = mysql_fetch_array($sql); 
$colval2 = $row[$val1];
$viewtimes = date("Y-m-d H:i:s");    
$viewtimes1 = date("Y"); // год
$viewtimes2 = date("m"); // месяц
$viewtimes3 = date("d"); // день
$viewtimes4 = date("H"); // час    
       
if($amount <= $colval2){
    
$sql2 = mysql_query("SELECT * FROM $pair WHERE price >= $lastpricebuy and action = 0 and type = 'buy' and user != '$user' ", $link);
$row2 = mysql_fetch_array($sql2); 
$idpair = $row2['id'];
$loginbuy = $row2['user'];	
$total = $row2['total'];
$totallbuy = $row2['totalallbuy'];
$priceuserbuy = $row2['price'];
$amountbuy = $row2['amount'];
$combuy = $row2['combuy'];
$feebuy = $row2['fee'];
    
$sql3 = mysql_query("SELECT * FROM testdata WHERE pair = '$arrayfee[$key1]' ", $link);
$row3 = mysql_fetch_array($sql3); 
$feesell = $row3['feesell'];    
    
if(!$idpair){
mysql_query("INSERT INTO $pair (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy)
VALUES ('$viewtimes','$user','$lastpricebuy','$amount','$totalplus','sell','$feesell','0', '5', '$fee', '$all')", $link);
$close = 1;    
echo json_encode(4);    
}    
    
if($amount == $amountbuy and $close == 0 and $idpair){

$comissia = $totallbuy/100*$feesell;
$minuscom = $totallbuy - $comissia;
$minuscom = round($minuscom,5, PHP_ROUND_HALF_DOWN);    
$comissia = round($comissia,5, PHP_ROUND_HALF_DOWN);    
    
mysql_query("UPDATE $pair SET time2='$viewtimes', action='1', amount2='$amount', total2='$minuscom', type2='sell', fee2='$feesell', user2='$user',  number2='13', comsell='$comissia', totalallsell='$totallbuy' WHERE id='$idpair'");    
$close = 1;  
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
$s1 = mysql_query("SELECT * FROM users WHERE login = '$user' ", $link);//баланс продавца    
$r1 = mysql_fetch_array($s1);
$val01 = $r1[$array01[$key1]]; // первая валюта
$val02 = $r1[$array02[$key1]]; // вторая валюта
    
$s2 = mysql_query("SELECT * FROM users WHERE login = '$loginbuy' ", $link);//баланс покупателя    
$r2 = mysql_fetch_array($s2);
$val03 = $r2[$array01[$key1]]; // первая валюта
$val04 = $r2[$array02[$key1]]; // вторая валюта 
 
$s3 = mysql_query("SELECT  $array02[$key1] FROM balance WHERE id = '1' ", $link);//баланс админа    
$r3 = mysql_fetch_array($s3);
$val05 = $r3['0']; // баланс админа по второй валюте    
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств
    
$valitog1 = $val04 - $total;// отнимаем вторую валюту у покупателя
$valitog2 = $val03 + $amount; // прибавляем первую валюту покупателю
$valitog3 = $minuscom + $val02;// прибавляем вторую валюту продавцу
$valitog4 = $val01 - $amount; // отнимаем первую валюту у продавца
$valitog5 = $val05 + $combuy + $comissia;// прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog1' WHERE login='$loginbuy'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog2' WHERE login='$loginbuy'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE balance SET $array02[$key1] = '$valitog5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog3' WHERE login='$user'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog4' WHERE login='$user'"); // отнимаем первую валюту у продавца 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$user','$array01[$key1].$array02[$key1]','sell','$comissia')", $link); // вписываем сделку продавца в баланс админа 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$loginbuy','$array01[$key1].$array02[$key1]','buy','$combuy')", $link); // вписываем сделку покупателя в баланс админа    
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств 
    
echo json_encode(3);         
} 
    
if($amount < $amountbuy and $close == 0 and $idpair){

$totalamount = $amount*$priceuserbuy;// вычисляем количество второй валюты       
$comamount = $totalamount/100*$feesell; //вычисляем комиссию на вторую валюту    
$totalminuscom = $totalamount - $comamount;//вычитаем комиссию из второй валюты    
$totalminuscom = round($totalminuscom,5, PHP_ROUND_HALF_DOWN);
$comissia = $totalamount/100*$feebuy; // вычисляем комиссию покупателя на частичный ордер    
$totalchast = $totalamount + $comissia; // прибавляем комиссию ко второй валюте частичного ордера покупателя     
$totalchast = round($totalchast,5, PHP_ROUND_HALF_DOWN);
$comissia = round($comissia,5, PHP_ROUND_HALF_DOWN);
$comamount = round($comamount,5, PHP_ROUND_HALF_DOWN);
    
$amountost = $amountbuy - $amount;//вычисляем остаток первой валюты
$totalost = $amountost*$priceuserbuy;//вычисляем количество второй валюты    
$comost = $totalost/100*$feebuy;//вычисляем комиссию на остаток    
$totallpluscom = $totalost + $comost;//прибавляем комиссию ко второй валюте
$totallpluscom = round($totallpluscom,5, PHP_ROUND_HALF_DOWN);    
$totalost = round($totalost,5, PHP_ROUND_HALF_DOWN);    
$comost = round($comost,5, PHP_ROUND_HALF_DOWN);    
    
mysql_query("UPDATE $pair SET time2='$viewtimes', action='1', amount2='$amount', total2='$totalminuscom', type2='sell', fee2='$feesell', user2='$user',  number2='14', comsell='$comamount', totalallsell='$totalamount' WHERE id='$idpair'"); 
    
mysql_query("INSERT INTO $pair (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy)
VALUES ('$viewtimes','$loginbuy','$priceuserbuy','$amountost','$totallpluscom','buy','$feebuy','0', '3', '$comost', '$totalost')", $link);    
    
$close = 1;
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
$s1 = mysql_query("SELECT * FROM users WHERE login = '$user' ", $link);//баланс продавца    
$r1 = mysql_fetch_array($s1);
$val01 = $r1[$array01[$key1]]; // первая валюта
$val02 = $r1[$array02[$key1]]; // вторая валюта
    
$s2 = mysql_query("SELECT * FROM users WHERE login = '$loginbuy' ", $link);//баланс покупателя    
$r2 = mysql_fetch_array($s2);
$val03 = $r2[$array01[$key1]]; // первая валюта
$val04 = $r2[$array02[$key1]]; // вторая валюта  
 
$s3 = mysql_query("SELECT  $array02[$key1] FROM balance WHERE id = '1' ", $link);//баланс админа    
$r3 = mysql_fetch_array($s3);
$val05 = $r3['0'];   // баланс админа по второй валюте   
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса    

/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств
    
$valitog1 = $val04 - $totalchast;// отнимаем вторую валюту у покупателя
$valitog2 = $val03 + $amount; // прибавляем первую валюту покупателю
$valitog3 = $totalminuscom + $val02;// прибавляем вторую валюту продавцу
$valitog4 = $val01 - $amount; // отнимаем первую валюту у продавца
$valitog5 = $val05 + $comamount + $comissia;// прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog1' WHERE login='$loginbuy'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog2' WHERE login='$loginbuy'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE balance SET $array02[$key1] = '$valitog5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog3' WHERE login='$user'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog4' WHERE login='$user'"); // отнимаем первую валюту у продавца 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$user','$array01[$key1].$array02[$key1]','sell','$comamount')", $link); // вписываем сделку продавца в баланс админа 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$loginbuy','$array01[$key1].$array02[$key1]','buy','$comissia')", $link); // вписываем сделку покупателя в баланс админа    
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств     
    
echo json_encode(3);        
}
    
if($amount > $amountbuy and $close == 0){
$step = 0;    
$count = 0;
do {
$ncount = 'y'.$count;
    
if ($amount > $amountbuy and $idpair){
    
$commostbuy = $totallbuy/100*$feesell; // вычисляем комиссию с найденного buy    
$totalminuscomm = $totallbuy - $commostbuy; // отнимаем комиссию со второй валюты
$commostbuy = round($commostbuy,5, PHP_ROUND_HALF_DOWN);    
$totalminuscomm = round($totalminuscomm,5, PHP_ROUND_HALF_DOWN); 
    
mysql_query("UPDATE $pair SET time2='$viewtimes', action='1', amount2='$amountbuy', total2='$totalminuscomm', type2='sell', fee2='$feesell', user2='$user',  number2='$ncount', comsell='$commostbuy', totalallsell='$totallbuy' WHERE id='$idpair'");
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
$s1 = mysql_query("SELECT * FROM users WHERE login = '$user' ", $link);//баланс продавца    
$r1 = mysql_fetch_array($s1);
$val01 = $r1[$array01[$key1]]; // первая валюта
$val02 = $r1[$array02[$key1]]; // вторая валюта
    
$s2 = mysql_query("SELECT * FROM users WHERE login = '$loginbuy' ", $link);//баланс покупателя    
$r2 = mysql_fetch_array($s2);
$val03 = $r2[$array01[$key1]]; // первая валюта
$val04 = $r2[$array02[$key1]]; // вторая валюта  
 
$s3 = mysql_query("SELECT  $array02[$key1] FROM balance WHERE id = '1' ", $link);//баланс админа    
$r3 = mysql_fetch_array($s3);
$val05 = $r3['0'];     // баланс админа по второй валюте 
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств
    
$valitog1 = $val04 - $total;// отнимаем вторую валюту у покупателя
$valitog2 = $val03 + $amountbuy; // прибавляем первую валюту покупателю
$valitog3 = $totalminuscomm + $val02;// прибавляем вторую валюту продавцу
$valitog4 = $val01 - $amountbuy; // отнимаем первую валюту у продавца
$valitog5 = $val05 + $commostbuy + $combuy;// прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog1' WHERE login='$loginbuy'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog2' WHERE login='$loginbuy'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE balance SET $array02[$key1] = '$valitog5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog3' WHERE login='$user'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog4' WHERE login='$user'"); // отнимаем первую валюту у продавца 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$user','$array01[$key1].$array02[$key1]','sell','$commostbuy')", $link); // вписываем сделку продавца в баланс админа 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$loginbuy','$array01[$key1].$array02[$key1]','buy','$combuy')", $link); // вписываем сделку покупателя в баланс админа    
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств    

$amount = $amount - $amountbuy;    
    
// ищем Buy и записываем в $amountbuy
$sql3 = mysql_query("SELECT * FROM $pair WHERE price >= $lastpricebuy and action = 0 and type = 'buy' and user != '$user' ", $link);
$row3 = mysql_fetch_array($sql3); 
$idpair = $row3['id'];
$loginbuy = $row3['user'];	
$total = $row3['total'];
$totallbuy = $row3['totalallbuy'];
$priceuserbuy = $row3['price'];
$amountbuy = $row3['amount'];
$combuy = $row3['combuy'];
$feebuy = $row3['fee'];
$count++;
    
} 
      
if(!$idpair) { // если нет пары, то создаем висячий ордер и выходим из while
    
$totalost = $amount*$lastpricebuy;
$totalcomm = $totalost/100*$feesell;
$totalpluss = $totalost-$totalcomm;
$totalost = round($totalost,5, PHP_ROUND_HALF_DOWN);    
$totalcomm = round($totalcomm,5, PHP_ROUND_HALF_DOWN);    
$totalpluss = round($totalpluss,5, PHP_ROUND_HALF_DOWN);    

mysql_query("INSERT INTO $pair (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy)
VALUES ('$viewtimes','$user','$lastpricebuy','$amount','$totalpluss','sell','$feesell','0', '6', '$totalcomm', '$totalost')", $link);   

$close = 1;     
$step = 1; 
echo json_encode(2);    
}  
 
if($amount == $amountbuy and $idpair){

$comissia = $totallbuy/100*$feesell; // вычисляем комиссию продавца
$minuscom = $totallbuy - $comissia;  // отнимаем комиссию у продавца
$minuscom = round($minuscom,5, PHP_ROUND_HALF_DOWN);    
$comissia = round($comissia,5, PHP_ROUND_HALF_DOWN);    
    
mysql_query("UPDATE $pair SET time2='$viewtimes', action='1', amount2='$amount', total2='$minuscom', type2='sell', fee2='$feesell', user2='$user',  number2='15', comsell='$comissia', totalallsell='$totallbuy' WHERE id='$idpair'");    
$close = 1;  
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
$s1 = mysql_query("SELECT * FROM users WHERE login = '$user' ", $link);//баланс продавца    
$r1 = mysql_fetch_array($s1);
$val01 = $r1[$array01[$key1]]; // первая валюта
$val02 = $r1[$array02[$key1]]; // вторая валюта
    
$s2 = mysql_query("SELECT * FROM users WHERE login = '$loginbuy' ", $link);//баланс покупателя    
$r2 = mysql_fetch_array($s2);
$val03 = $r2[$array01[$key1]]; // первая валюта
$val04 = $r2[$array02[$key1]]; // вторая валюта 
 
$s3 = mysql_query("SELECT  $array02[$key1] FROM balance WHERE id = '1' ", $link);//баланс админа    
$r3 = mysql_fetch_array($s3);
$val05 = $r3['0']; // баланс админа по второй валюте    
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств
    
$valitog1 = $val04 - $total;// отнимаем вторую валюту у покупателя
$valitog2 = $val03 + $amount; // прибавляем первую валюту покупателю
$valitog3 = $minuscom + $val02;// прибавляем вторую валюту продавцу
$valitog4 = $val01 - $amount; // отнимаем первую валюту у продавца
$valitog5 = $val05 + $combuy + $comissia;// прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog1' WHERE login='$loginbuy'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog2' WHERE login='$loginbuy'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE balance SET $array02[$key1] = '$valitog5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog3' WHERE login='$user'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog4' WHERE login='$user'"); // отнимаем первую валюту у продавца 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$user','$array01[$key1].$array02[$key1]','sell','$comissia')", $link); // вписываем сделку продавца в баланс админа 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$loginbuy','$array01[$key1].$array02[$key1]','buy','$combuy')", $link); // вписываем сделку покупателя в баланс админа    
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств    
    
$close = 1;     
$step = 1;
echo json_encode(3);    
}    
    
if($amount < $amountbuy and $idpair){

$totalamount = $amount*$priceuserbuy;// вычисляем количество второй валюты       
$comamount = $totalamount/100*$feesell; //вычисляем комиссию на вторую валюту    
$totalminuscom = $totalamount - $comamount;//вычитаем комиссию из второй валюты    
$totalminuscom = round($totalminuscom,5, PHP_ROUND_HALF_DOWN);
$comissia = $totalamount/100*$feebuy; // вычисляем комиссию покупателя на частичный ордер    
$totalchast = $totalamount + $comissia; // прибавляем комиссию ко второй валюте частичного ордера покупателя     
$totalchast = round($totalchast,5, PHP_ROUND_HALF_DOWN);
$comissia = round($comissia,5, PHP_ROUND_HALF_DOWN);
$comamount = round($comamount,5, PHP_ROUND_HALF_DOWN);
    
$amountost = $amountbuy - $amount;//вычисляем остаток первой валюты
$totalost = $amountost*$priceuserbuy;//вычисляем количество второй валюты    
$comost = $totalost/100*$feebuy;//вычисляем комиссию на остаток    
$totallpluscom = $totalost + $comost;//прибавляем комиссию ко второй валюте
$totallpluscom = round($totallpluscom,5, PHP_ROUND_HALF_DOWN);    
$totalost = round($totalost,5, PHP_ROUND_HALF_DOWN);    
$comost = round($comost,5, PHP_ROUND_HALF_DOWN);    
    
mysql_query("UPDATE $pair SET time2='$viewtimes', action='1', amount2='$amount', total2='$totalminuscom', type2='sell', fee2='$feesell', user2='$user',  number2='16', comsell='$comamount', totalallsell='$totalamount' WHERE id='$idpair'"); 
    
mysql_query("INSERT INTO $pair (time, user, price, amount, total, type, fee, action, number1, combuy, totalallbuy)
VALUES ('$viewtimes','$loginbuy','$priceuserbuy','$amountost','$totallpluscom','buy','$feebuy','0', '4', '$comost', '$totalost')", $link);    
    
$close = 1;
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса
    
$s1 = mysql_query("SELECT * FROM users WHERE login = '$user' ", $link);//баланс продавца    
$r1 = mysql_fetch_array($s1);
$val01 = $r1[$array01[$key1]]; // первая валюта
$val02 = $r1[$array02[$key1]]; // вторая валюта
    
$s2 = mysql_query("SELECT * FROM users WHERE login = '$loginbuy' ", $link);//баланс покупателя    
$r2 = mysql_fetch_array($s2);
$val03 = $r2[$array01[$key1]]; // первая валюта
$val04 = $r2[$array02[$key1]]; // вторая валюта  
 
$s3 = mysql_query("SELECT  $array02[$key1] FROM balance WHERE id = '1' ", $link);//баланс админа    
$r3 = mysql_fetch_array($s3);
$val05 = $r3['0'];   // баланс админа по второй валюте   
    
/////////////////////////////////////////////////////////////////////////////////////////запрос баланса    

/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств
    
$valitog1 = $val04 - $totalchast;// отнимаем вторую валюту у покупателя
$valitog2 = $val03 + $amount; // прибавляем первую валюту покупателю
$valitog3 = $totalminuscom + $val02;// прибавляем вторую валюту продавцу
$valitog4 = $val01 - $amount; // отнимаем первую валюту у продавца
$valitog5 = $val05 + $comamount + $comissia;// прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog1' WHERE login='$loginbuy'"); // отнимаем вторую валюту у покупателя
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog2' WHERE login='$loginbuy'"); // прибавляем первую валюту покупателю
    
mysql_query("UPDATE balance SET $array02[$key1] = '$valitog5' WHERE id = '1'"); // прибавляем комиссию от покупателя и продавца к балансу админа
    
mysql_query("UPDATE users SET $array02[$key1] = '$valitog3' WHERE login='$user'"); // прибавляем вторую валюту продавцу
    
mysql_query("UPDATE users SET $array01[$key1] = '$valitog4' WHERE login='$user'"); // отнимаем первую валюту у продавца 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$user','$array01[$key1].$array02[$key1]','sell','$comamount')", $link); // вписываем сделку продавца в баланс админа 
    
mysql_query("INSERT INTO balance (time, user, pair, type, $array02[$key1])
VALUES ('$viewtimes','$loginbuy','$array01[$key1].$array02[$key1]','buy','$comissia')", $link); // вписываем сделку покупателя в баланс админа    
    
/////////////////////////////////////////////////////////////////////////////////////////секция распределения средств    
    
$close = 1;     
$step = 1;
echo json_encode(3);    
}         
}
while ($step == 0);         
}          
} 
else{
echo json_encode(1);   
}      
}
else{
echo json_encode(5);   
}
?>