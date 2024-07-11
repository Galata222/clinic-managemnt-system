<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LabSample $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lab Samples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lab-sample-view">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_specimen',
            'fk_patient',
            'specimen_source',
            'adm_sample',
            'sample_designation',
            'originated_from',
            'vol_brought',
            'vol_brought_unit',
            'date_brought',
            'time_brought',
            'lab_tech_ini',
            'csf_venesector',
            'remarks:ntext',
            'rejected_reason',
            'reason_not_collected',
            'date_collect',
            'time_collect',
            'creation_time',
            'creation_name',
            'sample_collected',
            'date_created',
            'date_modified',
            'urine_dipstick:ntext',
            'reject_specify',
            'time_point',
            'sample_collection_dtl:ntext',
            'sample_receive_status',
            'gram_stain:ntext',
        ],
    ]) ?>

</div>