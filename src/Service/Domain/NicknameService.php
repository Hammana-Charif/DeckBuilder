<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Service\ManagerService;

class NicknameService
{
    /**
     * @param string $value
     */
    function saveNickname(string $value): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `nickname`(`nickname`) VALUES (:nickname)")
            ->execute([
                ":nickname" => $value,
            ]);
    }
}