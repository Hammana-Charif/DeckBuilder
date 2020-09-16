<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Service\ManagerService;

class EmailService
{
    /**
     * @param string $value
     */
    function saveEmail(string $value): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `email`(`email`) VALUES (:email)")
            ->execute([
                ":email" => $value,
            ]);
    }
}