<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(['id' => 'scheduleForm']); ?>

        <table>
        <tbody>
        <tr>
            <td><?= $form->field($model, 'id_bran')->dropDownList($arrbran, [
                    'prompt' => 'Выбрать отделение',
                    'onchange' => '$.post("/schedule/list?id='.'"+$(this).val(), function (data){$("select#schedule-id_doc").html(data)});'
                ]) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'id_doc')->dropDownList($arrdoc, [
                    'prompt' => '',
                    'onchange' => '$.post("/schedule/prof?id='.'"+$(this).val(), function (data){$("select#schedule-id_prof").html(data)});'
                    . '$.post("/schedule/area?id='.'"+$(this).val(), function (data){$("select#schedule-id_area").html(data)});'
                ]) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_area')->dropDownList($arrdoc, ['prompt' => '']) ?></td>
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
                <?= $form->field($model, 'data_start')->widget(DatePicker::className(),[
                    'name' => 'dp_1',
                    'options' => ['placeholder' => 'Ввод даты...'],
                    'convertFormat' => true,
                    'value'=> date("d.m.Y",(integer) $model->data_start),
                    'pluginOptions' => [
                        'format' => 'dd.MM.yyyy',
                        'autoclose'=>true,
                        'weekStart'=>1, //неделя начинается с понедельника
                        'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
                        'todayBtn'=>true, //снизу кнопка "сегодня"
                    ]
                ]); ?>
            </td>


            <td class="tbl-form-input">
                <?= $form->field($model, 'data_end')->widget(DatePicker::className(),[
                    'name' => 'dp_2',
                    'options' => ['placeholder' => 'Ввод даты...'],
                    'convertFormat' => true,
                    'value'=> date("d.m.Y",(integer) $model->data_end),
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
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Понедельник', 'onchange' => 'mDisabled(this.checked)', 'value' => '1', 'checked '=>true]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало'])->label('')?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец'])->label('')   ?></td>
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
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
