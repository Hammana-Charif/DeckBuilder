<?php


namespace DeckBuilder\Entity\Deck;


interface MagicTheGatheringDeckInterface extends DeckInterface
{
    /**
     * @return int
     */
    public function getType(): int;

    /**
     * @return int
     */
    public function getUser(): int;

    /**
     * @return array
     */
    public function getCards(): array;

    /**
     * @param int $type
     */
    public function setType(int $type): void;

    /**
     * @param int $user
     */
    public function setUser(int $user): void;

    /**
     * @param array $cards
     */
    public function setCards(array $cards): void;
}