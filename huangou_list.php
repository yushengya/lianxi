<?php
session_start();
$id=$_SESSION['user_id'];
$pdo=new PDO('mysql:host=localhost;dbname=1607a;charset=utf8','root','root');
$data=$pdo->query("select scorelog.score,goods.name,scorelog.addtime from scorelog left join goods on scorelog.goods_id=goods.id where user_id=$id")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<th>商品名称</th>
			<th>所用积分</th>
			<th>添加时间</th>
		</tr>
		<?php foreach ($data as $key => $val) {?>
		<tr>
			<td><?php echo $val['name']?></td>
			<td><?php echo $val['score']?></td>
			<td><?php echo $val['addtime']?></td>
		</tr>
		<?php }?>
		
	</table>
</body>
</html>