<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Prescription $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prescription-view">

    <p>
        <?php if (Yii::$app->user->identity->role == "Doctor") { ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_drug',
            'strength',
            'dosage',
            'form',
            'frequency',
            'duration',
            'quantity',
            'how_to_use',
            'other_info',
            'price',
            'patient_id',
            'doctor_id',
            'pharmacist_id',
            'status',
            'patient_type',
            'prescribed_date',
            'fk_admissinon_exam_id',
        ],
    ]) ?>

</div>