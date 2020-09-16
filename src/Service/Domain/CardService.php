<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\Card\Card;
use DeckBuilder\Entity\Card\Color;
use DeckBuilder\Service\Cache\CacheService;
use DeckBuilder\Service\Http\ClientService;
use DeckBuilder\Service\ManagerService;
use DeckBuilder\Service\ObjectConverterService;

class CardService implements CardServiceInterface
{
    /**
     * @param string $url
     * @param string $cachePath
     */
    function findAll(string $url, string $cachePath): array
    {
        $cards = [];

        $call = new ClientService();

        $rightPath = __DIR__ . "/../../../var/cache/cards.json";

        if (file_exists($cachePath)) {
            echo "CREATION DU CACHE";
            $content = $call->get($url);

            $cache = new CacheService();
            $cache->putInCache($rightPath, $content);
        } else {
            ECHO "CACHE EXISTE DEJA";
            $content = $call->get($rightPath);
        }

        $converter = new ObjectConverterService();
        $contentArray = $converter->convertToObject($content);

        foreach ($contentArray->cards as $card) {
            $newCard = new Card();

            if (!property_exists($card, "name")) {
                $card->name = "";
            }
            $newCard->setName($card->name);

            if (!property_exists($card, "manaCost")) {
                $card->manaCost = "";
            }
            $newCard->setManaCost($card->manaCost);

            if (!property_exists($card, "text")) {
                $card->text = "";
            }
            $newCard->setDescription($card->text);

            if (!property_exists($card, "imageUrl")) {
                $card->imageUrl = "";
            }
            $newCard->setPicture($card->imageUrl);

            $colors = [];
            if (!property_exists($card, "colors")) {
                $card->colors = "";
            }
            foreach ($card->colors as $color) {
                $newColor = new Color();
                $newColor->setName($color);
                $colors[] = $newColor;
            }
            $newCard->setColors($colors);

            $cards[] = $newCard;
            var_dump($newCard);
            $this->saveCard($newCard);
        }

        var_dump($cards);
        return $cards;
    }

    /**
     * @param Card $card
     */
    public function saveCard(Card $card): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `card`(`name`, `mana_cost`, `description`, `picture`) VALUES (:name, :mana_cost, :description, :picture)")
            ->execute([
                ":name" => $card->getName(),
                ":mana_cost" => $card->getManaCost(),
                ":description" => $card->getDescription(),
                ":picture" => $card->getPicture(),
            ]);
    }
}