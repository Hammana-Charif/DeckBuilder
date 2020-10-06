<?php


namespace DeckBuilder\Service\Validator;


use DeckBuilder\Entity\User\NickName;

class NicknameValidator implements ValidatorInterface
{

    public function validate(): bool
    {
        if (empty(filter_input(
            INPUT_POST, 'nickname',
            FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9,' ]{1,15}/"]]))) {
            return false;
        } else {
            return true;
        }
    }
}