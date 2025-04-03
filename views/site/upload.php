<?php
/**
 * @var $model
 */
use yii\widgets\ActiveForm;
?>
<h3>Upload page</h3>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>