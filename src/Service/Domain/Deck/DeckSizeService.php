<?php


namespace DeckBuilder\Service\Domain\Deck;



use DeckBuilder\Entity\Deck\DeckSize;

class DeckSizeService
{
    public function sizes($sizeValues): array
    {
        $sizes = [];
        foreach ($sizeValues as $size) {
            $newSize = new DeckSize();
            $newSize->setSize($size);
            $colors[] = $newSize;
        }
        return $sizes;
    }
}