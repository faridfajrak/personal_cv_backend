<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $linkedin
 * @property string|null $skype
 * @property string|null $github
 * @property string|null $email
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Profile extends \yii\db\ActiveRecord
{
    use ModelTrait;

    public $profilePicture;
    public $linkedInIcon;
    public $skypeIcon;
    public $emailIcon;
    public $githubIcon;

    /**
     * linkedInIcon{@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'linkedin', 'skype', 'github', 'email'], 'string', 'max' => 255],
            [['profilePicture','skypeIcon','emailIcon','githubIcon'],'file']
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
            'title' => Yii::t('app', 'Title'),
            'linkedin' => Yii::t('app', 'Linkedin'),
            'skype' => Yii::t('app', 'Skype'),
            'profilePicture' => Yii::t('app', 'Profile Picture'),
            'linkedInIcon' => Yii::t('app', 'LinkedIn Icon'),
            'skypeIcon' => Yii::t('app', 'Skype Icon'),
            'emailIcon' => Yii::t('app', 'Email Icon'),
            'githubIcon' => Yii::t('app', 'Github Icon'),
            'github' => Yii::t('app', 'Github'),
            'email' => Yii::t('app', 'Email'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
