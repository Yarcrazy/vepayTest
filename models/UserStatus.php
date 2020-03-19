<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userStatus".
 *
 * @property int $id
 * @property string $status
 *
 * @property User[] $users
 */
class UserStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userStatus';
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStatusQuery(get_called_class());
    }
}
