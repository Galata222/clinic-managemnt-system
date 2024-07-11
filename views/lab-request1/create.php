<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */

$this->title = 'Create Lab Request';
$this->params['breadcrumbs'][] = ['label' => 'Lab Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-request-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>