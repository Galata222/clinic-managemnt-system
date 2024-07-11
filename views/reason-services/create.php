<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReasonServices $model */

$this->title = 'Create Reason Services';
$this->params['breadcrumbs'][] = ['label' => 'Reason Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reason-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
