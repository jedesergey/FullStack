<?
include('db.php');
if (isset($_GET['key'])) {
$key  = $_GET['key'];
$r = mysql_query("SELECT * FROM users WHERE randcode='$key' ", $link);
mysql_close();
$row = mysql_fetch_array($r);
if ($row and ($row[7] == 1)) {
header("Location: http://".$domen."/forgot.php?key=" . urlencode($key));
}
}
?>