<?php
sleep(2);
$cryptinstall = "captcha/captcha/cryptographp.fct.php";
include $cryptinstall;
$i    = 0;
$data = array(
0,
0,
0,
0,
0,
0
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email  = trim($_POST['email']);
$username   = trim($_POST['username']);

}

// Проверяем e-mail на корректность
if (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $email)) {
$data[0] = 1;
// Incorrect E-mail
echo json_encode($data);
exit();

} 

if (!preg_match("/^\w{3,}$/", $username)) {
$data[1] = 1;
// Incorrect username
echo json_encode($data);
exit();

} 


if (chk_crypt($_POST['code'])) {
$data[2] = 0;
} else {
$data[2] = 1;
echo json_encode($data);
exit();

}

$link1 = mysql_connect('localhost', 'maxbosso_temp', 'd456852');
if (!$link1) {
die('Не удалось соединиться с БД');
} else {
mysql_select_db('maxbosso_temp', $link1);
	
$res1 = mysql_query("SELECT email FROM users WHERE email='$email'", $link1);
// Есть ли пользователь с таким email?
if (mysql_num_rows($res1) < 1) {
$data[3] = 1;
echo json_encode($data);
exit();
}
}

$res2 = mysql_query("SELECT login FROM users WHERE login='$username'", $link1);
// Есть ли пользователь с таким логином?
if (mysql_num_rows($res2) < 1) {
$data[4] = 1;
echo json_encode($data);
exit();
} 


if (($data[0] != 1) and ($data[1] != 1) and ($data[2] != 1) and ($data[3] != 1) and ($data[4] != 1)) {
$data[5] = 1;
$i       = 1;
echo json_encode($data);

}

if ($i == 1) {
$emailadmin = 'j_s_mail@mail.ru';
// Компонуем письмо
$title   = 'New ticket';
$headers = "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: BTC-E\r\n";
$subject  = '=?koi8-r?B?' . base64_encode(convert_cyr_string($title, "w", "k")) . '?=';
$letter   = <<< LTR
   Dear admin, i send email
LTR;
$sendmail = mail($emailadmin, $subject, $letter, $headers);

mysql_close($link1);
}


?>