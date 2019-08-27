<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Translation".
 *
 * @property string $id
 * @property string $type
 * @property string $language
 * @property string $value
 * @property int $status
 */
class Translation extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'language', 'value'], 'required'],
            [['value'], 'string'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 64],
            [['language'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'language' => Yii::t('app', 'Language'),
            'value' => Yii::t('app', 'Value'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
