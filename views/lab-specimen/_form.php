<?php

use yii\helpers\Html;
// use kartik\form\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-specimen-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'pk_specimen_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'venesector_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight_before')->textInput() ?>

    <?= $form->field($model, 'weight_after')->textInput() ?>

    <?= $form->field($model, 'weight_diff')->textInput() ?>

    <?= $form->field($model, 'date_processed')->textInput() ?>

    <?= $form->field($model, 'time_processed')->textInput() ?>

    <?= $form->field($model, 'date_signal')->textInput() ?>

    <?= $form->field($model, 'time_signal')->textInput() ?>

    <?= $form->field($model, 'time_positivity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sterile_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'time_point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_date_processed')->textInput() ?>

    <?= $form->field($model, 'end_time_processed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>