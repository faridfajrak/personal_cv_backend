<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects_technology}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%projects}}`
 * - `{{%technologies}}`
 */
class m201213_090220_create_projects_technology_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects_technology}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'technology_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-projects_technology-project_id}}',
            '{{%projects_technology}}',
            'project_id'
        );

        // add foreign key for table `{{%projects}}`
        $this->addForeignKey(
            '{{%fk-projects_technology-project_id}}',
            '{{%projects_technology}}',
            'project_id',
            '{{%projects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `technology_id`
        $this->createIndex(
            '{{%idx-projects_technology-technology_id}}',
            '{{%projects_technology}}',
            'technology_id'
        );

        // add foreign key for table `{{%technologies}}`
        $this->addForeignKey(
            '{{%fk-projects_technology-technology_id}}',
            '{{%projects_technology}}',
            'technology_id',
            '{{%technologies}}',
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
            '{{%fk-projects_technology-project_id}}',
            '{{%projects_technology}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-projects_technology-project_id}}',
            '{{%projects_technology}}'
        );

        // drops foreign key for table `{{%technologies}}`
        $this->dropForeignKey(
            '{{%fk-projects_technology-technology_id}}',
            '{{%projects_technology}}'
        );

        // drops index for column `technology_id`
        $this->dropIndex(
            '{{%idx-projects_technology-technology_id}}',
            '{{%projects_technology}}'
        );

        $this->dropTable('{{%projects_technology}}');
    }
}
