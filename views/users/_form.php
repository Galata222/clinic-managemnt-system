<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use borales\extensions\phoneInput\PhoneInput;
/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>
    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no', [
    'addon' => [
        'prepend' => [
            'content' => '<i class="fas fa-phone"></i>'
        ]
    ]
])->widget(PhoneInput::className(), [
        'jsOptions' => [
            'preferredCountries' => ['et', 'et', 'pl', 'ua',],
            'defaultCountry' => ['ethiopia'],
        ]
    ]); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'role')->dropDownList(
        ArrayHelper::map(
            \app\models\Roles::find()->all(),
            'slug',
            'name'
        )
        )?>

    <?= $form->field($model, 'department')->dropDownList(
        ArrayHelper::map(
            \app\models\Departments::find()->all(),
            'name',
            'name'
        )
        )?>
    <!--
    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'authoKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_pictucre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oldpassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newpassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirm_pass')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success',
                            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
                            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>