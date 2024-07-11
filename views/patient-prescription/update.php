<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescription $model */

$this->title = Yii::t('app', 'Update Patient Prescription: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Prescriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-prescription-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>