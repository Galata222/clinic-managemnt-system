<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Patient $model */

$this->title = 'Create Patient';
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create" style="width:50%; border: 50%; border-color:aqua">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPatient' => $modelsPatient,
    ]) ?>

</div>