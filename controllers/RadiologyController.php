<?php

namespace app\controllers;

use app\models\Radiology;
use app\models\RadiologySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Billing;
use yii\db\Expression;
use yii\filters\AccessControl;
/**
 * RadiologyController implements the CRUD actions for Radiology model.
 */
class RadiologyController extends Controller
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
     * Lists all Radiology models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RadiologySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Radiology model.
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
     * Creates a new Radiology model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Radiology();
        // $model->created_at = new Expression("NOW()");
        // $model->created_at = Yii::$app->user->identity->user_id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $billing = Billing::findOne(['patient_id' => $model->patient_id]);
                $billing->total_cost += (float)($model->cost);
                $billing->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Radiology model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $model->updated_at = new Expression("NOW()");
        // $model->updated_by = Yii::$app->user->identity->user_id;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Radiology model.
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
     * Finds the Radiology model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Radiology the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Radiology::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}