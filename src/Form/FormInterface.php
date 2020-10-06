<?php


namespace DeckBuilder\Form;


interface FormInterface
{
    /**
     *
     */
    public function hydrate(): array;

    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return bool
     */
    public function isSubmitted(): bool;
}