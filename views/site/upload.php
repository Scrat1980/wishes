<?php
/**
 * @var UploadForm $uploadForm
 * @var string $avatarPath
 * @var string $username
 * @var string $email
 */

use app\models\UploadForm;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

?>
<h3>Settings</h3>
<div class="col-lg-6 float-start">
    <?php
    $src = $uploadForm->avatar_path ?? '/img/placeholder_person.jpeg';
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <section>
        <?=
            $form->field(
                $uploadForm,
                'imageFile',
                [
                    'template' => '<label class="control-label" for="uploadform-imagefile"><img src="' . $src . '" style="width: 100px; height: 100px; border-radius: 500px;"><h3>' . ucfirst($uploadForm->username) . '   </h3></label>{input}',
                    'errorOptions' => ['tag' => null],
                ],
            )
            ->fileInput(['style' => 'display:none'])
            ->label('class="btn btn-primary"')
        ?>
        <?= $form->field($uploadForm, 'username')
            ->textInput(['value' => $uploadForm->username])
        ?>
        <?= $form->field($uploadForm, 'email')
            ->textInput(['value' => $uploadForm->email])
        ?>
        <?= $form->field($uploadForm, 'avatar_path')
            ->label(false)
            ->textInput([
                'value' => $uploadForm->avatar_path,
                'style' => 'display:none',
            ])
        ?>

    </section>
        <button class="btn btn-primary">Submit</button>

    <?php ActiveForm::end() ?>
</div>
<div class="col-lg-3 float-end">
    <div class="d-flex justify-content-center">
<!--        <img-->
<!--            src="--><?php //echo $uploadForm->avatar_path ?? '/img/placeholder_person.jpeg' ?><!--"-->
<!--            alt="--><?php //= $uploadForm->avatar_path ?><!--"-->
<!--            style="height: 10vh; width: 10vh; border-radius: 500px"-->
<!--        >-->
    </div>
<!--    <div class="d-flex justify-content-center">-->
<!--        <h3>--><?php //echo ucfirst($uploadForm->username) ?><!--</h3>-->
<!--    </div>-->
</div>
<?php //= $this->render('_register_js.php') ?>