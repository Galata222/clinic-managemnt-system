<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabResult $model */

$this->title = Yii::t('app', 'Create Lab Result');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Results'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-result-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>