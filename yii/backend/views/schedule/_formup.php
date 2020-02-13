<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(['id' => 'scheduleFormup']); ?>

    <table>
        <tbody>
        <tr>
            <td><?= $form->field($model, 'id_bran')->dropDownList($arrbran) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_doc')->dropDownList($arrperson, ['prompt' => '']) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_cab')->dropDownList($arrcab, ['prompt' => '']) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_prof')->dropDownList($arrprof, ['prompt' => '']) ?></td>
        </tr>
        </tbody>
    </table>
    <table>
        <tbody>
        <tr>
            <td class="tbl-form-input">

<?= $form->field($model, 'data')->widget(DatePicker::className(),[
        'name' => 'dp_1',
        'options' => ['placeholder' => 'Ввод даты...'],
        'convertFormat' => true,
        'value'=> date("d.m.Y",(integer) $model->data),
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]); ?>
            </td>
        </tr>
    </table>
    <table>
        <tbody>
        <tr>
            <td class="tbl-form-input"><?= $form->field($model, 'time_start')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput()->label('')?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'time_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput()->label('')   ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
