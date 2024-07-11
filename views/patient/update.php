<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Patient $model */

$this->title = 'Update Patient: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>