<?php

namespace app\controllers;

use app\models\LabResult;
use app\models\LabResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;
use yii\db\Expression;

/**
 * LabResultController implements the CRUD actions for LabResult model.
 */
class LabResultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access'=>[
                    'class'=>AccessControl::className(),
                    'only'=>[],
                    'rules'=>[
                        [
                         'actions'=>[],
                            'allow'=>true,
                            'roles'=>['@'],//for authenticated users only
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all LabResult models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LabResultSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LabResult model.
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
     * Creates a new LabResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LabResult();
        // $model->created_at=new Expression("NOW()");
        // $model->created_at = Yii::$app->user->identity->user_id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['create']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LabResult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $model->updated_at=new Expression("NOW()");
        // $model->updated_by = Yii::$app->user->identity->user_id;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LabResult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LabResult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LabResult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LabResult::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionRequest($id)
    {
        $countRequest = \app\models\LabRequest::find()
            ->where(['patient_id' => $id])
            ->count();

        $requests =  \app\models\LabRequest::find()
            ->where(['patient_id' => $id])
            ->orderBy('patient_id ASC')
            ->all();
        echo "<option value=''>-</option>";
        if ($countRequest > 0) {
            foreach ($requests as $type) {
                echo "<option value='" . $type->lab_request_id . "'>" . Yii::t('app', $type->lab_request_id) . "</option>";
            }
        }
    }

    public function actionType($id)
    {
        $countRequest = \app\models\LabRequest::find()
            ->where(['lab_request_id' => $id])
            ->count();

        $requests =  \app\models\LabRequest::find()
            ->where(['lab_request_id' => $id])
            ->orderBy('lab_request_id ASC')
            ->all();
        echo "<option value=''>-</option>";
        if ($countRequest > 0) {
            foreach ($requests as $type) {
                echo "<option value='" . $type->lab_test_type_id . "'>" . Yii::t('app', $type->lab_test_type_id) . "</option>";
            }
        }
    }
    public function actionItem($id)
    {
        $countRequest = \app\models\LabRequest::find()
            ->where(['lab_test_type_id' => $id])
            ->count();

        $requests =  \app\models\LabRequest::find()
            ->where(['lab_test_type_id' => $id])
            ->orderBy('lab_test_type_id ASC')
            ->all();
        echo "<option value=''>-</option>";
        if ($countRequest > 0) {
            foreach ($requests as $type) {
                echo "<option value='" . $type->lab_test_item_id . "'>" . Yii::t('app', $type->lab_test_item_id) . "</option>";
            }
        }
    }
}