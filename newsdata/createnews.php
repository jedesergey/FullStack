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
| <a href='../profile.php#edit' onclick='profile("edit/home", 670818, 0)'>Edit</a>
| <a href='../logout.php'>Logout</a>
<div style='margin-top: 5px; padding-top: 3px; border-top: 1px solid #b7b7b7;'>
<div style='width: 160px; height: 16px; margin-right: 10px; float: left; overflow:hidden;'>
<img src='../images/1px.png' class='main-s main-s-dollar_small' alt='dollar_small'/> <b class='money_usd'>0</b> USD
</div>
<div style='width: 160px; height: 16px; float: left; overflow:hidden;'>
<img src='../images/1px.png' class='main-s main-s-bitcoin_small' alt='bitcoin_small'/> <b class='money_btc'>0</b> BTC
</div>
<div class='clear'></div>
</div>
</div></div>
AUTHA;
?>

		<?
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
if (isset($_SESSION['user'])) {
   
  $us = $_SESSION['user'];
  $a = $auth.$us.$docum;
   
}else {
   $noauth = <<< AUTHA
  <div id="header-profile"><div id="PoW_working" style="background: black; width: 350px; height:80px; position: absolute; display: none;" class="inblock"></div><div style="margin: auto; text-align: right; padding-top: 2px;"><div id="login_con">
        <input class="textbox" type="text" id="email" name="email" style="margin-bottom: 2px; width: 170px;" placeholder="E-Mail">
        <input class="textbox" type="password" id="password" name="password" style="margin-bottom: 2px; width: 170px;" placeholder="Password">
    <p><a href="javascript:void(0)" onclick="tryLogin()">Login</a>&nbsp;|&nbsp;<a href="../signup.php">Sign up</a>&nbsp;|&nbsp;<a href="../lostpassword.php">Lost password</a></p></div><div id="otp_con" style="display:none; padding: 0 5px 0 5px"><form id="otp_form" onsubmit="return tryLogin()"   style="margin-bottom:4px;"><p>Enter one-time password:</p><input id="login-otp" class="textbox" type="text" style="margin-bottom: 2px; width: 120px;" value="-" maxlength="6"><input type="submit" class="hiddenSubmit"><a href="javascript:void(0)" style="margin-left:5px" onclick="tryLogin()" >Login</a><p style="margin: 3px 0 0 0"></p></form></div></div></div>
AUTHA;
   
}
?>

<?php
if (isset($_POST['title'])) {
	
$title     = $_POST['title'];	
$telo    = $_POST['text'];
include('../db.php');

$i=0;
$sql = mysql_query("SELECT * FROM newsdata ", $link);
while($row=mysql_fetch_assoc($sql)){
        $i++;
}
}

$pagenumber = $i + 1;
$data = date("Y-m-d H:i:s");
$data2 = date("Y-m-d");




mysql_query("INSERT INTO newsdata (title, data, telo, datashort) VALUES ('$title', '$data', '$telo', '$data2') ");


?>


<?
$info1= <<< FIRST
   <!DOCTYPE html>
			<html xmlns="http://www.w3.org/1999/xhtml">

			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
				<title>Currency Exchange | Terms &amp; Conditions</title>
				<meta name="robots" content="index, follow">
				<meta name="keywords" content="BTC, обмен BTC, биржа BTC, обменник BTC, Bitcoin, биткоин, обмен биткоин, биржа биткоин, обменник биткоин, покупка BTC, продажа BTC, покупка bitcoin, продажа bitcoin, биржа bitcoin, обменник bitcoin">
				<meta name="description" content="BTC-E">
				<meta charset="utf-8">
				<link rel="stylesheet" href="../main.css" type="text/css">
				<link rel="icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
				<link rel="shortcut icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
				<script type='text/javascript' src='../js/jslog.js'></script>
			</head>

			<body style="zoom: 1;">
				<div id="header">
					<div id="header-content">
						<div id="header-logo">
							<a href="https://btc-e.com/"><img id="logo" src="../images/1px.png" class="main-s main-s-logo" alt="logo"></a>
						</div>
						<div id="header-ticker">
							<div id="orders-stats">
								<div class="orderStats">Last Price: <strong>274.459 USD</strong></div>
								<div class="orderStats">Low: <strong>268.8569 USD</strong></div>
								<div class="orderStats">High: <strong>274.98 USD</strong></div>
								<div class="clear"></div>
								<div class="orderStats">Volume: <strong>5175 BTC / 1407422 USD</strong></div>
								<div class="orderStats">Server Time: <strong>24.10.15 17:05</strong></div>
								<div class="clear"></div>
							</div>
						</div>
FIRST;

?>
			
						
							

<?
   $info2 = <<< SECOND
   	<div class="clear"></div>
								<div id="nav-container">
									<ul class="menu">
										<li><a href="../index.php">Trade</a></li>
										<li><span class="menuhover main-s main-s-navhover_bg">News</span></li>
										<li><a href="../faq.php">Terms & FAQ</a></li>
										<li><a href="../feedback.php">Feedback</a></li>
										<li><a href="../support.php">Support</a></li>
									</ul>
									
						<!-- <div style="float: right; padding-right: 10px;">
										<a href="https://btc-e.com/setlocale/en"><img src="../images/1px.png" class="main-s main-s-en" alt="en"></a>
										<a href="https://btc-e.com/setlocale/ru"><img src="../images/1px.png" class="main-s main-s-ru" alt="ru"></a>
										<a href="https://btc-e.com/setlocale/cn"><img src="../images/1px.png" class="main-s main-s-cn" alt="cn"></a>
									</div> -->
								</div>
					</div>
				</div>
				<div id="content">
					<div style="width: 1000px;">
						<div class="block">
							<div>
<h1>
SECOND;

?>
							

<?
   $info3 = <<< INFO3
   </h1>
<p class="small" style="margin-bottom: 10px">
INFO3;

?>



<?
   $info4 = <<< INFO4
   from <a href='../profile.php' class='red' target='_blank'>admin</a></p>
INFO4;

?>






<?
   $info5 = <<< INFO5
   </div>
<a href="../news.php" style="float:right">all news</a>
<div class="clear"></div></div><div class='block'><h1 style="margin-bottom:10px">Comments:</h1><div class='pagenav'><div class='clear'></div></div>No comments<div class='pagenav'><div class='clear'></div></div></div>
</div>
						</div>
					</div>
				</div>
				<div id="footer">
					<div id="footer-content">
						<div style="width: 550px; float:left;">
							<p class="copyrights">Copyright © 2011-2015 BTC-e.com. All rights reserved.</p>
							<p class="copyrights">
								<a href="https://support.btc-e.com/">Support</a>
							</p>
						</div>
						<div style="width: 450px; float:left; text-align: right;"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div id="mainLoader"></div>
				<div id="loaderFade"></div>
				<div id="nPopupCon" class="npop block"></div>
				<div id="fade" onclick="npopHide()"></div>
				<div id="notif-containter"></div>
				
				<script type="text/javascript">
					var _gaq = _gaq || [];
					_gaq.push(['_setAccount', 'UA-25049930-1']);
					_gaq.push(['_trackPageview']);

					(function () {
						var ga = document.createElement('script');
						ga.type = 'text/javascript';
						ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(ga, s);
					})();
				</script>
			</body>
			</html>
INFO5;

?>

<?
$fullpage = $info1.$noauth.$a.$info2.$title.$info3.$data.$info4.$telo.$info5;
//путь и сам файл
$file=$pagenumber.".php";
//если файла нету... тогда
if( !file_exists($file)) {
$fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту), мы создаем файл
fwrite($fp, $fullpage);
fclose ($fp);
}


echo $fullpage;

?>
