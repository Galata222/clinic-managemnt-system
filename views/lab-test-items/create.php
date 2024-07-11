<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabTestItems $model */

$this->title = Yii::t('app', 'Create Lab Test Items');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Test Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-items-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>