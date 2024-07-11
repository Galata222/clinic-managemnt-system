<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequest $model */

$this->title = Yii::t('app', 'Create Radilogy Request');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radilogy Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radilogy-request-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>