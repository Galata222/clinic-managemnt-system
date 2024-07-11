<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Billing $model */

$this->title = Yii::t('app', 'Create Billing');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Billings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billing-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>