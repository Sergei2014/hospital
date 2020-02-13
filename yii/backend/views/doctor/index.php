<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Врачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <p>
        <?= Html::a('Добавить врача', ['create'], ['class' => 'btn btn-success']) ?>
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
                }
            ],
            [
                'attribute' => 'id_person',
                'value' => function($data){
                    return $data->person->surname .' '. $data->person->name .' '. $data->person->patronymic;
                }
            ],
            [
                'attribute' => 'id_prof',
                'value' => function($data){
                    return $data->profession->profession_name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
