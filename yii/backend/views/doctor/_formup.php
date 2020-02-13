<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

      <?php echo $form->field($model, 'id_bran')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Branches::find()->all(), 'id', 'bran_name')) ?>
    

    <?= $form->field($model->person, 'id_person')->textInput(['value' => Html::encode($model->person->surname .' '.$model->person->name .' '.$model->person->patronymic)]) ?>

    <?= $form->field($model->profession, 'profession_name')->textInput() ?>

    <?= $form->field($model, 'type')->radioList(['0'=> 'Общий', '1' => 'Взрослый', '2' => 'Детский']) ?>

    <?= $form->field($model, 'vacation')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
