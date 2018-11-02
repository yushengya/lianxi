<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=lx','root','root');
header('content-type:text/html;charset=utf8');
$key = empty($_GET['key'])?'':$_GET['key'];
$search_Arr = $pdo->query("select * from `new_22` WHERE title like '%$key%' or content LIKE '%$key%'")->fetchAll();
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
<form action="?">
    <table>
        <tr>
            <td colspan="10"><input type="text" name="key"><input type="submit"></td>
        </tr>
        <tr>
            <td>ID</td>
            <td>标题</td>
            <td>内容</td>
            <td>作者</td>
        </tr>
        <?php foreach ($search_Arr as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['title']?></td>
                <td><?php echo $v['content']?></td>
                <td><?php echo $v['author']?></td>
            </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>
