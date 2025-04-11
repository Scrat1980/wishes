<?php

/** @var View $this */
/** @var WishRecord[] $wishes */

use app\records\WishRecord;
use yii\web\View;
?>

<h3>My wishes</h3>
<!--<div class="container">-->
<!--    <div class="row">-->
<div class="row">
    <?php
foreach ($wishes as $wish) {
    echo $this->render('_card.php', ['wish' => $wish]);
}
?>
<!--    </div>-->
</div>
