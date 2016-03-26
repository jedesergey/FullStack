<? 
include('db.php');

$cryptinstall = "captcha/captcha/cryptographp.fct.php";
include $cryptinstall;
$i    = 0;
$data = array(
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$rLogin  = trim($_POST['rLogin']);
$rPass   = trim($_POST['rPass']);
$rPass2  = trim($_POST['rPass2']);
$rEmail  = trim($_POST['rEmail']);
$rEmail2 = trim($_POST['rEmail2']);
//Логин не может быть пустым
if ($rLogin == '') {
$data[0] = 1;
// Логин может состоять из букв, цифр и подчеркивания
} elseif (!preg_match("/^\w{3,}$/", $rLogin)) {
$data[1] = 1;
}
if ($rEmail == '') {
$data[2] = 1;
// Проверяем e-mail на корректность
} elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $rEmail)) {
$data[3] = 1;
}
if ($rEmail2 == '') {
$data[4] = 1;
// Проверяем e-mail2 на корректность
} elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $rEmail2)) {
$data[5] = 1;
}
if ($rEmail !== $rEmail2) {
$data[11] = 1;
}
if ($rPass == '' || $rPass2 == '') {
$data[6] = 1;
} elseif ($rPass !== $rPass2) {
$data[7] = 1;
// Пароль может состоять из букв, цифр и подчеркивания
} elseif (!preg_match("/^\w{3,}$/", $rPass)) {
$data[8] = 1;
}
}


if (chk_crypt($_POST['code'])) {
$data[9] = 0;
} else {
$data[9] = 1;
}

$res1 = mysql_query("SELECT status FROM users WHERE email='$rEmail'", $link);
// Есть ли пользователь с таким email?
if (mysql_num_rows($res1) < 1) {
} else {
$data[12] = 1;
}

$res2 = mysql_query("SELECT status FROM users WHERE login='$rLogin'", $link);
// Есть ли пользователь с таким логином?
if (mysql_num_rows($res2) < 1) {
} else {
$data[13] = 1;
}
if (($data[0] != 1) and ($data[1] != 1) and ($data[2] != 1) and ($data[3] != 1) and ($data[4] != 1) and ($data[5] != 1) and ($data[6] != 1) and ($data[7] != 1) and ($data[8] != 1) and ($data[9] != 1) and ($data[11] != 1) and ($data[12] != 1) and ($data[13] != 1)) {
$data[10] = 1;
$i        = 1;
sleep(1);
}
echo json_encode($data);

if ($i == 1) {
// В базе данных у нас будет храниться md5-хеш пароля
$mdPassword = md5($rPass);
// А также временная метка (зачем - позже)
$time       = time();
// Устанавливаем соединение с бд(не забудьте подставить ваши значения сервер-логин-пароль)
$monero = 100000;
$okpay = 100000;
$cocapay = 100000;
$payeer = 100000;
$payza = 100000;
$perfectmoney = 100000;
$skrill = 100000;
    
mysql_query("INSERT INTO users (login, pass, email, timestamp, monero, okpay, cocapay, payeer, payza, perfectmoney, skrill) VALUES ('$rLogin','$mdPassword','$rEmail',$time, '$monero', '$okpay', '$cocapay', '$payeer', '$payza', '$perfectmoney', '$skrill')", $link);

// Получаем Id, под которым юзер добавился в базу
$id      = mysql_result(mysql_query("SELECT LAST_INSERT_ID()", $link), 0);
// Составляем "keystring" для активации
$key     = md5(substr($rEmail, 0, 2) . $id . substr($rLogin, 0, 2));
$date    = date("d.m.Y", $time);
// Компонуем письмо
$title   = 'E-Mail confirm';
$headers = "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: BTC-E\r\n";
$subject  = '=?koi8-r?B?' . base64_encode(convert_cyr_string($title, "w", "k")) . '?=';
$letter   = <<< LTR
   Dear $rLogin,

To confirm your E-Mail please go to:

   http://$domen/activation.php?login=$rLogin&key=$key
   
   Login: $rLogin
   
   Regards,
Administration of BTC-E.COM
   
   $date
LTR;
$sendmail = mail($rEmail, $subject, $letter, $headers);
}
?>