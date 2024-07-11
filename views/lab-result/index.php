<?php

use app\models\LabResult;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\LabResultSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lab Results');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-result-index">



    <p><?php if(Yii::$app->user->identity->department == 'laboratory'){?>
        <?= Html::a(Yii::t('app', 'Create Lab Result'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
        <?php }?>
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
            'lab_result_id',
            'patient_id',
            'lab_request_id',
            'lab_test_type_id',
            //'lab_test_item_id',
            //'lab_result',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'status',
            //'lab_sample_id',
            //'lab_specimen',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'laboratory' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->department != 'laboratory',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>