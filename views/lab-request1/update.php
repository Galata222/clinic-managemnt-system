<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */

$this->title = 'Update Lab Request: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lab Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
