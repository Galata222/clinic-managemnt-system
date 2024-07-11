<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Radiology $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Radiologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="radiology-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'radiology_type_id',
            'radiology_type',
        ],
    ]) ?>

</div>