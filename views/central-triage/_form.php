<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CentralTriage $model */
/** @var yii\widgets\ActiveForm $form */
$var_gender = ['M' => 'Male', 'F' => 'Female'];
?>
<style type="text/css">
input[type=radio] {
    vertical-align: middle;
    float: right;
    width: 30px;
}
</style>
<div class="central-triage-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <!-- <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true, 'placeholder' => 'Enter ID of patient']) ?> -->

    <?= $form->field($model, 'patient_first_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter first name of patient']) ?>

    <?= $form->field($model, 'patient_last_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter last name of patient']) ?>

    <?= $form->field($model, 'age')->textInput([
        'type' => 'number',
        'min' => 0,       // Minimum allowed value
        'max' => 200,     // Maximum allowed value
        'step' => 1,      // Step size (increments/decrements)
        'placeholder' => 'Enter a age of patient',
    ]) ?>

    <?= $form->field($model, 'gender')->radioList($var_gender) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true, 'placeholder' => 'Enter the occupation of patient']) ?>

    <?= $form->field($model, 'phone_no', [
        'addon' => [
            'prepend' => [
                'content' => '<i class="fas fa-phone"></i>'
            ]
        ]
    ])->widget(PhoneInput::className(), [
        'jsOptions' => [
            'preferredCountries' => ['et', 'et', 'pl', 'ua',],
            'defaultCountry' => ['ethiopia'],
        ]
    ]); ?>

    <?= $form->field($model, 'house_no')->textInput(['maxlength' => true],) ?>
    <!--
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>