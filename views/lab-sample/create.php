<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabSample $model */

$this->title = Yii::t('app', 'Create Lab Sample');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Samples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-sample-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>