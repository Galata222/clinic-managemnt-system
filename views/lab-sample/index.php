<?php

use app\models\LabSample;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\LabSampleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lab Samples');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-sample-index">


    <p>
        <?php if(Yii::$app->user->identity->role == 'admin'){?>
        <?= Html::a(Yii::t('app', 'Create Lab Sample'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?><?php }?>
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
            'fk_specimen',
            'fk_patient',
            'specimen_source',
            'adm_sample',
            //'sample_designation',
            //'originated_from',
            //'vol_brought',
            //'vol_brought_unit',
            //'date_brought',
            //'time_brought',
            //'lab_tech_ini',
            //'csf_venesector',
            //'remarks:ntext',
            //'rejected_reason',
            //'reason_not_collected',
            //'date_collect',
            //'time_collect',
            //'creation_time',
            //'creation_name',
            //'sample_collected',
            //'date_created',
            //'date_modified',
            //'urine_dipstick:ntext',
            //'reject_specify',
            //'time_point',
            //'sample_collection_dtl:ntext',
            //'sample_receive_status',
            //'gram_stain:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->role == 'admin' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->role != 'admin',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>