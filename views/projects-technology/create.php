<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectsTechnology */

$this->title = Yii::t('app', 'Create Projects Technology');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects Technologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-technology-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
