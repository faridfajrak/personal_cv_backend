<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectsPlatformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projects Platforms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-platform-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Projects Platform'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            \app\components\ViewCmp::getFilerColumn(
                $searchModel , 'project_id'  , 'project.name' ,
                \app\models\Projects::getListArrayHelper('id','name',[
                    'active' => 1,
                ])
            ),
            \app\components\ViewCmp::getFilerColumn(
                $searchModel , 'platform_id'  , 'platform.name' ,
                \app\models\Projects::getListArrayHelper('id','name',[
                    'active' => 1,
                ])
            ),

            'createdAt',
            'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
