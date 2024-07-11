<?php

use app\models\LabTest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LabTestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lab Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-test-index">
    <p>
        <?= Html::a('Create Lab Test', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pk_test_id',
            'fk_test_type',
            'fk_specimen',
            'fk_patient',
            //'fk_result',
            //'date_done',
            //'date_created',
            //'date_modified',
            //'result_date',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],

        ],
    ]); ?>


</div>