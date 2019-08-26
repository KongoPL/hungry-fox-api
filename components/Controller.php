<?php

namespace app\components;

use Yii;

class Controller extends \yii\web\Controller
{
	public function beforeAction($action)
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return parent::beforeAction($action);
	}
}