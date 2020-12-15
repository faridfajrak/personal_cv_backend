<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;

/**
 * This is the model class for table "technologies".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property ProjectsTechnology[] $projectsTechnologies
 */
class Technologies extends \yii\db\ActiveRecord
{
    use ModelTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technologies';
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ProjectsTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsTechnologies()
    {
        return $this->hasMany(ProjectsTechnology::className(), ['technology_id' => 'id']);
    }
}
