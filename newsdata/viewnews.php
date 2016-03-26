<? 
$red = mysql_query("SELECT * FROM newsdata LIMIT 2");
while ($row = mysql_fetch_array($red)){  
$title = $row['title'];
$data = $row['data'];
$telo = $row['telo'];
$datashort = $row['datashort'];
$id = $row['id'];



$news = <<< HHW
<tr>
<td style="width: 100px;"><b>$datashort</b></td>
<td><a href="/newsdata/$id.php">$title</a></td>
<td style="width: 40px;" class="small">
<a href="/newsdata/$id.php"><img style="margin-right: 4px" src="/images/1px.png" class="main-s main-s-comm" alt="comm">0</a>
</td>
</tr>
HHW;
echo $news;
}    
?>