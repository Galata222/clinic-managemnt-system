<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TestItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="test-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'normal_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_lab_test_type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
