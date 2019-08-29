<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Translation".
 *
 * @property string $id
 * @property string $table
 * @property string $column
 * @property int $recordId
 * @property string $language
 * @property string $value
 * @property int $status
 */
class Translation extends \app\components\ActiveRecord
{
	private static $translations = [];

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
            [['table', 'column', 'language', 'value'], 'required'],
            [['value'], 'string'],
            [['recordId', 'status'], 'integer'],
            [['type', 'column'], 'string', 'max' => 32],
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
            'table' => Yii::t('app', 'Table'),
            'column' => Yii::t('app', 'Column'),
            'language' => Yii::t('app', 'Language'),
            'value' => Yii::t('app', 'Value'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


	public static function translate($tableName, $column, $id, $defaultValue = null)
	{
		$language = explode("-", Yii::$app->language)[0];

		if(!isset(self::$translations[$language]))
			self::$translations[$language] = self::fetchTranslations($language);

		return isset(self::$translations[$language][$tableName][$column][$id]) ? self::$translations[$language][$tableName][$column][$id] : $defaultValue;
	}


	private static function fetchTranslations($language)
	{
		$return = [];
		$translations = self::find()->where(['language' => $language, 'status' => self::STATUS_OK])->all();

		foreach($translations as $translation)
			$return[$translation->table][$translation->column][$translation->recordId] = $translation->value;

		return $return;
	}
}
