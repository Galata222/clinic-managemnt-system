<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequest $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="radilogy-request-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'radiology_request_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'radiology_type')->dropDownList(
        ArrayHelper::map(
            \app\models\Radiology::find()->all(),
            'radiology_type_id',
            'radiology_type'
        )
    ) ?>

    <?= $form->field($model, 'perform')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'LMP')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'report')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <!-- <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'requested_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'performed_by')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>