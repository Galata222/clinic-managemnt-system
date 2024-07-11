<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTestType $model */

$this->title = 'Create Lab Test Type';
$this->params['breadcrumbs'][] = ['label' => 'Lab Test Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
