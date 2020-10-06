<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Controller\ErrorController;
use DeckBuilder\Entity\Card\MagicTheGatheringCard;
use DeckBuilder\Service\ManagerService;
use PDO;

class CardRepository implements RepositoryInterface
{
    /**
     * @return int
     */
    public function currentPage(): int
    {
        return (int)(filter_input(INPUT_GET, "page") ?? 1) ?: 1;
    }

    /**
     * @return int
     */
    public function perPage(): int
    {
        return 12;
    }

    /**
     * @return int
     */
    public function pages(): int
    {
        $dbh = ManagerService::getConnection();
        $count = (int)$dbh->query('SELECT COUNT(id) as totalCards FROM card')->fetch(PDO::FETCH_NUM)[0];
        $perPage = $this->perPage();
        return $pages = ceil($count / $perPage);
    }

    /**
     * @param $color
     * @return int
     */
    public function filterPages($color): int
    {
        $dbh = ManagerService::getConnection();
        $count = (int)$dbh->query(
            "SELECT COUNT(color) 
                      FROM card_color 
                      JOIN color 
                      ON card_color.color = color.id 
                      WHERE color.name = '$color'
        ")->fetch(PDO::FETCH_NUM)[0];
        $perPage = $this->perPage();
        return $pages = ceil($count / $perPage);
    }

    /**
     * @param $page
     * @param $quantity
     * @param $totalPages
     * @return array
     */
    public function selectWithPagination(int $page, int $quantity, int $totalPages): array
    {
        $dbh = ManagerService::getConnection();

        $currentPage = $page;
        $perPage = $quantity;
        $pages = $totalPages;

        $errorService = new ErrorController();
        $errorService->invalidPage($currentPage, $pages);

        $offSet = ($currentPage - 1) * $perPage;
        $sth = $dbh->query("SELECT id, name, mana_cost, description, picture FROM card ORDER BY name LIMIT $perPage OFFSET $offSet");
        $cardsArray = [];
        while ($cards = $sth->fetch(PDO::FETCH_ASSOC)) {
            if (!in_array($cards["name"], $cardsArray)) {
                $card = new MagicTheGatheringCard();
                $card->setId((int)$cards["id"]);
                $card->setName($cards["name"]);
                $card->setManaCost($cards["mana_cost"]);
                $card->setDescription($cards["description"]);
                $card->setPicture(str_replace("http", "https", $cards["picture"]));
                $cardsArray[] = $card;
            }
        }
        return $cardsArray;
    }

    /**
     * @param int $page
     * @param int $quantity
     * @param int $totalPages
     * @param $color
     * @return array
     */
    public function selectByColor(int $page, int $quantity, int $totalPages, $color): array
    {
        if (null !== $color) {
            $dbh = ManagerService::getConnection();

            $currentPage = $page;
            $perPage = $quantity;
            $pages = $totalPages;
            $errorService = new ErrorController();
            $errorService->invalidPage($currentPage, $pages);

            $offSet = ($currentPage - 1) * $perPage;
            $sth = $dbh->prepare(
                "SELECT card.id, card.name, card.mana_cost, card.description, card.picture 
                          FROM card 
                          JOIN card_color 
                          ON card.id = card_color.card 
                          WHERE card_color.color = (
                                SELECT id FROM color WHERE color.name = '$color'  
                          )
                          LIMIT $perPage OFFSET $offSet"
            );
            $sth->execute();
            $colorFilterList = [];
            while ($list = $sth->fetch(PDO::FETCH_ASSOC)) {
                $filteredCard = new MagicTheGatheringCard();
                $filteredCard->setId((int)$list["id"]);
                $filteredCard->setName($list["name"]);
                $filteredCard->setManaCost($list["mana_cost"]);
                $filteredCard->setDescription($list["description"]);
                $filteredCard->setPicture(str_replace("http", "https", $list["picture"]));

                $colorFilterList[] = $filteredCard;
            }
            return $colorFilterList;
        }
    }

    public function select(): array
    {
        $dbh = ManagerService::getConnection();
        $sth = $dbh->query("SELECT id, name, mana_cost, description, picture FROM card ORDER BY name");
        $cardsArray = [];
        while ($cards = $sth->fetch(PDO::FETCH_ASSOC)) {
            if (!in_array($cards["name"], $cardsArray)) {
                $card = new MagicTheGatheringCard();
                $card->setId((int)$cards["id"]);
                $card->setName($cards["name"]);
                $card->setManaCost($cards["mana_cost"]);
                $card->setDescription($cards["description"]);
                $card->setPicture(str_replace("http", "https", $cards["picture"]));
                $cardsArray[] = $card;
            }
        }
        return $cardsArray;
    }
}