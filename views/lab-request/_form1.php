<?php

use kartik\depdrop\DepDrop;
use app\models\LabTestType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TestItem;
use yii\web\View;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\helpers\URl;

$form = ActiveForm::begin(); ?>
<?php
echo $form->field($model, 'fk_lab_test_type')->dropDownList($employees, ['prompt' => 'Select employee']);
echo $form->field($model, 'requests')->checkboxList($hobbies);
?>
<?php ActiveForm::end(); ?>
<?php
$script = <<< JS
var current_employee_id = 0;
$("select").change(function() {
    current_employee_id = $(this).val()
    $('input[type=checkbox]').each(function () {
        $(this).prop('checked', false);
    });
    $.ajax({
        url: 'lab-request/get-hobbies?id='+current_employee_id,
        dataType: "json",
        success: function(data) {
          $.each(data, function(key, value){
            $('input[type=checkbox]').each(function () {
                if($(this).val()==key){
                  $(this).prop('checked', true);
                }
            });
          });
        }
    })
});
$("input[type=checkbox]").change(function() {
    if(this.checked) {
      $.post("lab-request/set-hobby&id="+current_employee_id+"&id="+$(this).val())
    }
    else{
      $.post("lab-request/unset-hobby&id="+current_employee_id+"&id="+$(this).val())
    }
});
JS;
$this->registerJs($script);