<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Service\ManagerService;
use PDO;

class EmailRepository implements RepositoryInterface
{
    /**
     * @return array
     */
    public function select(): array
    {
        $dbh = ManagerService::getConnection();
        $emailsList = [];
        $sth = $dbh->query("SELECT email FROM email");
        while ($emails = $sth->fetch(PDO::FETCH_ASSOC)) {
            $emailsList = $emails;
        }
        return $emailsList;
    }

    /**
     * @return mixed
     */
    public function findByMail()
    {
        $dbh = ManagerService::getConnection();
        $emailInput = filter_input(INPUT_POST, "email");
        $sthEmail = $dbh->query("SELECT email, id FROM email WHERE email = '$emailInput'");
        return $emailResult = $sthEmail->fetch(PDO::FETCH_ASSOC);
    }
}