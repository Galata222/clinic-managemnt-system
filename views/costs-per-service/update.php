<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CostsPerService $model */

$this->title = 'Update Costs Per Service: ' . $model->id;
if (Yii::$app->user->identity->role == 'Admin' || Yii::$app->user->identity->role == 'Accountant') {
    $this->params['breadcrumbs'][] = ['label' => 'Costs Per Services', 'url' => ['create']];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['view?id=']];
}
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costs-per-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>