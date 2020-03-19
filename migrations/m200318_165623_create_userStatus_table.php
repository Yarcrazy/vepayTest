<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userStatus}}`.
 */
class m200318_165623_create_userStatus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userStatus}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userStatus}}');
    }
}
