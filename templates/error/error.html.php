<?php ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DeckBuilder</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/app.css">
    <link type="text/css" rel="stylesheet" href="./node_modules/materialize-css/dist/css/materialize.min.css"
          media="screen,projection"/>
</head>
<body class="vh-100">

<?php include __DIR__ . '/../../templates/header.html.php'; ?>

<main class="container">
    <section class="row">
        <h1><?= $statusCode ?></h1>
    </section>
</main>

<?php include __DIR__ . '/../../templates/footer.html.php'; ?>

<script type="text/javascript" src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
</body>
</html>


