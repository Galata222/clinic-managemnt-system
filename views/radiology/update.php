<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Radiology $model */

$this->title = Yii::t('app', 'Update Radiology: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radiologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="radiology-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>