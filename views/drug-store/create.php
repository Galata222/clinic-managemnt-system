<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DrugStore $model */

$this->title = Yii::t('app', 'Create Drug Store');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-store-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>