<?
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

session_start();
if (!isset($_SESSION['CocaPayOKPay'])) {    
$_SESSION['CocaPayOKPay'] = 0; 
}

include('../db.php');
$u = '00';
$maxday = date("Y-m-d $u:$u:$u",strtotime("+ 1 days"));
$minday = date("Y-m-d $u:$u:$u",strtotime("- 31 days"));

if($_SESSION['CocaPayOKPay'] == 1){
$dis2 = 'disabled="disabled"'; 
$ch1 = 'CocaPayOKPay';
$interval = '1 days';
$format = '%b %e';  
$mintime = $minday; 
$maxtime = $maxday;    
}
else {
$dis1 = 'disabled="disabled"';
$ch1 = 'ohlcordersCocaPayOKPay';
$interval = '1 hours';
$format = '%R';
$maxtime = date("Y-m-d H:$u:$u",strtotime("+ 0 hours"));
$mintime = date("Y-m-d H:$u:$u",strtotime("- 24 hours"));    
}


if (@$_REQUEST['hourly']) {
$_SESSION['CocaPayOKPay'] = 0;   
header("Location: cocapayokpay.php");

}

if (@$_REQUEST['daily']) {
$_SESSION['CocaPayOKPay'] = 1;   
header("Location: cocapayokpay.php");

}
?>

<?
$auth = <<< AUTH
<div id='header-profile' margin-top='5px'><div class='profile'>
<p id="user"><b>
AUTH;
?>

<?
$docum = <<< AUTHA
</b>
<a href='../messages.php'>msg (<span id='mes_count'>0</span>)</a>
| <a href='../profile.php#notifications' onclick='profile("notifications", 670818, 0)'>notif (<span id='not_count'>0</span>)</a></p>
<a href='../profile.php'>Profile</a>
| <a href='../profile.php#funds' onclick='profile("funds", 670818, 0)'>Finances</a>
| <a href='../profile.php#edit/home' onclick='profile("edit/home", 670818, 0)'>Edit</a>
| <a href='../logout.php'>Logout</a>
<div style='margin-top: 5px; padding-top: 3px; border-top: 1px solid #b7b7b7;'>
<div style='width: 160px; height: 16px; margin-right: 10px; float: left; overflow:hidden;'>
<img src='../images/1px.png' class='main-s main-s-dollar_small' alt='dollar_small'/> <b class='money_usd'>0</b> USD
</div>
<div style='width: 160px; height: 16px; float: left; overflow:hidden;'>
<img src='../images/1px.png' class='main-s main-s-bitcoin_small' alt='bitcoin_small'/> <b class='money_OKPay'>0</b> OKPay
</div>
<div class='clear'></div>
</div>
</div></div>
AUTHA;
?>

<?
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if (isset($_SESSION['user'])) {

$us = $_SESSION['user'];
$a = $auth.$us.$docum;

}else {
$noauth = <<< AUTHA
<div id="header-profile"><div id="PoW_working" style="background: black; width: 350px; height:80px; position: absolute; display: none;" class="inblock"></div><div style="margin: auto; text-align: right; padding-top: 2px;"><div id="login_con">
<input class="textbox" type="text" id="email" name="email" style="margin-bottom: 2px; width: 170px;" placeholder="E-Mail">
<input class="textbox" type="password" id="password" name="password" style="margin-bottom: 2px; width: 170px;" placeholder="Password">
<p><a href="javascript:void(0)" onclick="tryLogin()">Login</a>&nbsp;|&nbsp;<a href="../signup.php">Sign up</a>&nbsp;|&nbsp;<a href="../lostpassword.php">Lost password</a></p></div><div id="otp_con" style="display:none; padding: 0 5px 0 5px"><form id="otp_form" onsubmit="return tryLogin()"  method="post" style="margin-bottom:4px;"><p>Enter one-time password:</p><input id="login-otp" class="textbox" type="text" style="margin-bottom: 2px; width: 120px;" value="-" maxlength="6"><input type="submit" class="hiddenSubmit"><a href="javascript:void(0)" style="margin-left:5px" onclick="tryLogin()" >Login</a><p style="margin: 3px 0 0 0"></p></form></div></div></div>
AUTHA;

}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>CocaPay/OKPay</title>
<meta name="robots" content="index, follow">
<meta name="keywords" content="">
<meta name="description" content="">
<meta charset="utf-8">
<link rel="stylesheet" href="../main.css" type="text/css">
<link class="include" rel="stylesheet" type="text/css" href="../jquery.jqplot.min.css" />
<script class="common" type="text/javascript" src="../jquery.js"></script>
<script class="common" src='../loadingoverlay.js' type="text/javascript"></script>
<script type='text/javascript' src='jslog.js'></script>
<script src="../realorders/real17.js"></script>

<script src="../adminka/ohlc/CocaPayMonero.js"></script>
<script src="../adminka/ohlc/CocaPayOKPay.js"></script>
<script src="../adminka/ohlc/CocaPayPayeer.js"></script>
<script src="../adminka/ohlc/CocaPayPayza.js"></script>
<script src="../adminka/ohlc/CocaPayPerfectMoney.js"></script>
<script src="../adminka/ohlc/CocaPaySkrill.js"></script>
<script src="../adminka/ohlc/OKPayPayeer.js"></script>
<script src="../adminka/ohlc/PayzaMonero.js"></script>
<script src="../adminka/ohlc/PayzaOKPay.js"></script>
<script src="../adminka/ohlc/PayzaPayeer.js"></script>
<script src="../adminka/ohlc/PerfectMoneyMonero.js"></script>
<script src="../adminka/ohlc/PerfectMoneyOKPay.js"></script>
<script src="../adminka/ohlc/PerfectMoneyPayeer.js"></script>
<script src="../adminka/ohlc/PerfectMoneyPayza.js"></script>
<script src="../adminka/ohlc/SkrillMonero.js"></script>
<script src="../adminka/ohlc/SkrillOKPay.js"></script>
<script src="../adminka/ohlc/SkrillPayeer.js"></script>
<script src="../adminka/ohlc/SkrillPayza.js"></script>
<script src="../adminka/ohlc/SkrillPerfectMoney.js"></script>

<script src="../cron/ordersCocaPayMonero.js"></script>
<script src="../cron/ordersCocaPayOKPay.js"></script>
<script src="../cron/ordersCocaPayPayeer.js"></script>
<script src="../cron/ordersCocaPayPayza.js"></script>
<script src="../cron/ordersCocaPayPerfectMoney.js"></script>
<script src="../cron/ordersCocaPaySkrill.js"></script>
<script src="../cron/ordersOKPayPayeer.js"></script>
<script src="../cron/ordersPayzaMonero.js"></script>
<script src="../cron/ordersPayzaOKPay.js"></script>
<script src="../cron/ordersPayzaPayeer.js"></script>
<script src="../cron/ordersPerfectMoneyMonero.js"></script>
<script src="../cron/ordersPerfectMoneyOKPay.js"></script>
<script src="../cron/ordersPerfectMoneyPayeer.js"></script>
<script src="../cron/ordersPerfectMoneyPayza.js"></script>
<script src="../cron/ordersSkrillMonero.js"></script>
<script src="../cron/ordersSkrillOKPay.js"></script>
<script src="../cron/ordersSkrillPayeer.js"></script>
<script src="../cron/ordersSkrillPayza.js"></script>
<script src="../cron/ordersSkrillPerfectMoney.js"></script>
</head>

<body>
<?  
include('../charts/js17.php');
?>
<div id="noticebuy" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">You really want to create the order?</h1>
<div style="float:left; margin-left: 20px; width: 220px;"><a href="javascript:void(0)" id="b17" onclick="buy(this.id)" class="button center">Yes</a></div>
<div style="float:left;"><a href="javascript:void(0)" onclick="closemodalbuy()" class="button center">Close</a></div>
</div>

<div id="noticesell" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">You really want to create the order?</h1>
<div style="float:left; margin-left: 20px; width: 220px;"><a href="javascript:void(0)" id="s17" onclick="sell(this.id)" class="button center">Yes</a></div>
<div style="float:left;"><a href="javascript:void(0)" onclick="closemodalsell()" class="button center">Close</a></div>
</div>

<div id="answer1" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">You don't have enough funds to create an order</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="answer2" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">This order has been completed partially</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="answer3" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">This order has been completed successfully</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="answer4" class="npop block" style="width: 430px; height: 100px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">There are no buy orders with requested rate at the moment, your order has been created and put in the waiting list</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="answer6" class="npop block" style="width: 430px; height: 100px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">There are no sell orders with requested rate at the moment, your order has been created and put in the waiting list</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="answer5" class="npop block" style="width: 430px; height: 70px; margin-top: -35px; margin-left: -215px; display: none;">
<h1 style="color: #c92d2d; margin: 10px;" class="tcenter">To perform this operation, authorization is required</h1><a href="javascript:void(0)" onclick="closemodal1()" class="button center">Close</a></div>

<div id="back"></div>


<div id="header">
<div id="header-content">
<div id="header-logo">

</div>
<div id="header-ticker">
<div id="orders-stats">
<div class="orderStats">Last Price: <strong>19400 CocaPay</strong></div>
<div class="orderStats">Low: <strong>18592.0488 CocaPay</strong></div>
<div class="orderStats">High: <strong>19473.3593 CocaPay</strong></div>
<div class="clear"></div>
<div class="orderStats">Volume: <strong>413 OKPay / 7823022 CocaPay</strong></div>
<div class="orderStats">Server Time: <strong>29.10.15 18:39</strong></div>
<div class="clear"></div>
</div>
</div>
<? echo $noauth; ?>
<? echo $a; ?>
<div class="clear"></div>
<div id="nav-container">
<ul class="menu">
<li><span class="menuhover main-s main-s-navhover_bg">Trade</span></li>
<li><a href="../news.php">News</a></li>
<li><a href="../faq.php">Terms & FAQ</a></li>
<li><a href="../feedback.php">Feedback</a></li>
<li><a href="../support.php">Support</a></li>
</ul>
<!-- <div style="float: right; padding-right: 10px;">
<a href="https://OKPay-e.com/setlocale/en"><img src="/images/1px.png" class="main-s main-s-en" alt="en"></a>
<a href="https://OKPay-e.com/setlocale/ru"><img src="/images/1px.png" class="main-s main-s-ru" alt="ru"></a>
<a href="https://OKPay-e.com/setlocale/cn"><img src="/images/1px.png" class="main-s main-s-cn" alt="cn"></a>
</div> -->
</div>
</div>
</div>
<div id="content">
<div style="width: 1000px; float: left;">
<div class="block" style="width: 483px; float: left;">
<h3>News:</h3>
<table class="tabla" style="width: 100%;">
<tbody>
<? include('../newsdata/viewnews.php');?>
</tbody>
</table>
</div>

<div class="block" style="width: 483px;">
<h3>Feedbacks:</h3>
<table class="tabla" style="width: 100%;">
<tbody>
<? include('../feedbackdata/viewfeedback.php');?>
</tbody>
</table>
</div>
<div class="block">
<input id="token" value="" type="hidden">
<ul class="pairs">
<li><a href="/index.php">Skrill/PerfectMoney<span style="display:block">0.364</span></a></li>
<li><a href="/exchange/skrillpayza.php">Skrill/Payza<span style="display:block">0.364</span></a></li>
<li><a href="/exchange/skrillokpay.php">Skrill/OKPay<span style="display:block">0.364</span></a></li>
<li><a href="/exchange/skrillpayeer.php">Skrill/Payeer<span style="display:block">0.00118</span></a></li>
<li><a href="/exchange/skrillmonero.php">Skrill/Monero<span style="display:block">0.00118</span></a></li>
<li><a href="/exchange/cocapayskrill.php">CocaPay/Skrill<span style="display:block">3.009269</span></a></li>
<li><a href="/exchange/perfectmoneypayza.php">PerfectMoney/Payza<span style="display:block">0.861</span></a></li>
<li><a href="/exchange/perfectmoneyokpay.php">PerfectMoney/OKPay<span style="display:block">62.95501</span></a></li>
<li><a href="/exchange/perfectmoneypayeer.php">PerfectMoney/Payeer<span style="display:block">0.00283</span></a></li>
<li><a href="/exchange/perfectmoneymonero.php">PerfectMoney/Monero<span style="display:block">0.00283</span></a></li>
<li><a href="/exchange/cocapayperfectmoney.php">CocaPay/PerfectMoney<span style="display:block">19400</span></a></li>
<li><a href="/exchange/payzaokpay.php">Payza/OKPay<span style="display:block">0.00115</span></a></li>
<li><a href="/exchange/payzapayeer.php">Payza/Payeer<span style="display:block">190.90299</span></a></li>
<li><a href="/exchange/payzamonero.php">Payza/Monero<span style="display:block">190.90299</span></a></li>
<li><a href="/exchange/cocapaypayza.php">CocaPay/Payza<span style="display:block">0.00977</span></a></li>
<li><a href="/exchange/okpaypayeer.php">OKPay/Payeer<span style="display:block">19400</span></a></li>
<li class="pairs-selected">CocaPay/OKPay<span style="display:block">0.364</span></li>
<li><a href="/exchange/cocapaypayeer.php">CocaPay/Payeer<span style="display:block">0.00977</span></a></li>
<li><a href="/exchange/cocapaymonero.php">CocaPay/Monero<span style="display:block">307.856</span></a></li>
<div class="clear"></div>
</ul>
<div dir="ltr" style=" width: 993px; height: 200px;">


<div style="width:920px; height:20px; text-align: center; margin: 10px 0 0 30px; ">
<h1 id="n0">CocaPay/OKPay</h1></div>
<form action="cocapayokpay.php" method="post">

<input type="submit" <?echo $dis1;?> class="buttoncharts" value="Hourly" name="hourly">
<input type="submit" <?echo $dis2;?> class="buttoncharts2" value="Daily" name="daily">

</form>

<div id="bas">
<div id="ch1" style="margin-left: 20px; height:340px; width:920px; "></div>
</div>

<div style="width:1200px; height:10px; text-align: center; margin-top: 20px; ">

<div style="width:483px; height:10px;float:left;  text-align: center;">
<h1 id="n1"><a href="<?echo $key5;?>"><?echo $arr2[0];?></a></h1></div>
<div style="width:483px; height:10px;float:left;  text-align: center;">
<h1 id="n2"><a href="<?echo $key6;?>"><?echo $arr2[1];?></a></h1></div>
</div>

<div id="one" onclick="block(this.id)" style="text-align: center; margin-left: 20px; height:220px; width:483px; float:left; opacity:1;">

<div id="ch2" style="  height:220px; width:443px; "></div>
</div>

<div id="two" onclick="block(this.id)" style="text-align: center; height:220px; width:483px; float:left;  opacity:1;">

<div id="ch3" style="  height:220px; width:443px; "></div>
</div>

<div id="n2" style="width:1200px; height:10px; margin-top: 20px; float:left; text-align: center;  ">

<div style="width:483px; height:10px;float:left;  text-align: center;">
<h1 id="n3"><a href="<?echo $key7;?>"><?echo $arr2[2];?></a></h1></div>
<div style="width:483px; height:10px;float:left;  text-align: center;">
<h1 id="n4"><a href="<?echo $key8;?>"><?echo $arr2[3];?></a></h1></div>
</div>

<div id="three" onclick="block(this.id)" style="text-align: center; margin: 0 0 0 20px; height:280px; width:483px; float:left; opacity:1;">

<div id="ch4" style="  height:220px; width:443px;"></div>
</div>

<div id="four" onclick="block(this.id)" style="text-align: center; height:280px; width:483px; float:left; opacity:1;">

<div id="ch5" style=" height:220px; width:443px; "></div>
</div>


</div>
<div class="inblock" style="width: 470px; float: left;">
<h1>Buy CocaPay</h1>
<input id="pair" value="17" type="hidden">
<div class="inblock order_header">
<div style="width: 130px; float: left;">Your balance:
<p><a href="javascript:void(0)" onclick="a_calc(17)"><b><span id="cur1" class="money_OKPay">0</span><input id="cur1_full" value="0" type="hidden"> OKPay</b></a></p>
</div>
<div style="width: 130px; float: right;">Lowest ask Price
<p><b><span id="min_price">0</span> OKPay</b></p>
</div>
<div class="clear"></div>
</div>
<table class="inblock tabla2" style="width: 100%;">
<tbody>
<tr>
<td style="width: 150px;">Amount CocaPay:</td>
<td style="width: 153px;">
<input id="b_Skrill" style="width: 110px;" maxlength="25" value="0" onkeyup="sendbuy(this.value)" type="text">
</td>
</tr>
<tr class="price-row">
<td>Price per CocaPay:</td>
<td>
<input id="b_price" style="width: 110px;" maxlength="10" value="0"  type="text"> OKPay</td>
</tr>
<tr>
<td>Total:</td>
<td><b id="b_all">0</b> <b>OKPay</b></td>
</tr>
<tr>
<td>Fee:</td>
<td><b id="b_fee">0</b> <b>OKPay</b></td>
</tr>

<tr>
<td colspan="2">

<div id="b_loading" class="order_calc_load"></div>
<a href="javascript:void(0)" onclick="noticebuy()" class="button" style="float: right;">Buy CocaPay</a>
<div id="b_error" class="order_error main-s main-s-trade_error"></div>
<div class="clear"></div>
</td>
</tr>
</tbody>
</table>
<div class="inblock"><img class="orders-loading" alt="loading">
<h3>Sell orders</h3>
<div id="orders-s-list">
<p class="gray" style="text-align: right;">Total: 302.44 CocaPay</p>
<div id="orders_1" style="overflow-y: auto; overflow-x: hidden; max-height: 485px;">
<table class="table" style="width: 99%">
<tbody>
<tr>
<th width="33%">price</th>
<th width="33%">CocaPay</th>
<th width="33%">OKPay</th>
</tr>
<?                       
mysql_query("CREATE TABLE zzz
( `id` int(100) NOT NULL AUTO_INCREMENT,
`time` datetime NOT NULL,
`price` float(32) NOT NULL,
`amount` float(32) NOT NULL,
`total` float(32) NOT NULL,
PRIMARY KEY (`id`))", $link);

$date = date("Y-m-d H:i:s");                                                 
$red = mysql_query("SELECT * FROM ordersCocaPayOKPay WHERE action='0' AND type='sell' AND time < '$date'");
while ($row = mysql_fetch_array($red)){  
$time = $row['time'];
$price = $row['price'];
$amount = $row['amount'];
$total = $row['totalallbuy'];   
mysql_query("INSERT INTO zzz (time, price, amount, total) VALUES ('$time','$price','$amount','$total')", $link);	        
}   

$red = mysql_query("SELECT * FROM realCocaPayOKPay WHERE action='0' AND type='sell' ");
while ($row = mysql_fetch_array($red)){  
$time = $row['time'];
$price = $row['price'];
$amount = $row['amount'];
$total = $row['totalallbuy'];   
mysql_query("INSERT INTO zzz (time, price, amount, total) VALUES ('$time','$price','$amount','$total')", $link);	        
} 

$count = 0;                                                            
$red = mysql_query("SELECT * FROM zzz  ORDER BY price ASC");
while ($row = mysql_fetch_array($red)){  
$price = $row['price'];
$amount = $row['amount'];
$total = $row['total'];

$count++;
$countid = 'bb'.$count;    

$b = <<< AEM
<tr class="order" style="color:#606060">
<td id="$countid">$price</td>
<td>$amount</td>
<td>$total</td>
</tr>  
AEM;
echo $b;       
}
mysql_query("DROP TABLE zzz ", $link);  
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="inblock" style="width: 470px; float: right;">
<h1>Sell CocaPay</h1>
<input id="pair" value="17" type="hidden">
<div class="inblock order_header">
<div style="width: 130px; float: left;">Your balance:
<p><a href="javascript:void(0)" onclick='all_money("cur2_full", "s_CocaPay")'><b><span id="cur2" class="money_CocaPay">0</span><input id="cur2_full" value="0" type="hidden"> CocaPay</b></a></p>
</div>
<div style="width: 130px; float: right;">Highest Bid Price
<p><b><span id="max_price">0</span> OKPay</b></p>
</div>
<div class="clear"></div>
</div>
<table class="inblock tabla2" style="width: 100%;">
<tbody>
<tr>
<td style="width: 150px;">Amount CocaPay:</td>
<td style="width: 153px;">
<input id="s_Skrill" style="width: 110px;" maxlength="25" value="0" onkeyup="sendsell(this.value)" type="text">
</td>
</tr>
<tr class="price-row">
<td>Price per CocaPay:</td>
<td>
<input id="s_price" style="width: 110px;" maxlength="10" value="0"  type="text"> OKPay</td>
</tr>
<tr>
<td>Total:</td>
<td><b id="s_all">0</b> <b>OKPay</b></td>
</tr>
<tr>
<td>Fee:</td>
<td><b id="s_fee">0</b> <b>OKPay</b></td>
</tr>

<tr>
<td colspan="2">

<div id="s_loading" class="order_calc_load"></div>
<a href="javascript:void(0)" onclick="noticesell()" class="button" style="float: right;">Sell CocaPay</a>
<div id="s_error" class="order_error main-s main-s-trade_error"></div>
<div class="clear"></div>
</td>
</tr>
</tbody>
</table>
<div class="inblock"><img class="orders-loading" alt="loading">
<h3>Buy orders</h3>
<div id="orders-b-list">
<p class="gray" style="text-align: right;">Total: 7610543.56 OKPay</p>
<div id="orders_2" style="overflow-y: auto; overflow-x: hidden; max-height: 485px;">
<table class="table" style="width: 99%">
<tbody>
<tr>
<th width="33%">price</th>
<th width="33%">CocaPay</th>
<th width="33%">OKPay</th>
</tr>
<?                                                                               
mysql_query("CREATE TABLE zzz
( `id` int(100) NOT NULL AUTO_INCREMENT,
`time` datetime NOT NULL,
`price` float(32) NOT NULL,
`amount` float(32) NOT NULL,
`total` float(32) NOT NULL,
PRIMARY KEY (`id`))", $link);

$date = date("Y-m-d H:i:s");                                                 
$red = mysql_query("SELECT * FROM ordersCocaPayOKPay WHERE action='0' AND type='buy' AND time < '$date'");
while ($row = mysql_fetch_array($red)){  
$time = $row['time'];
$price = $row['price'];
$amount = $row['amount'];
$total = $row['totalallbuy'];   
mysql_query("INSERT INTO zzz (time, price, amount, total) VALUES ('$time','$price','$amount','$total')", $link);	        
}   

$red = mysql_query("SELECT * FROM realCocaPayOKPay WHERE action='0' AND type='buy' ");
while ($row = mysql_fetch_array($red)){  
$time = $row['time'];
$price = $row['price'];
$amount = $row['amount'];
$total = $row['totalallbuy'];   
mysql_query("INSERT INTO zzz (time, price, amount, total) VALUES ('$time','$price','$amount','$total')", $link);	        
} 
$count1 = 0;
$red = mysql_query("SELECT * FROM zzz  ORDER BY price DESC");
while ($row = mysql_fetch_array($red)){  
$time = $row['time'];
$price = $row['price'];
$amount = $row['amount'];
$total = $row['total'];

$count1++;
$countid1 = 'ss'.$count1;    

$c = <<< AEM
<tr class="order" style="color:#606060">
<td id="$countid1">$price</td>
<td>$amount</td>
<td>$total</td>
</tr>  
AEM;
echo $c;        
}
mysql_query("DROP TABLE zzz ", $link);                           
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="clear"></div>
<div class="inblock">
<h3>Your current active orders</h3>
<div id="orders-self-list">
<table class="table" style="width: 100%">
<tbody>
<tr>
<th style="width:30px">Type</th>
<th style="width:110px">Price</th>
<th style="width:110px">Amount Skrill</th>
<th style="width:110px">Total PerfectMoney</th>
<th style="width:110px">Date</th>
<th style="width:80px">Action</th>
</tr>
<?
if (isset($_SESSION['user'])) {
$price = NULL;   
$user = $_SESSION['user'];
$date = date("Y-m-d H:i:s");                                                 
$red = mysql_query("SELECT * FROM realCocaPayOKPay WHERE action='0' AND user='$user' AND time < '$date' ORDER BY time DESC");
while ($row = mysql_fetch_array($red)){  
$price = $row['price'];
$amount = $row['amount'];
$total = $row['total'];
$type = $row['type'];
$date = $row['time'];
$action = 'active';    

if ($type == 'buy'){
$color = 'green';    
}
else{
$color = 'red';    
}    

$d = <<< OEV
<tr>
<td><b style="color:$color">$type</b></td>
<td>$price</td>
<td>$amount</td>
<td>$total</td>
<td>$date</td>
<td>$action</td>
</tr>  
OEV;
echo $d;   
}   

if($price == NULL){
$nodate = <<< KKL
<tr>
<td colspan="6">No active orders at the moment.</td>
</tr>
KKL;
echo $nodate;    
}    

}else {
$noorders = <<< UYT
<tr>
<td colspan="6">No active orders at the moment.</td>
</tr>
UYT;

echo $noorders;    
}                                                      

?>
</tbody>
</table>
</div>
</div>

<p class="gray inblock" style="text-align:right;">At the moment, the fee for transactions is 0.2%.</p>
<div class="inblock">
<h3>Trade history:</h3>
<div id="trade_history" style="overflow:auto; max-height: 500px;">
<table class="table" style="width: 100%">
<tbody>
<tr>
<th width="20%">Date</th>
<th width="15%">Type</th>
<th width="20%">Price</th>
<th width="20%">Amount (CocaPay)</th>
<th width="25%">Total (OKPay)</th>
</tr>
<?
mysql_query("CREATE TABLE zzz
( `id` int(100) NOT NULL AUTO_INCREMENT,
`time2` datetime NOT NULL,
`type2` varchar(32) NOT NULL,
`price2` float(32) NOT NULL,
`amount2` float(32) NOT NULL,
`total2` float(32) NOT NULL,
PRIMARY KEY (`id`))", $link);                                                    

$date = date("Y-m-d H:i:s");                                                 
$red = mysql_query("SELECT * FROM ordersCocaPayOKPay WHERE action='1' AND time2 <= '$date' ORDER BY time2 DESC");
while ($row = mysql_fetch_array($red)){  
$time2 = $row['time2'];
$type2 = $row['type2'];
$price2 = $row['price'];
$amount2 = $row['amount2'];
$total2 = $row['total2'];
mysql_query("INSERT INTO zzz (time2, price2, amount2, total2, type2) VALUES ('$time2','$price2','$amount2','$total2','$type2')", $link);    
}   

$red = mysql_query("SELECT * FROM realCocaPayOKPay WHERE action='1'");
while ($row = mysql_fetch_array($red)){  
$time2 = $row['time2'];
$type2 = $row['type2'];
$price2 = $row['price'];
$amount2 = $row['amount2'];
$total2 = $row['total2'];
mysql_query("INSERT INTO zzz (time2, price2, amount2, total2, type2) VALUES ('$time2','$price2','$amount2','$total2','$type2')", $link);    
} 
$red = mysql_query("SELECT * FROM zzz  ORDER BY time2 DESC");
while ($row = mysql_fetch_array($red)){  
$time2 = $row['time2'];
$type2 = $row['type2'];
$price2 = $row['price2'];
$amount2 = $row['amount2'];
$total2 = $row['total2'];                                                    
if ($type2 == 'buy'){
$color = 'green';    
}
else{
$color = 'red';    
}    

$a = <<< OEM
<tr>
<td><span title="xxx">$time2</span></td>
<td><b style="color:$color">$type2</b></td>
<td>$price2 </td>
<td>$amount2 </td>
<td>$total2<span style="color:#868686"></span></td>
</tr>  
OEM;
echo $a;    
}
mysql_query("DROP TABLE zzz ", $link);                                                    
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="clear"></div>
</div>
<div id="footer">
<div id="footer-content">
<div style="width: 550px; float:left;">
<p class="copyrights">Copyright © 2011-2015 OKPay-e.com. All rights reserved.</p>
<p class="copyrights">
<a href="https://OKPay-e.com/api/3/docs">Public API</a> |
<a href="https://OKPay-e.com/tapi/docs">Trade API</a> |
<a href="../support.php">Support</a>
</p>
</div>
<div style="width: 450px; float:left; text-align: right;"></div>
<div class="clear"></div>
</div>
</div>

<script type="text/javascript">

var feesell = <? echo $feesell; ?>;
var feebuy = <? echo $feebuy; ?>;   

if(document.getElementById('bb1')){
var idcountbuy = document.getElementById('bb1').innerHTML; 
document.getElementById('min_price').innerHTML = (idcountbuy);
document.getElementById('b_price').value = (idcountbuy);   
}


if(document.getElementById('ss1')){
var idcountsell = document.getElementById('ss1').innerHTML;     
document.getElementById('s_price').value = (idcountsell);
document.getElementById('max_price').innerHTML = (idcountsell);    
}


function sendbuy(){

var amountbuy = document.getElementById('b_Skrill').value;
var pricebuy = document.getElementById('b_price').value;  

if(pricebuy > 0 && amountbuy > 0){

var itogtotallbuy = amountbuy*pricebuy;
var itogcom = itogtotallbuy / 100 * feebuy;
var itogpluscom = itogtotallbuy + itogcom;    
itogcom = itogcom.toFixed(5); 
itogpluscom = itogpluscom.toFixed(5);
document.getElementById('b_all').innerHTML = (itogpluscom);
document.getElementById('b_fee').innerHTML = (itogcom);    

}
}

function sendsell(){
var amountsell = document.getElementById('s_Skrill').value;
var pricesell = document.getElementById('s_price').value;

if(amountsell > 0 && pricesell > 0){

var itogtotallsell = amountsell*pricesell;
var itogcom = itogtotallsell / 100 * feesell;
var itogpluscom = itogtotallsell - itogcom;    
itogcom = itogcom.toFixed(5); 
itogpluscom = itogpluscom.toFixed(5);
document.getElementById('s_all').innerHTML = (itogpluscom);
document.getElementById('s_fee').innerHTML = (itogcom);    
}
}

</script>

<script class="include" type="text/javascript" src="../jquery.jqplot.min.js"></script>
<script class="include" type="text/javascript" src="../plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="../plugins/jqplot.canvasAxisTickRenderer.js"></script>
<script class="include" type="text/javascript" src="../plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="../plugins/jqplot.ohlcRenderer.min.js"></script>
<script class="include" type="text/javascript" src="../plugins/jqplot.highlighter.min.js"></script>
<script class="include" type="text/javascript" src="../plugins/jqplot.cursor.min.js"></script>
</body>

</html>