<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Platforms */

$this->title = Yii::t('app', 'Create platforms');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'platforms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platforms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
