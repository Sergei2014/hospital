<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CabinetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник кабинетов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-index">


    <p>
        <?= Html::a('Добавить кабинет', ['create'], ['class' => 'btn btn-success']) ?>
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
            'num',
            'name_prof',
            [
                    'attribute' => 'pmsp',
                    'value' => function($data){
                        return !$data->pmsp ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                    },
                    'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
