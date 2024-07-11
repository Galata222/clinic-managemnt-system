<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CentralTriage $model */

$this->title = Yii::t('app', 'Create Central Triage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Central Triages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="central-triage-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>