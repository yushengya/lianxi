<?php
namespace frontend\models;

use yii\db\ActiveRecord;


class News extends ActiveRecord
{
	public function attributeLabels(){
		return [
			'title'=>"标题",
			"content"=>"内容",
			"author"=>"作者"
		];
	}
}
?>