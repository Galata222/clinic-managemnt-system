<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescription $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Prescriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-prescription-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'prescription_id',
            'patient_id',
            'drug_names',
            'strength',
            'dosage',
            'form_id',
            'frequency',
            'duration',
            'quantity',
            'how_to_use:ntext',
            'other_info',
            'patient_type',
            'cost',
            'created_at',
            'status',
            'prescribed_by',
            'dispensed_by',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>