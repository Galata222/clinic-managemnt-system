<?php

use app\models\PatientCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PatientCardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Patient Cards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-card-index">



    <p>
        <?php if (Yii::$app->user->identity->department == 'opd' || Yii::$app->user->identity->department == 'emergency_care') { ?>
        <?= Html::a(Yii::t('app', 'Create Patient Card'), ['create'], [
                'class' => 'btn btn-success',
                'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
            ]) ?>
        <?php } ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'options' => ['style' => 'background-color:white;'],
                'header' => 'Seq', 'class' => 'yii\grid\SerialColumn'
            ],
            'patient_id',
            'medical_record_number',
            'CC:ntext',
            'VV',
            //'hpi:ntext',
            //'past_medical_and_surgical_history:ntext',
            //'personal_and_social_hx:ntext',
            //'previous_hospital_admission:ntext',
            //'physical_examination',
            //'cost',
            //'pertinent_physical_examination:ntext',
            //'urgent_attention:ntext',
            //'assesment:ntext',
            //'lab_investigation',
            //'advice:ntext',
            //'appointment',
            //'physcian',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'opd' || Yii::$app->user->identity->department == 'emergency_care',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->department != 'opd' || Yii::$app->user->identity->department != 'emergency_care',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>