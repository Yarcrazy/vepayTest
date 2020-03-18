<?php

use yii\db\Migration;

/**
 * Class m200318_170427_create_foreign_key_payments_users
 */
class m200318_170427_create_foreign_key_payments_users extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_payments_users', 'payments', ['user_id'], 'users', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_payments_users', 'payments');
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
