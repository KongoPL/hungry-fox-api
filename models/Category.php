<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property string $id
 * @property string $name
 * @property int $status
 *
 * @property Item[] $items
 */
class Category extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['categoryId' => 'id']);
    }


	public static function getAllActive()
	{
		return self::find()->where(['status' => self::STATUS_OK])->all();
	}


	public function toExternalArray()
	{
		return [
			'id' => $this->id,
			'name' => $this->name
		];
	}
}
