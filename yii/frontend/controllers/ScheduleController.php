<?php

namespace frontend\controllers;

use Yii;
use common\models\Schedule;
use common\models\ScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Doctor;
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCsz1(){
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 3;
        $doctors = Doctor::find()->joinWith('person')->joinWith('profession')->where(['id_bran' => $idotd])->all();
        /*$doctors = new Query;
        // формируем запрос
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            ->join('LEFT JOIN', 'person','person.id = doctor.id_person')
            ->andWhere(['doctor.id_bran' => $idotd])
            ->all();
        // выполняем запрос
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();
*/
        return $this->render('csz1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }

    public function actionCsz2(){

        $idotd = 4;
        //$doctors = Doctor::find()->with('person')->where(['id_bran' => $idotd])->all();
        $doctors = new Query;
        // формируем запрос
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->andWhere(['id_bran' => $idotd])
            ->all();
        // выполняем запрос
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('csz2', [
            'doctors' => $doctors,

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
