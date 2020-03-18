<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_status}}`.
 */
class m200318_165623_create_users_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_status}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_status}}');
    }
}
