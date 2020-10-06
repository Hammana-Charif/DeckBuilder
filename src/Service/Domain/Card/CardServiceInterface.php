<?php


namespace DeckBuilder\Service\Domain\Card;


use DeckBuilder\Entity\Card\MagicTheGatheringCard;

interface CardServiceInterface
{
    /**
     * @param MagicTheGatheringCard $card
     */
    public function saveCard(MagicTheGatheringCard $card): void;
}