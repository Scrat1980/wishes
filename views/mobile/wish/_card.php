<?php
/**
 * @var WishRecord $wish
 * @var int $i
 */

use app\records\WishRecord;

?>

<div class="w-100 h-100 mycard iz_card"
     data-number="<?=$i?>"
     style="background-image: url('<?= $wish->photo_path ?>')"
>
    <div style="position: relative">
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
    </div>
</div>