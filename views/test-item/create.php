<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestItem $model */

$this->title = 'Create Test Item';
$this->params['breadcrumbs'][] = ['label' => 'Test Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
