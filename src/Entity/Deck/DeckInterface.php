<?php


namespace DeckBuilder\Entity\Deck;


interface DeckInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getSize(): int;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @param int $size
     */
    public function setSize(int $size): void;
}