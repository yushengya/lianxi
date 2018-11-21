<?php
//连接redis
$redis=new Redis;
$redis->connect("127.0.0.1",6379);

$pdo=new PDO("mysql:host=127.0.0.1;dbname=week",'root','root');
$data=$pdo->query("select id,stock from goods")->fetchAll();
//循环进入redis用队的方式
foreach ($data as $key => $val) {
	for ($i=1; $i <=$val['stock'] ; $i++) { 
		$redis->lpush("goods".$val['id'],$i);
	}
}
?>