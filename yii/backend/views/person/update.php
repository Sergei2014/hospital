<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
