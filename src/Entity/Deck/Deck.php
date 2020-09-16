<?php


namespace DeckBuilder\Entity\Deck;


class Deck implements MagicTheGatheringDeckInterface
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
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $user;

    /**
     * @var array
     */
    private array $cards;

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
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
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
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    /**
     * @param array $cards
     */
    public function setCards(array $cards): void
    {
        $this->cards = $cards;
    }

    /**
     * @param int $size
     * @param int $type
     * @param int $user
     * @param array $cards
     */
    public function hydrate(int $size, int $type, int $user, array $cards): void
    {
        $this->setSize($size);
        $this->setType($type);
        $this->setUser($user);
        $this->setCards($cards);
    }
}