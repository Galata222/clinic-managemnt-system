<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Triage $model */
/** @var yii\widgets\ActiveForm $form */
$patient_cat = ['opd' => 'OPD', 'emergency' => 'Emergency'];
?>
<style type="text/css">
    input[type=radio] {
        vertical-align: middle;
        float: right;
        width: 30px;
    }
</style>

<div class="triage-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blood_pressure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temperature')->textInput() ?>

    <?= $form->field($model, 'pulse_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resparatory_rate')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'po2')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'bmi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gcs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_category')->radioList($patient_cat) ?>
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