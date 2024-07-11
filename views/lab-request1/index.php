<?php

use app\models\LabRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LabRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lab Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-request-index">

    <p>
        <?= Html::a('Create Lab Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fk_doctor',
            'fk_lab_test_type',
            'fk_test_item',
            'requests:ntext',
            //'date_entry',
            //'date_modified',
            //'status',
            //patient_id,
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LabRequest $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>