<?
include('db.php');
if (isset($_POST['email'])) {
$password     = $_POST['password'];
$passwordHash = md5($_POST['password']);
$email        = $_POST['email'];
$data         = 0;
$r = mysql_query("SELECT * FROM vusers WHERE email='$email' ", $link);
$row = mysql_fetch_array($r);
    
$v = mysql_query("SELECT * FROM users WHERE email='$email' ", $link);
$row1 = mysql_fetch_array($v);    
sleep(1);
if ($row and ($row[2] == $passwordHash) and ($row[4] == 1) and (preg_match("/^\w{3,}$/", $password)) and (preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $email))) {
$data = 1;
$login = $row[1];
// Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
session_start();
$_SESSION['user'] = $login;
echo json_encode($data);
} else if  ($row1 and ($row1[2] == $passwordHash) and ($row1[4] == 1) and (preg_match("/^\w{3,}$/", $password)) and (preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $email))) {
$data = 1;
$login = $row1[1];
// Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
session_start();
$_SESSION['user'] = $login;
echo json_encode($data);
} else{
    
if ($row[4] != 1) {
$data = 2;
}
$data = 0;
echo json_encode($data);
}
}
?>