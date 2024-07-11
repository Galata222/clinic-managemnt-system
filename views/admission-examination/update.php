<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExamination $model */

$this->title = 'Update Admission Examination: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admission Examinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admission-examination-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
