<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\web\View;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var app\models\Patient $model */
/** @var yii\widgets\ActiveForm $form */
$var_gender = ['M' => 'Male', 'F' => 'Female'];
?>
<style type="text/css">
    input[type=radio] {
        vertical-align: middle;
        float: right;
        width: 30px;
    }
</style>
<?php

$region = [
    'Tigray' => 'Tigray', 'Afar' => 'Afar', 'Amhara' => 'Amhara', 'Oromya' => 'Oromiya', "Gambella" => "Gambella", "Benshangul" => "Benshangul", "Somale" => "Somale",
    "SSNR" => "SSNR", "Sidama" => "Sidama", "Addis Ababa" => "Addis Ababa", "Dire Dawa" => "Dire Dawa", "Harari" => "Harari"
]
?>
<div class="patient-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <!-- <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no')->widget(PhoneInput::className(), [
        'jsOptions' => [
            'preferredCountries' => ['et', 'et', 'pl', 'ua',],
            'defaultCountry' => ['ethiopia'],
        ]
    ]); ?>
    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList($var_gender) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->dropDownList($region, ['prompt' => 'Please select region']) ?>

    <?= $form->field($model, 'zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kebele')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

</div>
</div>