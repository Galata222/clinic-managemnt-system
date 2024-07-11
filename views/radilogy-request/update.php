<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequest $model */

$this->title = Yii::t('app', 'Update Radilogy Request: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radilogy Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="radilogy-request-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>