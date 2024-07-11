<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExamination $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admission-examination-form" style="width: 50%;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hrs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'systolic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diastolic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'systolic2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diastolic2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'muac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'heightfundus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descent')->textInput() ?>

    <?= $form->field($model, 'cervix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdoscar')->textInput() ?>

    <?= $form->field($model, 'fhr')->textInput() ?>

    <?= $form->field($model, 'mraptured')->textInput() ?>

    <?= $form->field($model, 'timerom')->textInput() ?>

    <?= $form->field($model, 'liquor')->textInput() ?>

    <?= $form->field($model, 've_findings')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admited')->textInput() ?>

    <?= $form->field($model, 'rswab')->textInput() ?>

    <?= $form->field($model, 'rswabreason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tswab')->textInput() ?>

    <?= $form->field($model, 'examinitials')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_exam')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter entry date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,


        ]
    ]) ?>


    <!-- <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'date_created')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter entry date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,


        ]
    ]) ?>

    <?= $form->field($model, 'modified_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rom_duration_days')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rom_duration_hrs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fhr_not_done')->textInput() ?>

    <?= $form->field($model, 'pres')->textInput() ?>

    <?= $form->field($model, 'admitted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'abnormalities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spleen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extgenitals')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vdischarge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tpr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fw_ini')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>