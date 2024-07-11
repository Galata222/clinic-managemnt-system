<?php

namespace app\controllers;

use app\models\AdmissionExamination;
use app\models\AdmissionExaminationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;

/**
 * AdmissionExaminationController implements the CRUD actions for AdmissionExamination model.
 */
class AdmissionExaminationController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'create1'],
                'rules' => [
                    [
                        'actions' => ['create', 'create1'],
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
     * Lists all AdmissionExamination models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdmissionExaminationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->defaultOrder = ['date_created' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdmissionExamination model.
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
     * Creates a new AdmissionExamination model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AdmissionExamination();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $docName = Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name;
                $model->created_by = $docName;
                $docId = Yii::$app->user->identity->id;
                $model->fk_doctor = $docId;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->fk_patient_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AdmissionExamination model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $docId = Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name;
            $model->modified_by = $docId;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->fk_patient_id]);
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Finds the AdmissionExamination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AdmissionExamination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdmissionExamination::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
