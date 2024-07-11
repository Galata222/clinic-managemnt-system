<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTestItems $model */

$this->title = Yii::t('app', 'Update Lab Test Items: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Test Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-test-items-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>