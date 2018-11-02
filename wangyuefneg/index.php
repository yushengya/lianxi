<?php 
$ch1 = curl_init(); 
$ch2 = curl_init(); 
curl_setopt($ch1, CURLOPT_URL, "http://www.baidu.com/"); 
curl_setopt($ch1, CURLOPT_HEADER, 0); 
curl_setopt($ch2, CURLOPT_URL, "http://www.google.com/"); 
curl_setopt($ch2, CURLOPT_HEADER, 0); 
$mh = curl_multi_init(); 
curl_multi_add_handle($mh,$ch1); 
curl_multi_add_handle($mh,$ch2); 
do { 
curl_multi_exec($mh,$flag); 
} while ($flag > 0); 


curl_multi_remove_handle($mh,$ch1); 
curl_multi_remove_handle($mh,$ch2); 
curl_multi_close($mh); 
echo $mh;
?> 

