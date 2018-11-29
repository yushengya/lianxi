<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii;
class SecurityController extends Controller
{
	public function actionReg(){
		return $this->render("reg");
	}
	public function actionRegok(){
		$name=yii::$app->request->post("name");
		$password=md5(yii::$app->request->post("password"));
		$email=yii::$app->request->post("email");
		//echo $name,$password,$email;
		$addtime=time();
		$sql="insert into user values(null,'$name','$password','$email',$addtime)";

		yii::$app->db->createCommand($sql)->execute();

	}
}