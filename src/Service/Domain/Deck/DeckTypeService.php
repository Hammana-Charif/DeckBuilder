<?php


namespace DeckBuilder\Service\Domain\Deck;



use DeckBuilder\Entity\Deck\DeckType;

class DeckTypeService
{
    public function types($typeValues): array
    {
        $types = [];
        foreach ($typeValues as $type) {
            $newType = new DeckType();
            $newType->setType($type);
            $types[] = $newType;
        }
        return $types;
    }
}