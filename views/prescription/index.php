<?php

use app\models\Prescription;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PrescriptionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Prescriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescription-index">

    <p>
        <?php if (Yii::$app->user->identity->role == "Doctor") { ?>
        <?= Html::a('Create Prescription', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fk_drug',
            'strength',
            'dosage',
            'form',
            //'frequency',
            //'duration',
            //'quantity',
            //'how_to_use',
            //'other_info',
            //'price',
            //'patient_id',
            //'doctor_id',
            //'pharmacist_id',
            //'status',
            //'patient_type',
            //'prescribed_date',
            //'fk_admissinon_exam_id',
            ['header' => 'Action', 'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],

        ],
    ]); ?>


</div>