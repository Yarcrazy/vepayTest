<?php

use yii\db\Migration;

/**
 * Class m200318_170950_create_foreign_key_payment_paymentStatus
 */
class m200318_170950_create_foreign_key_payment_paymentStatus extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_payment_paymentStatus', 'payment', ['status_id'], 'paymentStatus', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_payment_paymentStatus', 'payment');
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
