<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments_status}}`.
 */
class m200318_165933_create_payments_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payments_status}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payments_status}}');
    }
}
