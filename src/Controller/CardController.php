<?php


namespace DeckBuilder\Controller;




use DeckBuilder\Service\Builder\MagicTheGatheringCardBuilderService;

class CardController extends Controller
{
    /**
     * @param $color
     * @param $id
     */
    public function showCards($color, $id): void
    {
        $choicesList = (new MagicTheGatheringCardBuilderService())->build($color, $id);
        $this->render("card/cardList.html.php", [
            "currentPage" => $currentPage = $choicesList["currentPage"],
            "pages" => $pages = $choicesList["pages"],
            "cardsList" => $choicesList["cardsList"],
            "color" => $choicesList["color"],
        ]);
    }
}