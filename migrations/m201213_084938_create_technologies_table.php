<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%technologies}}`.
 */
class m201213_084938_create_technologies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%technologies}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'active' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%technologies}}');
    }
}
