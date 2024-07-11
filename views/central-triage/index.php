<?php
use app\models\CentralTriage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\CentralTriageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Central Triages');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="central-triage-index">
    <div class="text-right">
        <?php if(Yii::$app->user->identity->department == 'central_triage'){?>
        <?= Html::a(Yii::t('app', 'Register Patient'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'patient_id',
            'patient_first_name',
            'patient_last_name',
            'age',
            // Add other columns here

            // ActionColumn
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
                'visible' => Yii::$app->user->identity->department == 'central_triage' ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => Yii::$app->user->identity->department != 'central_triage',
            ],
            // Add Bill button
            [
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                        'Add Bill',
                        ["central-triage/bill", 'id' => $data->patient_id],
                        ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure you want to add billing?']
                    );
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>