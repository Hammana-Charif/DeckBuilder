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
<body

<?php include __DIR__ . '/../../templates/header.html.php'; ?>

<main class="display-flex column" id="signInMain">
                    <div class="row">
                    </div>
    <div class="row pt-3 pb-3   ">
        <h2 class="mt-3 mb-3 white-text">Créer un compte</h2>
    </div>
    <div class="container display-flex">
        <div class="row">
            <form class="col s12" method="post" action="" novalidate="novalidate">
                <div class="input-field col s12 display-flex">
                    <div class="col s12 m6 margin_auto">
                        <?php if (array_key_exists('nickname', $userErrors)): ?>
                            <span style="color:red;">
                                <?= filter_var($userErrors['nickname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
                            </span>
                        <?php endif ?>
                        <input id="nickname" type="text" name="nickname" class="white-text"
                               value="<?= filter_var($nickname->getNickname(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
                        <label for="nickname" class="white-text">Surname</label>
                    </div>
                </div>
                <div class="input-field col s12 display-flex">
                    <div class="margin_auto col s12 m6">
                        <?php if (array_key_exists('email', $userErrors)): ?>
                            <span style="color:red;">
                                <?= filter_var($userErrors['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
                            </span>
                        <?php endif ?>
                        <input id="email" type="email" name="email" class="white-text"
                               value="<?= filter_var($email->getEmail(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
                        <label for="email" class="white-text">Email</label>
                    </div>
                </div>
                <div class="input-field col s12 display-flex">
                    <div class="margin_auto col s12 m6">
                        <?php if (array_key_exists('password', $userErrors)): ?>
                            <span style="color:red;">
                        <?= filter_var($userErrors['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
                    </span>
                        <?php endif ?>
                        <input id="password" type="password" name="password" class="white-text"
                               value="<?= filter_var($password->getPassword(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
                        <label for="password" class="white-text">Password</label>
                    </div>
                </div>
                <div class="input-field col s12 display-flex">
                    <div class="margin_auto col s12 m6">
                        <?php if (array_key_exists('confirm', $userErrors)): ?>
                            <span style="color:red;">
                        <?= filter_var($userErrors['confirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
                    </span>
                        <?php endif ?>
                        <input id="confirm" type="password" name="confirm" class="white-text"
                               value="<?= filter_var(filter_input(INPUT_POST, "confirm"), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
                        <label for="confirm" class="white-text">Confirm</label>
                    </div>
                </div>
                <div class="col s12 display-flex">
                    <input type="submit" value="Create" name="user_create" class="btn btn-primary margin_auto"/>
                </div>
            </form>
        </div>
</main>

<?php include __DIR__ . '/../../templates/footer.html.php'; ?>

<script type="text/javascript" src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
</body>
</html>