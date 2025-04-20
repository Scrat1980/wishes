<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Sign in';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to sign in:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-form-label '],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>
<!--            <div class="row g-3 align-items-center">-->
<!--                <div class="col-auto">-->
<!--                    <label for="inputPassword6" class="col-form-label">Password</label>-->
<!--                </div>-->
<!--                <div class="col-auto">-->
<!--                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">-->
<!--                </div>-->
<!--                <div class="col-auto">-->
<!--                <span id="passwordHelpInline" class="form-text">-->
<!--                  Must be 8-20 characters long.-->
<!--                </span>-->
<!--                </div>-->
<!--            </div>-->
            <?= $form->field($model, 'username')
                ->textInput(['autofocus' => true])
            ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

<!--            --><?php //= $form->field($model, 'rememberMe')->checkbox([
//                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

<!--            <div style="color:#999;">-->
<!--                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--                To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--            </div>-->

        </div>
    </div>
</div>
