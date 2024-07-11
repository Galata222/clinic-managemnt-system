<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CentralTriageSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="central-triage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'patient_first_name') ?>

    <?= $form->field($model, 'patient_last_name') ?>

    <?= $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'gender') 
    ?>

    <?php // echo $form->field($model, 'occupation') 
    ?>

    <?php // echo $form->field($model, 'central_triagecol') 
    ?>

    <?php // echo $form->field($model, 'phone_no') 
    ?>

    <?php // echo $form->field($model, 'house_no') 
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