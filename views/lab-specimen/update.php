<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimen $model */

$this->title = Yii::t('app', 'Update Lab Specimen: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Specimens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lab-specimen-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>