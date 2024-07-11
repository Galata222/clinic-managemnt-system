<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PatientCard $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-card-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'patient_id',
            'medical_record_number',
            'CC:ntext',
            'VV',
            'hpi:ntext',
            'past_medical_and_surgical_history:ntext',
            'personal_and_social_hx:ntext',
            'previous_hospital_admission:ntext',
            'physical_examination',
            'cost',
            'pertinent_physical_examination:ntext',
            'urgent_attention:ntext',
            'assesment:ntext',
            'lab_investigation',
            'advice:ntext',
            'appointment',
            'physcian',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>