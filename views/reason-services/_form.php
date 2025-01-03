<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReasonServices $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reason-services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'services')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
