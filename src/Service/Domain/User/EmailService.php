<?php


namespace DeckBuilder\Service\Domain\User;


use DeckBuilder\Entity\User\Email;
use DeckBuilder\Service\ManagerService;
use PDO;

class EmailService
{
    /**
     * @param Email $email
     * @return string
     */
    function saveEmail(Email $email): string
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `email`(`email`) VALUES (:email)")
            ->execute([
                ":email" => $email->getEmail(),
            ]);
        return $dbh->lastInsertId();
    }


}