<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabSample $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-sample-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'fk_specimen')->textInput() ?>

    <?= $form->field($model, 'fk_patient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specimen_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adm_sample')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sample_designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'originated_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vol_brought')->textInput() ?>

    <?= $form->field($model, 'vol_brought_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_brought')->textInput() ?>

    <?= $form->field($model, 'time_brought')->textInput() ?>

    <?= $form->field($model, 'lab_tech_ini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'csf_venesector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rejected_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason_not_collected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_collect')->textInput() ?>

    <?= $form->field($model, 'time_collect')->textInput() ?>

    <?= $form->field($model, 'creation_time')->textInput() ?>

    <?= $form->field($model, 'creation_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sample_collected')->dropDownList(['y' => 'Y', 'n' => 'N', 'r' => 'R',], ['prompt' => '']) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'urine_dipstick')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reject_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sample_collection_dtl')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sample_receive_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gram_stain')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right',

        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>