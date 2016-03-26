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



<?php
$cryptinstall="captcha/captcha/cryptographp.fct.php";
include $cryptinstall; 
?>

				<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml">

				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					<title>Currency Exchange | Sign up</title>
					<meta name="robots" content="index, follow">
					<meta name="keywords" content="BTC, обмен BTC, биржа BTC, обменник BTC, Bitcoin, биткоин, обмен биткоин, биржа биткоин, обменник биткоин, покупка BTC, продажа BTC, покупка bitcoin, продажа bitcoin, биржа bitcoin, обменник bitcoin">
					<meta name="description" content="BTC-E">
					<meta charset="utf-8">
					<link rel="stylesheet" href="main.css" type="text/css">
					<link rel="icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
					<link rel="shortcut icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
					<script type='text/javascript' src='/js/jsreg.js'></script>
					<script type='text/javascript' src='/js/jslog.js'></script>



				</head>

				<body style="zoom: 1;">
					<div id="header">
						<div id="header-content">
							<div id="header-logo">
								<a href="https://btc-e.com/"><img id="logo" src="/images/1px.png" class="main-s main-s-logo" alt="logo"></a>
							</div>
							<div id="header-ticker">
								<div id="orders-stats">
									<div class="orderStats">Last Price: <strong>274.21 USD</strong></div>
									<div class="orderStats">Low: <strong>268.8569 USD</strong></div>
									<div class="orderStats">High: <strong>274.98 USD</strong></div>
									<div class="clear"></div>
									<div class="orderStats">Volume: <strong>5186 BTC / 1410385 USD</strong></div>
									<div class="orderStats">Server Time: <strong>24.10.15 16:48</strong></div>
									<div class="clear"></div>
								</div>
							</div>
							<? echo $noauth; ?>
								<? echo $a; ?>
									<div class="clear"></div>
									<div id="nav-container">
										<ul class="menu">
											<li><a href="./index.php">Trade</a></li>
											<li><a href="./news.php">News</a></li>
											<li><a href="faq.php">Terms & FAQ</a></li>
											<li><a href="feedback.php">Feedback</a></li>
											<li><a href="./support.php">Support</a></li>
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

						<div class='block' id="regok" style="display:none">
							<h1 class='tcenter'>You have successfully registered!</h1>
							<h1 style='margin-bottom: 10px' class='tcenter'>To confirm your account, please go to the link in your mail.</h1>
						</div>




						<div class="block" id="dis">
							<h1 class="tcenter">Sign up</h1>

							<div id="reg_error_list"></div>
							<form>
								<table style="width: 650px; margin: auto;" class="tabla">
									<tbody>
										<tr>
											<td colspan="2"><b>For the safety of your funds it is strongly recommended to use email with a two-factor authentication. For example <a href="https://gmail.com/">GMail</a>.</b></td>
										</tr>
										<tr>
											<td style="width: 150px;">E-mail:</td>
											<td style="width: 250px;">
												<input type="text" id="rEmail" name="reg_email" maxlength="64" class="reg_input" value="">
												<p style="color: red" id="p1">*</p>

											</td>
										</tr>
										<tr>
											<td style="width: 150px;">Repeat E-mail:</td>
											<td style="width: 250px;">
												<input type="text" id="rEmail2" name="reg_email2" maxlength="64" class="reg_input" value="">
												<p style="color: red" id="p2">*</p>

											</td>
										</tr>
										<tr>
											<td>Login:</td>
											<td>
												<input type="text" id="rLogin" name="reg_login" maxlength="16" class="reg_input" value="">
												<p style="color: red" id="p3">*</p>

											</td>
										</tr>
										<tr>
											<td colspan="2"><b>Please, do not use same password at mail account and BTC-e account. Using the same passwords are not safe.</b></td>
										</tr>
										<tr>
											<td>Password:</td>
											<td>
												<input type="password" id="rPass" name="reg_psw1" maxlength="64" class="reg_input" value="">
												<p style="color: red" id="p4">*</p>

											</td>
										</tr>
										<tr>
											<td>Repeat password:</td>
											<td>
												<input type="password" id="rPass2" name="reg_psw2" maxlength="64" class="reg_input" value="">
												<p style="color: red" id="p5">*</p>

											</td>
										</tr>
										<tr>
											<td colspan="2">
												<div style="margin-bottom: 10px;">
													<div align="left">
														<div align="left">
															<?php dsp_crypt(0,1); ?>
														</div>
														<input type="text" id="code" name="captcha_input" style="width: 155px" maxlength="5" class="textbox twi" placeholder="">
														<p style="color: red" id="p6">*</p>
														<br>
														<br>
														<br>

													</div>
													<input type="checkbox" id="reg_eula" name="reg_eula" style="float: left; margin-right: 10px;">
													<label id="reg_eula_label" style="float: left" for="reg_eula" style="margin-left: 10px;">I agree with <a href="https://btc-e.com/page/1" target="_blank">terms</a>.</label>
													<p style="color: red" id="p7">*</p>
													<div class="clear"></div>
												</div>

												<input type="button" class="button center" onclick="CheckFields()" value="Sign up" />

											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</div>
					<div id="footer">
						<div id="footer-content">
							<div style="width: 550px; float:left;">
								<p class="copyrights">Copyright © 2011-2015 BTC-e.com. All rights reserved.</p>
								<p class="copyrights">
									<a href="#">Support</a>
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