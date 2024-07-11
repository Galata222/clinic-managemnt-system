<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prescription $model */

$this->title = 'Create Prescription';
$this->params['breadcrumbs'][] = ['label' => 'Prescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescription-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>