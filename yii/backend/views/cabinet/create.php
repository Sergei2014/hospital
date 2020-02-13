<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cabinet */

$this->title = 'Добавить кабинет';
$this->params['breadcrumbs'][] = ['label' => 'Cabinets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
