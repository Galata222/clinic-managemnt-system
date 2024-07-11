<?php

use app\models\LabTestItems;
use yii\helpers\Html;
use app\models\LabTestTypes;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
// use kartik\form\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-request-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>
    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_request_id')->textInput(['maxlength' => true]) ?>
    <!-- //dropdown depedency -->
    <?php
    echo $form->field($model, 'lab_test_type_id')->dropDownList(
        ArrayHelper::map(
            \app\models\LabTestTypes::find()->all(),
            'test_type_id',
            'test_type_name'
        ),
        [
            'prompt' => Yii::t('app', 'Select Test type'),
            'onchange' => '
        $.get( "' . Yii::$app->urlManager->createUrl('lab-request/dropdown?id=') . '"+$(this).val(), function( data ) {
        $( "select#subcat" ).html( data );
        })'
        ]
    );
    echo $form->field($model, 'lab_test_item_id', ['inputOptions' => ['id' => 'subcat', 'prompt' => Yii::t('app', 'Select Test item'),]])->dropDownList([]);
    ?>


    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>