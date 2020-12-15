<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'profilePicture',
    ]) ?>

    <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>


    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'linkedInIcon',
    ]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>
    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'skypeIcon',
    ]) ?>

    <?= $form->field($model, 'github')->textInput(['maxlength' => true]) ?>
    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'gitHubIcon',
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?=  $this->render('/layouts/_form_attachment' , [
        'model' => $model,
        'column' => 'emailIcon',
    ]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
