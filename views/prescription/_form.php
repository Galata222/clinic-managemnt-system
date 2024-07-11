<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Drug;
use app\models\DrugForm;

/** @var yii\web\View $this */
/** @var app\models\Prescription $model */
/** @var yii\widgets\ActiveForm $form */
$drugList = Drug::find()->all();
$drugOptions = [];
foreach ($drugList as $drug) {
    $drugOptions[$drug->id] = $drug->drug_name;
}
$drugForm = DrugForm::find()->all();
$drug_form_options = [];
foreach ($drugForm as $drug) {
    $drug_form_Options[$drug->id] = $drug->form;
}

$var_patient_type = ['ip' => 'Inpatient', 'op' => 'Outpatient'];
?>
<style type="text/css">
    input[type=radio] {
        vertical-align: middle;
        float: right;
        width: 30px;
    }
</style>

<div class="prescription-form" , style="width:50%">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'fk_drug')->dropDownList(
        $drugOptions,
        [
            //'options' => ['option2' => ['selected' => true]], // Setting a default selected option
            'prompt' => 'Select an drug', // Prompt text
            'disabled' => false, // Enable/disable the dropdown
            'class' => 'custom-dropdown', // CSS class for the dropdown
            'multiple' => false, // Allow multiple selections
        ]
    ) ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'strength')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dosage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'form')->dropDownList(
        $drug_form_Options,
        [
            // 'options' => ['option2' => ['selected' => true]], // Setting a default selected option
            'prompt' => 'Select an form', // Prompt text
            'disabled' => false, // Enable/disable the dropdown
            'class' => 'custom-dropdown', // CSS class for the dropdown
            'multiple' => false, // Allow multiple selections
        ]
    ) ?>

    <?= $form->field($model, 'frequency')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'how_to_use')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <!-- <?= $form->field($model, 'doctor_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pharmacist_id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'patient_type')->radioList($var_patient_type) ?>

    <?= $form->field($model, 'prescribed_date')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter expiry date ...'],
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

    <?= $form->field($model, 'fk_admissinon_exam_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>