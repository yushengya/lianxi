<?php
$city=$_GET['city'];
$redis=new Redis();
$redis->connect("127.0.0.1",6379);
if ($redis->exists($city)) {
	$str=$redis->get($city);
	echo $str;
	die;
}else{
	$url="https://free-api.heweather.com/s6/weather/forecast?location=$city&key=6d80aaa74da14f8fb0f756e265fa7a35";
	$str=curl($url);
	$arr=json_decode($str,true);
	$arr=$arr['HeWeather6'][0]['daily_forecast'];
	//var_dump($arr);
	$pdo=new PDO("mysql:host=127.0.0.1;dbname=1607a",'root','root');

	foreach ($arr as $key => $val) {
		$res=$pdo->exec("insert into wether values(null,'$city','$val[tmp_max]',$val[tmp_min],'$val[date]')");		
	}	
	$str=json_encode($arr);
	$a=$redis->set($city,$str);
	echo $str;
}

function curl($url){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL , $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
	$str=curl_exec($ch);
	curl_close($ch);
	return $str;
}

?>