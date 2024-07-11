<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExamination $model */

$this->title = 'Create Admission Examination';
$this->params['breadcrumbs'][] = ['label' => 'Admission Examinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admission-examination-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>