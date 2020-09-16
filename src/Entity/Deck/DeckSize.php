<?php


namespace DeckBuilder\Entity\Deck;


class DeckSize
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $size;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @param int $size
     */
    public function hydrate(int $size): void
    {
        $this->setSize($size);
    }
}