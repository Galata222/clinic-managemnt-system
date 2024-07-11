<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReasonServices $model */

$this->title = 'Update Reason Services: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reason Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reason-services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
