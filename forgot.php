<?
if (isset($_GET['key'])) {
$key = $_GET['key'];
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
<a href='messages.php'>msg (<span id='mes_count'>0</span>)</a>
| <a href='profile.php#notifications' onclick='profile("notifications", 670818, 0)'>notif (<span id='not_count'>0</span>)</a></p>
<a href='profile.php'>Profile</a>
| <a href='profile.php#funds' onclick='profile("funds", 670818, 0)'>Finances</a>
| <a href='profile.php#edit/home' onclick='profile("edit/home", 670818, 0)'>Edit</a>
| <a href='logout.php'>Logout</a>
<div style='margin-top: 5px; padding-top: 3px; border-top: 1px solid #b7b7b7;'>
<div style='width: 160px; height: 16px; margin-right: 10px; float: left; overflow:hidden;'>
<img src='/images/1px.png' class='main-s main-s-dollar_small' alt='dollar_small'/> <b class='money_usd'>0</b> USD
</div>
<div style='width: 160px; height: 16px; float: left; overflow:hidden;'>
<img src='/images/1px.png' class='main-s main-s-bitcoin_small' alt='bitcoin_small'/> <b class='money_btc'>0</b> BTC
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
<p><a href="javascript:void(0)" onclick="tryLogin()">Login</a>&nbsp;|&nbsp;<a href="signup.php">Sign up</a>&nbsp;|&nbsp;<a href="lostpassword.php">Lost password</a></p></div><div id="otp_con" style="display:none; padding: 0 5px 0 5px"><form id="otp_form" onsubmit="return tryLogin()"   style="margin-bottom:4px;"><p>Enter one-time password:</p><input id="login-otp" class="textbox" type="text" style="margin-bottom: 2px; width: 120px;" value="-" maxlength="6"><input type="submit" class="hiddenSubmit"><a href="javascript:void(0)" style="margin-left:5px" onclick="tryLogin()" >Login</a><p style="margin: 3px 0 0 0"></p></form></div></div></div>
AUTHA;

}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Forgot password</title>
<meta name="robots" content="index, follow">
<meta name="keywords" content="BTC, обмен BTC, биржа BTC, обменник BTC, Bitcoin, биткоин, обмен биткоин, биржа биткоин, обменник биткоин, покупка BTC, продажа BTC, покупка bitcoin, продажа bitcoin, биржа bitcoin, обменник bitcoin">
<meta name="description" content="BTC-E">
<meta charset="utf-8">
<link rel="stylesheet" href="/main.css" type="text/css">
<link rel="icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
<script type='text/javascript' src='/js/jslog.js'></script>
<script type='text/javascript' src='/js/jsforgot.js'></script>

</head>

<body style="zoom: 1;">
<div id="header">
<div id="header-content">
<div id="header-logo">
<a href="https://btc-e.com/"><img id="logo" src="/images/1px.png" class="main-s main-s-logo" alt="logo"></a>
</div>
<div id="header-ticker">
<div id="orders-stats">
<div class="orderStats">Last Price: <strong>274.4 USD</strong></div>
<div class="orderStats">Low: <strong>268.8569 USD</strong></div>
<div class="orderStats">High: <strong>274.98 USD</strong></div>
<div class="clear"></div>
<div class="orderStats">Volume: <strong>5200 BTC / 1414266 USD</strong></div>
<div class="orderStats">Server Time: <strong>24.10.15 16:57</strong></div>
<div class="clear"></div>
</div>
</div>
<? echo $noauth; ?>
<? echo $a; ?>
<div class="clear"></div>
<div id="nav-container">
<ul class="menu">
<li><a href="/index.php">Trade</a></li>
<li><a href="/news.php">News</a></li>
<li><a href="faq.php">Terms & FAQ</a></li>
<li><a href="feedback.php">Feedback</a></li>
<li><a href="/support.php">Support</a></li>
</ul>
<!-- <div style="float: right; padding-right: 10px;">
<a href="https://btc-e.com/setlocale/en"><img src="/images/1px.png" class="main-s main-s-en" alt="en"></a>
<a href="https://btc-e.com/setlocale/ru"><img src="/images/1px.png" class="main-s main-s-ru" alt="ru"></a>
<a href="https://btc-e.com/setlocale/cn"><img src="/images/1px.png" class="main-s main-s-cn" alt="cn"></a>
</div> -->
</div>
</div>
</div>
<div id="content">

<div class='block' id="succrecovery" style="display:none">
<h1 class='tcenter'>Password was successfully changed. Now you can log in.</h1>

</div>

<div class='block' id='recovery'>
<h1 class='tcenter' style='margin-bottom: 10px;'>Password recovery</h1>
<form id='forgot' action='https://btc-e.com/forgot/23e6ff14f98cbd898d54ecce20e3fc3d4d1ad106a0d42b51754a937c2bb6bd51/' method='post' name='forgot'>
<table style='margin: auto; margin-bottom: 10px;' class='tabla'>
<tr>
<td style='width: 150px; text-align: center;'>
New password:
</td>
<td style='width: 150px; text-align: center;'>
<input class='reg_input' size='64' type='password' id='pass' style='width:175px' />
</td>
</tr>
<tr>
<td style='text-align: center;'>
Repeat Password:
</td>
<td style='text-align: center;'>
<input class='reg_input' size='64' type='password' id='pass2' style="width: 175px; float: left" />
</td>
</tr>
</table>
<input type="hidden" id="key" value="<? echo $key; ?> ">
<input type="button" class="button center" onclick="RecoveryPassword()" value="Ok" />
</form>
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
</body>
</html>