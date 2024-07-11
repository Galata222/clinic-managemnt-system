<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescription $model */

$this->title = Yii::t('app', 'Create Patient Prescription');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Prescriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-prescription-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>