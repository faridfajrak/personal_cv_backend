<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="projects-view">

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
            'name',
            'description:ntext',
            'pwa_link',
            'play_store_link',
            'apple_store_link',
            'web_link',
            'github_link',
            'other_link',
            \app\components\ViewCmp::getAttachmentColumn('screen_1'),
            \app\components\ViewCmp::getAttachmentColumn('screen_2'),
            \app\components\ViewCmp::getAttachmentColumn('screen_3'),
            \app\components\ViewCmp::getAttachmentColumn('video'),
            'activeStatusTitle',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?= Yii::t('app','Platforms')?></h1>

                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p>
                            <?= Html::a(Yii::t('app', 'Add Platform'), ['/projects-platform/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>
                        <?= GridView::widget([
                            'dataProvider' => $platformDataProvider,
                            'filterModel' => $platformSearchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'platform.name',
                                'createdAt',
                                'updatedAt',
                                //'active',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'buttons' =>  [
                                        'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                ['/projects-platform/view', 'id' => $model->id]
                                            );
                                        },

                                        'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                ['/projects-platform/update', 'id' => $model->id,'projectId'=>$model->project_id]
                                            );

                                        },

                                        'delete' => function ($url, $model) {
                                            return Html::a("<span class='glyphicon glyphicon-trash'></span>",
                                                ['/projects-platform/delete', 'id' => $model->id,'projectId'=>$model->project_id], [

                                                    'data' => [
                                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                        'method' => 'post',
                                                    ],
                                                ]);

                                        },
                                    ]
                                ],
                            ],
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?= Yii::t('app','Technologies')?></h1>

                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p>
                            <?= Html::a(Yii::t('app', 'Add Technology'), ['/projects-technology/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>
                        <?= GridView::widget([
                            'dataProvider' => $techDataProvider,
                            'filterModel' => $techSearchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'technology.name',
                                'createdAt',
                                'updatedAt',
                                //'active',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'buttons' =>  [
                                        'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                ['/projects-technology/view', 'id' => $model->id]
                                            );
                                        },

                                        'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                ['/projects-technology/update', 'id' => $model->id,'projectId'=>$model->project_id]
                                            );

                                        },

                                        'delete' => function ($url, $model) {
                                            return Html::a("<span class='glyphicon glyphicon-trash'></span>",
                                                ['/projects-technology/delete', 'id' => $model->id,'projectId'=>$model->project_id], [

                                                    'data' => [
                                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                        'method' => 'post',
                                                    ],
                                                ]);

                                        },
                                    ]
                                ],
                            ],
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
