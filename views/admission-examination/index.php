<?php

use app\models\AdmissionExamination;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExaminationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Admission Examinations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admission-examination-index">
    <p>
        <?= Html::a('Create Admission Examination', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fk_patient_id',
            // 'hrs',
            // 'rr',
            // 'systolic',
            //'diastolic',
            //'systolic2',
            //'diastolic2',
            //'temp',
            //'weight',
            //'height',
            //'muac',
            //'heightfundus',
            //'descent',
            //'cervix',
            //'abdoscar',
            //'fhr',
            //'mraptured',
            //'timerom',
            //'liquor',
            //'ve_findings',
            //'admited',
            //'rswab',
            //'rswabreason',
            //'tswab',
            //'examinitials',
            //'date_exam',
            //'created_by',
            'date_created',
            //'modified_by',
            //'date_modified',
            //'rom_duration_days',
            //'rom_duration_hrs',
            //'fhr_not_done',
            //'pres',
            //'admitted_by',
            //'position',
            //'abnormalities',
            //'spleen',
            //'extgenitals',
            //'vdischarge',
            //'tpr',
            //'fk_temp',
            //'fw_ini',
            //'status',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],


        ],
    ]); ?>


</div>