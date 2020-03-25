<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $created_at
 * @property int|null $updated_at
 * @property int $user_id
 * @property float $sum
 * @property int|null $active
 *
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{

  const ACTIVE = '1';
  const DISABLE = '0';

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'payment';
  }

  public function behaviors()
  {
    return [
      TimestampBehavior::class,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['sum'], 'required', 'message' => 'Введите сумму!'],
      [['user_id'], 'required', 'message' => 'Введите идентификатор пользователя или телефон!'],
      [['created_at', 'updated_at', 'active'], 'integer'],
      [['user_id'], 'integer', 'message' => 'Идентификатор пользователя или телефон должны быть целым числом!'],
      [['sum'], 'double', 'message' => 'Сумма должна быть числом!'],
      [['sum'], 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'Сумма должна быть больше нуля!'],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'user_id' => 'User ID',
      'sum' => 'Sum',
      'active' => 'Active',
    ];
  }

  /**
   * Gets query for [[User]].
   *
   * @return \yii\db\ActiveQuery|UserQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }

  /**
   * {@inheritdoc}
   * @return PaymentQuery the active query used by this AR class.
   */
  public static function find()
  {
    return new PaymentQuery(get_called_class());
  }
}
