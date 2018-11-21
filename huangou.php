<?php 
$goods_id=$_GET['goods_id'];
//var_dump($goods_id);
$goods_score=$_GET['goods_score'];
//var_dump($goods_score);die;
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1607a",'root','root');
session_start();
$id=$_SESSION['user_id'];
$res=$pdo->exec("update user set score=score-'$goods_score' where id=$id");
$res1=$pdo->exec("update goods set stock=stock-1 where id=$goods_id");

$addtime=time();
$res=$pdo->exec("insert into scorelog values(null,$id,$goods_id,$goods_score,$addtime)");
if ($res) {
	echo "ok";
}
?>