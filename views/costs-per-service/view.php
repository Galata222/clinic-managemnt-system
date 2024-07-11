<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CostsPerService $model */

$this->title = $model->id;
if (Yii::$app->user->identity->role == 'Admin' || Yii::$app->user->identity->role == 'Accountant') {
    $this->params['breadcrumbs'][] = ['label' => 'Costs Per Services', 'url' => ['create']];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'create', 'url' => ['create']];
}
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="costs-per-service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_patient_id',
            'reason:ntext',
            'cost',
        ],
    ]) ?>

</div>