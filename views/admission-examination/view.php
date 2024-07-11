<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExamination $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admission Examinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admission-examination-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_patient_id',
            'hrs',
            'rr',
            'systolic',
            'diastolic',
            'systolic2',
            'diastolic2',
            'temp',
            'weight',
            'height',
            'muac',
            'heightfundus',
            'descent',
            'cervix',
            'abdoscar',
            'fhr',
            'mraptured',
            'timerom',
            'liquor',
            've_findings',
            'admited',
            'rswab',
            'rswabreason',
            'tswab',
            'examinitials',
            'date_exam',
            'created_by',
            'date_created',
            'modified_by',
            'date_modified',
            'rom_duration_days',
            'rom_duration_hrs',
            'fhr_not_done',
            'pres',
            'admitted_by',
            'position',
            'abnormalities',
            'spleen',
            'extgenitals',
            'vdischarge',
            'tpr',
            'fk_doctor',
            'fw_ini',
            'status',
        ],
    ]) ?>

</div>