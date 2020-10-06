<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Entity\Card\MagicTheGatheringCard;
use PDO;

class ColorRepository
{
    /**
     * @param MagicTheGatheringCard $card
     * @param PDO $dbh
     * @return mixed
     */
    public function select(MagicTheGatheringCard $card, PDO $dbh)
    {
        $request = null;
        $result = null;
        foreach ($card->getColors() as $color) {
            $request = $dbh->prepare("SELECT `id` FROM color WHERE name = :name ");
            $result = $request->execute([
                ":name" => $color->getName(),
            ]);
        }

        if (null !==  $result) {
            return $request->fetch(PDO::FETCH_OBJ);
        }
    }
}