<?php
/** @var View $this */
/** @var WishRecord $model */

use app\records\WishRecord;
use yii\web\View;

?>
<div class="col-lg-3 float-end">
    <div class="d-flex justify-content-center">
        <img
                src="<?= $model->photo_path ?>"
                alt="<?= $model->photo_path ?>"
                style="height: 30vh; width: 30vh; border-radius: 500px"
        >
    </div>
    <div class="d-flex justify-content-center">
        <h3><?= $model->name ?></h3>
    </div>
</div>

<div class="col-lg-6 mx-auto">
    <h1>Make a wish</h1>
    <?= $this->render('_create_wish_form.php', ['model' => $model]) ?>
</div>