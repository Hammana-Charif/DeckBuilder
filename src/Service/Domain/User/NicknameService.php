<?php


namespace DeckBuilder\Service\Domain\User;


use DeckBuilder\Entity\User\NickName;
use DeckBuilder\Service\ManagerService;

class NicknameService
{
    /**
     * @param NickName $nickName
     * @return string
     */
    function saveNickname(NickName $nickName): string
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `nickname`(`nickname`) VALUES (:nickname)")
            ->execute([
                ":nickname" => $nickName->getNickName(),
            ]);
        return $dbh->lastInsertId();
    }
}