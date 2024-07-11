<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimen $model */

$this->title = Yii::t('app', 'Create Lab Specimen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Specimens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-specimen-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>