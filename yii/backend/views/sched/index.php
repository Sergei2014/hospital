<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SchedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'График работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sched-index">

    <p>
        <?= Html::a('Создать график', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id_bran',
                'value' => function($data){
                    return $data->branches->bran_name;
                },
                'filter' => $arrbran,
            ],
            [
                'attribute' => 'id_doc',
                'value' => function($data) {
                    $persons = \common\models\Doctor::find()->with(['person'])->where(['id' => $data->id_doc])->all();
                    foreach ($persons as $value) {
                        return $value->person->surname . ' ' . $value->person->name . ' ' . $value->person->patronymic;
                    };
                },
                //'filter' => $persons,
            ],
            [
                'attribute' => 'id_prof',
                'value' => function($data){
                    return $data->profession->profession_name;
                },
            ],
            [
                'attribute' => 'id_area',
                'value' => function($data){
                    $areas = \common\models\Area::find()->with(['typearea'])->where(['id' => $data->id_area])->all();
                    foreach ($areas as $area) {
                       return $arrarea[$area->id] = $area->number .' '. $area->typearea->type_name;
                    }
                },
            ],
            [
                'attribute' => 'id_cab',
                'value' => function($data){
                    return $data->cabinet->num .' '. $data->cabinet->name_prof;
                },
            ],
            'data_start:date',
            'data_end:date',
            //'monday_begin',
            //'monday_end',
            //'tuesday_begin',
            //'tuesday_end',
            //'wednesday_begin',
            //'wednesday_end',
            //'thursday_begin',
            //'thursday_end',
            //'friday_begin',
            //'friday_end',
            //'saturday_begin',
            //'saturday_end',
            //'sunday_begin',
            //'sunday_end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
