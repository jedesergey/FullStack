<?
include('db.php');
if (isset($_GET['login']) && isset($_GET['key'])) {
$login = $_GET['login'];
$key   = $_GET['key'];
// Делаем проверку login на нехорошие символы
if (!preg_match("/^\w{3,}$/", $login)) {
die('Неправильная ссылка!');
}
$time = time();

$res = mysql_query("SELECT id, email, status, timestamp
      FROM users WHERE login='$login' LIMIT 1", $link);
// Есть ли пользователь с таким логином?
if (mysql_num_rows($res) != 1) {
mysql_close($link);
die('Такого пользователя нет!');
}
$user = mysql_fetch_row($res);
// Может он уже активен?
if ($user[2] == 1) {
mysql_close($link);
die('Данный логин уже подтвержден!');
}
// Успел ли юзер активировать логин? (если нет - удаляем из базы)
if ($user[3] - $time > 5 * 24 * 60 * 60) {
mysql_query("DELETE FROM users WHERE login='$login' LIMIT 1", $link);
mysql_close($link);
die('Срок активации истёк! Регистрируйтесь заново.');
}
$key1 = md5(substr($user[1], 0, 2) . $user[0] . substr($login, 0, 2));
// Поверяем "keystring"
if ($key1 != $key) {
mysql_close($link);
die('Неправильная контрольная сумма!');
}
// Если все проверки пройдены - активируем логин!
mysql_query("UPDATE users SET status = 1 WHERE login='$login'", $link);
mysql_close($link);

header('Location: http://'.$domen.'/emailconfirm.php');
}
?>