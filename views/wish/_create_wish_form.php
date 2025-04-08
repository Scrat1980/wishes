<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\records\WishRecord $model */
/** @var ActiveForm $form */
?>
<div class="CreateWishForm">

    <?php $form = ActiveForm::begin(); ?>
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
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'link') ?>
        <?= $form->field($model, 'price') ?>
<!--        <div class="form-check form-switch">-->
        <div
            class="form-group form-check form-switch field-wishrecord-is_secret"
            style="line-height: 40px;"
        >
            <label
                class="form-check-label" for="flexSwitchCheckDefault"
                style="margin-left: 10px;"
            >
                Is secret wish
            </label>
            <input
                class="form-check-input"
                type="checkbox"
                id="flexSwitchCheckDefault"
                style="width: 50px; height: 30px;"
            >
        </div>
<!--        --><?php //= $form->field($model, 'is_secret') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Make a wish', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- CreateWishForm -->
