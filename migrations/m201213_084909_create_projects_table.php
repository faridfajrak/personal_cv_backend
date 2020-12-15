<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects}}`.
 */
class m201213_084909_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(),
            'description' =>$this->text(),
            'pwa_link' =>$this->string()->defaultValue(""),
            'play_store_link' =>$this->string()->defaultValue(""),
            'apple_store_link' =>$this->string()->defaultValue(""),
            'web_link' =>$this->string()->defaultValue(""),
            'github_link' =>$this->string()->defaultValue(""),
            'other_link' =>$this->string()->defaultValue(""),
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
        $this->dropTable('{{%projects}}');
    }
}
