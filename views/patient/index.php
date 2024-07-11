<?php

use app\models\Patient;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\AdmissionExamination;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PatientSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            if ($model->status == 0) {
                return ['class' => 'danger'];
            } else if ($model->status == 1 || $model->status == 2) {
                return ['class' => 'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'patient_id',
            'first_name',
            'last_name',
            // 'phone_no',
            //'age',
            //'gender',
            //'occupation',
            //'status',
            //'region',
            //'zone',
            //'city',
            //'kebele',
            'created_at',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],

            [
                'header' => 'Action ',
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style', 'style' => 'background-color:green;'],

                'value' => function ($data) {

                    if ($data->status == " ") {
                        return Html::a('Queue', ["patient/queue", 'id' => $data->id,], [
                            'class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open',

                            'data' => [
                                'method' => 'post',
                                'confirm' => \Yii::t('yii', 'Are you sure you want to queue this item?')

                            ], 'url' => ['activate', 'id' => $data->id],
                            'visible' => false,   // same as above
                        ])
                            . " "
                            . Html::a('Cancel', ["patient/cancel", 'id' => $data->id,], ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock']);
                    }
                    if ($data->status == 0) {
                        if (Yii::$app->user->identity->role != null || !(Yii::$app->user->isGuest)) {
                            if (Yii::$app->user->identity->role == 'Receptionist') {
                                return  Html::a(
                                    'Cancel Queue',
                                    ["patient/cancel", 'id' => $data->id,],
                                    ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                                    [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to cancel this Queue?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            } elseif (Yii::$app->user->identity->role == 'Doctor' || Yii::$app->user->identity->role == 'Admin') {
                                return  Html::a(
                                    'Check',
                                    ["patient/check", 'id' => $data->id,],
                                    ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                                    [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to cancel this Queue?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            }
                        }
                    }
                    if ($data->status == 1) {
                        if (Yii::$app->user->identity->role != null || !(Yii::$app->user->isGuest)) {
                            if (Yii::$app->user->identity->role == 'Receptionist') {
                                return Html::a('Queue', ["patient/queue", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                            } elseif (Yii::$app->user->identity->role == 'Doctor') {
                                return Html::a('Check', ["patient/check", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                            }
                        }
                    }
                    if ($data->status == 2) {
                        if (Yii::$app->user->identity->role != null || !(Yii::$app->user->isGuest)) {
                            if (Yii::$app->user->identity->role == 'Receptionist') {
                                return Html::a('Queue', ["patient/queue", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                            } elseif (Yii::$app->user->identity->role == 'Doctor' || Yii::$app->user->identity->role == 'Admin') {
                                return Html::a('Cancel Check', ["patient/cancel", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                                // return Html::button('Treat', ['id' => 'openFormBtn', 'class' => 'btn btn-primary']);
                            }
                        }
                    }
                }

            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>