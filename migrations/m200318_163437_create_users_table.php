<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200318_163437_create_users_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%users}}', [
      'id' => $this->primaryKey(),
      'phone' => $this->string(),
      'fio' => $this->string()->notNull(),
      'balance' => $this->float()->defaultValue(0),
      'status_id' => $this->integer()->notNull(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%users}}');
  }
}
