<?php

namespace backend\controllers;

use common\models\Area;
use common\models\Branches;
use common\models\Docarea;
use Yii;
use common\models\Schedule;
use common\models\ScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Person;
use common\models\Doctor;
use common\models\Cabinet;
use yii\db\Query;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model_bran = Branches::find()->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }

        $persons = Person::find()->all();
        foreach ($persons as $value){
            $arrperson[$value->id] = $value->surname .' '. $value->name .' '. $value->patronymic;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrbran' => $arrbran,
            'arrperson' => $arrperson,
        ]);
    }

    /**
     * Displays a single Schedule model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Schedule();



        $model_bran = Branches::find()->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }
        $areas = Area::find()->with('typearea')->all();
        foreach ($areas as $values){
            $arrarea[$values->id] = $values->number .' '. $values->typearea->type_name;
        }

        $days=array('1'=>'Monday','2' => 'Tuesday','3' => 'Wednesday','4'=>'Thursday','5' =>'Friday','6' => 'Saturday','7'=>'Sunday');

        if ($model->load(Yii::$app->request->post())) {

            if (!empty($model->monday_begin)) {
                $day_number = 1;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateM[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateM); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateM[$i], $model->monday_begin, $model->monday_end],
                    ])->execute();
                }
            }
            if (!empty($model->tuesday_begin)) {
                $day_number = 2;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateT[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateT); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateT[$i], $model->tuesday_begin, $model->tuesday_end],
                    ])->execute();
                }
            }
            if (!empty($model->wednesday_begin)) {
                $day_number = 3;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateW[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateW); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateW[$i], $model->wednesday_begin, $model->wednesday_end],
                    ])->execute();
                }
            }
            if (!empty($model->thursday_begin)) {
                $day_number = 4;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateTh[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateTh); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area',  'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateTh[$i], $model->thursday_begin, $model->thursday_end],
                    ])->execute();
                }
            }
            if (!empty($model->friday_begin)) {
                $day_number = 5;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateF[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateF); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateF[$i], $model->friday_begin, $model->friday_end],
                    ])->execute();
                }
            }
            if (!empty($model->saturday_begin)) {
                $day_number = 6;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateS[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateS); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateS[$i], $model->saturday_begin, $model->saturday_begin],
                    ])->execute();
                }
            }
            if (!empty($model->sunday_begin)) {
                $day_number = 7;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateSu[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateSu); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedule', ['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id_bran, $model->id_doc, $model->id_prof, $model->id_cab, $model->id_area, $dateSu[$i], $model->sunday_begin, $model->sunday_begin],
                    ])->execute();
                }
            }
            return $this->redirect(['index']);
        }





        return $this->render('create', [
            'model' => $model,
            'arrbran' => $arrbran,
            'arrarea' => $arrarea,
            'arrdoc' => [],
            'arrprof' => [],
            'arrcab' => [],
        ]);
    }

    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model_bran = Branches::find()->where(['id' => $model->id_bran])->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }

        $persons = Doctor::find()->with(['person'])->where(['id' => $model->id_doc])->all();
        foreach ($persons as $value) {
            $arrperson[$value->id] = $value->person->surname . ' ' . $value->person->name . ' ' . $value->person->patronymic;
        };

        $profession = Doctor::find()->with('profession')->where(['id' => $model->id_doc])->all();
        foreach ($profession as $prof){
            $arrprof[$prof->id_prof] = $prof->profession->profession_name;
        }

        $cabinets = Cabinet::find()->where(['id_bran' => $model->id_bran])->all();
        foreach ($cabinets as $cabinet) {
            $arrcab[$cabinet->id] = $cabinet->num .' '. $cabinet->name_prof;
        }
        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->db->createCommand()->update('schedule',['id_bran' => $model->id_bran, 'id_doc' => $model->id_doc, 'id_prof' => $model->id_prof, 'id_cab' => $model->id_cab, 'data' => $model->data, 'time_start' => $model->time_start, 'time_end' => $model->time_end], ['id' => $model->id])->execute();
            //echo '<pre>';
            //print_r($a);
            //echo '</pre>';
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrbran' => $arrbran,
            'arrperson' => $arrperson,
            'arrprof' => $arrprof,
            'arrcab' => $arrcab,
        ]);
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionList($id) {
        $countDoc = Doctor::find()->where(['id_bran' => $id])->count();
        $doctors = Doctor::find()->with('person')->where(['id_bran' => $id])->all();

        if($countDoc > 0){
            echo "<option>Выбрать... </option>";
            foreach ($doctors as $doc){
                echo "<option value='".$doc->id."'>".$doc->person->surname." ".$doc->person->name." ".$doc->person->patronymic."</option>";
            }
        }else {
            echo "<option> - </option>";
        }
    }

    public function actionProf($id) {
        $countProf = Doctor::find()->where(['id_person' => $id])->count();
        $profDoc = Doctor::find()->with('profession')->where(['id_person' => $id])->all();

        if($countProf > 0){
            echo "<option>Выбрать... </option>";
            foreach ($profDoc as $value){

                echo "<option value='".$value->id_prof."'>".$value->profession->profession_name."</option>";
            }
        }else {
            echo "<option> - </option>";
        }
    }


    public function actionCab($id) {
        $countCab = Cabinet::find()->where(['id_bran' => $id])->count();
        $cabBran = Cabinet::find()->where(['id_bran' => $id])->all();

        if($countCab > 0){
            echo "<option>Выбрать... </option>";
            foreach ($cabBran as $val){
                echo "<option value='".$val->id."'>".$val->num.' '.$val->name_prof."</option>";
            }
        }else {
            echo "<option> - </option>";
        }
    }
    public function actionArea($id) {
        $countArea = Docarea::find()->where(['id_doc' => $id])->count();
        $area = Docarea::find()->with('area')->where(['id_doc' => $id])->all();
        $model = new Query;
        // формируем запрос
        $model->select(['*'])->from('docarea')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->andWhere(['id_doc' => $id])
            ->all();
        // выполняем запрос
        $command = $model->createCommand();
        $model = $command->queryAll();
        if($countArea > 0){
            echo "<option>Выбрать... </option>";
            foreach ($model as $val){
                print_r($val);
                echo "<option value='".$val['id_area']."'>". $val['number'] . ' ' . $val['type_name'] ."</option>";
            }
        }else {
            echo "<option value='0'>Без участка</option>";
        }
    }


    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
