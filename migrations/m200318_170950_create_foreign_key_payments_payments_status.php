<?php

use yii\db\Migration;

/**
 * Class m200318_170950_create_foreign_key_payments_payments_status
 */
class m200318_170950_create_foreign_key_payments_payments_status extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_payments_payments_status', 'payments', ['status_id'], 'payments_status', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_payments_payments_status', 'payments');
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m200318_170950_create_foreign_key_payments_payments_status cannot be reverted.\n";

      return false;
  }
  */
}
