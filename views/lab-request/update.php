<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */

$this->title = Yii::t('app', 'Update Lab Request: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-request-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>