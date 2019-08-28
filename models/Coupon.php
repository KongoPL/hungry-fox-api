<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Coupon".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $dateTo
 * @property int $status
 *
 * @property string $imageUrl
 */
class Coupon extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Coupon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateTo'], 'safe'],
            [['status'], 'integer'],
            [['title', 'description'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'dateTo' => Yii::t('app', 'Date To'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


	public function getImageUrl()
	{
		return Yii::$app->urlManager->createAbsoluteUrl('images/sale-graphic.png');
	}


	public static function getAllActive()
	{
		return self::find()->where('status = :status AND (`dateTo` = "1970-01-01 00:00:00" OR `dateTo` >= NOW())', [
			':status' => self::STATUS_OK,
		])->all();
	}


	public function toExternalArray()
	{
		return [
			'title' => $this->title,
			'description' => $this->description,
			'dateTo' => $this->dateTo,
			'dateToTimestamp' => strtotime($this->dateTo),
			'imageUrl' => $this->imageUrl,
		];
	}
}
