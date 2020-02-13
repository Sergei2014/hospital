<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">


    <?= $this->render('_form', [
        'model' => $model,
        'arrperson' => $arrperson,
    ]) ?>

</div>
