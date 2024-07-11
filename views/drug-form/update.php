<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DrugForm $model */

$this->title = Yii::t('app', 'Update Drug Form: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="drug-form-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>