<?php

namespace app\controllers;

class SiteController extends \app\components\Controller
{
	public function actionIndex()
	{
		return [
			'Hello',
			'World'
		];
	}
}
