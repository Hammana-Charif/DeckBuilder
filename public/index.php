<?php

use DeckBuilder\Controller\CardController;
use DeckBuilder\Controller\DeckController;
use DeckBuilder\Controller\ErrorController;
use DeckBuilder\Controller\LoginController;
use DeckBuilder\Controller\LogoutController;
use DeckBuilder\Controller\UserController;
use DeckBuilder\Service\Domain\Card\CardService;

include __DIR__ . "/../vendor/autoload.php";


$url = filter_input(INPUT_SERVER, "REQUEST_URI");
$getId = filter_input(INPUT_GET, "page");
$getColor = filter_input(INPUT_GET, "color");
$getAdded = filter_input(INPUT_GET, "add");
$logout = filter_input(INPUT_GET, "logout");

if ($url === '/user?create') {
    $userController = new UserController();
    $userController->showForm();
} elseif ($url === '/user?login') {
    $loginController = new LoginController();
    $loginController->showForm();
} elseif ($url === '/deck') {
    $deckController = new DeckController();
    $deckController->showDeck($getAdded);
} elseif ($url === '/cards/logout') {
    $logoutController = new LogoutController();
    $logoutController->logout();
} elseif ($url === '/cards' || substr('/cards?', 6)) {
    $cardController = new CardController();
    $cardController->showCards($getColor, $getAdded);
}  elseif ($url === '/cards?logout') {
    $logoutController = new LogoutController();
    $logoutController->logout();
} else {
    $errors = new ErrorController();
    $errors->showError(404);
}
