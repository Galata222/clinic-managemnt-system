<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestItem $model */

$this->title = 'Update Test Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
