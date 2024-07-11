<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimenSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-specimen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pk_specimen_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'venesector_id') ?>

    <?php // echo $form->field($model, 'weight_before') 
    ?>

    <?php // echo $form->field($model, 'weight_after') 
    ?>

    <?php // echo $form->field($model, 'weight_diff') 
    ?>

    <?php // echo $form->field($model, 'date_processed') 
    ?>

    <?php // echo $form->field($model, 'time_processed') 
    ?>

    <?php // echo $form->field($model, 'date_signal') 
    ?>

    <?php // echo $form->field($model, 'time_signal') 
    ?>

    <?php // echo $form->field($model, 'time_positivity') 
    ?>

    <?php // echo $form->field($model, 'sterile_site') 
    ?>

    <?php // echo $form->field($model, 'volume') 
    ?>

    <?php // echo $form->field($model, 'units') 
    ?>

    <?php // echo $form->field($model, 'date_created') 
    ?>

    <?php // echo $form->field($model, 'date_modified') 
    ?>

    <?php // echo $form->field($model, 'time_point') 
    ?>

    <?php // echo $form->field($model, 'end_date_processed') 
    ?>

    <?php // echo $form->field($model, 'end_time_processed') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>