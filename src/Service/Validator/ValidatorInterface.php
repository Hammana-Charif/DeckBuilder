<?php


namespace DeckBuilder\Service\Validator;


use DeckBuilder\Entity\User\NickName;

interface ValidatorInterface
{
    public function validate(): bool;
}