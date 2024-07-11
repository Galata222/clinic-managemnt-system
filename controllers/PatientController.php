<?php

namespace app\controllers;

use yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AdmissionExamination;
use yii\filters\AccessControl;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    /**
     * @inheritDoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'create1', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'create1', 'index'],
                        'allow' => true,
                        'roles' => ['@'], //for authenticated users only
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Lists all Patient models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->defaultOrder = ['created_at' => SORT_DESC];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Patient();
        $admission = new AdmissionExamination();
        $admission_data = AdmissionExamination::find()->all();
        $modelsPatient = [new Patient];
        if ($this->request->isPost) {
            $model->var_month = date('M');
            $model->var_year = date('Y');
            foreach ($admission_data as $data) {
                if ($data->fk_patient_id != 'patient_id') {
                    if ($model->load($this->request->post()) && $model->save()) {

                        Yii::$app->getSession()->setFlash('success', 'patient is created successfully');
                        return $this->redirect(['index', 'id' => $model->id]);
                    }
                } else {
                    Yii::$app->getSession()->setFlash('success', 'patient is exists and has been added to admission');
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
            'modelsPatient' => (empty($modelsPatient)) ? [new Patient] : $modelsPatient
        ]);
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['costs-per-service/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //identify patient
    public function actionQueue($id)
    {
        $model = Patient::find()->where(['id' => $id])->one();
        $model->status = 0;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This Patient successfully queued!');
            return $this->redirect(['patient/index']);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Queue failed');
            return $this->redirect(['patient/index']);
        }
    }
    public function actionCancel($id)
    {
        $model = Patient::find()->where(['id' => $id])->one();
        $model->status = 1;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This Patient successfully cancelled from the queue!');
            return $this->redirect(['patient/index', 'id' => $id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Queud  fail');
            return $this->redirect(['patient/index', 'id' => $id]);
        }
    }
    public function actionCheck($id)
    {
        $model = Patient::find()->where(['id' => $id])->one();
        $model->status = 2;
        if ($model->save(false)) {
            //\Yii::$app->getSession()->setFlash('success', 'This Patient successfully Checked!');
            return $this->redirect(['admission-examination/create', 'id' => $id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Check fail');
            return $this->redirect(['patient/index', 'id' => $id]);
        }
    }
    public function actionLoadPopupWindow()
    {
        return $this->renderPartial('costs-per-service/create');
    }
}
