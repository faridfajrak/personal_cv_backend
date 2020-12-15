<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects_platform}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%projects}}`
 * - `{{%platforms}}`
 */
class m201213_090120_create_projects_platform_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects_platform}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'platform_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-projects_platform-project_id}}',
            '{{%projects_platform}}',
            'project_id'
        );

        // add foreign key for table `{{%projects}}`
        $this->addForeignKey(
            '{{%fk-projects_platform-project_id}}',
            '{{%projects_platform}}',
            'project_id',
            '{{%projects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `platform_id`
        $this->createIndex(
            '{{%idx-projects_platform-platform_id}}',
            '{{%projects_platform}}',
            'platform_id'
        );

        // add foreign key for table `{{%platforms}}`
        $this->addForeignKey(
            '{{%fk-projects_platform-platform_id}}',
            '{{%projects_platform}}',
            'platform_id',
            '{{%platforms}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%projects}}`
        $this->dropForeignKey(
            '{{%fk-projects_platform-project_id}}',
            '{{%projects_platform}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-projects_platform-project_id}}',
            '{{%projects_platform}}'
        );

        // drops foreign key for table `{{%platforms}}`
        $this->dropForeignKey(
            '{{%fk-projects_platform-platform_id}}',
            '{{%projects_platform}}'
        );

        // drops index for column `platform_id`
        $this->dropIndex(
            '{{%idx-projects_platform-platform_id}}',
            '{{%projects_platform}}'
        );

        $this->dropTable('{{%projects_platform}}');
    }
}
