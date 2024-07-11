<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\LabTest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pk_test_id')->textInput() ?>

    <?= $form->field($model, 'fk_test_type')->textInput() ?>

    <?= $form->field($model, 'fk_specimen')->textInput() ?>

    <?= $form->field($model, 'fk_patient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_result')->textInput() ?>

    <?= $form->field($model, 'date_done')->widget(kartik\date\DatePicker::classname(), [
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
    <?= $form->field($model, 'result_date')->widget(kartik\date\DatePicker::classname(), [
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>