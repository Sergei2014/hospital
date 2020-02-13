<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник участков';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index">

    <div class="row">
        <div class="col-sm-3">
            <p>
                <?= Html::a('Добавить участок', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}',
                    ],

                    [
                        'attribute' => 'id_typearea',
                        'value' => function($data){
                            return Html::a(Html::encode($data->number .' '. $data->typearea->type_name), Url::to(['index']),  ['id' => $data->id,
                                'onclick' => '$.get("/area/areas?id='.'"+$(this).attr(\'id\'), function (data){$("#doc").html(data)});']);
                        },
                        'format' => 'raw',
                    ],

                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
        <div class="col-sm-9">
            <div class="panel panel-primary">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>ФИО</th>
                            <th>Специальность</th>
                            <th><span id="modal" class="glyphicon glyphicon-plus" style="color: #3c8dbc; cursor: pointer;"></span></th>
                            </tr>
                        </thead>
                    </table>

                <div class="panel-body">
                    <div id="doc"></div>
                </div>
            </div>
        </div>
<?php $this->registerJs("
        $('#modal').on('click', function(){
            $('#myModal').modal('show')
        });
"); ?>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.модальное окно-Содержание -->
            </div><!-- /.модальное окно-диалог -->
        </div><!-- /.модальное окно -->
    </div>


</div>
