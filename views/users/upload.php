<?php

use dosamigos\fileupload\FileUploadUI;
?>
<?= FileUploadUI::widget([
    'model' => $model,
    'attribute' => 'profile_picture',
    'url' => ['users/upload-profile-picture', 'id' => $model->id],
    'gallery' => false,
    'fieldOptions' => [
        'accept' => 'image/*',
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000,
        'autoUpload' => true,
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                      jQuery(".fb-image-profile").attr("src",data.result);
                                  }',
        'fileuploadfail' => 'function(e, data) {
                                      alert("Image Upload Failed, please try again.");
                                  }',
    ],
]);
?>