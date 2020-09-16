<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\User\Email;
use DeckBuilder\Entity\User\NickName;
use DeckBuilder\Entity\User\Password;

interface UserServiceInterface
{
    /**
     * @param NickName $nickName
     * @param Email $email
     * @param Password $password
     */
    public function saveDeck(NickName $nickName, Email $email, Password $password): void;
}