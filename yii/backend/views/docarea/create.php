<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Docarea */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Docareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrarea' => $arrarea,
        'arrperson' => $arrperson,
        'arrbran' => $arrbran,
    ]) ?>

</div>
