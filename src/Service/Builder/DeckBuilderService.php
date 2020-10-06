<?php


namespace DeckBuilder\Service\Builder;



use DeckBuilder\Repository\CardRepository;

class DeckBuilderService
{
    /**
     * @param $id
     * @return array[]
     */
    public function build($id): array
    {
        $size = filter_input(INPUT_POST, "size");
        $type = filter_input(INPUT_POST, "type");

        $cardRepository = new CardRepository();
        $cardsList = $cardRepository->select();

        $cards = [];
        foreach ($cardsList as $card) {
            if ((int)$id === $card->getId()) {
                $cards[] = $card;
                break;
            }
        }

//        $
//        saveDeck($deckSize, $deckType, $user);

        return $deckList = ["deckList" => $cards];
    }
}