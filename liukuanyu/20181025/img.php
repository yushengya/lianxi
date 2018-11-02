<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=lx','root','root');
header('content-type:text/html;charset=utf8');
$search_Arr = $pdo->query("select * from `4399game`")->fetchAll();
foreach ($search_Arr as $k=>$v)
{
    $img = file_get_contents($v['game_img']);
    file_put_contents('./img/'.$k.'.jpg',$img);
}