<?php  ?>
<section>
        <div>
            <div class="display-flex column">
                <div>
                    <img class="responsive-img" src="<?= $card->getPicture() ?>"\>
                </div>
                <div class="display-flex">
                    <a class="waves-effect waves-light btn #311b92 deep-purple darken-4 flex-end">Remove</a>
                </div>
            </div>
            <div>
                <p class="card-content valign center text_size"> <?= $card->getName() ?> </p>
            </div>
        </div>
</section>