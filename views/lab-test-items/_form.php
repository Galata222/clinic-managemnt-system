<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabTestItems $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-test-items-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'test_item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test_item_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>