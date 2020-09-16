<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\Card\Card;

interface CardServiceInterface
{
    /**
     * @param Card $card
     */
    public function saveCard(Card $card): void;
}