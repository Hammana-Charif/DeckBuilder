<?php


namespace DeckBuilder\Entity\User;


class User implements UserInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $nickname;

    /**
     * @var int
     */
    private int $email;

    /**
     * @var int
     */
    private int $password;

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
    public function getNickname(): int
    {
        return $this->nickname;
    }

    /**
     * @return int
     */
    public function getEmail(): int
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getPassword(): int
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
     * @param int $nickname
     */
    public function setNickname(int $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @param int $email
     */
    public function setEmail(int $email): void
    {
        $this->email = $email;
    }

    /**
     * @param int $password
     */
    public function setPassword(int $password): void
    {
        $this->password = $password;
    }

    /**
     * @param int $nickname
     * @param int $email
     * @param int $password
     */
    public function hydrate(int $nickname, int $email, int $password): void
    {
        $this->setNickname($nickname);
        $this->setEmail($email);
        $this->setPassword($password);
    }
}