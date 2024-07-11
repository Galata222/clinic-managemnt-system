<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Triage $model */

$this->title = Yii::t('app', 'Create Triage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Triages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="triage-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>