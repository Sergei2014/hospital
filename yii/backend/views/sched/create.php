<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sched */

$this->title = 'Create Sched';
$this->params['breadcrumbs'][] = ['label' => 'Scheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sched-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrbran' => $arrbran,
        'arrdoc' => [],
        'arrprof' => [],
        'arrarea' => [],
        'arrcab' => [],
    ]) ?>

</div>
