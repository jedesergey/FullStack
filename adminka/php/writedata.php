<?
include('../db.php');

$min = $_POST['json_name1'];
$max = $_POST['json_name2'];
$ordermin = $_POST['json_name3'];
$ordermax = $_POST['json_name4'];
$feesell = $_POST['json_name5'];
$feebuy = $_POST['json_name6'];
$pair = $_POST['json_name7'];
$col = $_POST['json_name8'];
$bars = $_POST['json_name9'];


mysql_query("INSERT INTO testdata (min, max, ordermin, ordermax, feesell, feebuy, pair, col, bars)
VALUES ('$min ','$max','$ordermin','$ordermax','$feesell','$feebuy', '$pair', '$col', '$bars')", $link);	

$arrcount = mysql_query("SELECT COUNT(1) FROM testdata");
$masscount = mysql_fetch_array($arrcount);
$colstrok = $masscount[0]; 

if ($colstrok == 19){
header("location: codevusers.php");    
}
?>