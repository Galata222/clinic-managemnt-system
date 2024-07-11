<?php

use app\models\LabTestItems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\LabTestItemstSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lab Test Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-items-index">



    <p> <?php if(Yii::$app->user->identity->role == 'admin'){?>

        <?= Html::a(Yii::t('app', 'Create Lab Test Items'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
        <?php }?>

    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'test_item_name',
            'test_item_id',
            'test_type_id',
            'cost',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->role == 'Admin' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->role != 'Admin',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>