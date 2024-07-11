<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Billing $model */

$this->title = Yii::t('app', 'Update Billing: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Billings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="billing-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>