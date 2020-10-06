<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Service\ManagerService;
use PDO;

class DeckSizeRepository
{
    public function select(): array
    {
        $dbh = ManagerService::getConnection();
        $sizesList = [];
        $sth = $dbh->query("SELECT size FROM deck_size");
        while ($sizes = $sth->fetch(PDO::FETCH_ASSOC)) {
            $sizesList = $sizes;
        }
        return $sizesList;
    }
}