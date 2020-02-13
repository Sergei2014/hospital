<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SchedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sched-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_bran') ?>

    <?= $form->field($model, 'id_doc') ?>

    <?= $form->field($model, 'id_prof') ?>

    <?= $form->field($model, 'id_area') ?>

    <?php // echo $form->field($model, 'id_cab') ?>

    <?php // echo $form->field($model, 'data_start') ?>

    <?php // echo $form->field($model, 'data_end') ?>

    <?php // echo $form->field($model, 'monday_begin') ?>

    <?php // echo $form->field($model, 'monday_end') ?>

    <?php // echo $form->field($model, 'tuesday_begin') ?>

    <?php // echo $form->field($model, 'tuesday_end') ?>

    <?php // echo $form->field($model, 'wednesday_begin') ?>

    <?php // echo $form->field($model, 'wednesday_end') ?>

    <?php // echo $form->field($model, 'thursday_begin') ?>

    <?php // echo $form->field($model, 'thursday_end') ?>

    <?php // echo $form->field($model, 'friday_begin') ?>

    <?php // echo $form->field($model, 'friday_end') ?>

    <?php // echo $form->field($model, 'saturday_begin') ?>

    <?php // echo $form->field($model, 'saturday_end') ?>

    <?php // echo $form->field($model, 'sunday_begin') ?>

    <?php // echo $form->field($model, 'sunday_end') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
