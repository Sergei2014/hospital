<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Schedule */

$this->title = 'Создание графика';
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-create">

    <?= $this->render('_form', [
        'model' => $model,
        'arrbran' => $arrbran,
        'arrarea' => $arrarea,
        'arrdoc' => $arrdoc,
        'arrprof' => $arrprof,
        'arrcab' => $arrcab,
    ]) ?>

</div>
