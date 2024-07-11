<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabResult $model */

$this->title = Yii::t('app', 'Update Lab Result: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Results'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-result-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>