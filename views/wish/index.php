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
        <h3><?php echo ucfirst($username) ?></h3>
    </div>
</div>
<div class="test" style="width: 100px; height: 100px; background: grey; position: relative;" data-number="5">
    <div class="hoverish" data-number="5">
        <button id="bb">iii</button>
    </div>

</div>
<div class="cards row">
<?php
    foreach ($wishes as $i => $wish) {
        echo $this->render('_card.php', ['i' => $i, 'wish' => $wish]);
    }
?>
</div>
