<?php
/**
 * @var WishRecord $wish
 */

use app\records\WishRecord;

?>
<div class="col-sm-4">

                        <!--<div class="d-flex justify-content-center">-->
                            <img
        src="<?= $wish->photo_path ?>"
        alt="<?= $wish->photo_path ?>"
        style="/*height: 60vh;*/ width: 25vw; border-radius: 20px"
    >
<!--</div>-->
<!--<div class="d-flex justify-content-center">-->
    <h3><?= $wish->name ?></h3>
    <h3><?= $wish->price ?></h3>
<!--</div>-->
</div>