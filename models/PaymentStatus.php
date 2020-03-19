<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paymentStatus".
 *
 * @property int $id
 * @property string $status
 *
 * @property Payment[] $payments
 */
class PaymentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentStatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery|PaymentQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PaymentStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentStatusQuery(get_called_class());
    }
}
