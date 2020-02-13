<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sched */

$this->title = 'Update Sched: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sched-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
