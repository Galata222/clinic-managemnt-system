<?php

use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'options' => ['style' => 'background-color:#abc0f0;'],
                'header' => 'Seq', 'class' => 'yii\grid\SerialColumn'
            ],
            'user_id',
            'username',
            'email:email',
            'first_name',
            //'last_name',
            //'phone_no',
            //'address',
            //'fk_role',
            //'password',
            'role',
            //'status',
            //'authoKey',
            //'accessToken',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],

            [

                'format' => 'raw',
                // 'headerOptions' => ['class' => 'kartik-sheet-style', 'style' => 'background-color:green;'],
                'value' => function ($data) {
                    if ($data->status == " ") {
                        return Html::a('Activate', ["users/activate", 'id' => $data->id,], [
                            'class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open',

                            'data' => [
                                'method' => 'post',
                                'confirm' => \Yii::t('yii', 'Are you sure you want to Activate this item?')

                            ], 'url' => ['activate', 'id' => $data->id],
                            'visible' => false,   // same as above
                        ])
                            . " "
                            . Html::a('De-activate', ["users/deactivate", 'id' => $data->id,], ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock']);
                    }
                    if ($data->status == 2) {
                        return  Html::a(
                            'De-activate',
                            ["users/deactivate", 'id' => $data->id,],
                            ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to deactivate this item?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                    }
                    if ($data->status == 1) {
                        return Html::a('Activate', ["users/activate", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                    }
                }
            ],

        ],
    ]); ?>


</div>