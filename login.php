<?php
$name=$_POST['name'];
$pass=md5($_POST['pass']);
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1607a",'root','root');
$res=$pdo->query("select * from user where name='$name' and password='$pass'")->fetch();
if ($res) {
	session_start();
	$_SESSION['user_id']=$res['id'];
	echo "<script>alert('登录成功');location.href='manager.html'</script>";
}else{
	echo "<script>alert('登录失败');location.href='login.html'</script>";
}
?>