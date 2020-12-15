<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%platforms}}`.
 */
class m201213_084929_create_platforms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%platforms}}', [
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
        $this->dropTable('{{%platforms}}');
    }
}
