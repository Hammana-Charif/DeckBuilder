<?php


namespace DeckBuilder\Service\Domain\CardColor;


use PDO;

class CardColorService
{
    /**
     * @param $result
     * @param string $id
     * @param PDO $dbh
     */
    public function saveCardColor($result, string $id, PDO $dbh)
    {
        $dbh->prepare("INSERT INTO `card_color`(`card`, `color`) VALUES (:card, :color)")
            ->execute([
                ":card" => $id,
                ":color" => $result->id,
            ]);

    }
}