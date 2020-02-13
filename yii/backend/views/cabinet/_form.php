<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Cabinet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cabinet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bran')->dropDownList(ArrayHelper::map(\common\models\Branches::find()->all(), 'id', 'bran_name')) ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <?= $form->field($model, 'name_prof')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmsp')->dropDownList(['0' => 'Нет', '1' => 'Да']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
