<?php


namespace DeckBuilder\Service\Validator;



class EmailValidator implements ValidatorInterface
{
    public function validate(): bool
    {
        if (empty(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))) {
            return false;
        } else {
            return true;
        }
    }
}