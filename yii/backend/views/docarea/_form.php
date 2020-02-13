<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Docarea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docarea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_area')->dropDownList($arrarea, [
        'prompt' => 'Выбрать участок',
    ]) ?>

    <?= $form->field($model, 'id_bran')->dropDownList($arrbran, [
        'prompt' => 'Выбрать отделение',
        'onchange' => '$.post("/docarea/list?id='.'"+$(this).val(), function (data){$("select#docarea-id_doc").html(data)});',
    ]) ?>

    <?= $form->field($model, 'id_doc')->dropDownList($arrperson, [
        'prompt' => 'Выбрать врача',
    ]) ?>

    <?= $form->field($model, 'type')->radioList(['0'=> 'Общий', '1' => 'Взрослый', '2' => 'Детский']) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
