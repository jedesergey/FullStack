<?
include('../db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$col  = trim($_POST['col']);
mysql_query("INSERT INTO users (login)
VALUES ('$col')", $link);	
echo json_encode($col);
}
?>