<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "OrderItem".
 *
 * @property string $id
 * @property string $orderId
 * @property int $itemId
 * @property string $buyPrice
 * @property int $quantity
 *
 * @property Item $item
 * @property Order $order
 */
class OrderItem extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'OrderItem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'itemId'], 'required'],
            [['orderId', 'itemId', 'quantity'], 'integer'],
            [['buyPrice'], 'number'],
            [['itemId'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['itemId' => 'id']],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['orderId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'orderId' => Yii::t('app', 'Order ID'),
            'itemId' => Yii::t('app', 'Item ID'),
            'buyPrice' => Yii::t('app', 'Buy Price'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'itemId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'orderId']);
    }
}
