<?php
/**
 * @var UploadForm $model
 * @var string $avatarPath
 * @var string $username
 * @var string $email
 */

use app\models\UploadForm;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;
use yii\imagine\Image;

?>
<h3>Settings</h3>
<div class="col-lg-6 float-start">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <section>
        <?=
            $form->field(
                $model,
                'imageFile',
                [
                    'template' => '<label class="control-label btn btn-primary" for="uploadform-imagefile">Change avatar</label>{input}',
                    'errorOptions' => ['tag' => null],
                ],

            )
            ->fileInput(['style' => 'display:none'])
            ->label('class="btn btn-primary"')
        ?>
        <?= $form->field($model, 'username')->textInput(['value' => $username]) ?>
        <?= $form->field($model, 'email')->textInput(['value' => $email]) ?>

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
    <div class="d-flex justify-content-center">
        <h3><?= $username ?></h3>
    </div>
</div>
<?= $this->render('_register_js.php') ?>