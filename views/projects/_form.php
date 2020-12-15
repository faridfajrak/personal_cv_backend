<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pwa_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'play_store_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apple_store_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'github_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_link')->textInput(['maxlength' => true]) ?>

    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'screen_1',
    ]) ?>

    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'screen_2',
    ]) ?>

    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'screen_3',
    ]) ?>

    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'video',
    ]) ?>


    <?= $form->field($model, 'active')->checkbox(['checked'=> true])?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
