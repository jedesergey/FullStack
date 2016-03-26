<?
sleep(2);
include('../db.php');
if (isset($_POST['type'])) {
$type     = $_POST['type'];
}

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
if (isset($_SESSION['user'])) {
   
$us = $_SESSION['user'];

echo json_encode(1);  
}else {
echo json_encode(0);
}



?>