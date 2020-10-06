<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Service\ManagerService;
use PDO;

class NicknameRepository implements RepositoryInterface
{
    /**
     * @return array
     */
    public function select(): array
    {
        $dbh = ManagerService::getConnection();
        $nicknamesList = [];
        $sth = $dbh->query("SELECT nickname FROM nickname");
        while ($nicknames = $sth->fetch(PDO::FETCH_ASSOC)) {
            $nicknamesList = $nicknames;
        }
        return $nicknamesList;
    }

    /**
     * @param $emailId
     * @return mixed
     */
    public function joinEmailToUsername($emailId)
    {
        $dbh = ManagerService::getConnection();
        $sthUsername = $dbh->query(
            "SELECT nickname.nickname 
                          FROM nickname 
                          JOIN user 
                          ON nickname.id = user.nickname
                          WHERE user.email = '$emailId'");
        return $sthUsername->fetch(PDO::FETCH_ASSOC);
    }
}