<!doctype html>
<html>

<head>
<meta charset="UTF-8">
<title>News</title>

</head>

<body>

<div class="enter">
<form action="/newsdata/createnews.php" method="post">
<input type="text" name="title" autocomplete="off" placeholder="Title">
<input type="text" name="text" autocomplete="off" placeholder="Text">
<input type="submit" value="Send">
</form>
</div>

<div class="enter">
<form action="/feedbackdata/createfeedback.php" method="post">
<input type="text" name="title" autocomplete="off" placeholder="Title">
<input type="text" name="text" autocomplete="off" placeholder="Text">
<input type="submit" value="Send">
</form>
</div>

</body>

</html>