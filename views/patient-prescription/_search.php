<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescriptionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patient-prescription-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prescription_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'drug_names') ?>

    <?= $form->field($model, 'strength') ?>

    <?php // echo $form->field($model, 'dosage') 
    ?>

    <?php // echo $form->field($model, 'form_id') 
    ?>

    <?php // echo $form->field($model, 'frequency') 
    ?>

    <?php // echo $form->field($model, 'duration') 
    ?>

    <?php // echo $form->field($model, 'quantity') 
    ?>

    <?php // echo $form->field($model, 'how_to_use') 
    ?>

    <?php // echo $form->field($model, 'other_info') 
    ?>

    <?php // echo $form->field($model, 'patient_type') 
    ?>

    <?php // echo $form->field($model, 'cost') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <?php // echo $form->field($model, 'prescribed_by') 
    ?>

    <?php // echo $form->field($model, 'dispensed_by') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <?php // echo $form->field($model, 'created_by') 
    ?>

    <?php // echo $form->field($model, 'updated_by') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>