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
<title>Currency Exchange | Frequently Asked Questions</title>
<meta name="robots" content="index, follow">
<meta name="keywords" content="BTC, обмен BTC, биржа BTC, обменник BTC, Bitcoin, биткоин, обмен биткоин, биржа биткоин, обменник биткоин, покупка BTC, продажа BTC, покупка bitcoin, продажа bitcoin, биржа bitcoin, обменник bitcoin">
<meta name="description" content="BTC-E">
<meta charset="utf-8">
<link rel="stylesheet" href="/main.css" type="text/css">
<link rel="icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://btc-e.com/favicon.ico">
<script type='text/javascript' src='/js/jslog.js'></script>
<script type='text/javascript' src='JSlast/jquery1.js'></script>
<script type='text/javascript' src='JSlast/core11.min.js'></script>

</head>

<body style="zoom: 1;">
<div id="header">
<div id="header-content">
<div id="header-logo">
<a href="https://btc-e.com/"><img id="logo" src="/images/1px.png" class="main-s main-s-logo" alt="logo"></a>
</div>
<div id="header-ticker">
<div id="orders-stats">
<div class="orderStats">Last Price: <strong>274.2 USD</strong></div>
<div class="orderStats">Low: <strong>268.8569 USD</strong></div>
<div class="orderStats">High: <strong>274.98 USD</strong></div>
<div class="clear"></div>
<div class="orderStats">Volume: <strong>5168 BTC / 1405498 USD</strong></div>
<div class="orderStats">Server Time: <strong>24.10.15 17:07</strong></div>
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
<li><span class="menuhover main-s main-s-navhover_bg">Terms & FAQ</span></li>
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
<div class='block'>
<h1 style='margin-bottom: 10px;'>Terms & Conditions</h1>
<h3 style='margin: 10px 0 10px 0;'>Introduction</h1>
BTC-e provides an online tool that allows users to freely trade Bitcoins for a number of different currencies worldwide. The Terms of Use described here apply to all transactions and activities engaged by the users of this website, data gathered, private messeges, online chat between the users and support BTC-e.
<h3 style='margin: 10px 0 10px 0;'>Changes to Website</h1>
BTC-e will always attempt to keep its users informed of any changes to the website. However, BTC-e may terminate, change, suspend or discontinue any aspect of this website, including the availability of features of the site, at any time. BTC-e may also impose limits on certain features and services or restrict your access to part or the entire website without prior notice or liability.
<h3 style='margin: 10px 0 10px 0;'>Proprietary Rights</h1>
All contents of the BTC-e website, including, but not limited to, text, names, data, logos, buttons, icons, code, methods, techniques, models, graphics and the underlying software (the "Components"), are proprietary of BTC-e and are protected by the patent, copyright, trademark. Nothing contained in this website shall be used in any form unless expressly stated by BTC-e.
<h3 style='margin: 10px 0 10px 0;'>Privacy</h1>
BTC-e will not share, publish, or sell any user data contained in its databases. However, BTC-e may be requested at any time to share trade data including, but not restricted to, emails, user transactions, and trade data by government authorities. BTC-e will not deny such requests and cannot be held responsible for the leakage of information by third parties whether the action was performed intentionally or not.
We are prohibited from using multiple accounts.
<h3 style='margin: 10px 0 10px 0;'>Fees and Comissions</h1>
In order to pay for server space, bandwidth, programmers, designers, and other costs, BTC-e imposes a standard:
Fee – 0.2% - 0.5%.
fee on every transaction performed by all users of the website. This transaction may vary and may be different for each individual account.
<h3 style='margin: 10px 0 10px 0;'>Limitation of Liability</h1>
BTC-e does not provide advice for its users on trading techniques, models, algorithms or similar. Occasionally, BTC-e may publish best practices or recommendations publicly to all its users or privately to users expressly requesting assistance. Users of this website are responsible for the outcome of their actions with their account balances. Users are also responsible for protecting access information to the Website including, but not limited to, user names, passwords, and bank account details. BTC-e is not responsible for the outcome, whether positive or negative, of any action performed by any of its users within or related to the Website. Some withdraw methods require BTC-e to use personal details of the user including, but not limited to, name, address, email, phone number, and bank account number for which BTC-e has the capability to send and receive encrypted emails. The usage of encryption is left entirely at the discretion of the user.
<h3 style='margin: 10px 0 10px 0;'>BTC-e Terms of Use</h1>
By opening an account at BTC-e you agree to the Terms of Use stated in this page. BTC-e reserves the right, at its discretion, to add, remove, or modify portions of these Terms of Agreement at any time. Your continued use of BTC-e following the implementation of changes to these Terms of Agreement implies that you accept such changes.
<br/>
Please note the funds will be on hold untill the identity is verified.
<br/>
We don't accept any more international wire transfers from US Citizens or from US Bank
<br/>
As of 11.28.2014 we will not accept any claims about account hacking or fraudulent activities in your account carried out by third parties if Google 2-Factor authentication is not enabled.
<br/>
Claims about third party fraudulent activities on accounts with disabled 2FA will not be taken into consideration.
<br/>
BTC-e codes are non-refundable in case of exchange through third party services or users. The user assumes all risks associated with the exchange of BTC-e codes with third parties.
<br/>
If your account has been inactive for 2 calendar years, its status will be changed to “locked”.
Please contact Support to unlock your account https://support.btc-e.com/
<br/>
All newly registered users can't withdraw money from an account within 3 working days.
<h3 style='margin: 10px 0 10px 0;'>Identity verification</h1>
Required in case you choose to load your account by wire transfer. To comply with AML/CTF recommendations, we require our clients to verify identity by providing scanned copy of ID and scanned copy of utility bill or a bank statement which should not be older then 6 month. Copy should be in good resolution and colored.
<h3 style='margin: 10px 0 10px 0;'>Jurisdiction</h1>
Laws in the country where the user resides may not allow the usage of an online tool with the characteristics of BTC-e or any of its features. BTC-e does not encourage the violation of any laws and cannot be held responsible for violation of such laws. For all legal purposes, these Terms of Use shall be governed by the laws applicable in the Cyprus. You agree and hereby submit to the exclusive personal jurisdiction and venue of the Cyprus for the resolution of any disputes arising from these Terms of Use.
<h3 style='margin: 10px 0 10px 0;'>Contact us</h1>
At BTC-e, we want to provide the best service while keeping everyone informed of the existing features and limitations. Please do not hesitate to contact us in case you have any questions at:
<h3 style='margin: 10px 0 10px 0;'>Chat rules for users</h1>
<p>1. Obscene words in any type (swearing, hidden and veiled swearing) are prohibited in our chat</p>
<p>2. Abusing other users is prohibited</p>
<p>3. Pronouncements that incite ethnic hatred, advocating violence in any form, insulting religious feelings of other users are not allowed.</p>
<p>4. Flooding (flood is the posting of similar information, same repeating phrase or identical graphic files), flaming and spamming are prohibited.</p>
<p>5. Obscene words (both in obvious and veiled forms) in a user’s nick are not allowed.</p>
<p>6. Distribution of maleficent links, links to third party online projects and advertising links is prohibited.</p>
<p>7. Abusing statements addressed to the administration, moderators, hard-hitting pronouncements about the chat are prohibited.</p>
<p>8. Discussing moderators’ actions is inadmissible. If you believe you have been treated unfairly, write to the administrator, he will take care of that.</p>
<p>9. Users must not beg for the moderator status or any other status from the administration.</p>
<p>10. Writing only capitals is prohibited.</p>
<p>11. If you respond to abuses by abusing, you are treated as the one violating the rules, and a relevant punishment will be applied to you.</p>
<h3 style='margin: 10px 0 10px 0;'>Chat rules for moderators</h1>
<p>1. Moderator, being a representative of the administrator, must strictly obey all user rules and be a reference for everyone.</p>
<p>2. Before applying a punishment, the moderator must warn the user that he/she has violated the rules (this does not refer to the situations with obvious abuse of a user/users and flood). In case of a repeated violation of the chat rules the user will not be warned.</p>
<p>3. Banning for longer than 60 days is admitted only in case of repeated major chat rules violations by a user.</p>
<p>4. For violation of the chat rules upon the decision of the administration a moderator can be deprived of his/her authority without the right to recover.</p>
<h3 style='margin: 10px 0 10px 0;'>Have questions? Contact us:</h1>
<p>Chat: support</p>
<p>Ticket system: https://support.btc-e.com/</p></div>
<div class='block'>
<h1 style='margin-bottom: 10px;'> Frequently Asked Questions (FAQ)</h1>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 5px;'> I've never heard of Bitcoins, what exactly are they?</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
Developed in 2009, Bitcoin (frequently referred to as BTC) is a digital form of currency, revolutionizing the world by becoming the first online currency able to be traded between individuals without a "middle man." This means that users of the Bitcoin system are able to trade Bitcoins with one another without going through a payment processor such as a bank, allowing you the freedom to buy, sell and trade as you please. For a lot more information check How it works or the official Bitcoin site <a href=' http://www.bitcoin.org/ '> Bitcoin </a>.
</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> Is trading bitcoins and the usage of btc-e.com legal?</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
BTC-e is a deposit collector for real money and virtual currency bitcoins (BTC), so yes. Trading and having an account with BTC-e.com is legal. It is your personal responsibility to declare any profit, accumulated by trading with BTC through BTC-e
</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> Is my information/identity safe when using Bitcoin? </h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
Yes! Using a system established upon obscurity and encoding, Bitcoin is extremely secure. BTC-e will not dispense, broadcast, nor vend your information to any parties. It should be noted though, that if and when it is requested by government agencies that . BTC-e disclose information relating to user activity and/or contact information we will comply. Since your personal Bitcoins are maintained on your computer, it is imperative that you take additional steps to ensure that your Bitcoin wallet remains protected from users other than yourself. You should take the necessary precautions to keep your own Bitcoin wallet (on your computer) safe from third party access.
</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> What role does BTC-e.com play in the process? </h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
BTC-e.com serves as a platform for individuals interested in buying and selling Bitcoins using an assortment of world currencies.
</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> How do I get started? </h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
Simply sign up for an account on the BTC-e website- don't worry, it is absolutely free! Once you have created your account you need to place funds into the account using an approved means of deposit. You are now ready to begin purchasing and selling Bitcoins on the BTC-e website. BTC-e trade system will always match your offer with the optimal benefit for you. </div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> Do you accept any alternate forms of payment such as Debit/Credit Cards?</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
At this time, BTC-e is currently not accepting any of these payment methods. All transactions carried out on our website are irreversible; therefore use of payment methods that are reversible would be a detrimental venture for us. The presently supported payment methods are : US Bank Wire, EU Bank Wire (SEPA), Visa, Mastercard, Liqpay.com, unikarta.com, PerfectMoney.com, WebCreds.com, Ukash.com, Webmoney.ru.
</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> How long before I receive your reply on a feedback question? </h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
We try our best to reply within an hour. We are based in an European time zone (GMT+2) and may take up 12 hours to reply. </div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> What is the turnover time for transactions done with BTC-e? </h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
Any undertaking carried out with Bitcoin (BTC) will begin immediately, though it may be up to 24 hours before it is reflected in your BTC-e account. BTC-e executes all account withdrawals right away or in 1-2 days. Sometimes, it can take longer for the transactions to be carried out, but this is rare. Keep in mind, though, that depending on the type of transfer there can be a delay. </div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> Do you fulfill any requests to send money or carry out currency exchanges via government fiat?</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
Unfortunately, we do not fulfill any such requests. We choose to carry out business using registered companies such as Western Union, Dwolla, and other well-known financial companies to carry out our transfers. </div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'> Are there any fees involved when using BTC-e?</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
BTC-e charges a 0.2% fee on each transaction carried out by users on the website. This transaction may vary and may be different for each individual account. USD/RUR – fee 0.5% Specific job openings will be posted but we are always interested in hearing from you.</div>
<a href='javascript:void(0)' onclick='spoiler(this)'><h3 style='margin-bottom: 10px;'>API</h3></a>
<div style='margin-bottom: 10px; display: none; padding-left: 15px;'>
<b>Trade API</b>
<br/>
<br/>
<a href='https://btc-e.com/tapi/docs'>Trade API documentation</a>
<br/>
<br/>
<b>Fee </b>
<br/>
<br/> BTC/USD - <a href='https://btc-e.com/api/2/btc_usd/fee'> https://btc-e.com/api/2/btc_usd/fee</a>
<br/> USD/RUR - <a href='https://btc-e.com/api/2/usd_rur/fee'> https://btc-e.com/api/2/usd_rur/fee</a>
<br/>
<br/>
<b>Public API – BTC/USD</b>
<br/>
<br/> Ticker - <a href='https://btc-e.com/api/2/btc_usd/ticker'> https://btc-e.com/api/2/btc_usd/ticker</a>
<br/> Trades - <a href='https://btc-e.com/api/2/btc_usd/trades'> https://btc-e.com/api/2/btc_usd/trades</a>
<br/> Depth - <a href='https://btc-e.com/api/2/btc_usd/depth'> https://btc-e.com/api/2/btc_usd/depth</a>
<br/>
<br/>
<b>Public API – LTC/BTC</b>
<br/>
<br/> Ticker - <a href='https://btc-e.com/api/2/ltc_btc/ticker'> https://btc-e.com/api/2/ltc_btc/ticker</a>
<br/> Trades - <a href='https://btc-e.com/api/2/ltc_btc/trades'> https://btc-e.com/api/2/ltc_btc/trades</a>
<br/> Depth - <a href='https://btc-e.com/api/2/ltc_btc/depth'> https://btc-e.com/api/2/ltc_btc/depth</a>
<br/>
<br/>
<b>Public API – LTC/USD</b>
<br/>
<br/> Ticker - <a href='https://btc-e.com/api/2/ltc_usd/ticker'> https://btc-e.com/api/2/ltc_usd/ticker</a>
<br/> Trades - <a href='https://btc-e.com/api/2/ltc_usd/trades'> https://btc-e.com/api/2/ltc_usd/trades</a>
<br/> Depth - <a href='https://btc-e.com/api/2/ltc_usd/depth'> https://btc-e.com/api/2/ltc_usd/depth</a>
</div>
</div>

</div>
<div id="footer">
<div id="footer-content">
<div style="width: 550px; float: left;">
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
<audio id="audioPM" src="https://btc-e.com/sounds/message.wav" preload="none"></audio>
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