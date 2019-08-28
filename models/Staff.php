<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Staff".
 *
 * @property string $id
 * @property string $name
 * @property string $position
 * @property string $email
 * @property string $phone
 * @property int $status
 *
 * @property string $imageUrl
 */
class Staff extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'position'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


	public function getImageUrl()
	{
		return Yii::$app->urlManager->createAbsoluteUrl('images/staff-member.jpg');
	}


	public static function getAllActive()
	{
		return self::find()->where([
			'status' => self::STATUS_OK,
		])->all();
	}


	public function toExternalArray()
	{
		return [
			'name' => $this->name,
			'position' => $this->position,
			'email' => $this->email,
			'phone' => $this->phone,
			'imageUrl' => $this->imageUrl
		];
	}
}
