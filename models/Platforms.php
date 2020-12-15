<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;

/**
 * This is the model class for table "platforms".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property ProjectsPlatform[] $projectsPlatforms
 */
class Platforms extends \yii\db\ActiveRecord
{
    use ModelTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platforms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'active' => Yii::t('app', 'Active'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'activeStatusTitle' => Yii::t('app', 'Status'),

        ];
    }

    /**
     * Gets query for [[ProjectsPlatforms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsPlatforms()
    {
        return $this->hasMany(ProjectsPlatform::className(), ['platform_id' => 'id']);
    }
}
