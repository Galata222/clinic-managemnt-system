<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTestTypes $model */

$this->title = Yii::t('app', 'Create Lab Test Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Test Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-types-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>