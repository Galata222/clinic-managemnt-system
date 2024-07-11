<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DrugStore $model */

$this->title = Yii::t('app', 'Update Drug Store: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="drug-store-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>