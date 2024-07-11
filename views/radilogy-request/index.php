<?php

use app\models\RadilogyRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Radilogy Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radilogy-request-index">



    <p>
        <?php if( Yii::$app->user->identity->department == 'opd' || Yii::$app->user->identity->department == 'emergency_care'){ ?>,

        <?= Html::a(Yii::t('app', 'Create Radilogy Request'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?> <?php } ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'radiology_request_id',
            'patient_id',
            'radiology_type',
            'requested_by',
            //'performed_by',
            //'perform:ntext',
            //'LMP:ntext',
            //'report:ntext',
            //'cost',
            //'status',
            //'created_at',
            //'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'opd' || Yii::$app->user->identity->department == 'diagonistic_imaging',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'emergency_care' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->role == 'admin' ,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>