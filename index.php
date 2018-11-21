<?php
function login(){
	$appid="101353491";
	//$appkey="df4e46ba7da52f787c6e3336d30526e4";
	$redirect="http://www.iwebshop.com/index.php";
	$state="12dfsd";
	//调用 直接用header头传到第三方登录界面
	$url="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=$appid&redirect_uri=$redirect&state=$state";
	header("location:$url");
}
function token($code){
	//获取token值 file_get_contents方法
	$appid="101353491";
	$redirect="http://www.iwebshop.com/index.php";
	$appkey="df4e46ba7da52f787c6e3336d30526e4";
	//var_dump($code);die;
	$url="https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=$appid&client_secret=$appkey&code=$code&redirect_uri=$redirect";
	$str=file_get_contents($url);
	//查出token值的地方 然后进行切割 获取token
	//var_dump($str);die;
	$left=strpos($str, "=");
	$right=stripos($str, "&");
	$token=substr($str, $left+1,$right-$left-1);
	openId($token);
}
function openId($token){
	//获取openid的方法
	$url="https://graph.qq.com/oauth2.0/me?access_token=$token";
	$str=file_get_contents($url);
	//var_dump($str);
	//查出openid 获取token
	//var_dump($str);die;
	$left=strpos($str, "(");
	$right=stripos($str, ")");
	$str=substr($str, $left+1,$right-$left-1);
	$arr=json_decode($str,true);
	//var_dump($arr);
	$openid=$arr['openid'];
	show($openid,$token);
}
//展示数据 
function show($openid,$token){
	$appid="101353491";
	$url="https://graph.qq.com/user/get_user_info?access_token=$token&oauth_consumer_key=$appid&openid=$openid";
	$str=file_get_contents($url);
	$arr=json_decode($str,true);
	//var_dump($arr);
	$nickname=$arr['nickname'];
	$figureurl=$arr['figureurl_qq_1'];
	session_start();
	$_SESSION['nickname']=$nickname;
	$_SESSION['figureurl']=$figureurl;
	echo "<script>location.href='show.php'</script>";
}	
if(isset($_GET['code'])){
	$code=$_GET['code'];
	var_dump($code);
	token($code);
}else{
	login();
}

?>