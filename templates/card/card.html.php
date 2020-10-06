<?php ?>
<section>
    <div class="row">
        <div class="row">
            <div>
                <p class="card-content valign center text_size white-text"> <?= $object->getName() ?> </p>
            </div>
            <div class="display-flex column valign center">
                <div>
                    <img class="responsive-img" src="<?= $object->getPicture() ?>" \>
                </div>
                <?php if (@$_SESSION["username"]) { ?>
                    <div>
                        <a class="waves-effect waves-light btn #311b92 deep-purple darken-4"
                           href="/deck=<?= $object->getId() ?>">Add</a>
                    </div>
                <?php } else echo ""; ?>
            </div>
        </div>
    </div>
</section>