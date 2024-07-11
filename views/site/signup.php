<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">

    <p>Please fill out the following fields to create new Account:</p>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'phone_no')->textInput() ?>
    <?= $form->field($model, 'role')->textInput() ?>
    <?= $form->field($model, 'address')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>