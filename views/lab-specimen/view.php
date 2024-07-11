<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimen $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Specimens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lab-specimen-view">



    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pk_specimen_id',
            'patient_id',
            'comment:ntext',
            'venesector_id',
            'weight_before',
            'weight_after',
            'weight_diff',
            'date_processed',
            'time_processed',
            'date_signal',
            'time_signal',
            'time_positivity',
            'sterile_site',
            'volume',
            'units',
            'date_created',
            'date_modified',
            'time_point',
            'end_date_processed',
            'end_time_processed',
        ],
    ]) ?>

</div>