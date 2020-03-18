<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m200318_164209_create_payments_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%payments}}', [
      'id' => $this->primaryKey(),
      'date' => $this->dateTime()->defaultValue(date("Y-m-d H:i:s", time())),
      'user_id' => $this->integer()->notNull(),
      'sum' => $this->float()->defaultValue(0),
      'status_id' => $this->integer()->notNull(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%payments}}');
  }
}
