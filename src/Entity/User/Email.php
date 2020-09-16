<?php


namespace DeckBuilder\Entity\User;


class Email
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $email;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $email
     */
    public function hydrate(string $email): void
    {
        $this->setEmail($email);
    }
}