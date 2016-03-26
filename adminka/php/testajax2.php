<?
include('../db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$bars  = trim($_POST['bars']);
mysql_query("INSERT INTO users ( pass)
VALUES ('$bars')", $link);	
echo json_encode($bars);
}
?>