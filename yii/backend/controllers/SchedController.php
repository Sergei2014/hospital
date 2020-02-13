<?php

namespace backend\controllers;

use common\models\Area;
use common\models\Cabinet;
use Yii;
use common\models\Sched;
use common\models\SchedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Branches;
use common\models\Doctor;
use common\models\Docarea;
use yii\db\Query;

/**
 * SchedController implements the CRUD actions for Sched model.
 */
class SchedController extends Controller
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
     * Lists all Sched models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sched model.
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
     * Creates a new Sched model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sched();
        $model_bran = Branches::find()->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }
/*
        if($model->load(Yii::$app->request->post())){
           // echo '<pre>';
           // print_r($model);
           // echo '</pre>';
        }

*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $schedtime = new \common\models\Schedtime();
            $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
            if (!empty($model->monday_begin)) {
                $day_number = 1;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateM[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateM); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateM[$i], $model->monday_begin, $model->monday_end],
                    ])->execute();
                }
            }
            if (!empty($model->tuesday_begin)) {
                $day_number = 2;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateT[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateT); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateT[$i], $model->tuesday_begin, $model->tuesday_end],
                    ])->execute();
                }
            }
            if (!empty($model->wednesday_begin)) {
                $day_number = 3;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateW[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateW); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateW[$i], $model->wednesday_begin, $model->wednesday_end],
                    ])->execute();
                }
            }
            if (!empty($model->thursday_begin)) {
                $day_number = 4;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateTh[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateTh); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateTh[$i], $model->thursday_begin, $model->thursday_end],
                    ])->execute();
                }
            }
            if (!empty($model->friday_begin)) {
                $day_number = 5;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateF[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateF); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateF[$i], $model->friday_begin, $model->friday_end],
                    ])->execute();
                }
            }
            if (!empty($model->saturday_begin)) {
                $day_number = 6;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateS[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateS); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateS[$i], $model->saturday_begin, $model->saturday_begin],
                    ])->execute();
                }
            }
            if (!empty($model->sunday_begin)) {
                $day_number = 7;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateSu[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateSu); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data', 'time_start', 'time_end'], [
                        ['NULL', $model->id, $model->id_bran, $model->id_doc, $model->id_prof, $model->id_area, $model->id_cab, $model->type, $dateSu[$i], $model->sunday_begin, $model->sunday_begin],
                    ])->execute();
                }

            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'model' => $model,
            'arrbran' => $arrbran,
            'arrarea' => [],
            'arrdoc' => [],
            'arrprof' => [],
            'arrcab' => [],
        ]);
    }

    /**
     * Updates an existing Sched model.
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
            $arrperson[$value->person->id] = $value->person->surname . ' ' . $value->person->name . ' ' . $value->person->patronymic;
        };

        $profession = Doctor::find()->with('profession')->where(['id' => $model->id_doc])->all();
        foreach ($profession as $prof){
            $arrprof[$prof->id_prof] = $prof->profession->profession_name;
        }

        $cabinets = Cabinet::find()->where(['id_bran' => $model->id_bran])->all();
        foreach ($cabinets as $cabinet) {
            $arrcab[$cabinet->id] = $cabinet->num .' '. $cabinet->name_prof;
        }

        $areas = Area::find()->with(['typearea'])->where(['id' => $model->id_area])->all();
        foreach ($areas as $area) {
            $arrarea[$area->id] = $area->number .' '. $area->typearea->type_name;
        }
        if(!empty($model->monday_begin)){
            $checMonday = true;
        }else{
            $checMonday = false;
            $disabledMonday = true;
        }
        if(!empty($model->tuesday_begin)){
            $checTuesday = true;
        }else{
            $checTuesday = false;
            $disabledTuesday = true;
        }
        if(!empty($model->wednesday_begin)){
            $checWednesday = true;
        }else{
            $checWednesday = false;
            $disabledWednesday = true;
        }
        if(!empty($model->thursday_begin)){
            $checThursday = true;
        }else{
            $checThursday = false;
            $disabledThursday = true;
        }
        if(!empty($model->friday_begin)){
            $checFriday = true;
        }else{
            $checFriday = false;
            $disabledFriday = true;
        }
        if(!empty($model->sunday_begin)){
            $checSunday = true;
        }else{
            $checSunday = false;
            $disabledSunday = true;
        }
        if(!empty($model->saturday_begin)){
            $checSaturday = true;
        }
        else{
            $checSaturday = false;
            $disabledSaturday = true;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()){

            $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');

            if (!empty($model->monday_begin)) {
                $day_number = 1;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateM[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateM); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->monday_begin,
                        'time_end' => $model->monday_end,
                    ], ['data'=> $dateM[$i]])->execute();
                }
            }
            if (!empty($model->tuesday_begin)) {
                $day_number = 2;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateT[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateT); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->tuesday_begin,
                        'time_end' => $model->tuesday_end,
                    ], ['data'=> $dateT[$i]])->execute();
                }
            }
            if (!empty($model->wednesday_begin)) {
                $day_number = 3;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateW[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateW); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->wednesday_begin,
                        'time_end' => $model->wednesday_end,
                    ], ['data'=> $dateW[$i]])->execute();
                }
            }
            if (!empty($model->thursday_begin)) {
                $day_number = 4;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateTh[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateTh); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->thursday_begin,
                        'time_end' => $model->thursday_end,
                    ], ['data'=> $dateTh[$i]])->execute();
                }
            }
            if (!empty($model->friday_begin)) {
                $day_number = 5;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateF[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateF); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->friday_begin,
                        'time_end' => $model->friday_end,
                    ], ['data'=> $dateF[$i]])->execute();
                }
            }
            if (!empty($model->sunday_begin)) {
                $day_number = 6;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateS[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateS); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->sunday_begin,
                        'time_end' => $model->sunday_end,
                    ], ['data'=> $dateS[$i]])->execute();
                }
            }
            if (!empty($model->saturday_begin)) {
                $day_number = 7;
                for ($i = strtotime($days[$day_number], strtotime($model->data_start)); $i <= strtotime($model->data_end); $i = strtotime('+1 week', $i))
                    $dateSt[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateSt); $i++) {
                    Yii::$app->db->createCommand()->update('schedtime', [
                        'time_start' => $model->saturday_begin,
                        'time_end' => $model->saturday_end,
                    ], ['data'=> $dateSt[$i]])->execute();
                }
            }
            // echo '<pre>';
          //  print_r($schedtime);
          //  echo '</pre>';

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'arrbran' => $arrbran,
            'arrperson' => $arrperson,
            'arrprof' => $arrprof,
            'arrcab' => $arrcab,
            'arrarea' => $arrarea,
            'checSunday' => $checSunday,
            'checSaturday' => $checSaturday,
            'disabledSunday' => $disabledSunday,
            'disabledSaturday' => $disabledSaturday,
            'checFriday' => $checFriday,
            'disabledFriday' => $disabledFriday,
            'checThursday' => $checThursday,
            'disabledThursday' => $disabledThursday,
            'checWednesday' => $checWednesday,
            'disabledWednesday' => $disabledWednesday,
            'checTuesday' => $checTuesday,
            'disabledTuesday' => $disabledTuesday,
            'checMonday' => $checMonday,
            'disabledMonday' =>  $disabledMonday,
        ]);
    }

    /**
     * Deletes an existing Sched model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->db->createCommand()->delete('schedtime', ['id_sched'=> $id])->execute();
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
        $countProf = Doctor::find()->where(['id' => $id])->count();
        $profDoc = Doctor::find()->with('profession')->where(['id' => $id])->all();

        if($countProf > 0){
            echo "<option>Выбрать... </option>";
            foreach ($profDoc as $value){
                echo "<option value='".$value->id_prof."'>".$value->profession->profession_name."</option>";
            }
        }else {
            echo "<option> - </option>";
        }
    }


    public function actionCabinet($id) {
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
     * Finds the Sched model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sched the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sched::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
