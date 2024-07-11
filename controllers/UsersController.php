<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\filters\AccessControl;
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Yii::$app->mailer->compose()
                //     ->setTo($model->email)
                //     ->setFrom('galatawako222@gmail.com' )
                //     ->setSubject('Your Account Information')
                //     ->setTextBody("Your username: {$model->username}\nYour password: {$model->password}")
                //     ->send();
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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    //activating and deactivating the accounts
    public function actionActivate($id)
    {
        $model = Users::find()->where(['id' => $id])->one();
        $model->status = 2;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This account successfully activated!');
            return $this->redirect(['users/index']);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Activte fail');
            return $this->redirect(['users/index', 'id' => $id]);
        }
    }
    public function actionDeactivate($id)
    {
        $model = Users::find()->where(['id' => $id])->one();
        $model->status = 1;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This account successfully deactivated!');
            return $this->redirect(['users/index', 'id' => $id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Deactivation fail');
            return $this->redirect(['users/index', 'id' => $id]);
        }
    }
    //changing the passwords
    //change password
    public function actionAdd()
    {
        $model = new Users();
        $changepass = Users::find()->where(['email' => Yii::$app->user->identity->email])->one();
        $password = $changepass->password;

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->security->validatePassword($model->oldpassword, $password)) {
                $password = Yii::$app->security->generatePasswordHash($model->newpassword);
                $changepass->password = $password;
                if ($changepass->save(false)) {   //print_r($model->newpassword);exit;
                    Yii::$app->session->setFlash('success', 'Your Password was changed successfully please re-login using new password.\n In case you require any kind of assistance
         ,please feel free to contact me.');
                    Yii::$app->user->logout();
                    return $this->redirect(['site/login']);
                }
            } else {
                $model->newpassword = NULL;
                $model->oldpassword = NULL;
                $model->confirm_pass = NULL;
                Yii::$app->getSession()->setFlash('error', 'Password not changed');
            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }
}