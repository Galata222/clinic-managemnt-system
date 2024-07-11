<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UsersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') 
    ?>

    <?php // echo $form->field($model, 'phone_no') 
    ?>

    <?php // echo $form->field($model, 'address') 
    ?>

    <?php // echo $form->field($model, 'password') 
    ?>

    <?php // echo $form->field($model, 'role') 
    ?>

    <?php // echo $form->field($model, 'department') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <?php // echo $form->field($model, 'authoKey') 
    ?>

    <?php // echo $form->field($model, 'accessToken') 
    ?>

    <?php // echo $form->field($model, 'profile_pictucre') 
    ?>

    <?php // echo $form->field($model, 'oldpassword') 
    ?>

    <?php // echo $form->field($model, 'newpassword') 
    ?>

    <?php // echo $form->field($model, 'confirm_pass') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>