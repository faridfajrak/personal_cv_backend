<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            \app\components\ViewCmp::getAttachmentColumn('profilePicture'),
            'name',
            'title',
            'linkedin',
            \app\components\ViewCmp::getAttachmentColumn('linkedInIcon'),
            'skype',
            \app\components\ViewCmp::getAttachmentColumn('skypeIcon'),
            'github',
            \app\components\ViewCmp::getAttachmentColumn('gitHubIcon'),
            'email:email',
            \app\components\ViewCmp::getAttachmentColumn('emailIcon'),
            'description:ntext',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
