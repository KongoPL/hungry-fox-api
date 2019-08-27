<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Job".
 *
 * @property string $id
 * @property string $title
 * @property string $descrpition
 * @property int $status
 */
class Job extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descrpition'], 'string'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 32],
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
            'descrpition' => Yii::t('app', 'Descrpition'),
            'status' => Yii::t('app', 'Status'),
        ];
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
			'id' => $this->id,
			'name' => $this->name,
			'descrpition' => $this->descrpition
		];
	}
}
