<?php


namespace DeckBuilder\Service\Domain\Card;


use DeckBuilder\Entity\Card\MagicTheGatheringCard;
use DeckBuilder\Repository\ColorRepository;
use DeckBuilder\Service\Builder\CardBuilderService;
use DeckBuilder\Service\Cache\CacheService;
use DeckBuilder\Service\Domain\CardColor\CardColorService;
use DeckBuilder\Service\Http\ClientService;
use DeckBuilder\Service\ManagerService;
use DeckBuilder\Service\ObjectConverterService;
use PDOException;

class CardService implements CardServiceInterface
{
    /**
     * @param string $url
     * @param string $fileName
     * @return array
     */
    public function findAll(string $url, string $fileName): array
    {
        $cards = [];

        $call = new ClientService();
        $cache = new CacheService();
        $content = $cache->createOrLinkTheCache($call, $url, $fileName);

        $converter = new ObjectConverterService();
        $contentArray = $converter->convertToObject($content);

        $cardBuilderService = new CardBuilderService();
        return $cardBuilderService->MagicTheGatheringCardsHydrator($contentArray->cards, $cards);
    }

    /**
     * @param MagicTheGatheringCard $card
     */
    public function saveCard(MagicTheGatheringCard $card): void
    {
        $dbh = ManagerService::getConnection();

        try {
            $dbh->prepare("INSERT INTO `card`(`name`, `mana_cost`, `description`, `picture`) VALUES (:name, :mana_cost, :description, :picture)")
                ->execute([
                    ":name" => $card->getName(),
                    ":mana_cost" => $card->getManaCost(),
                    ":description" => $card->getDescription(),
                    ":picture" => $card->getPicture(),
                ]);

            $id = $dbh->lastInsertId();

            $colorRepository = new ColorRepository();
            $result = $colorRepository->select($card, $dbh);

            $cardColorService = new CardColorService();
            $cardColorService->saveCardColor($result, $id, $dbh);
        } catch (PDOException $exception) {}

    }
}