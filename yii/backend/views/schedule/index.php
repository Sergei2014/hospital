<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Person;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Графики работ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">


    <p>
        <?= Html::a('Добавить график', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'attribute' => 'id_cab',
                'value' => function($data){
                    return $data->cabinet->num .' '. $data->cabinet->name_prof;
                },
            ],
            [
                'attribute' => 'data',

            ],
            //'data',
            'time_start',
            'time_end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
