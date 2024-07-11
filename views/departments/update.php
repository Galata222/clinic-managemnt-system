<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Departments $model */

$this->title = Yii::t('app', 'Update Departments: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="departments-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>