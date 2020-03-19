<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PaymentStatus]].
 *
 * @see PaymentStatus
 */
class PaymentStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PaymentStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PaymentStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
