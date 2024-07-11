<?php

use yii\helpers\Html;
?>
<?php foreach ($checkboxes as $checkbox) : ?>
<?= Html::checkbox('Model[checkboxes][]', false, ['value' => $checkbox->item]) ?>
<?= Html::label($checkbox->item) ?><br>
<?php endforeach; ?>