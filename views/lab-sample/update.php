<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabSample $model */

$this->title = Yii::t('app', 'Update Lab Sample: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Samples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-sample-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>