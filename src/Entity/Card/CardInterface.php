<?php


namespace DeckBuilder\Entity\Card;


interface CardInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getPicture(): string;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void;
}