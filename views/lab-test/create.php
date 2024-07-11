<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTest $model */

$this->title = 'Create Lab Test';
$this->params['breadcrumbs'][] = ['label' => 'Lab Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>