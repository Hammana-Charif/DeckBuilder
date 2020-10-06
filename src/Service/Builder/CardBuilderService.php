<?php


namespace DeckBuilder\Service\Builder;


use DeckBuilder\Entity\Card\MagicTheGatheringCard;
use DeckBuilder\Service\Domain\Card\CardService;
use DeckBuilder\Service\Domain\Color\ColorService;

class CardBuilderService
{
    /**
     * @param $object
     * @param $value
     * @param $property
     * @return string
     */
    function check($object, $value, string $property)
    {
        if (!property_exists($object, $property)) {
            return $value = "";
        } else {
            return $value;
        }
    }

    /**
     * @param MagicTheGatheringCard $card
     * @param $objects
     * @param $value
     * @param $property
     */
    function build(MagicTheGatheringCard $card, $objects, $value, string $property): void
    {
        $checked = $this->check($objects, $value, $property);
        $value = $checked;

        if ("id" === $property) {
            $card->setId((int)$value);
        } elseif ("name" === $property) {
            $card->setName($value);
        } elseif ("manaCost" === $property) {
            $card->setManaCost($value);
        } elseif ("text" === $property) {
            $card->setDescription($value);
        } elseif ("imageUrl" === $property) {
            $card->setPicture($value);
        } elseif ("colors" === $property) {
            $colorService = new ColorService();
            $card->setColors($colorService->setColor($value));
        }
    }

    /**
     * @param $contentCards
     * @param array $cards
     * @return array
     */
    function MagicTheGatheringCardsHydrator(array $contentCards, array $cards): array
    {
        foreach ($contentCards as $cardValues) {
            if (property_exists($cardValues, "imageUrl")) {
                $newCard = new MagicTheGatheringCard();

                $this->build($newCard, $cardValues, $cardValues->id, "id");
                $this->build($newCard, $cardValues, $cardValues->name, "name");
                if (!property_exists($cardValues, "manaCost")) {
                    $cardValues->manaCost = "";
                }
                $this->build($newCard, $cardValues, $cardValues->manaCost, "manaCost");
                if (!property_exists($cardValues, "text")) {
                    $cardValues->text = "";
                }
                $this->build($newCard, $cardValues, $cardValues->text, "text");
                $this->build($newCard, $cardValues, $cardValues->imageUrl, "imageUrl");
                $this->build($newCard, $cardValues, $cardValues->colors, "colors");

                $cards[] = $newCard;
                $cardService = new CardService();
                $cardService->saveCard($newCard);
            }
        }
        return $cards;
    }
}