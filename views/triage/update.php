<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Triage $model */

$this->title = Yii::t('app', 'Update Triage: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Triages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="triage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>