<?php


namespace DeckBuilder\Entity\Card;


interface MagicTheGatheringCardInterface extends CardInterface
{
    /**
     * @return string
     */
    public function getManaCost(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return array
     */
    public function getColors(): array;

    /**
     * @param string $manaCost
     */
    public function setManaCost(string $manaCost): void;

    /**
     * @param string $description
     */
    public function setDescription(string $description): void;

    /**
     * @param array $color
     */
    public function setColors(Array $color): void;
}