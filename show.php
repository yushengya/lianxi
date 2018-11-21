<?php
$pdo=new PDO("mysql:host=127.0.0.1;dbname=week",'root','root');
$data=$pdo->query("select * from goods")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php foreach ($data as $key => $val) { ?>
	<div style="float:left">
		<!-- 设置时分秒以便于获取后重新添加到这里面 -->
		<p>
			<span id="h<?=$val['id']?>">时</span>
			<span id="m<?=$val['id']?>">分</span>
			<span id="s<?=$val['id']?>">秒</span>
		</p>
		<p><img src="<?=$val['path']?>" height="300" width="300" alt=""></p>
		<p><?=$val['name']?></p>
		<p><?=$val['price']?></p>
		<!-- 通过时间来判断是否能进行秒杀 不能进行秒杀的按钮变为灰色 -->
		<?php if(time()<$val['starttime']||time()>$val['endtime']) {?>
		<p><input type="button" value="抢购" id="<?=$val['id']?>" disabled></p>
		<?php }else{ ?>
		<p><input type="button" value="抢购" id="<?=$val['id']?>"></p>
		<?php }?>
	</div>
	<?php }?>
</body>
</html>
<script src="jquery.js"></script>
<script>
	$(document).ready(function(){
		//设置定时器 用jq函数发送ajax
		setInterval(function(){
			$.ajax({
				url:"settime.php",
				type:"get",
				dataType:"json",
				success:function(e){
					//循环赋值 显示时间
					for (var i =0; i<e.length; i++) {
						id=e[i]['id'];
						$("#h"+id).text(e[i]['hour']+"时");
						$("#m"+id).text(e[i]['minute']+"分");		
						$("#s"+id).text(e[i]['second']+"秒");
					}
				}
			})
		},1000);
		$("input[type=button]").on("click",function(){
			var id=$(this).attr("id");
			/*console.log(id)*/
			$.ajax({
				url:"miaosha.php",
				type:"get",
				data:{id:id},
				dataType:"json",
				success:function(e){
					if(e['code']==1){
						alert(e['msg']);
					}else{
						alert(e['msg']);
					}
				}
			})
		})
	})
	
</script>