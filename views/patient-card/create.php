<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PatientCard $model */

$this->title = Yii::t('app', 'Create Patient Card');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-card-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>