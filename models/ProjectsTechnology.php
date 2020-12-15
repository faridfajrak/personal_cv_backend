<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;

/**
 * This is the model class for table "projects_technology".
 *
 * @property int $id
 * @property int $project_id
 * @property int $technology_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Projects $project
 * @property Technologies $technology
 */
class ProjectsTechnology extends \yii\db\ActiveRecord
{
    use ModelTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_technology';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'technology_id'], 'required'],
            [['project_id', 'technology_id', 'created_at', 'updated_at'], 'integer'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['technology_id'], 'exist', 'skipOnError' => true, 'targetClass' => Technologies::className(), 'targetAttribute' => ['technology_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'technology_id' => Yii::t('app', 'Technology ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id']);
    }

    /**
     * Gets query for [[Technology]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechnology()
    {
        return $this->hasOne(Technologies::className(), ['id' => 'technology_id']);
    }
}
