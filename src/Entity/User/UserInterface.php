<?php


namespace DeckBuilder\Entity\User;


interface UserInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getNickname(): int;

    /**
     * @return int
     */
    public function getEmail(): int;

    /**
     * @return int
     */
    public function getPassword(): int;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @param int $nickname
     */
    public function setNickname(int $nickname): void;

    /**
     * @param int $email
     */
    public function setEmail(int $email): void;

    /**
     * @param int $password
     */
    public function setPassword(int $password): void;
}