<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Drug $model */

$this->title = 'Update Drug: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drug-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
