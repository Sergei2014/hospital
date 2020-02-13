<?php

namespace frontend\controllers;

use common\models\Docarea;
use Yii;
use common\models\Sched;
use common\models\SchedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Doctor;
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

    public function actionCsz1(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 3;
        //$doctors = Doctor::find()->joinWith('person')->joinWith('profession')->joinWith('docarea')->where(['id_bran' => $idotd])->all();
        //$doctors = Docarea::find()->where(['id_bran' => $idotd])->all();
        $doctors = new Query;
        // формируем запрос
        $doctors->select(['*'])->from('docarea')
            ->join('LEFT JOIN', 'doctor','docarea.id_doc = doctor.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->andWhere(['docarea.id_bran' => $idotd])
            ->all();
        // выполняем запрос
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('csz1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }

    public function actionCsz2(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 4;
        //$doctors = Doctor::find()->joinWith('person')->joinWith('profession')->joinWith('docarea')->where(['id_bran' => $idotd])->all();
        //$doctors = Docarea::find()->where(['id_bran' => $idotd])->all();
        $doctors = new Query;
        // формируем запрос
        $doctors->select(['*'])->from('docarea')
            ->join('LEFT JOIN', 'doctor','docarea.id_doc = doctor.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->andWhere(['docarea.id_bran' => $idotd])
            ->all();
        // выполняем запрос
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('csz2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }

    public function actionCszped1(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 3;
        $doctors = new Query;
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'docarea','docarea.id_doc = doctor.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            //->where(['type' => '0', 'type' => '1'])
            ->andWhere(['not in', 'doctor.type', ['1']])
            ->andWhere(['not in', 'docarea.type', ['1']])
            ->andWhere(['doctor.id_bran' => $idotd])
            ->all();
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('cszped1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }

    public function actionCszped2(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 4;
        $doctors = new Query;
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'docarea','docarea.id_doc = doctor.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            //->where(['type' => '0', 'type' => '1'])
            ->andWhere(['not in', 'doctor.type', ['1']])
            ->andWhere(['not in', 'docarea.type', ['1']])
            ->andWhere(['doctor.id_bran' => $idotd])
            ->all();
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('cszped2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }
    public function actionTest(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 3;
        $doctors = new Query;
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'docarea','docarea.id_doc = doctor.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->join('LEFT JOIN', 'area','docarea.id_area = area.id')
            ->join('LEFT JOIN', 'typearea','area.id_typearea = typearea.id')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            //->where(['type' => '0', 'type' => '1'])
            ->andWhere(['not in', 'type', ['1']])
            ->andWhere(['doctor.id_bran' => $idotd])
            ->all();
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();

        return $this->render('test', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

        ]);
    }

    public function actionSpec(){
        $searchModel = new SchedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $idotd = 1;
        $doctors = Doctor::find()->joinWith('person')->joinWith('profession')->where(['id_bran' => $idotd])->all();
        //$doctors = Docarea::find()->where(['id_bran' => $idotd])->all();
        /*
        $doctors = new Query;
        // формируем запрос
        $doctors->select(['*'])->from('doctor')
            ->join('LEFT JOIN', 'profession','doctor.id_prof = profession.id')
            ->join('LEFT JOIN', 'person','doctor.id_person = person.id')
            ->andWhere(['doctor.id_bran' => $idotd])
            ->all();
        // выполняем запрос
        $command = $doctors->createCommand();
        $doctors = $command->queryAll();
*/
        return $this->render('spec', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'doctors' => $doctors,

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
