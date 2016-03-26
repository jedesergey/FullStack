<?
$sss = mysql_query("SELECT * FROM users WHERE login='$us' ", $link);
$row3 = mysql_fetch_array($sss);
$perfectmoney = $row3['perfectmoney'];     
$skrill = $row3['skrill'];     
$payza = $row3['payza'];     
$payeer = $row3['payeer'];     
$cocapay = $row3['cocapay'];     
$okpay = $row3['okpay'];     
$monero = $row3['monero'];     
?>

<div class='block'>
	<div style='width:150px; float:left; margin-right:10px;'>
		


		<a href='#profile-info' onclick='nav1()' class='profileBtn' id="info">Information</a>
		<a href='#profile-notifications' onclick='nav2()' class='profileBtn'>Notifications</a>
		<a href='#profile-funds' onclick='nav3()' class='profileBtn'>Funds</a>
		<a href='#profile-edit' onclick='nav4()' class='profileBtn'>Edit</a>
		<a href='#profile-orders_history' onclick='nav5()' class='profileBtn' id="history">Orders history</a>

	</div>

	<div id='profileX'>


		<div id="profile1" style='display:none;'>
			<h3 style="margin-bottom: 10px;">Information:</h3>
			<table border="0" style="margin: auto;" class="tabla">
				<tbody>
					<tr>
						<td style="width: 200px; height: 15px; text-align: left;">User:</td>
						<td style="width: 300px; text-align: left;"><b><?echo $us;?></b></td>
					</tr>
					<tr>
						<td style="height: 15px; text-align: left;">Group:</td>
						<td style="text-align: left;"><b><b>User</b></b>
						</td>
					</tr>
					<tr>
						<td style="height: 15px; text-align: left;">E-mail:</td>
						<td style="text-align: left;"><b><i>Hidden</i></b></td>
					</tr>
				</tbody>
			</table>
		</div>



		<div id="profile2" style='display:none;'>
			<div style="float:left; width:820px;">

				<div>
					<h3 style="float:left">Notifications</h3>
					<a class="button" style="width:16px; height:16px; float:right;" href="javascript:void(0)" onclick="notifSettings()"><img src="https://btc-e.com/images/1px.png" class="main-s main-s-settings" alt="settings"></a>
					<div class="clear"></div>
				</div>
				<div class="pagenav">
					<div class="clear"></div>
				</div>
				<table style="width:100%;" class="table">
					<tbody>
						<tr class="table_h">
							<th style="width: 110px">date</th>
							<th>Notification</th>
							<th style="width: 80px;"><a href="javascript:void(0)" onclick="notifHide(0)">hide all</a></th>
						</tr>
						<tr>
							<td colspan="3">You dont have notifications.</td>
						</tr>
					</tbody>
				</table>
				<div class="pagenav">
					<div class="clear"></div>
				</div>
			</div>
		</div>


		<div id="profile3" style='display:none; float:left; width:820px;'>
			<h3 style="margin-bottom: 5px;">Funds</h3>
			
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Perfectmoney</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $perfectmoney;?></b> Perfectmoney</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/1" onclick="billing_profile(&quot;withdraw_coin/1&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/1" onclick="billing_profile(&quot;deposit_coin/1&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Skrill</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $skrill;?></b> Skrill</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/8" onclick="billing_profile(&quot;withdraw_coin/8&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/8" onclick="billing_profile(&quot;deposit_coin/8&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Payza</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $payza;?></b> Payza</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/10" onclick="billing_profile(&quot;withdraw_coin/10&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/10" onclick="billing_profile(&quot;deposit_coin/10&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Payeer</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $payeer;?></b> Payeer</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/13" onclick="billing_profile(&quot;withdraw_coin/13&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/13" onclick="billing_profile(&quot;deposit_coin/13&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Cocapay</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $cocapay;?></b> Cocapay</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/14" onclick="billing_profile(&quot;withdraw_coin/14&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/14" onclick="billing_profile(&quot;deposit_coin/14&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Okpay</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $okpay;?></b> Okpay</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/15" onclick="billing_profile(&quot;withdraw_coin/15&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/15" onclick="billing_profile(&quot;deposit_coin/15&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="inblock">
				<div style="float:left">
					<h3 style="margin-bottom: 2px;">Monero</h3>
					<div style="width:240px; float:left">
						<p>Balance: <b><?echo $monero;?></b> Monero</p>
					</div>
				</div>
				<div style="float:right">
					<div style="width:250px; float:right">
						<a href="#funds/withdraw_coin/16" onclick="billing_profile(&quot;withdraw_coin/16&quot;)" class="button minibutton" style="float: right;">Withdraw</a><a href="#funds/deposit_coin/16" onclick="billing_profile(&quot;deposit_coin/16&quot;)" class="button minibutton" style="float: right;">Deposit</a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			
		</div>


		<div id="profile4" style='display:none; float:left; width:820px;'>
			<h3 style="margin-bottom: 10px;">Edit profile</h3>
			<table id="tab-table" style="width: 100%; margin-bottom: 10px;" border="0">
				<tbody>
					<tr class="tcenter">
						<td id="home-tab" class="pe-tab pe-selected-tab"><a href="#edit/home" onclick="pe_edit(&quot;home&quot;)">Main</a></td>
						<td id="pass-tab" class="pe-tab " style="width:50%"><a href="#edit/pass" onclick="pe_edit(&quot;pass&quot;)">Change the password</a></td>
					</tr>
				</tbody>
			</table>
			<div id="home-con" style="" class="profile-edit">
				<table style="width: 490px; margin: auto;" class="tabla">
					<tbody>
						<tr>
							<td colspan="2">
								<div id="main-errors"></div>
							</td>
						</tr>
						<tr>
							<td>E-Mail: (<b style="color: green">confirmed</b>)</td>
							<td>
								<input type="text" id="email" name="email" maxlength="32" size="25" class="textbox twi" value="Hidden" onchange="reg_check(&quot;em&quot;, this)">
								<div id="em-regcheck" class="reghelp"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<p class="gray">For security purposes, after a e-mail change your account will be locked for withdrawal within 2 days.</p>
								<input id="token" type="hidden" value="62dcb3d3c0b90354511634f95c26502a272f756ba8eceaf7cb74b5f71179e8a1">
								<a class="button center" href="javascript:void(0)" onclick="pe_mainedit()">Save</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="pass-con" style="display:none;" class="profile-edit">
				<table style="margin: auto; width: 430px;" class="tabla">
					<tbody>
						<tr>
							<td colspan="2">
								<div id="pass-errors"></div>
							</td>
						</tr>
						<tr>
							<td style="width: 200px;">Old password:</td>
							<td style="width: 250px;">
								<input type="password" id="oldpass" autocomplete="off" maxlength="64" onfocus="clear_class(this)" class="textbox twi">
							</td>
						</tr>
						<tr>
							<td>New password:</td>
							<td>
								<input type="password" id="psw" name="pass" autocomplete="off" maxlength="64" class="textbox twi" onfocus="clear_class(this)" onchange="pe_check(&quot;pass&quot;, &quot;psw&quot;, psw, psw2.value)">
								<div id="psw-check" class="reghelp"></div>
							</td>
						</tr>
						<tr>
							<td>Confirm new password:</td>
							<td>
								<input type="password" id="psw2" name="pass2" maxlength="64" class="textbox twi" onfocus="clear_class(this)" onchange="pe_check(&quot;pass&quot;, &quot;psw&quot;, psw, psw2.value)">
								<div id="psw2-check" class="reghelp"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<p class="gray">For security purposes, after a password change your account will be locked for withdrawal within 2 days.</p>
								<a class="button center" href="javascript:void(0)" onclick="pe_passedit();">Save</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="ava" style="display:none; text-align: center; padding: 15px;" class="profile-edit">
				<div id="ava_result"></div>
				<p style="margin-bottom: 15px;">File format: <b>JPG</b>
					<br> File maximum size 64kb.
					<br> Avatar size must not exceed <b>184х184</b>px</p>
				<form action="?uploadava=1" enctype="multipart/form-data" method="post" name="ava">
					<input type="hidden" name="MAX_FILE_SIZE" value="64000">
					<input id="avafile" name="userfile" type="file">
				</form>
				<a class="button center" style="margin-top: 15px;" href="javascript:document.ava.submit()">Save</a>
			</div>
		</div>


		<div id="profile5" style='display:none; float:left; width:820px;'>
			<h3 style="margin-bottom: 10px;">Orders history</h3>
			
			
			<div id="orders_history">
				<div class="pagenav">
					<div class="clear"></div>
				</div>
				<table class="tabla2" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
					<tbody>
						<tr class="table_h">
                            <td style="width:100px">Date</td>
							<td style="width:50px">Pair</td>
							<td style="width:50px">Type</td>
							<td>Price</td>
							<td>Amount</td>
							<td>Total</td>
							<td>Filled %</td>
							<td>Status</td>
						</tr>
                        
<?
mysql_query("CREATE TABLE temporders
( `id` int(100) NOT NULL AUTO_INCREMENT,
  `pair` varchar(32) NOT NULL,
  `time` datetime NOT NULL,
  `type` varchar(32) NOT NULL,
  `price` float(32) NOT NULL,
  `amount` float(32) NOT NULL,
  `total` float(32) NOT NULL,
  `filled` float(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`id`))", $link);
                        
$array1 = array("realSkrillPerfectMoney", "realSkrillPayza", "realSkrillOKPay", "realSkrillPayeer", "realSkrillMonero", "realCocaPaySkrill", "realPerfectMoneyPayza", "realPerfectMoneyOKPay", "realPerfectMoneyPayeer", "realPerfectMoneyMonero", "realCocaPayPerfectMoney", "realPayzaOKPay", "realPayzaPayeer", "realPayzaMonero", "realCocaPayPayza", "realOKPayPayeer", "realCocaPayOKPay", "realCocaPayPayeer", "realCocaPayMonero");
                        
$array2 = array("Skrill/PerfectMoney", "Skrill/Payza", "Skrill/OKPay", "Skrill/Payeer", "Skrill/Monero", "CocaPay/Skrill", "PerfectMoney/Payza", "PerfectMoney/OKPay", "PerfectMoney/Payeer", "PerfectMoney/Monero", "CocaPay/PerfectMoney", "Payza/OKPay", "Payza/Payeer", "Payza/Monero", "CocaPay/Payza", "OKPay/Payeer", "CocaPay/OKPay", "CocaPay/Payeer", "CocaPay/Monero");                        

$date = date("Y-m-d H:i:s");                        

for($e=0;$e<19;$e++){                        
                        
$one = mysql_query("SELECT * FROM $array1[$e] WHERE user='$us' AND action='0' AND time <= '$date'");
while ($row1 = mysql_fetch_array($one)){ 
$pair = $array2[$e];    
$type = $row1['type'];    
$price = $row1['price'];    
$amount = $row1['amount'];    
$total = $row1['total'];    
$filled = $row1['fee'];    
$status = 'active';    
$time = $row1['time'];
$ss = mysql_query("INSERT INTO temporders (pair, type, price, amount, total, filled, status, time) VALUES ('$pair', '$type', '$price', '$amount', '$total', '$filled', '$status', '$time')", $link);     
}
    
$two = mysql_query("SELECT * FROM $array1[$e] WHERE user='$us' AND action='1' AND time <= '$date'");
while ($row2 = mysql_fetch_array($two)){ 
$pair2 = $array2[$e];    
$type2 = $row2['type2'];    
$price2 = $row2['price'];    
$amount2 = $row2['amount2'];    
$total2 = $row2['total2'];    
$filled2 = $row2['fee2'];    
$status2 = 'done';    
$time2 = $row2['time2'];
$ss = mysql_query("INSERT INTO temporders (pair, type, price, amount, total, filled, status, time) VALUES ('$pair2', '$type2', '$price2', '$amount2', '$total2', '$filled2', '$status2', '$time2')", $link);     
}    
    
}  
$price3 = NULL;
$three = mysql_query("SELECT * FROM temporders ORDER BY time DESC");
while ($row3 = mysql_fetch_array($three)){ 
$pair3 = $row3['pair'];    
$type3 = $row3['type'];    
$price3 = $row3['price'];    
$amount3 = $row3['amount'];    
$total3 = $row3['total'];    
$filled3 = $row3['filled'];    
$status3 = $row3['status'];    
$time3 = $row3['time'];                          

if ($type3 == 'buy'){
$color = 'green';    
}
else{
$color = 'red';    
} 
$a = <<< OEM
<tr>
<td>$time3</td>
<td>$pair3</td>
<td><b style="color:$color">$type3</b></td>
<td>$price3</td>
<td>$amount3</td>
<td>$total3</td>
<td>$filled3</td>
<td>$status3</td>
</tr>  
OEM;
echo $a;     
} 

if($price3 == NULL){
$b = <<< HHY
<tr>
<td colspan="8">No orders.</td>
</tr>
HHY;
echo $b;    
}                        
                        
mysql_query("DROP TABLE temporders ", $link);                        
?>                        
						
					</tbody>
				</table>
				<div class="pagenav">
					<div class="clear"></div>
				</div>
			</div>
		</div>

	</div>
</div>

<script type='text/javascript'>
	var ThisA = window.location.hash;
	
	if (ThisA  == '') {
				
        document.getElementById('profile1').style.display = 'block';
        document.getElementById('profile2').style.display = 'none';
		document.getElementById('profile3').style.display = 'none';
		document.getElementById('profile4').style.display = 'none';
		document.getElementById('profile5').style.display = 'none';
				
			}


	if (ThisA == '#profile-info') {

		document.getElementById('profile1').style.display = 'block';
        
		
	}

	if (ThisA == '#profile-notifications' || ThisA == '#notifications') {

		document.getElementById('profile2').style.display = 'block';
	}

	if (ThisA == '#profile-funds' || ThisA == '#funds') {

		document.getElementById('profile3').style.display = 'block';
	}

	if (ThisA == '#profile-edit' || ThisA == '#edit/home') {

		document.getElementById('profile4').style.display = 'block';
	}

	if (ThisA == '#profile-orders_history') {

		document.getElementById('profile5').style.display = 'block';
	}



	function nav1() {
		document.getElementById('profile1').style.display = 'block';
		document.getElementById('profile2').style.display = 'none';
		document.getElementById('profile3').style.display = 'none';
		document.getElementById('profile4').style.display = 'none';
		document.getElementById('profile5').style.display = 'none';

	}

	function nav2() {
		document.getElementById('profile1').style.display = 'none';
		document.getElementById('profile3').style.display = 'none';
		document.getElementById('profile4').style.display = 'none';
		document.getElementById('profile5').style.display = 'none';
		document.getElementById('profile2').style.display = 'block';

	}

	function nav3() {
		document.getElementById('profile1').style.display = 'none';
		document.getElementById('profile2').style.display = 'none';
		document.getElementById('profile4').style.display = 'none';
		document.getElementById('profile5').style.display = 'none';
		document.getElementById('profile3').style.display = 'block';

	}

	function nav4() {
		document.getElementById('profile1').style.display = 'none';
		document.getElementById('profile3').style.display = 'none';
		document.getElementById('profile2').style.display = 'none';
		document.getElementById('profile5').style.display = 'none';
		document.getElementById('profile4').style.display = 'block';

	}

	function nav5() {
		document.getElementById('profile1').style.display = 'none';
		document.getElementById('profile3').style.display = 'none';
		document.getElementById('profile4').style.display = 'none';
		document.getElementById('profile2').style.display = 'none';
		document.getElementById('profile5').style.display = 'block';

	}
</script>