<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m200318_164209_create_payment_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%payment}}', [
      'id' => $this->primaryKey(),
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer(),
      'user_id' => $this->integer()->notNull(),
      'sum' => $this->float()->notNull(),
      'active' => $this->boolean()->defaultValue(1),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%payment}}');
  }
}
