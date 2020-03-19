<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200318_163437_create_user_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%user}}', [
      'id' => $this->primaryKey(),
      'phone' => $this->string(),
      'fio' => $this->string()->notNull(),
      'balance' => $this->float()->defaultValue(0),
      'active' => $this->boolean()->defaultValue(1),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%user}}');
  }
}
