<?php 
$cryptinstall="captcha/cryptographp.fct.php";
include $cryptinstall; 
?>


<html>
<div align="center">


<form action="verifier.php" method="post">
<table cellpadding=1>
  <tr><td align="center"><?php dsp_crypt(0,1); ?></td></tr>
 <input type="text" name="code">
  <tr><td align="center"><input type="submit" name="submit" value="Проверить"></td></tr>
</table>
<br><br><br>

</form>

</div>
</html>


