<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\Card\Card;
use DeckBuilder\Entity\Card\Color;

class ColorService
{
    public function setColor(Card $newCard, array $card) {
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
    }
}