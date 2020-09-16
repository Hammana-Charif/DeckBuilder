<?php


namespace DeckBuilder\Entity\Deck;


class DeckType
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $type
     */
    public function hydrate(string $type): void
    {
        $this->setType($type);
    }
}