<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Service\ManagerService;

class PasswordService
{
    /**
     * @param string $value
     */
    function saveNickname(string $value): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `password`(`password`) VALUES (:password)")
            ->execute([
                ":password" => $value,
            ]);
    }
}