<?php 
$cryptinstall="captcha/cryptographp.fct.php";
include $cryptinstall; 
?>


<html>
<?php
	if (chk_crypt($_POST['code'])){ 
		echo "<a><font color='#009700'>=> ��� ����� !</font></a>";
	}
	else{
		echo "<a><font color='#FF0000'>=> �������� ���</font></a>";
	}
?>
</html>

