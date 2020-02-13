<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Doctor;
use common\models\Branches;
use common\models\Profession;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id_bran')->dropDownList(\yii\helpers\ArrayHelper::map(Branches::find()->all(), 'id', 'bran_name')) ?>

    <?= $form->field($model, 'id_person')->dropDownList($arrperson, ['prompt' => '']) ?>

    <?= $form->field($model, 'id_prof')->dropDownList(\yii\helpers\ArrayHelper::map(Profession::find()->all(), 'id', 'profession_name')) ?>

    <?= $form->field($model, 'type')->radioList(['0'=> 'Общий', '1' => 'Взрослый', '2' => 'Детский']) ?>

    <?= $form->field($model, 'vacation')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
