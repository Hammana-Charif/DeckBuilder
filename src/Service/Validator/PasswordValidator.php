<?php


namespace DeckBuilder\Service\Validator;


use DeckBuilder\Entity\User\NickName;

class PasswordValidator implements ValidatorInterface
{
    public function validate(): bool
    {
        if (empty(filter_input(INPUT_POST, "password",
            FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9,' ]{8}/"]]))) {
            return false;
        } else {
            return true;
        }
    }

    public function confirm(): bool
    {
        if (empty(filter_input(INPUT_POST, "confirm"))
            || filter_input(INPUT_POST, "confirm") !== filter_input(INPUT_POST, "password")) {
            return false;
        } else {
            return true;
        }
    }
}