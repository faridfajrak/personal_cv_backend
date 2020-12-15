<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectsPlatform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-platform-form">

    <?php $form = ActiveForm::begin(); ?>



    <?=  $form->field($model, 'platform_id')
        ->dropDownList(
            \app\models\Platforms::getListArrayHelper(),           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        );
    ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
