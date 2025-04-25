<?php

/** @var View $this */
/** @var string $avatar */
/** @var string $username */
/** @var WishRecord[] $wishes */

use app\records\WishRecord;
use yii\web\View;
?>

<h3>My wishes</h3>
<div class="d-flex justify-content-center">
    <img
            src="<?= $avatar ?>"
            alt="<?= $avatar ?>"
            style="height: 10vh; width: 10vh; border-radius: 500px"
    >
    <div class="container">
<!--    <div class="d-flex justify-content-center">-->
        <h3><?php echo ucfirst($username) ?></h3>
    </div>
</div>

<div class="container" style="height: 100px;">
    <div class="cards row" style="height: 100%;">
    <?php
    $evenWishes = '';
    $oddWishes = '';
        foreach ($wishes as $i => $wish) {
            $even = $i % 2 == 0;
            if (!$even) {
                $evenWishes .= $this->render('_card.php', ['i' => $i, 'wish' => $wish]);
            } else {
                $oddWishes .= $this->render('_card.php', ['i' => $i, 'wish' => $wish]);
            }
        }

//    echo '<pre>';
//    print_r($evenWishes);
//    echo '</pre>';
//    die;

    ?>
        <div class="col">
            <?= $oddWishes ?>
        </div>
        <div class="col">
            <?= $evenWishes ?>
        </div>

    </div>
</div>
