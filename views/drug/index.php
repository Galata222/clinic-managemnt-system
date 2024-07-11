<?php

use app\models\Drug;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DrugSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Drugs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Drug', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'drug_name',
            'drug_cost',
            'expiry_date',
            'status',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],

        ],
    ]); ?>


</div>