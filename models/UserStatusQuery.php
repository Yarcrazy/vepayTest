<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserStatus]].
 *
 * @see UserStatus
 */
class UserStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
