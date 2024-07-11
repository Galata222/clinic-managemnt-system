<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\DrugStore $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="drug-store-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'drug_id',
            'drug_name',
            'drug_cost',
            'expiry_date',
            'status',
        ],
    ]) ?>

</div>