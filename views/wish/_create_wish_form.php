<?php

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\records\WishRecord $model */
/** @var ActiveForm $form */
?>
<div class="CreateWishForm">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?=
        $form->field(
            $model,
            'imageFile',
            [
                'template' => '<label class="control-label btn btn-primary" for="createwishform-imagefile">Add picture</label>{input}',
                'errorOptions' => ['tag' => null],
            ],

        )
            ->fileInput(['style' => 'display:none'])
            ->label('class="btn btn-primary"')
        ?>
        <?= $form->field($model, 'user_id')
            ->label(false)
            ->textInput([
                'value' => (int) $model->user_id,
                'style' => 'display:none',
            ]) ?>
        <?= $form->field($model, 'wish_list_id')
            ->label(false)
            ->textInput([
                'value' => $model->wish_list_id,
                'style' => 'display:none',
            ])?>
        <?= $form->field($model, 'photo_path')
            ->label(false)
            ->textInput([
                'value' => $model->photo_path,
                'style' => 'display:none',
            ])?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'link') ?>
        <?= $form->field($model, 'price') ?>
<!--        --><?php //= $form->field($model, 'is_secret')
//            ->label(
//                'Is secret wish',
//                [
//                    'template' => '<div
//            class="form-group form-check form-switch field-wishrecord-is_secret"
//            style="line-height: 40px;"
//        >
//            <label
//                class="form-check-label" for="flexSwitchCheckDefault"
//                style="margin-left: 10px;"
//            >
//                Is secret wish
//            </label>
//            {input}
//        </div>',
//                ]
//            )
//            ->checkbox(['class' => 'form-check-input'])
//        ?>
        <?= $form->field($model, 'id')
            ->label(false)
            ->textInput([
                'value' => $model->id ?? 0,
                'style' => 'display:none',
            ])
        ?>

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
                name="CreateWishForm[is_secret]"
            >
        </div>

        <div class="form-group">
            <?= Html::submitButton('Make a wish', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- CreateWishForm -->
