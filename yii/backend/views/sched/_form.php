<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model common\models\Sched */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sched-form">

    <?php $form = ActiveForm::begin(); ?>
    <table>
        <tbody>
        <tr>
            <td><?= $form->field($model, 'id_bran')->dropDownList($arrbran, [
                    'prompt' => 'Выбрать отделение',
                    'onchange' => '$.post("/sched/list?id='.'"+$(this).val(), function (data){$("select#sched-id_doc").html(data)});'
                        . '$.post("/sched/cabinet?id='.'"+$(this).val(), function (data){$("select#sched-id_cab").html(data)});'
                ]) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_doc')->dropDownList($arrdoc, [
                    'prompt' => '',
                    'onchange' => '$.post("/sched/prof?id='.'"+$(this).val(), function (data){$("select#sched-id_prof").html(data)});'
                        . '$.post("/sched/area?id='.'"+$(this).val(), function (data){$("select#sched-id_area").html(data)});'
                ]) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_prof')->dropDownList($arrprof, ['prompt' => '']) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_area')->dropDownList($arrarea, ['prompt' => '']) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_cab')->dropDownList($arrcab, ['prompt' => '']) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'type')->radioList(['0' => 'Взрослый', '1' => 'Детский']) ?></td>
        </tr>
        </tbody>
    </table>
    <table>
        <tbody>
        <tr>
            <td class="tbl-form-input">
                <?php echo $form->field($model, 'data_start')->widget(DateControl::classname(), [
                    'value'=>  $model->data_start,
                    'name' => 'dp_1',
                    'displayFormat' => 'd.MM.yyyy',
                    'type'=>DateControl::FORMAT_DATE
                ]);?>
            </td>
            <td class="tbl-form-input">
                <?php echo $form->field($model, 'data_end')->widget(DateControl::classname(), [
                    'value'=>  $model->data_end,
                    'name' => 'dp_2',
                    'displayFormat' => 'd.MM.yyyy',
                    'type'=>DateControl::FORMAT_DATE
                ]);?>
            </td>
        </tr>
    </table>
    <table>
        <tbody>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Понедельник', 'onchange' => 'mDisabled(this.checked)', 'value' => '1', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('')?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'onchange' => 'chektime'])->label('')   ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Вторник', 'onchange' => 'tDisabled(this.checked)', 'value' => '2', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'tuesday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'tuesday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец'])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Среда', 'onchange' => 'wDisabled(this.checked)', 'value' => '3', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'wednesday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'wednesday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец'])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Четверг', 'onchange' => 'thDisabled(this.checked)', 'value' => '4', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'thursday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'thursday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец'])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Пятница', 'onchange' => 'fDisabled(this.checked)', 'value' => '5', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'friday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'friday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец'])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Суббота', 'onchange' => 'sDisabled(this.checked)', 'value' => '6', 'checked '=>false]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'saturday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => 'disabled'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'saturday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => 'disabled'])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Воскресенье', 'onchange' => 'vDisabled(this.checked)', 'value' => '7', 'checked '=>false]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'sunday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => 'disabled'])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'sunday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => 'disabled'])->label('') ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
