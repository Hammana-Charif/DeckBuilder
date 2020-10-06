<?php


namespace DeckBuilder\Service\Domain\User;


use DeckBuilder\Entity\User\Password;
use DeckBuilder\Service\ManagerService;

class PasswordService
{
    /**
     * @param Password $password
     * @return string
     */
    function savePassword(Password $password): string
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `password`(`password`) VALUES (:password)")
            ->execute([
                ":password" => password_hash($password->getPassword(), PASSWORD_DEFAULT),
            ]);
        return $dbh->lastInsertId();
    }
}