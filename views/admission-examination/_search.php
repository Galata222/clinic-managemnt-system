<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AdmissionExaminationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admission-examination-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fk_patient_id') ?>

    <?= $form->field($model, 'hrs') ?>

    <?= $form->field($model, 'rr') ?>

    <?= $form->field($model, 'systolic') ?>

    <?php // echo $form->field($model, 'diastolic') ?>

    <?php // echo $form->field($model, 'systolic2') ?>

    <?php // echo $form->field($model, 'diastolic2') ?>

    <?php // echo $form->field($model, 'temp') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'muac') ?>

    <?php // echo $form->field($model, 'heightfundus') ?>

    <?php // echo $form->field($model, 'descent') ?>

    <?php // echo $form->field($model, 'cervix') ?>

    <?php // echo $form->field($model, 'abdoscar') ?>

    <?php // echo $form->field($model, 'fhr') ?>

    <?php // echo $form->field($model, 'mraptured') ?>

    <?php // echo $form->field($model, 'timerom') ?>

    <?php // echo $form->field($model, 'liquor') ?>

    <?php // echo $form->field($model, 've_findings') ?>

    <?php // echo $form->field($model, 'admited') ?>

    <?php // echo $form->field($model, 'rswab') ?>

    <?php // echo $form->field($model, 'rswabreason') ?>

    <?php // echo $form->field($model, 'tswab') ?>

    <?php // echo $form->field($model, 'examinitials') ?>

    <?php // echo $form->field($model, 'date_exam') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'rom_duration_days') ?>

    <?php // echo $form->field($model, 'rom_duration_hrs') ?>

    <?php // echo $form->field($model, 'fhr_not_done') ?>

    <?php // echo $form->field($model, 'pres') ?>

    <?php // echo $form->field($model, 'admitted_by') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'abnormalities') ?>

    <?php // echo $form->field($model, 'spleen') ?>

    <?php // echo $form->field($model, 'extgenitals') ?>

    <?php // echo $form->field($model, 'vdischarge') ?>

    <?php // echo $form->field($model, 'tpr') ?>

    <?php // echo $form->field($model, 'fk_temp') ?>

    <?php // echo $form->field($model, 'fw_ini') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
