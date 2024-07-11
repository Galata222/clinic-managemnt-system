<?php

use yii\helpers\Html;
use app\models\CostsPerService;

/** @var yii\web\View $this */
/** @var app\models\CostsPerService $model */

$this->title = 'Create Costs Per Service';
if (Yii::$app->user->identity->role == 'Admin' || Yii::$app->user->identity->role == 'Accountant') {
    $this->params['breadcrumbs'][] = ['label' => 'Costs Per Services', 'url' => ['create']];

    $this->params['breadcrumbs'][] = ['label' => 'create', 'url' => ['creates']];

    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="costs-per-service-create" style="align-items: center;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>