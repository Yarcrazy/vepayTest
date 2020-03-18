<?php

use yii\db\Migration;

/**
 * Class m200318_170802_create_foreign_key_users_users_status
 */
class m200318_170802_create_foreign_key_users_users_status extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_users_users_status', 'users', ['status_id'], 'users_status', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_users_users_status', 'users');
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m200318_170802_create_foreign_key_users_users_status cannot be reverted.\n";

      return false;
  }
  */
}
