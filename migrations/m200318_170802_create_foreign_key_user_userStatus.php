<?php

use yii\db\Migration;

/**
 * Class m200318_170802_create_foreign_key_user_userStatus
 */
class m200318_170802_create_foreign_key_user_userStatus extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('fk_user_userStatus', 'user', ['status_id'], 'userStatus', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_user_userStatus', 'user');
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
