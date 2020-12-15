<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file_upload}}`.
 */
class m201213_085037_create_file_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file_upload}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'section' => $this->string(150)->notNull(),
            'category' => $this->string(150)->notNull(),
            'refer_table' => $this->string(150)->notNull(),
            'refer_id' => $this->integer()->notNull(),
            'refer_column' => $this->string(150)->notNull(),
            'file_name' => $this->string(150)->notNull(),
            'file_name_original' => $this->string(150)->notNull(),
            'description' => $this->string(500),
            'mime_type' => $this->string(100)->notNull(),
            'file_size' => $this->bigInteger()->notNull(),
            'relative_path' => $this->string(1000)->notNull(),
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
        $this->dropTable('{{%file_upload}}');
    }
}
