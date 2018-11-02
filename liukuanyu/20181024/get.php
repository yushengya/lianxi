<?php
header('content-type:text/html;charset=utf8');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'http://www.techweb.com.cn/');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res = curl_exec($ch);
$para = '#<a href=".*" target="_blank">[\s\S]+<div class="picture">[\s\S]+<img id="y31" src=".*" alt=".*" title=".*">[\s\S]+<img id="y32" src="(.*)" alt=".*" title=".*">[\s\S]+</div>[\s\S]+<h4>(.*)</h4>[\s\S]+</a>#';
preg_match_all($para,$res,$arr);
var_dump($res);