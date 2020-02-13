<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Schedule */

$this->title = 'Update Schedule: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formup', [
        'model' => $model,
        'arrbran' => $arrbran,
        'arrperson' => $arrperson,
        'arrprof' => $arrprof,
        'arrcab' => $arrcab,
    ]) ?>

</div>
