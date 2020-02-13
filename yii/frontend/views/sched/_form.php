<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sched */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sched-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bran')->textInput() ?>

    <?= $form->field($model, 'id_doc')->textInput() ?>

    <?= $form->field($model, 'id_prof')->textInput() ?>

    <?= $form->field($model, 'id_area')->textInput() ?>

    <?= $form->field($model, 'id_cab')->textInput() ?>

    <?= $form->field($model, 'data_start')->textInput() ?>

    <?= $form->field($model, 'data_end')->textInput() ?>

    <?= $form->field($model, 'monday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tuesday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tuesday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wednesday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wednesday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thursday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thursday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'friday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'friday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saturday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saturday_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sunday_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sunday_end')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
