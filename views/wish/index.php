<?php
/** @var View $this */
/** @var WishRecord $model */

use app\records\WishRecord;
use yii\web\View;

?>

<div class="col-lg-6 mx-auto">
    <h1>Make a wish</h1>
    <?= $this->render('_create_wish_form.php', ['model' => $model]) ?>
</div>