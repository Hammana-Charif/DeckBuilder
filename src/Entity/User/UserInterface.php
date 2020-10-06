<?php


namespace DeckBuilder\Entity\User;


interface UserInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getNickname(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void;

    /**
     * @param string $password
     */
    public function setPassword(string $password): void;
}