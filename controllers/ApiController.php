<?php

namespace app\controllers;

class ApiController extends \app\components\Controller
{
	public function actionIndex()
	{
		return [
			'Hello',
			'World'
		];
	}


	public function actionError()
	{
		return [
			'error' => 'Unexpected error occured. Please try again'
		];
	}


	public function actionCategories()
	{
		$categories = \app\models\Category::getAllActive();

		return array_map(function($v){ return $v->toExternalArray(); }, $categories);
	}


	public function actionItems()
	{
		$groupedItems = [];
		$items = \app\models\Item::getAllActive();

		foreach($items as $item)
		{
			if(!isset($groupedItems[$item->categoryId]))
				$groupedItems[$item->categoryId] = [
					'categoryName' => $item->category->name,
					'items' => []
				];

			$groupedItems[$item->categoryId]['items'][] = $item->toExternalArray();
		}


		return $groupedItems;
	}


	public function actionCategoryItems($id)
	{
		return array_map(function($v){ return $v->toExternalArray(); }, \app\models\Item::getAllByCategory($id));
	}


	public function actionCoupons()
	{
		return array_map(function($v){ return $v->toExternalArray(); }, \app\models\Coupon::getAllActive());
	}


	public function actionStaff()
	{
		return array_map(function($v){ return $v->toExternalArray(); }, \app\models\Staff::getAllActive());
	}


	public function actionJobOffers()
	{
		return array_map(function($v){ return $v->toExternalArray(); }, \app\models\Job::getAllActive());
	}


	public function actionJobOfferDetails($id)
	{
		$job = \app\models\Job::getActiveById($id);

		if($job)
			return $job->toExternalArray();
		else
			return [
				'error' => 'Job offer doesn\'t exists!'
			];
	}
}
