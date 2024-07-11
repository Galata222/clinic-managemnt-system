<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LabTest $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lab Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lab-test-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pk_test_id',
            'fk_test_type',
            'fk_specimen',
            'fk_patient',
            'fk_result',
            'date_done',
            'date_created',
            'date_modified',
            'result_date',
        ],
    ]) ?>

</div>