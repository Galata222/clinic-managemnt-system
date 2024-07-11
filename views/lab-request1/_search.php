<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabRequestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fk_doctor') ?>

    <?= $form->field($model, 'fk_lab_test_type') ?>

    <?= $form->field($model, 'fk_test_item') ?>

    <?= $form->field($model, 'request') ?>
    <!-- <?= $form->field($model, 'patient_id') ?> -->
    <?php // echo $form->field($model, 'date_entry') 
    ?>

    <?php // echo $form->field($model, 'date_modified') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>