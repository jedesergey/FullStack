<? 
$red = mysql_query("SELECT * FROM feedback LIMIT 2");
while ($row = mysql_fetch_array($red)){  
$title = $row['title'];
$data = $row['data'];
$telo = $row['telo'];
$datashort = $row['datashort'];
$id = $row['id'];



$news = <<< HHY
<tr>
<td style="width: 100px;"><b>$datashort</b></td>
<td><a href="/feedbackdata/$id.php">$title</a></td>
<td style="width: 40px;" class="small">
<a href="/feedbackdata/$id.php"><img style="margin-right: 4px" src="/images/1px.png" class="main-s main-s-comm" alt="comm">0</a>
</td>
</tr>
HHY;
echo $news;
}    
?>