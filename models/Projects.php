<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $pwa_link
 * @property string|null $play_store_link
 * @property string|null $apple_store_link
 * @property string|null $web_link
 * @property string|null $github_link
 * @property string|null $other_link
 * @property int|null $active
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property ProjectsPlatform[] $projectsPlatforms
 * @property ProjectsTechnology[] $projectsTechnologies
 */
class Projects extends \yii\db\ActiveRecord
{
    use ModelTrait;

    public $screen_1;
    public $screen_2;
    public $screen_3;
    public $video;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'pwa_link', 'play_store_link', 'apple_store_link', 'web_link', 'github_link', 'other_link'], 'string', 'max' => 255],
            [['screen_1','screen_2','screen_3','video',],'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'pwa_link' => Yii::t('app', 'Pwa Link'),
            'play_store_link' => Yii::t('app', 'Play Store Link'),
            'apple_store_link' => Yii::t('app', 'Apple Store Link'),
            'web_link' => Yii::t('app', 'Web Link'),
            'github_link' => Yii::t('app', 'Github Link'),
            'other_link' => Yii::t('app', 'Other Link'),
            'screen_1' => Yii::t('app', 'Screen-shut 1'),
            'screen_2' => Yii::t('app', 'Screen-shut 2'),
            'screen_3' => Yii::t('app', 'Screen-shut 3'),
            'video' => Yii::t('app', 'Demo Video'),
            'active' => Yii::t('app', 'Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ProjectsPlatforms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsPlatforms()
    {
        return $this->hasMany(ProjectsPlatform::className(), ['project_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectsTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsTechnologies()
    {
        return $this->hasMany(ProjectsTechnology::className(), ['project_id' => 'id']);
    }
}
