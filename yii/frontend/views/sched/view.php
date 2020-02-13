<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sched */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sched-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_bran',
            'id_doc',
            'id_prof',
            'id_area',
            'id_cab',
            'data_start',
            'data_end',
            'monday_begin',
            'monday_end',
            'tuesday_begin',
            'tuesday_end',
            'wednesday_begin',
            'wednesday_end',
            'thursday_begin',
            'thursday_end',
            'friday_begin',
            'friday_end',
            'saturday_begin',
            'saturday_end',
            'sunday_begin',
            'sunday_end',
        ],
    ]) ?>

</div>
