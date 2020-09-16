<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\User\Email;
use DeckBuilder\Entity\User\NickName;
use DeckBuilder\Entity\User\Password;
use DeckBuilder\Service\ManagerService;

class UserService implements UserServiceInterface
{
    /**
     * @param NickName $nickName
     * @param Email $email
     * @param Password $password
     */
    public function saveDeck(NickName $nickName, Email $email, Password $password): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `user`(`nickname`, `email`, `password`) VALUES (:nickname, :email, :password)")
            ->execute([
                ":size" => $nickName->getNickName(),
                ":type" => $email->getEmail(),
                ":user" => $password->getPassword(),
            ]);
    }
}