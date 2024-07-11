<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */

$this->title = Yii::t('app', 'Create Lab Request');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-request-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>