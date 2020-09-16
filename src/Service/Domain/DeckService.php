<?php


namespace DeckBuilder\Service\Domain;


use DeckBuilder\Entity\Deck\DeckSize;
use DeckBuilder\Entity\Deck\DeckType;
use DeckBuilder\Entity\User\User;
use DeckBuilder\Service\ManagerService;

class DeckService implements DeckServiceInterface
{
    /**
     * @param DeckSize $deckSize
     * @param DeckType $deckType
     * @param User $user
     */
    public function saveDeck(DeckSize $deckSize, DeckType $deckType, User $user): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `deck`(`size`, `type`, `user`) VALUES (:size, :type, :user)")
            ->execute([
                ":size" => $deckSize->getSize(),
                ":type" => $deckType->getType(),
                ":user" => $user->getId(),
            ]);
    }
}