<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<p>您好<span style="color:red"><?php
	session_start();
	echo $_SESSION['nickname'];
	?></span></p>
	<img src="<?php echo $_SESSION['figureurl']?>" alt="">
	<table border="1px">
		<tr>
			<td>行大丰收发放大法</td>
			<td>发生的发生</td>
		</tr>
		<tr>
			<td>的说法发达</td>
			<td>大发送到</td>
		</tr>
	</table>
</center>
</body>
</html>