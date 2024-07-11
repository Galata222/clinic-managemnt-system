<?php

use app\models\PatientPrescription;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescriptionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Patient Prescriptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-prescription-index">

    <p> <?php if(Yii::$app->user->identity->department == 'opd'|| Yii::$app->user->identity->department == 'emergency_care'){?>

        <?= Html::a(Yii::t('app', 'Create Patient Prescription'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?> <?php } ?> </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'prescription_id',
            'patient_id',
            'drug_names',
            'strength',
            //'dosage',
            //'form_id',
            //'frequency',
            //'duration',
            //'quantity',
            //'how_to_use:ntext',
            //'other_info',
            //'patient_type',
            //'cost',
            //'created_at',
            //'status',
            //'prescribed_by',
            //'dispensed_by',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'pharmacy' || Yii::$app->user->identity->department == 'opd' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department != 'pharmacy' || Yii::$app->user->identity->department != 'opd' ,
            ],
           
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>