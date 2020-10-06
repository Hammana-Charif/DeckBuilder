<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DeckBuilder</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/app.css">
    <link type="text/css" rel="stylesheet" href="/node_modules/materialize-css/dist/css/materialize.min.css"
          media="screen,projection"/>
</head>
<body>

<?php include __DIR__ . '/../../templates/header.html.php'; ?>

<main id="deckListMain">
    <div id="content" class="container">
        <div class="row pt-3 pb-3">
            <h1 class="mt-3 mb-3 white-text">Deck</h1>
        </div>
        <div class="row pt-3 pb-3">
            <section class="background_image">
                <?php foreach ($deckList as $card): ?>
                    <div id="cardDisplay" class="col s4 space_between">
                        <div>
                            <?php include 'deck.html.php'; ?>
                        </div>
                    </div>
                    <?php break; ?>
                <?php endforeach; ?>
            </section>
            <div class="col-12 text-right">
                <input type="submit" value="Créer" name="deck-form" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../../templates/footer.html.php'; ?>

<script type="text/javascript" src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
</body>
</html>