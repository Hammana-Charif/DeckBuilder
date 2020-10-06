<?php

use DeckBuilder\Service\Domain\Card\CardService;

include __DIR__ . "/../vendor/autoload.php";

var_dump($argv);


$i = 1;
$cardService = new CardService();
while ($link = $cardService->findAll("https://api.magicthegathering.io/v1/cards?page=$i&pageSize=50", $i.'.json')) {
    $i++;
    echo "Page $i rajoutée !";
}

echo "Insertion terminée";
