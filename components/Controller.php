<?php

namespace app\components;

use Yii;

class Controller extends \yii\web\Controller
{
	public function beforeAction($action)
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		Yii::$app->response->headers->add('Access-Control-Allow-Origin', '*');
		Yii::$app->response->headers->add('Access-Control-Allow-Methods', 'GET,POST');

		return parent::beforeAction($action);
	}
}