<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LabTestTypes $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Test Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lab-test-types-view">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'test_type_name',
            'test_type_id',
        ],
    ]) ?>

</div>