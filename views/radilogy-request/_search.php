<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RadilogyRequestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="radilogy-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'radiology_request_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'radiology_type') ?>

    <?= $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'performed_by') 
    ?>

    <?php // echo $form->field($model, 'perform') 
    ?>

    <?php // echo $form->field($model, 'LMP') 
    ?>

    <?php // echo $form->field($model, 'report') 
    ?>

    <?php // echo $form->field($model, 'cost') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>