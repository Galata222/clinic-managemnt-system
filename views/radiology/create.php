<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Radiology $model */

$this->title = Yii::t('app', 'Create Radiology');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radiologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radiology-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>