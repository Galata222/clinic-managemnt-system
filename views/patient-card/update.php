<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PatientCard $model */

$this->title = Yii::t('app', 'Update Patient Card: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-card-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>