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
    <div class="row">
        <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_no')->widget(PhoneInput::className(), [
            'jsOptions' => [
                'preferredCountries' => ['ethiopia', 'no', 'pl', 'ua',],
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="glyphicon glyphicon-envelope"></i> Patients</h4>
            </div>
            <div class="panel-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 4, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsPatient[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'patient_id',
                        'first_name',
                        'last_name',
                        'age',
                        'phone_no',
                        'gender',
                        'occupation',
                        'region',
                        'zone',
                        'city',
                        'kebele',

                    ],
                ]); ?>

                <div class="container-items">
                    <!-- widgetContainer -->
                    <?php foreach ($modelsPatient as $i => $modelsPatient) : ?>
                    <div class="item panel panel-default">
                        <!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Patients</h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i
                                        class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                        class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                // necessary for update action.
                                if (!$modelsPatient->isNewRecord) {
                                    echo Html::activeHiddenInput($modelsPatient, "[{$i}]id");
                                }
                                ?>
                            <?= $form->field($modelsPatient, "[{$i}]first_name")->textInput(['maxlength' => true]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelsPatient, "[{$i}]last_name")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelsPatient, "[{$i}]age")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]phone_no")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]gender")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]occupation")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]region")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]zone")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelsPatient, "[{$i}]kebele")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
</div>