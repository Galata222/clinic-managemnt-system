<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Drug $model */

$this->title = 'Create Drug';
$this->params['breadcrumbs'][] = ['label' => 'Drugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
