<?php
/**
 * @var $model
 * @var $avatarPath
 */

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;
use yii\imagine\Image;

?>
<h3>Upload page</h3>
<div class="col-lg-6 float-start">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <section>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <?= $form->field($model, 'username')->textInput() ?>

    </section>
        <button class="btn btn-primary">Submit</button>

    <?php ActiveForm::end() ?>
</div>
<div class="col-lg-3 float-end">
    <img
        src="<?= $avatarPath ?>"
        alt="<?= $avatarPath ?>"
        style="height: 30vh; width: 30vh; border-radius: 500px"
    >
</div>