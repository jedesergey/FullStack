<?
include('db.php');
$cryptinstall = "captcha/captcha/cryptographp.fct.php";
include $cryptinstall;
$answer     = 0;
$randcode   = rand(1000, 10000);
$mdrandcode = md5($randcode);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email = trim($_POST['email']);
$r = mysql_query("SELECT * FROM users WHERE email='$email' ", $link);
$n = mysql_query("UPDATE users SET randcode='$mdrandcode'  WHERE email='$email'", $link);
$t = mysql_query("UPDATE users SET temp='1'  WHERE email='$email'", $link);
mysql_close();
$row = mysql_fetch_array($r);
sleep(2);
if ((chk_crypt($_POST['code'])) and ($row and (preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $email)))) {
$answer  = 3;
$key     = $mdrandcode;
$date    = date("d.m.Y", $time);
// Компонуем письмо
$title   = 'Lost password';
$headers = "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: BTC-E\r\n";
$subject  = '=?koi8-r?B?' . base64_encode(convert_cyr_string($title, "w", "k")) . '?=';
$letter   = <<< LTR
   Dear $rLogin,

To lost your password please go to:

   http://$domen/forgotcheck.php?key=$key
   
   Regards,
Administration of BTC-E.COM
   
   $date
LTR;
$sendmail = mail($email, $subject, $letter, $headers);
} else {
$answer = 1;
}

if (!chk_crypt($_POST['code'])) {
$answer = 2;
}
echo json_encode($answer);
}
?>