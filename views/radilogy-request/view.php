<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequest $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radilogy Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="radilogy-request-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'radiology_request_id',
            'patient_id',
            'radiology_type',
            'requested_by',
            'performed_by',
            'perform:ntext',
            'LMP:ntext',
            'report:ntext',
            'cost',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>