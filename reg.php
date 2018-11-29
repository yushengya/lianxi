<?php
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>新用户注册</h1>
	<form action='<?=Url::to(['security/regok'])?>' method="post">
		<div class="form-group">
			<label>用户名</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>密码</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>邮箱</label>
			<input type="email" name="email" class="form-control">
		</div>
		<input type="hidden" name="_csrf-frontend" value="<?=yii::$app->request->csrfToken;?>">
		<button type="submit" class="btn btn-default">注册</button>
	</form>
</body>
</html>