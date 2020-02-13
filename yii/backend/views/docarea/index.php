<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Person;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DocareaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Добавить врача на участок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docarea-index">


    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
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
                'value' => function($data) {
                    return $data->branches->bran_name;
                }
            ],
            [
                'attribute' => 'id_area',
                'value' => function($data){
                   // return $data->area->
                    $typearea = \common\models\Typearea::find()->where(['id' => $data->area->id_typearea])->all();
                    foreach ($typearea as $value){
                        return $data->area->number . ' ' . $value->type_name;
                    }

                },
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
