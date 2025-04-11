<?php
/**
 * @var WishRecord $wish
 */

use app\records\WishRecord;

?>

<!--<div class="col-sm-3">-->
<div class="w-auto p-7">
    <div class="card" style="width: 18rem;">
      <img src="<?= $wish->photo_path ?>" class="card-img-top"
           alt="<?= $wish->photo_path ?>"
      >
      <div class="card-body">
        <h5 class="card-title"><?= $wish->name ?></h5>
        <p class="card-text"><?= $wish->price ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="#" class="card-link">
                <?= $wish->link ?>
            </a>
        </li>
<!--        <li class="list-group-item">A second item</li>-->
<!--        <li class="list-group-item">A third item</li>-->
      </ul>
<!--      <div class="card-body">-->
<!--        <a href="#" class="card-link">--><?php //= $wish->link ?><!--</a>-->
    <!--    <a href="#" class="card-link">Another link</a>-->
<!--      </div>-->
    </div>
</div>