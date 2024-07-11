<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CentralTriage $model */

$this->title = Yii::t('app', 'Update Central Triage: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Central Triages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="central-triage-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>