<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\LabResult $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-result-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'lab_result_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_id')->textInput([
        'onchange' => '
        $.get("' . Yii::$app->urlManager->createUrl('lab-result/request?id=') . '" + $(this).val(), function(data) {
            $("select#request_id").html(data);
        })'
    ]) ?>

    <?= $form->field($model, 'lab_request_id', ['inputOptions' => ['id' => 'request_id', 'prompt' => Yii::t('app', 'Select Request ID')]])->dropDownList(
        [],
        [

            'onchange' => '
    $.get( "' . Yii::$app->urlManager->createUrl('lab-result/type?id=') . '"+$(this).val(), function( data ) {
    $( "select#types" ).html( data );
    })'
        ]
    ) ?>

    <?= $form->field($model, 'lab_test_type_id', ['inputOptions' => ['id' => 'types', 'prompt' => Yii::t('app', 'Select Test type'),]])->dropDownList(
        [],
        [

            'onchange' => '
    $.get( "' . Yii::$app->urlManager->createUrl('lab-result/item?id=') . '"+$(this).val(), function( data ) {
    $( "select#items" ).html( data );
    })'
        ]
    ) ?>
    <?= $form->field($model, 'lab_test_item_id', ['inputOptions' => ['id' => 'items', 'prompt' => Yii::t('app', 'Select Test item'),]])->dropDownList([],) ?>


    <?= $form->field($model, 'lab_result')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'lab_sample_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_specimen')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right',]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>