<?php

use app\models\LabRequest;
use app\models\LabTestType;
use app\models\TestItem;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\LabRequest $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="lab-request-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    $testTypes = LabTestType::getLabTestType();
    $testItems = TestItem::find()->all();
    $testItemsOptions = [];

    foreach ($testItems as $item) {
        $testItemsOptions[$item->item] = $item->item;
    }
    ?>

    <?= $form->field($model, 'requests')->checkboxList($testItemsOptions); ?>


    <?= $form->field($model, 'date_entry')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter entry date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
$(document).ready(function() {
    $('.show-options-link').click(function(e) {
        e.preventDefault();
        $('.checkbox-dropdown').toggle();
    });
});
JS;

$script = <<< JS
$(document).ready(function() {
    $('.show-options-link').click(function(e) {
        e.preventDefault();
        $('.checkbox-dropdown').toggle();
    });
});
JS;

$this->registerJs($script);
?>