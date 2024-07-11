<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Permission $model */

$this->title = 'Create Permission';
$this->params['breadcrumbs'][] = ['label' => 'Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>