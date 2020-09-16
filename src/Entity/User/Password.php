<?php


namespace DeckBuilder\Entity\User;


class Password
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $password ;

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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $password
     */
    public function hydrate(string $password): void
    {
        $this->setPassword($password);
    }
}