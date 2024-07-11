<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//use kartik\form\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PatientPrescription $model */
/** @var yii\widgets\ActiveForm $form */
$var_gender = ['op' => 'Outpatient', 'Ip' => 'Inpatient'];
?>
<style type="text/css">
    input[type=radio] {
        vertical-align: middle;
        float: right;
        width: 30px;
    }
</style>


<div class="patient-prescription-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'prescription_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drug_names')->dropDownList(
        ArrayHelper::map(
            \app\models\DrugStore::find()->all(),
            'drug_name',
            'drug_name'
        )
    ) ?>

    <?= $form->field($model, 'strength')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dosage')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'form_id')->dropDownList(
        ArrayHelper::map(
            \app\models\DrugForm::find()->all(),
            'form',
            'form'
        )
    ) ?>

    <?= $form->field($model, 'frequency')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'how_to_use')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'other_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_type')->radioList($var_gender) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'prescribed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dispensed_by')->textInput(['maxlength' => true]) ?>

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