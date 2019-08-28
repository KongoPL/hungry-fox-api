<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Item".
 *
 * @property int $id
 * @property string $categoryId
 * @property string $name
 * @property string $description
 * @property string $price
 * @property int $status
 *
 * @property Category $category
 * @property OrderItem[] $orderItems
 * @property string $imageUrl
 */
class Item extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoryId'], 'required'],
            [['id', 'categoryId', 'status'], 'integer'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoryId' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['itemId' => 'id']);
    }


	public function getImageUrl()
	{
		return Yii::$app->urlManager->createAbsoluteUrl('images/category-icon.png');
	}


	public static function getAllActive()
	{
		return self::find()->where([
			'status' => self::STATUS_OK,
		])->all();
	}


	public static function getAllByCategory($categoryId)
	{
		return self::find()->where([
			'status' => self::STATUS_OK,
			'categoryId' => $categoryId
		])->all();
	}


	public function toExternalArray()
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'description' => $this->description,
			'price' => $this->price,
			'priceFormatted' => '$'.number_format($this->price, 2),
			'imageUrl' => $this->imageUrl
		];
	}
}
