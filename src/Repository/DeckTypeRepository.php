<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Service\ManagerService;
use PDO;

class DeckTypeRepository implements RepositoryInterface
{
    public function select(): array
    {
        $dbh = ManagerService::getConnection();
        $typesList = [];
        $sth = $dbh->query("SELECT type FROM deck_type");
        while ($types = $sth->fetch(PDO::FETCH_ASSOC)) {
            $typesList = $types;
        }
        return $typesList;
    }
}