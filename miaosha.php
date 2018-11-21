<?php
$id=$_GET['id'];

//连接redis
$redis=new Redis;
$redis->connect("127.0.0.1",6379);

$pdo=new PDO("mysql:host=127.0.0.1;dbname=week",'root','root');
$key="goods".$id;
if($redis->llen($key)>0){
	//出队 
	$redis->lpop($key);
	//修改数据库内容
	$res=$pdo->exec("update goods set stock=stock-1 where id=$id");
	if ($res) {
		//添加到order表中显示 出数据
		$time=time();
		$order_id=date("Ymd",time()).md5(rand(100,999));
		$res=$pdo->exec("insert into `order` values(null,'$id','$order_id','$time')");
		if($res){
			//返回json数据
			echo json_encode(['code'=>1,"msg"=>"秒杀成功"]);
		}else{
			echo json_encode(['code'=>0,"msg"=>"秒杀结束"]);
		}
	}else{
		echo json_encode(['code'=>0,"msg"=>"秒杀结束"]);
	}
}else{
	echo json_encode(['code'=>0,"msg"=>"秒杀结束"]);
}
?>