<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Docarea */

$this->title = 'Update Docarea: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Docareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docarea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrarea' => $arrarea,
        'arrperson' => $arrperson,
        'arrbran' => $arrbran,
    ]) ?>

</div>
