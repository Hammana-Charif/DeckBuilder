<?php


namespace DeckBuilder\Service\Domain\Color;


use DeckBuilder\Entity\Color\Color;

class ColorService
{
    /**
     * @param $colorValues
     * @return array
     */
    public function setColor($colorValues): array
    {
        $colors = [];
        foreach ($colorValues as $color) {
            $newColor = new Color();
            if (null === $color) {
                $color = "Empty";
            }
            $newColor->setName($color);
            $colors[] = $newColor;
        }
        return $colors;
    }
}