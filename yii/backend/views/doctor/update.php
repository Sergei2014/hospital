<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = 'Обновить данные: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-update">


    <?= $this->render('_formup', [
        'model' => $model,
    ]) ?>

</div>
