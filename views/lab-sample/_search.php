<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LabSampleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lab-sample-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fk_specimen') ?>

    <?= $form->field($model, 'fk_patient') ?>

    <?= $form->field($model, 'specimen_source') ?>

    <?= $form->field($model, 'adm_sample') ?>

    <?php // echo $form->field($model, 'sample_designation') 
    ?>

    <?php // echo $form->field($model, 'originated_from') 
    ?>

    <?php // echo $form->field($model, 'vol_brought') 
    ?>

    <?php // echo $form->field($model, 'vol_brought_unit') 
    ?>

    <?php // echo $form->field($model, 'date_brought') 
    ?>

    <?php // echo $form->field($model, 'time_brought') 
    ?>

    <?php // echo $form->field($model, 'lab_tech_ini') 
    ?>

    <?php // echo $form->field($model, 'csf_venesector') 
    ?>

    <?php // echo $form->field($model, 'remarks') 
    ?>

    <?php // echo $form->field($model, 'rejected_reason') 
    ?>

    <?php // echo $form->field($model, 'reason_not_collected') 
    ?>

    <?php // echo $form->field($model, 'date_collect') 
    ?>

    <?php // echo $form->field($model, 'time_collect') 
    ?>

    <?php // echo $form->field($model, 'creation_time') 
    ?>

    <?php // echo $form->field($model, 'creation_name') 
    ?>

    <?php // echo $form->field($model, 'sample_collected') 
    ?>

    <?php // echo $form->field($model, 'date_created') 
    ?>

    <?php // echo $form->field($model, 'date_modified') 
    ?>

    <?php // echo $form->field($model, 'urine_dipstick') 
    ?>

    <?php // echo $form->field($model, 'reject_specify') 
    ?>

    <?php // echo $form->field($model, 'time_point') 
    ?>

    <?php // echo $form->field($model, 'sample_collection_dtl') 
    ?>

    <?php // echo $form->field($model, 'sample_receive_status') 
    ?>

    <?php // echo $form->field($model, 'gram_stain') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>