<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<html lang="en">
<head>
	<title>Document</title>
</head>
<body>
	<h1>新闻注册</h1>
	<?php $form=ActiveForm::begin() ?>
	<div class="form-group">
		<?=$form->field($model,'title')->textInput();?>
	</div>
	<div class="form-group">
		<?=$form->field($model,'content')->textArea(["class"=>"form-control"]);?>
	</div>
	<div class="form-group">
		<?=$form->field($model,'author')->textInput();?>
	</div>
	<?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
	<?php ActiveForm::end();?>
</body>
</html>