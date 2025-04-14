<?php
/**
 * @var WishRecord $wish
 * @var int $i
 */

use app\records\WishRecord;

?>

<!--<div class="col-sm-3">-->
<div class="w-auto p-7 mycard" data-number="<?=$i?>">
    <div class="card" style="width: 9rem; border: none">
        <div class="hoverish" data-number="<?=$i?>">
            <button>Button</button>
        </div>
        <img src="<?= $wish->photo_path ?>" class="card-img-top"
           alt="<?= $wish->photo_path ?>" style="border-radius: 10px"
        >
        <div class="card-body">
            <h5 class="card-title"><?= $wish->name ?></h5>
            <p class="card-text"><?= $wish->price ?></p>
            <a href="<?= $wish->link ?>" class="card-link">Purchase</a>
            <a href="#" class="card-link">Contribute</a>
        </div>
    </div>
</div>