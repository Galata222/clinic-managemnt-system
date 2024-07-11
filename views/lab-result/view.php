<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LabResult $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Results'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lab-result-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lab_result_id',
            'patient_id',
            'lab_request_id',
            'lab_test_type_id',
            'lab_test_item_id',
            'lab_result',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'status',
            'lab_sample_id',
            'lab_specimen',
        ],
    ]) ?>

</div>