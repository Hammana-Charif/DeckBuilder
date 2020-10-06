<?php


namespace DeckBuilder\Entity\User;


class User implements UserInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $nickname;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * @return string
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return int
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
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
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $nickname
     * @param string $email
     * @param string $password
     */
    public function hydrate(string $nickname, string $email, string $password): void
    {
        $this->setNickname($nickname);
        $this->setEmail($email);
        $this->setPassword($password);
    }
}