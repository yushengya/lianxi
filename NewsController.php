<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\News;		// 包含news模型
class NewsController extends Controller{
	
	public function actionAdd(){
		$model=new News();
		return $this->render('add',['model'=>$model]);
	}
}
?>