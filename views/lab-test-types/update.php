<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTestTypes $model */

$this->title = Yii::t('app', 'Update Lab Test Types: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Test Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-test-types-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>