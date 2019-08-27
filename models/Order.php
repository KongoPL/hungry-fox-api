<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property string $id
 * @property string $name
 * @property string $phone
 * @property string $street
 * @property string $buildingNumber
 * @property string $apartmentNumber
 * @property int $paymentMethod
 * @property string $comments
 * @property int $status
 * @property string $createTime
 * @property string $completeTime
 * @property string $estimatedDeliveryTime
 * @property string $deliveryTime
 *
 * @property OrderItem[] $orderItems
 */
class Order extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'paymentMethod', 'status'], 'integer'],
            [['comments'], 'string'],
            [['createTime', 'completeTime', 'estimatedDeliveryTime', 'deliveryTime'], 'safe'],
            [['name', 'street'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 14],
            [['buildingNumber', 'apartmentNumber'], 'string', 'max' => 5],
            [['id'], 'unique'],
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
            'phone' => Yii::t('app', 'Phone'),
            'street' => Yii::t('app', 'Street'),
            'buildingNumber' => Yii::t('app', 'Building Number'),
            'apartmentNumber' => Yii::t('app', 'Apartment Number'),
            'paymentMethod' => Yii::t('app', 'Payment Method'),
            'comments' => Yii::t('app', 'Comments'),
            'status' => Yii::t('app', 'Status'),
            'createTime' => Yii::t('app', 'Create Time'),
            'completeTime' => Yii::t('app', 'Complete Time'),
            'estimatedDeliveryTime' => Yii::t('app', 'Estimated Delivery Time'),
            'deliveryTime' => Yii::t('app', 'Delivery Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['orderId' => 'id']);
    }
}
