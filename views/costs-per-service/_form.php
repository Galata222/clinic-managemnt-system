<?php

use app\models\ReasonServices;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;



/** @var yii\web\View $this */
/** @var app\models\CostsPerService $model */
/** @var yii\widgets\ActiveForm $form */
$services = ReasonServices::find()->all();
$reasons = [];
foreach ($services as $service) {
    $reasons[$service->services] = $service->services;
}
?>

<div class="costs-per-service-form" style="width: 50%;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_patient_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->checkboxlist($reasons) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>