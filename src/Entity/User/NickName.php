<?php


namespace DeckBuilder\Entity\User;


class NickName
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $nickName;

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
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @param string $nickName
     */
    public function hydrate(string $nickName): void
    {
        $this->setNickName($nickName);
    }
}