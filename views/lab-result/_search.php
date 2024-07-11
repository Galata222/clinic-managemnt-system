<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabResultSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lab_result_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'lab_request_id') ?>

    <?= $form->field($model, 'lab_test_type_id') ?>

    <?php // echo $form->field($model, 'lab_test_item_id') 
    ?>

    <?php // echo $form->field($model, 'lab_result') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <?php // echo $form->field($model, 'created_by') 
    ?>

    <?php // echo $form->field($model, 'updated_by') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <?php // echo $form->field($model, 'lab_sample_id') 
    ?>

    <?php // echo $form->field($model, 'lab_specimen') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>