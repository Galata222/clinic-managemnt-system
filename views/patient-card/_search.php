<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PatientCardSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patient-card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'medical_record_number') ?>

    <?= $form->field($model, 'CC') ?>

    <?= $form->field($model, 'VV') ?>

    <?php // echo $form->field($model, 'hpi') 
    ?>

    <?php // echo $form->field($model, 'past_medical_and_surgical_history') 
    ?>

    <?php // echo $form->field($model, 'personal_and_social_hx') 
    ?>

    <?php // echo $form->field($model, 'previous_hospital_admission') 
    ?>

    <?php // echo $form->field($model, 'physical_examination') 
    ?>

    <?php // echo $form->field($model, 'cost') 
    ?>

    <?php // echo $form->field($model, 'pertinent_physical_examination') 
    ?>

    <?php // echo $form->field($model, 'urgent_attention') 
    ?>

    <?php // echo $form->field($model, 'assesment') 
    ?>

    <?php // echo $form->field($model, 'lab_investigation') 
    ?>

    <?php // echo $form->field($model, 'advice') 
    ?>

    <?php // echo $form->field($model, 'appointment') 
    ?>

    <?php // echo $form->field($model, 'physcian') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
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