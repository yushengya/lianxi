<?php
$pdo=new PDO('mysql:host=localhost;dbname=1607a;charset=utf8','root','root');
$data=$pdo->query("select * from goods")->fetchAll();
session_start();
$user_id=$_SESSION['user_id'];
//var_dump($user_id);die;
$arr=$pdo->query("select score from user where id=$user_id")->fetch();
$user_score=$arr['score'];
//var_dump($user_score);
$s=$pdo->query("select * from scorelog")->fetchAll();
//var_dump($s);die;
foreach ($s as $key => $val) {
	$log[]=$val['user_id'].$val['goods_id'];
}
//var_dump($log);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h3><?php echo $user_score?></h3>
	<?php foreach ($data as $key => $val) {?>
		<div style="float:left;width:300px;">
			<p><img src="<?php echo $val['img']?>" width="300px" height="300px"></p>
			<p><?php echo $val['name']?></p>
			<p><?php echo $val['score']?><input type="hidden" id="ids" value="<?php echo $val['id']?>"></p>
			<?php if(in_array($user_id.$val['id'], $log)){?>
			<p><input type="button" value="已换购" id="button<?php echo $val['id']?>" onclick="tip(<?php echo $val['id']?>,<?php echo $val['score']?>)" disabled></p>
			<?php }else{ ?>
			<p><input type="button" value="换购" id="button<?php echo $val['id']?>" onclick="tip(<?php echo $val['id']?>,<?php echo $val['score']?>)"></p>
			<?php }?>
			
		</div>	
	<?php }?>
</body>
</html>
<script src="jquery.js"></script>
<script>
function tip(goods_id,goods_score){
	//console.log(goods_id);
	var user_score="<?php echo $user_score?>";
	if (confirm("本商品换购需要"+goods_score+"积分")) {
		if(goods_score>user_score){
			alert("积分不足");
			return false;
		}else{
			$.ajax({
				url:'huangou.php?goods_id='+goods_id+'&goods_score='+goods_score,
				dataType:"text",
				type:"get",
				success:function(e){
					//console.log(e)
					if(e=='ok'){
						alert("换购成功");
					}
				}
			})
		}
	}else{
		return false;
	}
	
}
	
</script>