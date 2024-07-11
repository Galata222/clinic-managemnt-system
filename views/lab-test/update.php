<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTest $model */

$this->title = 'Update Lab Test: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lab Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-test-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>