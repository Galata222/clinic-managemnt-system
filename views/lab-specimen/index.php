<?php

use app\models\LabSpecimen;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\LabSpecimenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lab Specimens');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-specimen-index">



    <p>
        <?php if(Yii::$app->user->identity->role == 'admin'){?>

        <?= Html::a(Yii::t('app', 'Create Lab Specimen'), ['create'], [
            'class' => 'btn btn-success',
            'style' => ' border: none; padding: 10px 20px; cursor: pointer; float:right'
        ]) ?>
        <?php } ?>

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
            'pk_specimen_id',
            'patient_id',
            'comment:ntext',
            'venesector_id',
            //'weight_before',
            //'weight_after',
            //'weight_diff',
            //'date_processed',
            //'time_processed',
            //'date_signal',
            //'time_signal',
            //'time_positivity',
            //'sterile_site',
            //'volume',
            //'units',
            //'date_created',
            //'date_modified',
            //'time_point',
            //'end_date_processed',
            //'end_time_processed',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->role == 'admin' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->role != 'admin',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>