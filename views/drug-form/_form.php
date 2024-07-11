<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DrugForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="drug-form-form">

    <?php $form = ActiveForm::begin([
    'id' => 'form-signup', 
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
]); ?>

    <?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success',
        'style'=>'float:right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>