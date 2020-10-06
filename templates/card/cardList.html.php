<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DeckBuilder</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/app.css">
    <link type="text/css" rel="stylesheet" href="./node_modules/materialize-css/dist/css/materialize.min.css"
          media="screen,projection"/>
</head>
<body>
<?php include __DIR__ . '/../../templates/header.html.php'; ?>

<main id="cardListMain">
    <section class="row">
        <section class="row">
            <section class="row display-flex space_between">
                <section class="margin_auto">
                    <div>
                        <div>
                            <div>
                                <h1 class="white-text">Card List</h1>
                            </div>
                        </div>
                </section>
                <section class="margin_auto flex-end">
                    <div>
                        <div>
                            <div>
                                <a class="waves-effect waves-light btn-large"
                                   href="cards?color=Empty">Empty</a>
                                <a class="waves-effect waves-light #000000 black btn-large"
                                   href="cards?color=Black">Black</a>
                                <a class="waves-effect waves-light #01579b light-blue darken-4 btn-large"
                                   href="cards?color=Blue">Blue</a>
                                <a class="waves-effect waves-light #4caf50 green btn-large"
                                   href="cards?color=Green">Green</a>
                                <a class="waves-effect waves-light #d50000 red accent-4 btn-large"
                                   href="cards?color=Red">Red</a>
                                <a class="waves-effect waves-dark #ffffff white black-text btn-large"
                                   href="cards?color=White">White</a>
                            </div>
                        </div>
                </section>
            </section>
        </section>
    </section>

    <section class="row">
        <section class="row">
            <section class="row">
                <section class="display-flex">
                    <div class="display-flex margin_auto">
                        <?php if (null !== $color): ?>
                            <div>
                                <?php if ($currentPage > 1): ?>
                                    <a class="waves-effect waves-light btn"
                                       href="cards?color=<?= $color ?>&page=<?= $currentPage - 1 ?>">Previous</a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($currentPage < $pages): ?>
                                    <a class="waves-effect waves-light btn"
                                       href="cards?color=<?= $color ?>&page=<?= $currentPage + 1 ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div>
                                <?php if ($currentPage > 1): ?>
                                    <a class="waves-effect waves-light btn" href="cards?page=<?= $currentPage - 1 ?>">Previous</a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($currentPage < $pages): ?>
                                    <a class="waves-effect waves-light btn" href="cards?page=<?= $currentPage + 1 ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </section>
        </section>
    </section>


    <section class="row">
        <section class="row">
            <section class="row">
                <section class="row">
                    <section class="row">
                        <section class="row">
                            <section class="mt10">
                                <?php foreach ($cardsList as $object): ?>
                                    <div id="cardDisplay" class="col s4 space_between">
                                        <div>
                                            <?php include 'card.html.php'; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

    <section class="row">
        <section class="row">
            <section class="row">
                <section class="display-flex">
                    <div class="display-flex margin_auto">
                        <?php if (null !== $color): ?>
                            <div>
                                <?php if ($currentPage > 1): ?>
                                    <a class="waves-effect waves-light btn"
                                       href="cards?color=<?= $color ?>&page=<?= $currentPage - 1 ?>">Previous</a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($currentPage < $pages): ?>
                                    <a class="waves-effect waves-light btn"
                                       href="cards?color=<?= $color ?>&page=<?= $currentPage + 1 ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div>
                                <?php if ($currentPage > 1): ?>
                                    <a class="waves-effect waves-light btn" href="cards?page=<?= $currentPage - 1 ?>">Previous</a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($currentPage < $pages): ?>
                                    <a class="waves-effect waves-light btn"
                                       href="cards?page=<?= $currentPage + 1 ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </section>
        </section>
    </section>
</main>

<?php include __DIR__ . '/../../templates/footer.html.php'; ?>

<script type="text/javascript" src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
</body>
</html>

