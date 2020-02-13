<?php

namespace backend\controllers;

use Yii;
use common\models\Docarea;
use common\models\DocareaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Area;
use common\models\Branches;
use common\models\Doctor;

/**
 * DocareaController implements the CRUD actions for Docarea model.
 */
class DocareaController extends Controller
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
     * Lists all Docarea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocareaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docarea model.
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
     * Creates a new Docarea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Docarea();

        $areas = Area::find()->with('typearea')->all();
        foreach ($areas as $values){
            $arrarea[$values->id] = $values->number .' '. $values->typearea->type_name;
        }

        $persons = Doctor::find()->with('person')->all();
        foreach ($persons as $person){
            $arrperson[$person->id_person] = $person->person->surname .' '. $person->person->name .' '. $person->person->patronymic;
        }

        $model_bran = Branches::find()->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'arrarea' => $arrarea,
            'arrperson' => $arrperson,
            'arrbran' => $arrbran,
        ]);
    }

    /**
     * Updates an existing Docarea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $areas = Area::find()->with('typearea')->all();
        foreach ($areas as $values){
            $arrarea[$values->id] = $values->number .' '. $values->typearea->type_name;
        }

        $persons = Doctor::find()->with('person')->all();
        foreach ($persons as $person){
            $arrperson[$person->id] = $person->person->surname .' '. $person->person->name .' '. $person->person->patronymic;
        }

        $model_bran = Branches::find()->all();
        foreach ($model_bran as $value){
            $arrbran[$value->id] = $value->bran_name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'arrarea' => $arrarea,
            'arrperson' => $arrperson,
            'arrbran' => $arrbran,
        ]);
    }

    /**
     * Deletes an existing Docarea model.
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

    /**
     * Finds the Docarea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Docarea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docarea::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
