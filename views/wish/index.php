<?php

/** @var View $this */
/** @var string $avatar */
/** @var string $username */
/** @var WishRecord[] $wishes */

use app\records\WishRecord;
use yii\web\View;
?>

<h3>My wishes</h3>

<div class="row">
    <div class="d-flex justify-content-center">
        <img
                src="<?= $avatar ?>"
                alt="<?= $avatar ?>"
                style="height: 10vh; width: 10vh; border-radius: 500px"
        >
    </div>
    <div class="d-flex justify-content-center">
        <h3><?= $username ?></h3>
    </div>
</div>

<div class="row">
<?php
    foreach ($wishes as $wish) {
        echo $this->render('_card.php', ['wish' => $wish]);
    }
?>
</div>
