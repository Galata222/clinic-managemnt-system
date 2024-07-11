<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabTestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pk_test_id') ?>

    <?= $form->field($model, 'fk_test_type') ?>

    <?= $form->field($model, 'fk_specimen') ?>

    <?= $form->field($model, 'fk_patient') ?>

    <?php // echo $form->field($model, 'fk_result') ?>

    <?php // echo $form->field($model, 'date_done') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'result_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
