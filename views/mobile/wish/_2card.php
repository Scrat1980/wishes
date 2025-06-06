<?php
/**
 * @var WishRecord $wish
 * @var int $i
 */

use app\records\WishRecord;

?>

<!--<div class="col-sm-3">-->
<div class="w-auto p-7 mycard" data-number="<?=$i?>">
    <span class="glyphicon glyphicon-asterisk"></span>
    <div class="card">
        <div class="hoverish" data-number="<?=$i?>">
            <a href="/wish/edit/<?= $wish->id ?>" class="st">
                <i class="bi bi-upload sti"></i>
            </a>
            <a href="/wish/edit/<?= $wish->id ?>" class="st">
                <i class="bi bi-pen-fill sti"></i>
            </a>
            <a href="/wish/delete/<?= $wish->id ?>" class="st">
                <i class="bi bi-trash sti"></i>
            </a>
        </div>
        <img src="<?= $wish->photo_path ?>" class="card-img-top"
           alt="<?= $wish->photo_path ?>" style="border-radius: 10px"
        >
<!--        <div class="card-body">-->
<!--            <h5 class="card-title">--><?php //= $wish->name ?><!--</h5>-->
<!--            <p class="card-text">--><?php //= $wish->price ?><!--</p>-->
<!--            <a href="--><?php //= $wish->link ?><!--" >Where to buy</a>-->
<!--            <a href="--><?php //= $wish->link ?><!--" >Contribute via bank</a>-->
<!--        </div>-->
    </div>
</div>