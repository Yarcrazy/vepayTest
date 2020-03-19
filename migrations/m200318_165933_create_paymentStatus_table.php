<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paymentStatus}}`.
 */
class m200318_165933_create_paymentStatus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%paymentStatus}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%paymentStatus}}');
    }
}
