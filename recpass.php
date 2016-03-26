<?
include('db.php');
if (isset($_POST['key'])) {
$newpassword  = $_POST['pass'];
$newpassword2 = $_POST['pass2'];
$key          = $_POST['key'];
$data         = 0;
$r   = mysql_query("SELECT * FROM users WHERE randcode='$key' ", $link);
$row = mysql_fetch_array($r);
}
sleep(1);
if ($row and ($row[7] == 1)) {
$passwordHash = md5($newpassword);
$n            = mysql_query("UPDATE users SET pass='$passwordHash'  WHERE randcode='$key'", $link);
$m            = mysql_query("UPDATE users SET temp='0'  WHERE randcode='$key'", $link);
mysql_close();
$data = 2;
} else {
$data = 3;
}
if ($newpassword !== $newpassword2) {
$data = 1;
}
echo json_encode($data);
?>