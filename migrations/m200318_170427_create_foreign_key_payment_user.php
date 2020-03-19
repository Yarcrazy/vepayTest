<?php

use yii\db\Migration;

/**
 * Class m200318_170427_create_foreign_key_payment_user
 */
class m200318_170427_create_foreign_key_payment_user extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_payment_user', 'payment', ['user_id'], 'user', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_payment_user', 'payment');
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m200318_170427_create_foreign_key_payments_users cannot be reverted.\n";

      return false;
  }
  */
}
