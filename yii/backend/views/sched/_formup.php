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
            <td><?= $form->field($model, 'id_bran')->dropDownList($arrbran) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_doc')->dropDownList($arrperson) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_prof')->dropDownList($arrprof) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_area')->dropDownList($arrarea) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'id_cab')->dropDownList($arrcab) ?></td>
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
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Понедельник', 'onchange' => 'mDisabled(this.checked)', 'value' => '1', 'checked '=>$checMonday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledMonday])->label('')?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'monday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledMonday])->label('')   ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Вторник', 'onchange' => 'tDisabled(this.checked)', 'value' => '2', 'checked '=>$checTuesday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'tuesday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledTuesday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'tuesday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledTuesday])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Среда', 'onchange' => 'wDisabled(this.checked)', 'value' => '3', 'checked '=>$checWednesday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'wednesday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledWednesday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'wednesday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledWednesday])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Четверг', 'onchange' => 'thDisabled(this.checked)', 'value' => '4', 'checked '=>$checThursday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'thursday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledThursday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'thursday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledThursday])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Пятница', 'onchange' => 'fDisabled(this.checked)', 'value' => '5', 'checked '=>$checFriday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'friday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledFriday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'friday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledFriday])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Суббота', 'onchange' => 'sDisabled(this.checked)', 'value' => '6', 'checked '=>$checSaturday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'saturday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledSunday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'saturday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledSunday])->label('') ?></td>
        </tr>
        <tr>
            <td class="tbl-form"><?= $form->field($model, 'active')->checkbox(['label'=>'Воскресенье', 'onchange' => 'vDisabled(this.checked)', 'value' => '7', 'checked '=> $checSunday]) ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'sunday_begin')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'начало', 'disabled' => $disabledSaturday])->label('') ?></td>
            <td class="tbl-form-input"><?= $form->field($model, 'sunday_end')->widget(MaskedInput::className(), ['mask' => '9[9]:9[9]',])->textInput(['placeholder' => 'конец', 'disabled' => $disabledSaturday])->label('') ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
