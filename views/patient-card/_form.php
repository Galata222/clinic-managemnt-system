<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PatientCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patient-card-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medical_record_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CC')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'VV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hpi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'past_medical_and_surgical_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'personal_and_social_hx')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'previous_hospital_admission')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'physical_examination')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'pertinent_physical_examination')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'urgent_attention')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'assesment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lab_investigation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advice')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'appointment')->textInput() ?>

    <?= $form->field($model, 'physcian')->textInput(['maxlength' => true]) ?>
    <!-- 
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>