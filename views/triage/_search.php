<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TriageSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="triage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <!-- <?= $form->field($model, 'case index') ?> -->

    <?= $form->field($model, 'blood_pressure') ?>

    <?= $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'pulse_rate') 
    ?>

    <?php // echo $form->field($model, 'resparatory_rate') 
    ?>

    <?php // echo $form->field($model, 'weight') 
    ?>

    <?php // echo $form->field($model, 'po2') 
    ?>

    <?php // echo $form->field($model, 'patient_category') 
    ?>

    <?php // echo $form->field($model, 'bmi') 
    ?>

    <?php // echo $form->field($model, 'gcs') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <?php // echo $form->field($model, 'created_by') 
    ?>

    <?php // echo $form->field($model, 'updated_by') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>