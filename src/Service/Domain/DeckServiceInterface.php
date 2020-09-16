<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\Deck\DeckSize;
use DeckBuilder\Entity\Deck\DeckType;
use DeckBuilder\Entity\User\User;

interface DeckServiceInterface
{
    /**
     * @param DeckSize $deckSize
     * @param DeckType $deckType
     * @param User $user
     */
    public function saveDeck(DeckSize $deckSize, DeckType $deckType, User $user): void;
}