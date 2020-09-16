<?php

namespace DeckBuilder\Entity\Card;


class Card implements MagicTheGatheringCardInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $manaCost;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var string
     */
    private string $picture;

    /**
     * @var array
     */
    private array $colors;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getManaCost(): string
    {
        return $this->manaCost;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $manaCost
     */
    public function setManaCost(string $manaCost): void
    {
        $this->manaCost = $manaCost;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @param array $color
     */
    public function setColors(Array $color): void
    {
        $this->colors = $color;
    }

    /**
     * @param string $name
     * @param string $manaCost
     * @param string $description
     * @param string $picture
     * @param array $colors
     */
    public function hydrate(string $name, string $manaCost, string $description, string $picture, array $colors): void
    {
        $this->setName($name);
        $this->setManaCost($manaCost);
        $this->setDescription($description);
        $this->setPicture($picture);
        $this->setColors($colors);
    }
}