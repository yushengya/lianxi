<?php
$pdo=new PDO("mysql:host=127.0.0.1;dbname=week",'root','root');
$data=$pdo->query("select * from goods")->fetchAll();

foreach ($data as $key => $val) {
	$start=time();
	$end=$val['endtime'];
	$cha=$end-$start;
	$hour=floor($cha/3600);//计算小时
	$minute=floor(($cha-$hour*3600)/60);//计算分钟
	$second=$cha-$hour*3600-$minute*60;//计算秒
	//重新复制到data中
	$data[$key]['hour']=$hour;
	$data[$key]['minute']=$minute;
	$data[$key]['second']=$second;
}
//返回json数据
echo json_encode($data);
?>