<?php
/**
 * @var $model
 * @var $avatarPath
 */
use yii\widgets\ActiveForm;
?>
<h3>Upload page</h3>
<div class="col-lg-6 float-start">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

        <button>Submit</button>

    <?php ActiveForm::end() ?>
</div>
<div class="col-lg-3 float-end">
    <img src="<?= $avatarPath ?>" alt="">
    <img
        src="../../runtime/uploads/Ава_1743703189.jpg"
        alt=""
        style="height: 100px; width: 100px;"
    >
</div>