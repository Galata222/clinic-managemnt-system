<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DrugForm $model */

$this->title = Yii::t('app', 'Create Drug Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-form-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>