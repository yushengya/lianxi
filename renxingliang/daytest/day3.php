<?php
@$lng=$_GET['lng'];
@$lat=$_GET['lat'];
$address= new PDO('mysql:host=127.0.0.1;dbname=cl','root','root');
$address->exec("insert into address (lng,lat) values ('$lng','$lat')");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p id="container" style="width: 800px; height: 600px;"></p>
<form action="">
<input type="hidden" name="lng" value="" id="lng">
<input type="hidden" name="lat" value="" id="lat">
    <input type="submit" value="提交">
</form>
</body>
</html>
<script src=".\jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ypOMPEy8ubVWX82TwTM3u8cxj1KwvdRq"></script>
<script>
    var map = new BMap.Map("container");          // 创建地图实例
    var point = new BMap.Point(116.404, 39.915);  // 创建点坐标
    map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    map.centerAndZoom(point, 11);
    map.addEventListener("click", function(e){
        // alert(e.point.lng + ", " + e.point.lat);
        $("#lng").val(e.point.lng);
        $("#lat").val(e.point.lat);
    });
</script>